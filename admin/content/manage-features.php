<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) {
    header('location:index.php');
    exit;
} else {

$msg = '';

if(isset($_POST['add_feature'])) {
    $data = [
        'title' => $_POST['title'] ?? '',
        'title_bn' => $_POST['title_bn'] ?? '',
        'title_it' => $_POST['title_it'] ?? '',
        'description' => $_POST['description'] ?? '',
        'description_bn' => $_POST['description_bn'] ?? '',
        'description_it' => $_POST['description_it'] ?? '',
        'modal_content' => $_POST['modal_content'] ?? '',
        'icon' => $_POST['icon'] ?? 'fa-star',
        'link' => $_POST['link'] ?? '#',
        'order_num' => intval($_POST['order_num'] ?? 0),
        'is_active' => isset($_POST['is_active']) ? 1 : 0
    ];
    addFeature($data);
    $msg = '<div class="alert alert-success">Feature added successfully!</div>';
}

if(isset($_POST['update_feature'])) {
    $id = intval($_POST['id']);
    $data = [
        'title' => $_POST['title'] ?? '',
        'title_bn' => $_POST['title_bn'] ?? '',
        'title_it' => $_POST['title_it'] ?? '',
        'description' => $_POST['description'] ?? '',
        'description_bn' => $_POST['description_bn'] ?? '',
        'description_it' => $_POST['description_it'] ?? '',
        'modal_content' => $_POST['modal_content'] ?? '',
        'icon' => $_POST['icon'] ?? 'fa-star',
        'link' => $_POST['link'] ?? '#',
        'order_num' => intval($_POST['order_num'] ?? 0),
        'is_active' => isset($_POST['is_active']) ? 1 : 0
    ];
    updateFeature($id, $data);
    $msg = '<div class="alert alert-success">Feature updated successfully!</div>';
}

if(isset($_GET['delete'])) {
    deleteFeature(intval($_GET['delete']));
    $msg = '<div class="alert alert-success">Feature deleted successfully!</div>';
}

$features = getFeatures();
$editFeature = null;
if(isset($_GET['edit'])) {
    $editFeature = getFeature(intval($_GET['edit']));
}

$icons = ['fa-star', 'fa-file-invoice-dollar', 'fa-handshake', 'fa-passport', 'fa-graduation-cap', 'fa-calculator', 'fa-briefcase', 'fa-gavel', 'fa-ruler-combined', 'fa-users', 'fa-cogs', 'fa-chart-line'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Features Management | CAF PC POINT Admin</title>
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
                    <div class="col-sm-6"><h1>Features Management</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Features</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"><?php echo $editFeature ? 'Edit Feature' : 'Add New Feature'; ?></h3>
                            </div>
                            <form method="post">
                                <div class="card-body">
                                    <?php if($editFeature): ?>
                                    <input type="hidden" name="id" value="<?php echo $editFeature['id']; ?>">
                                    <?php endif; ?>
                                    
                                    <div class="form-group">
                                        <label>Title (English)</label>
                                        <input type="text" name="title" class="form-control" value="<?php echo $editFeature ? htmlspecialchars($editFeature['title']) : ''; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Title (Bengali)</label>
                                        <input type="text" name="title_bn" class="form-control" value="<?php echo $editFeature ? htmlspecialchars($editFeature['title_bn'] ?? '') : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Title (Italian)</label>
                                        <input type="text" name="title_it" class="form-control" value="<?php echo $editFeature ? htmlspecialchars($editFeature['title_it'] ?? '') : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description (English)</label>
                                        <input type="text" name="description" class="form-control" value="<?php echo $editFeature ? htmlspecialchars($editFeature['description']) : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description (Bengali)</label>
                                        <input type="text" name="description_bn" class="form-control" value="<?php echo $editFeature ? htmlspecialchars($editFeature['description_bn'] ?? '') : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Description (Italian)</label>
                                        <input type="text" name="description_it" class="form-control" value="<?php echo $editFeature ? htmlspecialchars($editFeature['description_it'] ?? '') : ''; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Modal Content (JSON format)</label>
                                        <textarea name="modal_content" class="form-control" rows="6" placeholder='[{"name": "Service 1", "desc": "Description 1"}, {"name": "Service 2", "desc": "Description 2"}]'><?php echo $editFeature ? htmlspecialchars($editFeature['modal_content'] ?? '') : ''; ?></textarea>
                                        <small class="text-muted">Enter as JSON array: [{"name": "Service Name", "desc": "Description"}, ...]</small>
                                    </div>
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <select name="icon" class="form-control">
                                            <?php foreach($icons as $icon): ?>
                                            <option value="<?php echo $icon; ?>" <?php echo ($editFeature && $editFeature['icon'] == $icon) ? 'selected' : ''; ?>><?php echo $icon; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Link</label>
                                        <input type="text" name="link" class="form-control" value="<?php echo $editFeature ? htmlspecialchars($editFeature['link']) : '#'; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Order</label>
                                        <input type="number" name="order_num" class="form-control" value="<?php echo $editFeature ? $editFeature['order_num'] : '0'; ?>">
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" id="isActive" value="1" <?php echo (!$editFeature || $editFeature['is_active']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label" for="isActive">Active</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="<?php echo $editFeature ? 'update_feature' : 'add_feature'; ?>" class="btn btn-primary"><?php echo $editFeature ? 'Update' : 'Add'; ?></button>
                                    <?php if($editFeature): ?><a href="manage-features.php" class="btn btn-secondary">Cancel</a><?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary"><h3 class="card-title">Existing Features</h3></div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead><tr><th>Order</th><th>Icon</th><th>Title</th><th>Link</th><th>Status</th><th>Actions</th></tr></thead>
                                    <tbody>
                                        <?php if(empty($features)): ?>
                                        <tr><td colspan="6" class="text-center">No features found.</td></tr>
                                        <?php else: ?>
                                        <?php foreach($features as $f): ?>
                                        <tr>
                                            <td><?php echo $f['order_num']; ?></td>
                                            <td><i class="fas <?php echo $f['icon']; ?>"></i></td>
                                            <td><?php echo htmlspecialchars($f['title']); ?></td>
                                            <td><?php echo htmlspecialchars($f['link']); ?></td>
                                            <td><?php echo $f['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>'; ?></td>
                                            <td>
                                                <a href="?edit=<?php echo $f['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                <a href="?delete=<?php echo $f['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
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
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
<?php } ?>
