<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Admin | CALORICE </title>
    <link rel="stylesheet" href="adminstyle.css">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <!--Bootstrap Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">

   </head>
<body>
  <div class="sidebar">
    <div class="logo_content">
      <div class="logo">
        <div class="logo_name">ADMIN PANEL</div>
      </div>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav_list">
      <!-- <li>
          <i class='bx bx-search' ></i>
          <input type="text" placeholder="Search...">
        <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="#">
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Admin Management</span>
        </a>
        <span class="tooltip">Admins</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-user' ></i>
          <span class="links_name">User</span>
        </a>
        <span class="tooltip">User</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-chat' ></i>
          <span class="links_name">Messages</span>
        </a>
        <span class="tooltip">Messages</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-pie-chart-alt-2' ></i>
          <span class="links_name">Analytics</span>
        </a>
        <span class="tooltip">Analytics</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-folder' ></i>
          <span class="links_name">File Manager</span>
        </a>
        <span class="tooltip">Files</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cart-alt' ></i>
          <span class="links_name">Order</span>
        </a>
        <span class="tooltip">Order</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-heart' ></i>
          <span class="links_name">Saved</span>
        </a>
        <span class="tooltip">Saved</span>
      </li>
      <li>
        <a href="#">
          <i class='bx bx-cog' ></i>
          <span class="links_name">Setting</span>
        </a>
        <span class="tooltip">Setting</span>
      </li>
    </ul>
    <div class="profile_content">
      <div class="profile">
        <i class='bx bx-log-out' id="log_out" ></i>
      </div>
    </div>
  </div>
  <div class="home_content">
    <div class="text">Admin Management </div>
    <button class="add" type="submit" name="add">Add Admin</button>
    <table class="table table-hover">
        <thead>
            <tr>
            <th scope="col">ID</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row">1</th>
            <td>Mark@gmail.com</td>
            <td>Mark</td>
            <td>
                <button type="submit" name="edit">Edit</button>
                <button type="submit" name="delete">Delete</button>
            </td>
            </tr>
            <tr>
            <th scope="row">2</th>
            <td></td>
            <td></td>
            <td></td>
            </tr>
            <tr>
            <th scope="row">3</th>
            <td></td>
            <td></td>
            <td></td>
            </tr>
        </tbody>
    </table>
  </div>
  

  <script>
   let btn = document.querySelector("#btn");
   let sidebar = document.querySelector(".sidebar");
   let searchBtn = document.querySelector(".bx-search");

   btn.onclick = function() {
     sidebar.classList.toggle("active");
   }
   searchBtn.onclick = function() {
     sidebar.classList.toggle("active");
   }

  </script>

</body>
</html>