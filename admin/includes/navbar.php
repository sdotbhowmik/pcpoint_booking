<?php
if (!isset($base_path)) {
    $host = $_SERVER['HTTP_HOST'];
    if (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false) {
        $base_path = '/pcpoint_booking/admin';
    } else {
        $base_path = '/admin';
    }
}
?>
<nav class="main-header navbar navbar-expand-md navbar-dark navbar-dark">
  <!-- Brand Logo -->
  <a href="<?php echo $base_path; ?>/dashboard.php" class="brand-link navbar-brand">
    <span class="brand-text font-weight-light">CAF PC POINT</span>
  </a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Left navbar links - Horizontal Menu -->
  <div class="collapse navbar-collapse" id="navbarMenu">
    <ul class="nav navbar-nav">
      
      <!-- Dashboard -->
      <li class="nav-item">
        <a href="<?php echo $base_path; ?>/dashboard.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'dashboard.php' ? 'active' : ''; ?>">
          <i class="nav-icon fas fa-tachometer-alt"></i> Dashboard
        </a>
      </li>
      
      <!-- Bookings Dropdown -->
      <li class="nav-item dropdown <?php $page = basename($_SERVER['PHP_SELF']); if(in_array($page, ['new-bookigs.php', 'accepted-bookings.php', 'rejected-bookings.php', 'all-bookings.php', 'bw-dates-report.php'])) echo 'active'; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="bookingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fa-calendar-check"></i> Bookings
        </a>
        <div class="dropdown-menu" aria-labelledby="bookingsDropdown">
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'new-bookigs.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/new-bookigs.php">
            <i class="fas fa-clock mr-2"></i>New Bookings
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'accepted-bookings.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/accepted-bookings.php">
            <i class="fas fa-check-circle mr-2"></i>Accepted
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'rejected-bookings.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/rejected-bookings.php">
            <i class="fas fa-times-circle mr-2"></i>Rejected
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'all-bookings.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/all-bookings.php">
            <i class="fas fa-list mr-2"></i>All Bookings
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'bw-dates-report.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/bw-dates-report.php">
            <i class="fas fa-chart-bar mr-2"></i>B/w Dates Report
          </a>
        </div>
      </li>
      
      <!-- Service Points Dropdown -->
      <li class="nav-item dropdown <?php $page = basename($_SERVER['PHP_SELF']); if(in_array($page, ['add-table.php', 'manage-tables.php'])) echo 'active'; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="servicePointsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fa-building"></i> Service Points
        </a>
        <div class="dropdown-menu" aria-labelledby="servicePointsDropdown">
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'add-table.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/add-table.php">
            <i class="fas fa-plus mr-2"></i>Add Service Point
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-tables.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/manage-tables.php">
            <i class="fas fa-cog mr-2"></i>Manage Service Points
          </a>
        </div>
      </li>
      
      <!-- Messages -->
      <li class="nav-item <?php echo basename($_SERVER['PHP_SELF']) == 'contact-messages.php' ? 'active' : ''; ?>">
        <a href="<?php echo $base_path; ?>/contact-messages.php" class="nav-link">
          <i class="nav-icon fas fa-envelope"></i> Messages
          <?php 
          $msg_query = mysqli_query($con,"SELECT COUNT(*) as cnt FROM tblcontactmessages");
          $msg_count = mysqli_fetch_assoc($msg_query);
          if($msg_count['cnt'] > 0): 
          ?>
          <span class="badge badge-warning navbar-badge"><?php echo $msg_count['cnt']; ?></span>
          <?php endif; ?>
        </a>
      </li>
      
      <!-- Site Settings Dropdown -->
      <li class="nav-item dropdown <?php $page = basename($_SERVER['PHP_SELF']); if(strpos($page, 'settings') !== false || strpos($page, 'theme') !== false || strpos($page, 'logo') !== false) echo 'active'; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="settingsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fa-cogs"></i> Site Settings
        </a>
        <div class="dropdown-menu" aria-labelledby="settingsDropdown">
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/settings/index.php">
            <i class="fas fa-sliders-h mr-2"></i>General Settings
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'theme-settings.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/settings/theme-settings.php">
            <i class="fas fa-palette mr-2"></i>Theme Settings
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'logo-settings.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/settings/logo-settings.php">
            <i class="fas fa-image mr-2"></i>Logo & Favicon
          </a>
        </div>
      </li>
      
      <!-- Content Management Dropdown -->
      <li class="nav-item dropdown <?php $page = basename($_SERVER['PHP_SELF']); if(strpos($page, 'manage-') !== false) echo 'active'; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="contentDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fa-edit"></i> Content
        </a>
        <div class="dropdown-menu" aria-labelledby="contentDropdown">
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-hero.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-hero.php">
            <i class="fas fa-images mr-2"></i>Hero / Slider
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-features.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-features.php">
            <i class="fas fa-star mr-2"></i>Features
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-services.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-services.php">
            <i class="fas fa-list mr-2"></i>Services
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-stats.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-stats.php">
            <i class="fas fa-chart-line mr-2"></i>Statistics
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-ceo.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-ceo.php">
            <i class="fas fa-user-tie mr-2"></i>CEO Section
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-faq.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-faq.php">
            <i class="fas fa-question-circle mr-2"></i>FAQ
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-footer.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-footer.php">
            <i class="fas fa-shoe-prints mr-2"></i>Footer Content
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-navbar.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-navbar.php">
            <i class="fas fa-link mr-2"></i>Navbar Links
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'manage-social.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/content/manage-social.php">
            <i class="fas fa-share-alt mr-2"></i>Social Links
          </a>
        </div>
      </li>
      
      <!-- Account Dropdown -->
      <li class="nav-item dropdown <?php $page = basename($_SERVER['PHP_SELF']); if(in_array($page, ['profile.php', 'change-password.php'])) echo 'active'; ?>">
        <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="nav-icon fas fa-user-circle"></i> Account
        </a>
        <div class="dropdown-menu" aria-labelledby="accountDropdown">
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'profile.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/profile.php">
            <i class="fas fa-user mr-2"></i>Profile
          </a>
          <a class="dropdown-item <?php echo basename($_SERVER['PHP_SELF']) == 'change-password.php' ? 'active' : ''; ?>" href="<?php echo $base_path; ?>/change-password.php">
            <i class="fas fa-key mr-2"></i>Change Password
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?php echo $base_path; ?>/logout.php">
            <i class="fas fa-sign-out-alt mr-2"></i>Logout
          </a>
        </div>
      </li>
      
    </ul>
  </div>
  
  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <!-- Sidebar Toggle Button -->
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button" title="Toggle Sidebar">
        <i class="fas fa-bars"></i>
      </a>
    </li>
    
    <!-- Fullscreen Toggle -->
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button" title="Fullscreen">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li>
    
    <!-- User Profile -->
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
        <i class="fas fa-user-circle fa-lg text-white"></i>
        <span class="ml-2 d-none d-md-inline"><?php echo $_SESSION['uname'];?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right">
        <a href="<?php echo $base_path; ?>/profile.php" class="dropdown-item">
          <i class="fas fa-user mr-2"></i>Profile
        </a>
        <a href="<?php echo $base_path; ?>/change-password.php" class="dropdown-item">
          <i class="fas fa-key mr-2"></i>Change Password
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo $base_path; ?>/logout.php" class="dropdown-item">
          <i class="fas fa-sign-out-alt mr-2"></i>Logout
        </a>
      </div>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<style>
.main-header .nav-link {
  padding: 0.5rem 1rem;
}
.main-header .dropdown-menu {
  margin-top: 0;
}
.navbar-dark .navbar-nav .nav-link {
  color: rgba(255,255,255,0.8);
}
.navbar-dark .navbar-nav .nav-link:hover,
.navbar-dark .navbar-nav .nav-link.active {
  color: #fff;
  background-color: rgba(255,255,255,0.1);
  border-radius: 4px;
}
.navbar-dark .navbar-nav .dropdown-item:hover,
.navbar-dark .navbar-nav .dropdown-item.active {
  background-color: rgba(255,255,255,0.1);
  color: #fff;
}
.badge-warning.navbar-badge {
  font-size: 0.7rem;
  padding: 3px 6px;
}
@media (max-width: 768px) {
  .main-header .brand-link {
    display: block;
    text-align: center;
  }
}
</style>
