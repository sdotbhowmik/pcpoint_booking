<?php session_start();
// Database Connection
include('includes/config.php');
//Validating Session
if(strlen($_SESSION['aid'])==0)
  { 
header('location:index.php');
}
else{
// Code for Update Table Details
if(isset($_POST['update'])){
$tno=$_POST['tableno'];
$tid=intval($_GET['tid']);
$query=mysqli_query($con,"update tblrestables set tableNumber='$tno' where id='$tid'");
if($query){
echo "<script>alert('Service point updated successfully.');</script>";
echo "<script type='text/javascript'> document.location = 'manage-tables.php'; </script>";
} else {
echo "<script>alert('Something went wrong. Please try again.');</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CAF PC POINT | Edit Service Point</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">

</head>
<body class="hold-transition sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
<?php include_once("includes/navbar.php");?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
 <?php include_once("includes/sidebar.php");?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Service Point</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="manage-tables.php">Manage Service Points</a></li>
              <li class="breadcrumb-item active">Edit Service Point</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php 
$tid=intval($_GET['tid']);
$query=mysqli_query($con,"select * from tblrestables where id='$tid'");
$cnt=1;
while($result=mysqli_fetch_array($query)){
?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Service Point Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form name="edittable" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputTableNo">Service Point Name / Number</label>
                    <input type="text" class="form-control" id="tableno" name="tableno" placeholder="Enter Service Point Name" required value="<?php echo $result['tableNumber'];?>">
                  </div>
                  <div class="form-group">
                    <label>Added By</label>
                    <input type="text" class="form-control" value="<?php echo $result['AdminName'];?>" readonly>
                  </div>
                  <div class="form-group">
                    <label>Creation Date</label>
                    <input type="text" class="form-control" value="<?php echo $result['creationDate'];?>" readonly>
                  </div>
       
                <?php } ?>

                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="update" id="update">Update</button>
                  <a href="manage-tables.php" class="btn btn-default">Cancel</a>
                </div>
              </form>
            </div>
            <!-- /.card -->

         
       
          </div>
          <!--/.col (left) -->
  
        </div>
        <!-- /.row -->
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
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php } ?>
