<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) { header('location:index.php'); exit; } else {

$msg = '';

if(isset($_POST['add_link'])) {
    addNavbarLink(['label' => $_POST['label'] ?? '', 'label_en' => $_POST['label_en'] ?? '', 'label_it' => $_POST['label_it'] ?? '', 'label_bn' => $_POST['label_bn'] ?? '', 'url' => $_POST['url'] ?? '#', 'order_num' => intval($_POST['order_num'] ?? 0), 'is_active' => isset($_POST['is_active']) ? 1 : 0]);
    $msg = '<div class="alert alert-success">Link added!</div>';
}
if(isset($_POST['update_link'])) {
    updateNavbarLink(intval($_POST['id']), ['label' => $_POST['label'] ?? '', 'label_en' => $_POST['label_en'] ?? '', 'label_it' => $_POST['label_it'] ?? '', 'label_bn' => $_POST['label_bn'] ?? '', 'url' => $_POST['url'] ?? '#', 'order_num' => intval($_POST['order_num'] ?? 0), 'is_active' => isset($_POST['is_active']) ? 1 : 0]);
    $msg = '<div class="alert alert-success">Link updated!</div>';
}
if(isset($_GET['delete'])) { deleteNavbarLink(intval($_GET['delete'])); $msg = '<div class="alert alert-success">Link deleted!</div>'; }

$links = getNavbarLinks();
$editLink = isset($_GET['edit']) ? fetchOne("SELECT * FROM tblnavbar_links WHERE id = ?", [intval($_GET['edit'])]) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Navbar Links | CAF PC POINT Admin</title>
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
                    <div class="col-sm-6"><h1>Navbar Links Management</h1></div>
                    <div class="col-sm-6"><ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li><li class="breadcrumb-item active">Navbar</li></ol></div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header"><h3 class="card-title"><?php echo $editLink ? 'Edit' : 'Add'; ?> Link</h3></div>
                            <form method="post">
                                <div class="card-body">
                                    <?php if($editLink): ?><input type="hidden" name="id" value="<?php echo $editLink['id']; ?>"><?php endif; ?>
                                    <div class="form-group"><label>Label (Default)</label><input type="text" name="label" class="form-control" value="<?php echo $editLink ? htmlspecialchars($editLink['label']) : ''; ?>" required></div>
                                    <div class="form-group"><label>Label (English)</label><input type="text" name="label_en" class="form-control" value="<?php echo $editLink ? htmlspecialchars($editLink['label_en']) : ''; ?>"></div>
                                    <div class="form-group"><label>Label (Italian)</label><input type="text" name="label_it" class="form-control" value="<?php echo $editLink ? htmlspecialchars($editLink['label_it']) : ''; ?>"></div>
                                    <div class="form-group"><label>Label (Bengali)</label><input type="text" name="label_bn" class="form-control" value="<?php echo $editLink ? htmlspecialchars($editLink['label_bn']) : ''; ?>"></div>
                                    <div class="form-group"><label>URL</label><input type="text" name="url" class="form-control" value="<?php echo $editLink ? htmlspecialchars($editLink['url']) : '#'; ?>"></div>
                                    <div class="form-group"><label>Order</label><input type="number" name="order_num" class="form-control" value="<?php echo $editLink ? $editLink['order_num'] : '0'; ?>"></div>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" value="1" <?php echo (!$editLink || $editLink['is_active']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="<?php echo $editLink ? 'update_link' : 'add_link'; ?>" class="btn btn-primary"><?php echo $editLink ? 'Update' : 'Add'; ?></button>
                                    <?php if($editLink): ?><a href="manage-navbar.php" class="btn btn-secondary">Cancel</a><?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary"><h3 class="card-title">Navbar Links</h3></div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead><tr><th>Order</th><th>Label</th><th>URL</th><th>Status</th><th>Actions</th></tr></thead>
                                    <tbody>
                                        <?php foreach($links as $l): ?>
                                        <tr><td><?php echo $l['order_num']; ?></td><td><?php echo htmlspecialchars($l['label']); ?></td><td><?php echo htmlspecialchars($l['url']); ?></td><td><?php echo $l['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>'; ?></td><td><a href="?edit=<?php echo $l['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> <a href="?delete=<?php echo $l['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a></td></tr>
                                        <?php endforeach; ?>
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
