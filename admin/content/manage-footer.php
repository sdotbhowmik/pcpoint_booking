<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) { header('location:index.php'); exit; } else {

$msg = '';

if(isset($_POST['save_footer'])) {
    $data = [
        'about_text' => $_POST['about_text'] ?? '',
        'about_text_bn' => $_POST['about_text_bn'] ?? '',
        'contact_address' => $_POST['contact_address'] ?? '',
        'contact_phone' => $_POST['contact_phone'] ?? '',
        'contact_email' => $_POST['contact_email'] ?? '',
        'website' => $_POST['website'] ?? '',
        'whatsapp' => $_POST['whatsapp'] ?? ''
    ];
    updateFooterContent($data);
    $msg = '<div class="alert alert-success">Footer content updated!</div>';
}

$footer = getFooterContent();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Footer Content | CAF PC POINT Admin</title>
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-collapse">
<div class="wrapper">
    <?php include_once('../includes/navbar.php');?>
    <?php include_once('../includes/sidebar.php');?>

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6"><h1>Footer Content Management</h1></div>
                    <div class="col-sm-6"><ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li><li class="breadcrumb-item active">Footer</li></ol></div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header"><h3 class="card-title">About Section</h3></div>
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>About Text (Italian/English)</label>
                                        <textarea name="about_text" class="form-control" rows="4"><?php echo $footer ? htmlspecialchars($footer['about_text']) : ''; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>About Text (Bengali)</label>
                                        <textarea name="about_text_bn" class="form-control" rows="4"><?php echo $footer ? htmlspecialchars($footer['about_text_bn']) : ''; ?></textarea>
                                    </div>
                                </div>
                                <div class="card-footer"><button type="submit" name="save_footer" class="btn btn-primary">Save</button></div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header"><h3 class="card-title">Contact Information</h3></div>
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="contact_address" class="form-control" rows="2"><?php echo $footer ? htmlspecialchars($footer['contact_address']) : ''; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="contact_phone" class="form-control" value="<?php echo $footer ? htmlspecialchars($footer['contact_phone']) : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="contact_email" class="form-control" value="<?php echo $footer ? htmlspecialchars($footer['contact_email']) : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Website</label>
                                        <input type="text" name="website" class="form-control" value="<?php echo $footer ? htmlspecialchars($footer['website']) : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>WhatsApp</label>
                                        <input type="text" name="whatsapp" class="form-control" value="<?php echo $footer ? htmlspecialchars($footer['whatsapp']) : ''; ?>">
                                    </div>
                                </div>
                                <div class="card-footer"><button type="submit" name="save_footer" class="btn btn-info">Save</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include_once('../includes/footer.php');?>
</div>
<script src="../../plugins/jquery/jquery.min.js"></script>
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php } ?>
