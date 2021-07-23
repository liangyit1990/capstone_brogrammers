<?php 
include "../config/config.php";
include "../config/db.php";
include "../config/functions.php"; 


adminloggedIn();
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin | CALORICE </title>
    <link rel="stylesheet" href="adminstyle.css">
    <link rel="icon" href="../images/logo.png">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootstrap Latest compiled and minified CSS -->
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
  <!-- Include adminheader -->
  <?php 
  include "adminheader.php";
  ?>

  <main class="home_content">
    
    <h1><strong>Welcome Admin</strong></h1>
    
    <div class="container">
      <div class="users">
        <h4>No. of Registered Users:</h4> 
          <div class="result">
            <h1>
              <?php 
              //Count the number of registered users (excluding admin)
              $noofRegUsers = DB::query('SELECT * FROM users WHERE users_permission = 0');
              $noofRegUsersCount = DB::count();
              echo $noofRegUsersCount;

              ?>
            </h1>
          </div>
      </div>
      <div class="food">
        <?php 
        

        ?>
        <h4>Top 5 Most Popular Food:</h4>
          <div class="result">
            <?php 
            //Create array for foodname and qty
            $food_name = Array();
            $food_qty = Array();
            $getOrdersQuery = DB::query("SELECT * FROM orderdetails
                                            INNER JOIN food
                                            ON orderdetails.food_id = food.food_id
                                            ");
            foreach($getOrdersQuery as $getOrdersResult) {
                //Push values food name and qty into each array
                array_push($food_name, $getOrdersResult['food_name']);
                array_push($food_qty, $getOrdersResult['orderdetails_qty']);
            
            }
            //Make foodname as key to foodqty, and combine values with duplicate keys
            $result = array_unique($food_name);
            $result = array_combine($result, array_fill(0, count($result), 0));
            
            foreach($food_name as $k=>$v) {
                $result[$v] += $food_qty[$k];
              }
            
              arsort($result);
              //Slice and leave the top 5 foods
              $newArray = array_slice($result, 0, 5, true);
              $count = 1;
              foreach(array_keys($newArray) as $newArrayKeyNames) {
                
                  echo "<p>".$count.".".ucwords($newArrayKeyNames)."</p>";
                  $count++;
              }
            
            ?>
          </div>
      </div>
      <div class="orders">
        <h4>Total Orders </h4>
          <div class="result">
            <?php 
            //Count the total number of oders
            $getTotalOrderCount = db::query("SELECT * FROM orders");
            $getTotalOrderCountResult = db::count();
          
            ?>
            <h1><?php echo $getTotalOrderCountResult ?></h1>
          </div>
      </div>
      <div class="totalsales">
        <h4>Total Sales:</h4>
          <div class="result">
            <?php 
            $totalsales = 0;
            foreach ($getTotalOrderCount as $getTotalResult ) {
                $totalsales += $getTotalResult['orders_totalprice'];
            }
            
            ?>

            <h3>$<?php echo $totalsales ?></h3>
          </div>
      </div>
 
    </div><hr>
     
    <table id="myTable" class="table table-hover">
        <thead>
            <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Orders TimeStamp</th>
            <th scope="col">Users ID</th>
            <th scope="col">Orders Total Price</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
       
        <tbody>
        <!--Retrieve user info from database -->
        <?php 
        $getOrderQuery = DB::query("SELECT * FROM orders 
                                    INNER JOIN users
                                    ON orders.users_id = users.users_id 
                                    ORDER BY orders_id DESC");
        foreach($getOrderQuery as $getOrderResult){
        
        ?>
            <!-- Output users data in table forms -->
            <tr class="orderdata orderdata<?php echo $getOrderResult['orders_id']; ?>">
              <td class="orderid"><?php echo $getOrderResult['orders_id']; ?></td>
              <td class="ordertime"><?php echo displayDate($getOrderResult['orders_timestamp']) . ", " . displayTime($getOrderResult['orders_timestamp']); ?></td>
              <td class="orderuserid"><?php echo $getOrderResult['users_id']; ?></td>
              <td class="ordersprice"><?php echo $getOrderResult['orders_totalprice']; ?></td>
              <td><button type="button" class="btn btn-primary btn-sm viewOrder" value="viewOrder" data-id="<?php echo $getOrderResult['orders_id']; ?>" data-bs-toggle="modal" data-bs-target="#orderinfo<?php echo $getOrderResult['orders_id']; ?>" >View</button>
                  
              </td>  
            </tr>
            <!-- Modals for each user's View/Edit button -->
            <?php 
            
            $getOrderDetails = DB::query("SELECT * FROM ((`orderdetails` 
                                          INNER JOIN `food`
                                          on orderdetails.food_id = food.food_id)
                                          INNER JOIN `orders`
                                          ON orderdetails.orders_id = orders.orders_id)
                                          WHERE orderdetails.orders_id=%i",$getOrderResult['orders_id'])
                                          
            ?>
            <div class="modal fade" id="orderinfo<?php echo $getOrderResult['orders_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order No: <?php echo $getOrderResult['orders_id']; ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <!--Form body -->
                    
                    <h5>Name: <?php echo ucwords($getOrderResult['users_name']);  ?></h5>
                    <h5>Date: <?php echo displayDate($getOrderResult['orders_timestamp']) . ", " . displayTime($getOrderResult['orders_timestamp']); ?></h5>

                    <h5>Address: <?php echo $getOrderResult['orders_address'] ?></h5>
                    <h5><u>Order Details</u></h5>
                    
                    <?php 
                    foreach($getOrderDetails as $getOrderDetailsResult ){
                      echo "<span>". ucwords($getOrderDetailsResult['food_name']). " x " . $getOrderDetailsResult['orderdetails_qty']."</span></br>";
                    }
                    ?>
                    
                    <h5>Total Price :$<?php echo $getOrderResult['orders_totalprice']?></h5>

                  </div>
                  <div class="modal-footer">
                    <!--Close and Save btns -->
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    
                  </div>
                </div>
              </div>
            </div>
            

        <?php 
        }
        ?>
        </tbody>
        <tfoot>
          <tr>
            <th scope="col">Order ID</th>
            <th scope="col">Orders TimeStamp</th>
            <th scope="col">Users ID</th>
            <th scope="col">Orders Total Price</th>
            <th scope="col">Action</th>
          </tr>
        </tfoot>
    </table>

  </main>

  


 


<!-- bootstrap jquery -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script>
  $(document).ready(function(){

    $('#myTable').DataTable( {
        "order": [[ 0, "desc" ]]
    } );

    $("#btn").click(function(){
    $(".sidebar").toggleClass("active");
    })
  });

</script>



</body>
</html>