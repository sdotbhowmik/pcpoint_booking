<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) { header('location:index.php'); exit; } else {

$msg = '';

if(isset($_POST['add_stat'])) {
    addStat(['label' => $_POST['label'] ?? '', 'value' => $_POST['value'] ?? '0', 'icon' => $_POST['icon'] ?? 'fa-star', 'order_num' => intval($_POST['order_num'] ?? 0)]);
    $msg = '<div class="alert alert-success">Stat added!</div>';
}
if(isset($_POST['update_stat'])) {
    updateStat(intval($_POST['id']), ['label' => $_POST['label'] ?? '', 'value' => $_POST['value'] ?? '0', 'icon' => $_POST['icon'] ?? 'fa-star', 'order_num' => intval($_POST['order_num'] ?? 0)]);
    $msg = '<div class="alert alert-success">Stat updated!</div>';
}
if(isset($_GET['delete'])) { deleteStat(intval($_GET['delete'])); $msg = '<div class="alert alert-success">Stat deleted!</div>'; }

$stats = getStats();
$editStat = isset($_GET['edit']) ? getStat(intval($_GET['edit'])) : null;
$icons = ['fa-calendar', 'fa-trophy', 'fa-briefcase', 'fa-users', 'fa-star', 'fa-check', 'fa-clock', 'fa-chart-line'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Statistics | CAF PC POINT Admin</title>
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
                    <div class="col-sm-6"><h1>Statistics Management</h1></div>
                    <div class="col-sm-6"><ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li><li class="breadcrumb-item active">Stats</li></ol></div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header"><h3 class="card-title"><?php echo $editStat ? 'Edit' : 'Add'; ?> Stat</h3></div>
                            <form method="post">
                                <div class="card-body">
                                    <?php if($editStat): ?><input type="hidden" name="id" value="<?php echo $editStat['id']; ?>"><?php endif; ?>
                                    <div class="form-group"><label>Label</label><input type="text" name="label" class="form-control" value="<?php echo $editStat ? htmlspecialchars($editStat['label']) : ''; ?>" required></div>
                                    <div class="form-group"><label>Value</label><input type="text" name="value" class="form-control" value="<?php echo $editStat ? htmlspecialchars($editStat['value']) : ''; ?>"></div>
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <select name="icon" class="form-control">
                                            <?php foreach($icons as $icon): ?><option value="<?php echo $icon; ?>" <?php echo ($editStat && $editStat['icon'] == $icon) ? 'selected' : ''; ?>><?php echo $icon; ?></option><?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group"><label>Order</label><input type="number" name="order_num" class="form-control" value="<?php echo $editStat ? $editStat['order_num'] : '0'; ?>"></div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="<?php echo $editStat ? 'update_stat' : 'add_stat'; ?>" class="btn btn-primary"><?php echo $editStat ? 'Update' : 'Add'; ?></button>
                                    <?php if($editStat): ?><a href="manage-stats.php" class="btn btn-secondary">Cancel</a><?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary"><h3 class="card-title">Stats</h3></div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead><tr><th>Order</th><th>Icon</th><th>Label</th><th>Value</th><th>Actions</th></tr></thead>
                                    <tbody>
                                        <?php foreach($stats as $s): ?>
                                        <tr><td><?php echo $s['order_num']; ?></td><td><i class="fas <?php echo $s['icon']; ?>"></i></td><td><?php echo htmlspecialchars($s['label']); ?></td><td><?php echo htmlspecialchars($s['value']); ?></td><td><a href="?edit=<?php echo $s['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> <a href="?delete=<?php echo $s['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a></td></tr>
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
