<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) { header('location:index.php'); exit; } else {

$msg = '';
$error = '';

if(isset($_POST['save_ceo'])) {
    $data = [
        'name' => $_POST['name'] ?? '',
        'title' => $_POST['title'] ?? '',
        'message' => $_POST['message'] ?? '',
        'photo' => '',
        'signature' => ''
    ];
    
    $existing = getCeoContent();
    if($existing) {
        $data['photo'] = $existing['photo'];
        $data['signature'] = $existing['signature'];
    }
    
    if($_FILES['photo']['error'] === UPLOAD_ERR_OK) {
        $upload = uploadImage($_FILES['photo'], '../images/cms/');
        if($upload['success']) {
            $data['photo'] = $upload['filename'];
        }
    }
    
    if($_FILES['signature']['error'] === UPLOAD_ERR_OK) {
        $upload = uploadImage($_FILES['signature'], '../images/cms/');
        if($upload['success']) {
            $data['signature'] = $upload['filename'];
        }
    }
    
    updateCeoContent($data);
    $msg = '<div class="alert alert-success">CEO section updated!</div>';
}

$ceo = getCeoContent();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CEO Section | CAF PC POINT Admin</title>
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
                    <div class="col-sm-6"><h1>CEO Section Management</h1></div>
                    <div class="col-sm-6"><ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li><li class="breadcrumb-item active">CEO</li></ol></div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                <?php echo $error; ?>
                
                <div class="card card-primary">
                    <div class="card-header"><h3 class="card-title">CEO Message Section</h3></div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>CEO Name</label>
                                        <input type="text" name="name" class="form-control" value="<?php echo $ceo ? htmlspecialchars($ceo['name']) : ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo $ceo ? htmlspecialchars($ceo['title']) : ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Photo</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="photo" class="custom-file-input" accept="image/*">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <?php if($ceo && $ceo['photo']): ?>
                                        <div class="mt-2"><img src="../images/cms/<?php echo $ceo['photo']; ?>" alt="CEO" style="max-height: 150px;"></div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-group">
                                        <label>Signature</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="signature" class="custom-file-input" accept="image/*">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <?php if($ceo && $ceo['signature']): ?>
                                        <div class="mt-2"><img src="../images/<?php echo $ceo['signature']; ?>" alt="Signature" style="max-height: 60px;"></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Message</label>
                                        <textarea name="message" class="form-control" rows="10" required><?php echo $ceo ? htmlspecialchars($ceo['message']) : ''; ?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" name="save_ceo" class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>

                <div class="card mt-4">
                    <div class="card-header bg-success"><h3 class="card-title">Preview</h3></div>
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-md-4">
                                <?php if($ceo && $ceo['photo']): ?>
                                <img src="../images/cms/<?php echo $ceo['photo']; ?>" alt="CEO" class="img-fluid" style="max-height: 200px;">
                                <?php endif; ?>
                            </div>
                            <div class="col-md-8">
                                <h5><?php echo $ceo ? htmlspecialchars($ceo['name']) : 'CEO Name'; ?></h5>
                                <p class="text-muted"><?php echo $ceo ? htmlspecialchars($ceo['title']) : 'Title'; ?></p>
                                <p><?php echo $ceo ? htmlspecialchars($ceo['message']) : 'Message will appear here...'; ?></p>
                            </div>
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
<script>$(function () { bsCustomFileInput.init(); });</script>
</body>
</html>
<?php } ?>
