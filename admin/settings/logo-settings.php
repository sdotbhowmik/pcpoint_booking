<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) {
    header('location:index.php');
    exit;
} else {

$msg = '';
$error = '';

if(isset($_POST['save_logo'])) {
    if($_FILES['logo']['error'] === UPLOAD_ERR_OK) {
        $upload = uploadImage($_FILES['logo'], '../images/');
        if($upload['success']) {
            updateSetting('logo', $upload['filename']);
            $msg = '<div class="alert alert-success">Logo uploaded successfully!</div>';
        } else {
            $error = '<div class="alert alert-danger">'.$upload['message'].'</div>';
        }
    }
    
    if($_FILES['favicon']['error'] === UPLOAD_ERR_OK) {
        $upload = uploadImage($_FILES['favicon'], '../images/');
        if($upload['success']) {
            updateSetting('favicon', $upload['filename']);
            $msg = '<div class="alert alert-success">Favicon uploaded successfully!</div>';
        } else {
            $error = '<div class="alert alert-danger">'.$upload['message'].'</div>';
        }
    }
}

$logo = getSetting('logo');
$favicon = getSetting('favicon');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Logo & Favicon Settings | CAF PC POINT Admin</title>
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
                    <div class="col-sm-6">
                        <h1>Logo & Favicon Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.php">Settings</a></li>
                            <li class="breadcrumb-item active">Logo & Favicon</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                <?php echo $error; ?>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Site Logo</h3>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Upload Logo (Recommended: 200x60px)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="logo" class="custom-file-input" id="logoInput" accept="image/*">
                                                <label class="custom-file-label" for="logoInput">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if($logo && file_exists('../images/'.$logo)): ?>
                                    <div class="form-group">
                                        <label>Current Logo:</label>
                                        <div class="mt-2">
                                            <img src="../images/<?php echo $logo; ?>" alt="Logo" style="max-height: 60px;">
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="form-group">
                                        <label>Current Logo:</label>
                                        <div class="mt-2">
                                            <img src="../images/site_logo.png" alt="Default Logo" style="max-height: 60px;">
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <div class="form-group">
                                        <label>Preview:</label>
                                        <div class="mt-2 p-3 bg-light" id="logoPreview">
                                            <?php if($logo && file_exists('../images/'.$logo)): ?>
                                            <img src="../images/<?php echo $logo; ?>" id="logoImg" alt="Logo Preview" style="max-height: 60px;">
                                            <?php else: ?>
                                            <img src="../images/site_logo.png" id="logoImg" alt="Logo Preview" style="max-height: 60px;">
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="save_logo" class="btn btn-primary">Upload Logo</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Favicon</h3>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Upload Favicon (Recommended: 32x32px or 16x16px)</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="favicon" class="custom-file-input" id="faviconInput" accept="image/*">
                                                <label class="custom-file-label" for="faviconInput">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <?php if($favicon && file_exists('../images/'.$favicon)): ?>
                                    <div class="form-group">
                                        <label>Current Favicon:</label>
                                        <div class="mt-2">
                                            <img src="../images/<?php echo $favicon; ?>" alt="Favicon" style="height: 32px;">
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <div class="form-group">
                                        <label>Preview:</label>
                                        <div class="mt-2 p-3 bg-light" id="faviconPreview">
                                            <?php if($favicon && file_exists('../images/'.$favicon)): ?>
                                            <img src="../images/<?php echo $favicon; ?>" id="faviconImg" alt="Favicon Preview" style="height: 32px;">
                                            <?php else: ?>
                                            <span class="text-muted">No favicon uploaded</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="save_logo" class="btn btn-info">Upload Favicon</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header bg-success">
                        <h3 class="card-title">Live Preview</h3>
                    </div>
                    <div class="card-body">
                        <h5>How your site will look:</h5>
                        <div class="border p-4 mt-3">
                            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                                <div class="container-fluid">
                                    <a class="navbar-brand" href="#">
                                        <?php if($logo && file_exists('../images/'.$logo)): ?>
                                        <img src="../images/<?php echo $logo; ?>" alt="CAF PC POINT" height="45">
                                        <?php else: ?>
                                        <img src="../images/site_logo.png" alt="CAF PC POINT" height="45">
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </nav>
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
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../../dist/js/adminlte.min.js"></script>
<script>
$(function () {
    bsCustomFileInput.init();
    
    $('#logoInput').change(function(e) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#logoImg').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    $('#faviconInput').change(function(e) {
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#faviconImg').attr('src', e.target.result).show();
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
});
</script>
</body>
</html>
<?php } ?>
