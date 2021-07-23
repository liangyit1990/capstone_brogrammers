<div class="sidebar ">
    <div class="logo_content">
      <div class="logo">
        <div class="logo_name">ADMIN PANEL</div>
      </div>
      <i class='bx bx-menu' id="btn" ></i>
    </div>
    <ul class="nav_list">
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
          <span class="links_name">Users</span>
        </a>
        <span class="tooltip">Users</span>
      </li>
      <li>
        <a href="<?php echo htmlspecialchars(SITE_URL . "admin/foodmanagement.php"); ?>">
          <i class='bx bx-basket' ></i>
          <span class="links_name">Food</span>
        </a>
        <span class="tooltip">Food</span>
      </li>
      <li>
        <a href="<?php echo htmlspecialchars(SITE_URL . "admin/messages.php"); ?>">
          <i class='bx bx-chat' ></i>
          <span class="links_name">Messages</span>
        </a>
        <span class="tooltip">Messages</span>
      </li>
    </ul>
    <div class="profile_content">
      <div class="profile">
        <a href="<?php echo htmlspecialchars(SITE_URL . "admin/adminlogout.php"); ?>">
          <i class='bx bx-log-out adminlogout' id="log_out" ></i>
          <!-- Logout -->

        </a>
        <span class="tooltip">Logout</span>

      </div>
    </div>
  </div>