<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{ 

// Get counts for all dashboard cards
$query_subadmins = mysqli_query($con,"select id from tbladmin where UserType=0");
$subadmincount = mysqli_num_rows($query_subadmins);

$query_allbookings = mysqli_query($con,"select id from tblbookings");
$allbookings = mysqli_num_rows($query_allbookings);

$query_newbookings = mysqli_query($con,"select id from tblbookings where (boookingStatus is null || boookingStatus='')");
$newbookings = mysqli_num_rows($query_newbookings);

$query_accepted = mysqli_query($con,"select id from tblbookings where boookingStatus='Accepted'");
$acceptedbookings = mysqli_num_rows($query_accepted);

$query_rejected = mysqli_query($con,"select id from tblbookings where boookingStatus='Rejected'");
$rejectedbookings = mysqli_num_rows($query_rejected);

$query_messages = mysqli_query($con,"select id from tblcontactmessages");
$messages = mysqli_num_rows($query_messages);

$query_hero = mysqli_query($con,"select id from tblhero_slides where is_active=1");
$hero_slides = mysqli_num_rows($query_hero);

$query_features = mysqli_query($con,"select id from tblfeatures where is_active=1");
$features = mysqli_num_rows($query_features);

$query_categories = mysqli_query($con,"select id from tblservice_categories where is_active=1");
$categories = mysqli_num_rows($query_categories);

$query_faq = mysqli_query($con,"select id from tblfaq where is_active=1");
$faq = mysqli_num_rows($query_faq);

$query_social = mysqli_query($con,"select id from tblsocial where is_active=1");
$social = mysqli_num_rows($query_social);

$query_navbar = mysqli_query($con,"select id from tblnavbar_links where is_active=1");
$navbar_links = mysqli_num_rows($query_navbar);

$query_servicepoints = mysqli_query($con,"select id from tblservicepoints");
$servicepoints = mysqli_num_rows($query_servicepoints);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CAF PC POINT | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="../plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="../plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">
  
  <style>
    .dashboard-card {
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .dashboard-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 8px 25px rgba(0,0,0,0.15);
    }
    .dashboard-card .inner {
      min-height: 80px;
      display: flex;
      flex-direction: column;
      justify-content: center;
    }
    .dashboard-card h3 {
      font-size: 2rem;
      font-weight: 700;
    }
    .dashboard-card .icon {
      font-size: 3rem;
      opacity: 0.3;
      position: absolute;
      right: 15px;
      top: 15px;
    }
  </style>
</head>
<body class="hold-transition sidebar-collapse layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <?php include_once('includes/navbar.php');?>

  <!-- Main Sidebar Container -->
  <?php include_once('includes/sidebar.php');?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- Admin Section -->
        <?php if($_SESSION['utype']==1):?>
        <div class="row mb-3">
          <div class="col-12">
            <h5 class="text-muted"><i class="fas fa-user-shield mr-2"></i>Administration</h5>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-info dashboard-card">
              <div class="inner">
                <h3><?php echo $subadmincount;?></h3>
                <p>Sub Admins</p>
              </div>
              <div class="icon"><i class="ion ion-person-stalker"></i></div>
              <a href="manage-subadmins.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-teal dashboard-card">
              <div class="inner">
                <h3><?php echo $servicepoints;?></h3>
                <p>Service Points</p>
              </div>
              <div class="icon"><i class="fas fa-building"></i></div>
              <a href="manage-tables.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        <div class="row mb-3 mt-2">
          <div class="col-12">
            <h5 class="text-muted"><i class="fas fa-calendar-check mr-2"></i>Bookings</h5>
          </div>
        </div>
        <?php endif;?>
        
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-primary dashboard-card">
              <div class="inner">
                <h3><?php echo $allbookings;?></h3>
                <p>All Bookings</p>
              </div>
              <div class="icon"><i class="fas fa-calendar-alt"></i></div>
              <a href="all-bookings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-warning dashboard-card">
              <div class="inner">
                <h3><?php echo $newbookings;?></h3>
                <p>New Bookings</p>
              </div>
              <div class="icon"><i class="fas fa-clock"></i></div>
              <a href="new-bookigs.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success dashboard-card">
              <div class="inner">
                <h3><?php echo $acceptedbookings;?></h3>
                <p>Accepted</p>
              </div>
              <div class="icon"><i class="fas fa-check-circle"></i></div>
              <a href="accepted-bookings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-danger dashboard-card">
              <div class="inner">
                <h3><?php echo $rejectedbookings;?></h3>
                <p>Rejected</p>
              </div>
              <div class="icon"><i class="fas fa-times-circle"></i></div>
              <a href="rejected-bookings.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Messages Section -->
        <div class="row mb-3 mt-2">
          <div class="col-12">
            <h5 class="text-muted"><i class="fas fa-envelope mr-2"></i>Communications</h5>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-secondary dashboard-card">
              <div class="inner">
                <h3><?php echo $messages;?></h3>
                <p>Contact Messages</p>
              </div>
              <div class="icon"><i class="fas fa-envelope-open-text"></i></div>
              <a href="contact-messages.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Content Management Section -->
        <div class="row mb-3 mt-2">
          <div class="col-12">
            <h5 class="text-muted"><i class="fas fa-edit mr-2"></i>Content Management</h5>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-indigo dashboard-card">
              <div class="inner">
                <h3><?php echo $hero_slides;?></h3>
                <p>Hero Slides</p>
              </div>
              <div class="icon"><i class="fas fa-images"></i></div>
              <a href="content/manage-hero.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-success dashboard-card">
              <div class="inner">
                <h3><?php echo $features;?></h3>
                <p>Features</p>
              </div>
              <div class="icon"><i class="fas fa-star"></i></div>
              <a href="content/manage-features.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-orange dashboard-card">
              <div class="inner">
                <h3><?php echo $categories;?></h3>
                <p>Service Categories</p>
              </div>
              <div class="icon"><i class="fas fa-list"></i></div>
              <a href="content/manage-services.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-pink dashboard-card">
              <div class="inner">
                <h3><?php echo $faq;?></h3>
                <p>FAQ Items</p>
              </div>
              <div class="icon"><i class="fas fa-question-circle"></i></div>
              <a href="content/manage-faq.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-cyan dashboard-card">
              <div class="inner">
                <h3><?php echo $social;?></h3>
                <p>Social Links</p>
              </div>
              <div class="icon"><i class="fas fa-share-alt"></i></div>
              <a href="content/manage-social.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-dark dashboard-card">
              <div class="inner">
                <h3><?php echo $navbar_links;?></h3>
                <p>Navbar Links</p>
              </div>
              <div class="icon"><i class="fas fa-link"></i></div>
              <a href="content/manage-navbar.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-purple dashboard-card">
              <div class="inner">
                <h3><i class="fas fa-user-tie"></i></h3>
                <p>CEO Section</p>
              </div>
              <div class="icon"><i class="fas fa-user-tie"></i></div>
              <a href="content/manage-ceo.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          
          <div class="col-lg-3 col-md-6">
            <div class="small-box bg-brown dashboard-card">
              <div class="inner">
                <h3><i class="fas fa-shoe-prints"></i></h3>
                <p>Footer Content</p>
              </div>
              <div class="icon"><i class="fas fa-shoe-prints"></i></div>
              <a href="content/manage-footer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
        </div>
        
        <!-- Quick Actions -->
        <div class="row mb-3 mt-2">
          <div class="col-12">
            <h5 class="text-muted"><i class="fas fa-bolt mr-2"></i>Quick Actions</h5>
          </div>
        </div>
        
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <a href="settings/index.php" class="btn btn-outline-primary btn-block">
              <i class="fas fa-cog mr-2"></i>General Settings
            </a>
          </div>
          <div class="col-lg-3 col-md-6">
            <a href="settings/theme-settings.php" class="btn btn-outline-info btn-block">
              <i class="fas fa-palette mr-2"></i>Theme Settings
            </a>
          </div>
          <div class="col-lg-3 col-md-6">
            <a href="settings/logo-settings.php" class="btn btn-outline-success btn-block">
              <i class="fas fa-image mr-2"></i>Logo & Favicon
            </a>
          </div>
          <div class="col-lg-3 col-md-6">
            <a href="bw-dates-report.php" class="btn btn-outline-warning btn-block">
              <i class="fas fa-chart-bar mr-2"></i>B/w Dates Report
            </a>
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php include_once('includes/footer.php');?>

</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="../plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="../plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="../plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="../plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="../plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../plugins/moment/moment.min.js"></script>
<script src="../plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="../plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="../plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="../plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>
<?php } ?>
