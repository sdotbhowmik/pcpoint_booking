<?php
$base_path = '/pcpoint_booking/admin';
?>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo $base_path; ?>/dashboard.php" class="brand-link">
    <span class="brand-text font-weight-light">CAF PC POINT | Admin</span>
  </a>
  
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo $base_path; ?>/dist/img/manager.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?php echo $_SESSION['uname'];?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        <!-- Dashboard -->
        <li class="nav-item">
          <a href="<?php echo $base_path; ?>/dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        
        <?php if($_SESSION['utype']==1):?>
        <!-- Sub-Admins -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link <?php $page = basename($_SERVER['PHP_SELF']); if(in_array($page, ['add-subadmin.php', 'manage-subadmins.php'])) echo 'active'; ?>">
            <i class="nav-icon fas fa-users"></i>
            <p>Sub-Admins <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/add-subadmin.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'add-subadmin.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/manage-subadmins.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-subadmins.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>
        <?php endif;?>

        <!-- Service Points -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link <?php $page = basename($_SERVER['PHP_SELF']); if(in_array($page, ['add-table.php', 'manage-tables.php'])) echo 'active'; ?>">
            <i class="nav-icon fas fa-building"></i>
            <p>Service Points <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/add-table.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'add-table.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Add</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/manage-tables.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-tables.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Manage</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Bookings -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link <?php $page = basename($_SERVER['PHP_SELF']); if(in_array($page, ['new-bookigs.php', 'accepted-bookings.php', 'rejected-bookings.php', 'all-bookings.php', 'bw-dates-report.php'])) echo 'active'; ?>">
            <i class="nav-icon fas fa-calendar-check"></i>
            <p>Bookings <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/new-bookigs.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'new-bookigs.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>New</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/accepted-bookings.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'accepted-bookings.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Accepted</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/rejected-bookings.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'rejected-bookings.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Rejected</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/all-bookings.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'all-bookings.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>All</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/bw-dates-report.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'bw-dates-report.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>B/w Dates Report</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Contact Messages -->
        <li class="nav-item">
          <a href="<?php echo $base_path; ?>/contact-messages.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact-messages.php' ? 'active' : ''; ?>">
            <i class="nav-icon fas fa-envelope"></i>
            <p>Contact Messages</p>
          </a>
        </li>

        <!-- Site Settings -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link <?php $page = basename($_SERVER['PHP_SELF']); if(strpos($page, 'settings') !== false || $page == 'theme-settings.php' || $page == 'logo-settings.php') echo 'active'; ?>">
            <i class="nav-icon fas fa-cogs"></i>
            <p>Site Settings <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/settings/index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>General Settings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/settings/theme-settings.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'theme-settings.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Theme Settings</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/settings/logo-settings.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'logo-settings.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Logo & Favicon</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Content Management -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link <?php $page = basename($_SERVER['PHP_SELF']); if(strpos($page, 'manage-') !== false) echo 'active'; ?>">
            <i class="nav-icon fas fa-edit"></i>
            <p>Content Management <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-hero.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-hero.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Hero / Slider</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-features.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-features.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Features</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-services.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-services.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Services</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-stats.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-stats.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Statistics</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-ceo.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-ceo.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>CEO Section</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-faq.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-faq.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>FAQ</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-footer.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-footer.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Footer Content</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-navbar.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-navbar.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Navbar Links</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/content/manage-social.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'manage-social.php' ? 'active' : ''; ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Social Links</p>
              </a>
            </li>
          </ul>
        </li>

        <!-- Account Settings -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link <?php $page = basename($_SERVER['PHP_SELF']); if(in_array($page, ['profile.php', 'change-password.php'])) echo 'active'; ?>">
            <i class="nav-icon fas fa-user-cog"></i>
            <p>Account Settings <i class="right fas fa-angle-left"></i></p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/profile.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>">
                <i class="far fa-user nav-icon"></i>
                <p>Profile</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/change-password.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'change-password.php' ? 'active' : ''; ?>">
                <i class="fas fa-key nav-icon"></i>
                <p>Change Password</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?php echo $base_path; ?>/logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>Logout</p>
              </a>
            </li>
          </ul>
        </li>

      </ul>
    </nav>
  </div>
</aside>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Expand submenus on hover when sidebar is collapsed
  var treeviewLinks = document.querySelectorAll('.has-treeview > a');
  treeviewLinks.forEach(function(link) {
    link.addEventListener('mouseenter', function() {
      var parent = this.closest('.has-treeview');
      if (parent) {
        parent.classList.add('menu-open');
        var treeview = parent.querySelector('.nav-treeview');
        if (treeview) {
          treeview.style.display = 'block';
        }
      }
    });
  });
});
</script>

<style>
/* Submenu hover fix - white background, keep original gray text color */
.sidebar-dark-primary .nav-treeview > .nav-item > .nav-link:hover,
.sidebar-dark-primary .nav-treeview > .nav-item > .nav-link:focus {
  background-color: #ffffff !important;
  color: #343a40 !important;
}

.sidebar-dark-primary .nav-treeview .nav-link:hover,
.sidebar-dark-primary .nav-treeview .nav-link:focus {
  background-color: #ffffff !important;
  color: #343a40 !important;
}

.sidebar-dark-primary .nav-treeview .nav-link:hover .nav-icon,
.sidebar-dark-primary .nav-treeview .nav-link:focus .nav-icon {
  color: #343a40 !important;
}

.sidebar-dark-primary .nav-treeview .nav-link:hover p,
.sidebar-dark-primary .nav-treeview .nav-link:focus p {
  color: #343a40 !important;
}
</style>
