<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) {
    header('location:index.php');
    exit;
} else {

$msg = '';

// Add Category
if(isset($_POST['add_category'])) {
    $data = [
        'name' => $_POST['name'] ?? '',
        'name_bn' => $_POST['name_bn'] ?? '',
        'icon' => $_POST['icon'] ?? 'fa-star',
        'description' => $_POST['description'] ?? '',
        'order_num' => intval($_POST['order_num'] ?? 0),
        'is_active' => isset($_POST['is_active']) ? 1 : 0
    ];
    addServiceCategory($data);
    $msg = '<div class="alert alert-success">Category added successfully!</div>';
}

// Update Category
if(isset($_POST['update_category'])) {
    $id = intval($_POST['id']);
    $data = [
        'name' => $_POST['name'] ?? '',
        'name_bn' => $_POST['name_bn'] ?? '',
        'icon' => $_POST['icon'] ?? 'fa-star',
        'description' => $_POST['description'] ?? '',
        'order_num' => intval($_POST['order_num'] ?? 0),
        'is_active' => isset($_POST['is_active']) ? 1 : 0
    ];
    updateServiceCategory($id, $data);
    $msg = '<div class="alert alert-success">Category updated successfully!</div>';
}

// Delete Category
if(isset($_GET['delete_category'])) {
    deleteServiceCategory(intval($_GET['delete_category']));
    $msg = '<div class="alert alert-success">Category deleted successfully!</div>';
}

// Add Item
if(isset($_POST['add_item'])) {
    $data = [
        'category_id' => intval($_POST['category_id'] ?? 1),
        'name' => $_POST['name'] ?? '',
        'name_bn' => $_POST['name_bn'] ?? '',
        'description' => $_POST['description'] ?? '',
        'description_bn' => $_POST['description_bn'] ?? '',
        'order_num' => intval($_POST['order_num'] ?? 0),
        'is_active' => isset($_POST['is_active']) ? 1 : 0
    ];
    addServiceItem($data);
    $msg = '<div class="alert alert-success">Service item added successfully!</div>';
}

// Update Item
if(isset($_POST['update_item'])) {
    $id = intval($_POST['id']);
    $data = [
        'category_id' => intval($_POST['category_id'] ?? 1),
        'name' => $_POST['name'] ?? '',
        'name_bn' => $_POST['name_bn'] ?? '',
        'description' => $_POST['description'] ?? '',
        'description_bn' => $_POST['description_bn'] ?? '',
        'order_num' => intval($_POST['order_num'] ?? 0),
        'is_active' => isset($_POST['is_active']) ? 1 : 0
    ];
    updateServiceItem($id, $data);
    $msg = '<div class="alert alert-success">Service item updated successfully!</div>';
}

// Delete Item
if(isset($_GET['delete_item'])) {
    deleteServiceItem(intval($_GET['delete_item']));
    $msg = '<div class="alert alert-success">Service item deleted successfully!</div>';
}

$categories = getServiceCategories();
$items = getServiceItems();
$editCategory = null;
$editItem = null;

if(isset($_GET['edit_category'])) {
    $editCategory = getServiceCategory(intval($_GET['edit_category']));
}
if(isset($_GET['edit_item'])) {
    $editItem = getServiceItem(intval($_GET['edit_item']));
}

$icons = ['fa-star', 'fa-file-invoice-dollar', 'fa-handshake', 'fa-passport', 'fa-graduation-cap', 'fa-calculator', 'fa-briefcase', 'fa-gavel', 'fa-ruler-combined', 'fa-users', 'fa-cogs', 'fa-chart-line'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Services Management | CAF PC POINT Admin</title>
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
                    <div class="col-sm-6"><h1>Services Management</h1></div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Services</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" id="serviceTab" role="tablist">
                    <li class="nav-item"><a class="nav-link active" data-toggle="tab" href="#categories">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" data-toggle="tab" href="#items">Service Items</a></li>
                </ul>

                <div class="tab-content mt-3">
                    <!-- Categories Tab -->
                    <div class="tab-pane fade show active" id="categories">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-primary">
                                    <div class="card-header"><h3 class="card-title"><?php echo $editCategory ? 'Edit' : 'Add'; ?> Category</h3></div>
                                    <form method="post">
                                        <div class="card-body">
                                            <?php if($editCategory): ?><input type="hidden" name="id" value="<?php echo $editCategory['id']; ?>"><?php endif; ?>
                                            <div class="form-group">
                                                <label>Name (Italian)</label>
                                                <input type="text" name="name" class="form-control" value="<?php echo $editCategory ? htmlspecialchars($editCategory['name']) : ''; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Name (Bengali)</label>
                                                <input type="text" name="name_bn" class="form-control" value="<?php echo $editCategory ? htmlspecialchars($editCategory['name_bn']) : ''; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Icon</label>
                                                <select name="icon" class="form-control">
                                                    <?php foreach($icons as $icon): ?>
                                                    <option value="<?php echo $icon; ?>" <?php echo ($editCategory && $editCategory['icon'] == $icon) ? 'selected' : ''; ?>><?php echo $icon; ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea name="description" class="form-control" rows="2"><?php echo $editCategory ? htmlspecialchars($editCategory['description']) : ''; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Order</label>
                                                <input type="number" name="order_num" class="form-control" value="<?php echo $editCategory ? $editCategory['order_num'] : '0'; ?>">
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="is_active" class="form-check-input" value="1" <?php echo (!$editCategory || $editCategory['is_active']) ? 'checked' : ''; ?>>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="<?php echo $editCategory ? 'update_category' : 'add_category'; ?>" class="btn btn-primary"><?php echo $editCategory ? 'Update' : 'Add'; ?></button>
                                            <?php if($editCategory): ?><a href="manage-services.php" class="btn btn-secondary">Cancel</a><?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-primary"><h3 class="card-title">Categories</h3></div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead><tr><th>Order</th><th>Icon</th><th>Name</th><th>Status</th><th>Actions</th></tr></thead>
                                            <tbody>
                                                <?php foreach($categories as $c): ?>
                                                <tr>
                                                    <td><?php echo $c['order_num']; ?></td>
                                                    <td><i class="fas <?php echo $c['icon']; ?>"></i></td>
                                                    <td><?php echo htmlspecialchars($c['name']); ?></td>
                                                    <td><?php echo $c['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>'; ?></td>
                                                    <td>
                                                        <a href="?edit_category=<?php echo $c['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="?delete_category=<?php echo $c['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Items Tab -->
                    <div class="tab-pane fade" id="items">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card card-success">
                                    <div class="card-header"><h3 class="card-title"><?php echo $editItem ? 'Edit' : 'Add'; ?> Service Item</h3></div>
                                    <form method="post">
                                        <div class="card-body">
                                            <?php if($editItem): ?><input type="hidden" name="id" value="<?php echo $editItem['id']; ?>"><?php endif; ?>
                                            <div class="form-group">
                                                <label>Category</label>
                                                <select name="category_id" class="form-control">
                                                    <?php foreach($categories as $c): ?>
                                                    <option value="<?php echo $c['id']; ?>" <?php echo ($editItem && $editItem['category_id'] == $c['id']) ? 'selected' : ''; ?>><?php echo htmlspecialchars($c['name']); ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Name (Italian)</label>
                                                <input type="text" name="name" class="form-control" value="<?php echo $editItem ? htmlspecialchars($editItem['name']) : ''; ?>" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Name (Bengali)</label>
                                                <input type="text" name="name_bn" class="form-control" value="<?php echo $editItem ? htmlspecialchars($editItem['name_bn']) : ''; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Description (Italian)</label>
                                                <input type="text" name="description" class="form-control" value="<?php echo $editItem ? htmlspecialchars($editItem['description']) : ''; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Description (Bengali)</label>
                                                <input type="text" name="description_bn" class="form-control" value="<?php echo $editItem ? htmlspecialchars($editItem['description_bn']) : ''; ?>">
                                            </div>
                                            <div class="form-group">
                                                <label>Order</label>
                                                <input type="number" name="order_num" class="form-control" value="<?php echo $editItem ? $editItem['order_num'] : '0'; ?>">
                                            </div>
                                            <div class="form-check">
                                                <input type="checkbox" name="is_active" class="form-check-input" value="1" <?php echo (!$editItem || $editItem['is_active']) ? 'checked' : ''; ?>>
                                                <label class="form-check-label">Active</label>
                                            </div>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" name="<?php echo $editItem ? 'update_item' : 'add_item'; ?>" class="btn btn-success"><?php echo $editItem ? 'Update' : 'Add'; ?></button>
                                            <?php if($editItem): ?><a href="manage-services.php" class="btn btn-secondary">Cancel</a><?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header bg-success"><h3 class="card-title">Service Items</h3></div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead><tr><th>Category</th><th>Name</th><th>Order</th><th>Status</th><th>Actions</th></tr></thead>
                                            <tbody>
                                                <?php foreach($items as $i): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($i['category_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($i['name']); ?></td>
                                                    <td><?php echo $i['order_num']; ?></td>
                                                    <td><?php echo $i['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>'; ?></td>
                                                    <td>
                                                        <a href="?edit_item=<?php echo $i['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                                                        <a href="?delete_item=<?php echo $i['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
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
