<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment (Stripe)</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<br/>
   <h3>Payment Gateway</h3>
    <br/>
     <div class="row">
        
        <div class="col-md-3">
            <div class="card">
               <div class="card-header">Leonovo ProArt</div> 
               <div class="card-body">
                    <img src="./Laptops/first.jpg"/>
                    <input type="hidden" name="image_src" id="image_src" value="./Laptops/first.jpg"/>
                    
               </div> 
               <div class="card-footer">
               <span>ProArt Lenovo</span>
                    <span>&#8377;&nbsp;35,000.00 </span>
                    <input type="submit" name="submit" value="check-in" class="buy_now"/>
                    <input type="hidden" name="price"  id="price" value="35,000.00"/>
                    <input type="hidden" name="item_name" id="item_name" value="ProArt Lenovo"/>   
               </div>   
            </div>
        </div>
        
        
        
       
        </div>
   </div>
   <script>
        $(document).ready(function(){
           $(".buy_now").on('click',function(e){
                e.preventDefault();
                    var image_src = $(this).closest(".card").find("#image_src").attr("value");
                    var item_name = $(this).closest(".card").find("#item_name").attr("value");
                    var price = $(this).closest(".card").find("#price").attr("value");
                    var dt = '&image='+image_src+'&item_name='+item_name+'&price='+price;
                    var url = 'http://localhost:8888/capstone_brogrammers/menutest.php?'+dt; 
                    
                    $.ajax({
                         url:url,
                         method:'GET',
                         success:function(){
                              window.location.href=url;
                         }
                    });
                   
                    
           });
          
        });
   </script>
</body>
</html>