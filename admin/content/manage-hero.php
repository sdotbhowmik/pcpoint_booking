<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) {
    header('location:index.php');
    exit;
} else {

$msg = '';
$error = '';

// Add new slide
if(isset($_POST['add_slide'])) {
    $data = [
        'title' => $_POST['title'] ?? '',
        'subtitle' => $_POST['subtitle'] ?? '',
        'cta_text' => $_POST['cta_text'] ?? '',
        'cta_link' => $_POST['cta_link'] ?? '#',
        'order_num' => intval($_POST['order_num'] ?? 0),
        'is_active' => isset($_POST['is_active']) ? 1 : 0
    ];
    
    if($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload = uploadImage($_FILES['image'], '../images/cms/');
        if($upload['success']) {
            $data['image'] = $upload['filename'];
        } else {
            $error = '<div class="alert alert-danger">'.$upload['message'].'</div>';
        }
    }
    
    if(!$error || empty($data['image'])) {
        addHeroSlide($data);
        $msg = '<div class="alert alert-success">Slide added successfully!</div>';
    }
}

// Update slide
if(isset($_POST['update_slide'])) {
    $id = intval($_POST['id']);
    $data = [
        'title' => $_POST['title'] ?? '',
        'subtitle' => $_POST['subtitle'] ?? '',
        'cta_text' => $_POST['cta_text'] ?? '',
        'cta_link' => $_POST['cta_link'] ?? '#',
        'order_num' => intval($_POST['order_num'] ?? 0),
        'is_active' => isset($_POST['is_active']) ? 1 : 0
    ];
    
    $existing = getHeroSlide($id);
    if($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $upload = uploadImage($_FILES['image'], '../images/cms/');
        if($upload['success']) {
            $data['image'] = $upload['filename'];
        }
    } else {
        $data['image'] = $existing['image'];
    }
    
    updateHeroSlide($id, $data);
    $msg = '<div class="alert alert-success">Slide updated successfully!</div>';
}

// Delete slide
if(isset($_GET['delete'])) {
    $id = intval($_GET['delete']);
    deleteHeroSlide($id);
    $msg = '<div class="alert alert-success">Slide deleted successfully!</div>';
}

$slides = getHeroSlides();
$editSlide = null;
if(isset($_GET['edit'])) {
    $editSlide = getHeroSlide(intval($_GET['edit']));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hero / Slider Management | CAF PC POINT Admin</title>
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
                        <h1>Hero / Slider Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Content</a></li>
                            <li class="breadcrumb-item active">Hero</li>
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
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $editSlide ? 'Edit Slide' : 'Add New Slide'; ?></h3>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <?php if($editSlide): ?>
                                    <input type="hidden" name="id" value="<?php echo $editSlide['id']; ?>">
                                    <?php endif; ?>
                                    
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo $editSlide ? htmlspecialchars($editSlide['title']) : ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Subtitle</label>
                                        <textarea name="subtitle" class="form-control" rows="2"><?php echo $editSlide ? htmlspecialchars($editSlide['subtitle']) : ''; ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>CTA Button Text</label>
                                        <input type="text" name="cta_text" class="form-control" value="<?php echo $editSlide ? htmlspecialchars($editSlide['cta_text']) : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>CTA Link</label>
                                        <input type="text" name="cta_link" class="form-control" value="<?php echo $editSlide ? htmlspecialchars($editSlide['cta_link']) : '#'; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Order</label>
                                        <input type="number" name="order_num" class="form-control" value="<?php echo $editSlide ? $editSlide['order_num'] : '0'; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input" accept="image/*">
                                                <label class="custom-file-label">Choose file</label>
                                            </div>
                                        </div>
                                        <?php if($editSlide && $editSlide['image']): ?>
                                        <div class="mt-2">
                                            <img src="../images/cms/<?php echo $editSlide['image']; ?>" alt="Current" style="max-height: 100px;">
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" id="isActive" value="1" <?php echo (!$editSlide || $editSlide['is_active']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="isActive">Active</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="<?php echo $editSlide ? 'update_slide' : 'add_slide'; ?>" class="btn btn-primary"><?php echo $editSlide ? 'Update Slide' : 'Add Slide'; ?></button>
                                    <?php if($editSlide): ?>
                                    <a href="manage-hero.php" class="btn btn-secondary">Cancel</a>
                                    <?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary">
                                <h3 class="card-title">Existing Slides</h3>
                            </div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Order</th>
                                            <th>Image</th>
                                            <th>Title</th>
                                            <th>CTA</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if(empty($slides)): ?>
                                        <tr><td colspan="6" class="text-center">No slides found. Add one!</td></tr>
                                        <?php else: ?>
                                        <?php foreach($slides as $slide): ?>
                                        <tr>
                                            <td><?php echo $slide['order_num']; ?></td>
                                            <td>
                                                <?php if($slide['image']): ?>
                                                <img src="../images/cms/<?php echo $slide['image']; ?>" alt="" style="max-height: 50px;">
                                                <?php else: ?>
                                                <span class="text-muted">No image</span>
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo htmlspecialchars($slide['title']); ?></td>
                                            <td><?php echo htmlspecialchars($slide['cta_text']); ?></td>
                                            <td>
                                                <?php if($slide['is_active']): ?>
                                                <span class="badge badge-success">Active</span>
                                                <?php else: ?>
                                                <span class="badge badge-secondary">Inactive</span>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="?edit=<?php echo $slide['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="?delete=<?php echo $slide['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
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
<script>
$(function () {
    bsCustomFileInput.init();
});
</script>
</body>
</html>
<?php } ?>
