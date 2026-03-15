<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) { header('location:index.php'); exit; } else {

$msg = '';

if(isset($_POST['add_faq'])) {
    addFaq(['question' => $_POST['question'] ?? '', 'answer' => $_POST['answer'] ?? '', 'order_num' => intval($_POST['order_num'] ?? 0), 'is_active' => isset($_POST['is_active']) ? 1 : 0]);
    $msg = '<div class="alert alert-success">FAQ added!</div>';
}
if(isset($_POST['update_faq'])) {
    updateFaq(intval($_POST['id']), ['question' => $_POST['question'] ?? '', 'answer' => $_POST['answer'] ?? '', 'order_num' => intval($_POST['order_num'] ?? 0), 'is_active' => isset($_POST['is_active']) ? 1 : 0]);
    $msg = '<div class="alert alert-success">FAQ updated!</div>';
}
if(isset($_GET['delete'])) { deleteFaq(intval($_GET['delete'])); $msg = '<div class="alert alert-success">FAQ deleted!</div>'; }

$faqs = getFaqs();
$editFaq = isset($_GET['edit']) ? getFaq(intval($_GET['edit'])) : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>FAQ Management | CAF PC POINT Admin</title>
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
                    <div class="col-sm-6"><h1>FAQ Management</h1></div>
                    <div class="col-sm-6"><ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li><li class="breadcrumb-item active">FAQ</li></ol></div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header"><h3 class="card-title"><?php echo $editFaq ? 'Edit' : 'Add'; ?> FAQ</h3></div>
                            <form method="post">
                                <div class="card-body">
                                    <?php if($editFaq): ?><input type="hidden" name="id" value="<?php echo $editFaq['id']; ?>"><?php endif; ?>
                                    <div class="form-group"><label>Question</label><textarea name="question" class="form-control" rows="2" required><?php echo $editFaq ? htmlspecialchars($editFaq['question']) : ''; ?></textarea></div>
                                    <div class="form-group"><label>Answer</label><textarea name="answer" class="form-control" rows="4" required><?php echo $editFaq ? htmlspecialchars($editFaq['answer']) : ''; ?></textarea></div>
                                    <div class="form-group"><label>Order</label><input type="number" name="order_num" class="form-control" value="<?php echo $editFaq ? $editFaq['order_num'] : '0'; ?>"></div>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" value="1" <?php echo (!$editFaq || $editFaq['is_active']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="<?php echo $editFaq ? 'update_faq' : 'add_faq'; ?>" class="btn btn-primary"><?php echo $editFaq ? 'Update' : 'Add'; ?></button>
                                    <?php if($editFaq): ?><a href="manage-faq.php" class="btn btn-secondary">Cancel</a><?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary"><h3 class="card-title">FAQs</h3></div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead><tr><th>Order</th><th>Question</th><th>Answer</th><th>Status</th><th>Actions</th></tr></thead>
                                    <tbody>
                                        <?php foreach($faqs as $f): ?>
                                        <tr>
                                            <td><?php echo $f['order_num']; ?></td>
                                            <td><?php echo htmlspecialchars($f['question']); ?></td>
                                            <td><?php echo substr(htmlspecialchars($f['answer']), 0, 50); ?>...</td>
                                            <td><?php echo $f['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>'; ?></td>
                                            <td><a href="?edit=<?php echo $f['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> <a href="?delete=<?php echo $f['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a></td>
                                        </tr>
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
