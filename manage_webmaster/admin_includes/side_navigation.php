    <?php 
        $currentFile = $_SERVER["PHP_SELF"];
        $parts = Explode('/', $currentFile);
        $page_name = $parts[count($parts) - 1];
    ?>
<div class="site-left-sidebar">
        <div class="sidebar-backdrop"></div>
        <div class="custom-scrollbar">
          <ul class="sidebar-menu">
            <li class="menu-title">Menu</li>
             <li  class="<?php if($page_name == 'dashboard.php') { echo "active"; } ?>">
              <a href="dashboard.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i>
                </span> 
                <span class="menu-text">Dashboard</span>
              </a>
            </li>          
            <li class="<?php if($page_name == 'site_settings.php') { echo "active"; } ?>">
              <a href="site_settings.php" aria-haspopup="true">
                <span class="menu-icon">
                  <i class="zmdi zmdi-settings zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Site Settings</span>
              </a>
            </li>
            <li class="with-sub">
              <a href="#" aria-haspopup="true">
                <span class="menu-icon">
                  <i class="zmdi zmdi-accounts zmdi-hc-fw"></i>
                </span>
                <span class="menu-text">Users</span>
              </a>
              <ul class="sidebar-submenu collapse">
                <li class="menu-subtitle">Users</li>
                <li class="<?php if($page_name == 'admin_users.php' || $page_name == 'add_admin_users.php' || $page_name == 'edit_admin_users.php') { echo "active"; } ?>"><a href="admin_users.php">Admin Users</a></li> 
                <li class="<?php if($page_name == 'users.php' || $page_name == 'add_users.php' || $page_name == 'edit_users.php') { echo "active"; } ?>"><a href="users.php">Users</a></li>
              </ul>
            </li>
            <li  class="<?php if($page_name == 'tractors.php' || $page_name == 'add_tractors.php' || $page_name == 'edit_tractors.php') { echo "active"; } ?>">
              <a href="tractors.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-truck  zmdi-hc-fw"></i>
                </span> 
                <span class="menu-text">Tractors</span>
              </a>
            </li>
            <li  class="<?php if($page_name == 'spare_parts.php' || $page_name == 'add_spare_parts.php' || $page_name == 'edit_spare_parts.php') { echo "active"; } ?>">
              <a href="spare_parts.php" aria-haspopup="true">
                <span class="menu-icon">
                   <i class="zmdi zmdi-wrench zmdi-hc-fw"></i>
                </span> 
                <span class="menu-text">Spare Parts</span>
              </a>
            </li>
          </ul>
        </div>
      </div>