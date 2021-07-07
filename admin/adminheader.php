<div class="sidebar ">
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
        <a href="<?php echo htmlspecialchars(SITE_URL . "admin/adminmanagement.php"); ?>">
          <i class='bx bx-grid-alt' ></i>
          <span class="links_name">Admin Management</span>
        </a>
        <span class="tooltip">Admins</span>
      </li>
      <li>
        <a href="<?php echo htmlspecialchars(SITE_URL . "admin/usermanagement.php"); ?>">
          <i class='bx bx-user' ></i>
          <span class="links_name">User</span>
        </a>
        <span class="tooltip">User</span>
      </li>
      <li>
        <a href="<?php echo htmlspecialchars(SITE_URL . "admin/foodmanagement.php"); ?>">
          <i class='bx bx-basket' ></i>
          <span class="links_name">Foods</span>
        </a>
        <span class="tooltip">Foods</span>
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