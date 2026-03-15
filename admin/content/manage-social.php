<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) { header('location:index.php'); exit; } else {

$msg = '';

if(isset($_POST['add_social'])) {
    addSocialLink(['platform' => $_POST['platform'] ?? '', 'url' => $_POST['url'] ?? '', 'icon' => $_POST['icon'] ?? 'fa-facebook', 'is_active' => isset($_POST['is_active']) ? 1 : 0]);
    $msg = '<div class="alert alert-success">Social link added!</div>';
}
if(isset($_POST['update_social'])) {
    updateSocialLink(intval($_POST['id']), ['platform' => $_POST['platform'] ?? '', 'url' => $_POST['url'] ?? '', 'icon' => $_POST['icon'] ?? 'fa-facebook', 'is_active' => isset($_POST['is_active']) ? 1 : 0]);
    $msg = '<div class="alert alert-success">Social link updated!</div>';
}
if(isset($_GET['delete'])) { deleteSocialLink(intval($_GET['delete'])); $msg = '<div class="alert alert-success">Social link deleted!</div>'; }

$socials = getSocialLinks();
$editSocial = isset($_GET['edit']) ? getSocialLink(intval($_GET['edit'])) : null;
$icons = ['fa-facebook-f', 'fa-twitter', 'fa-instagram', 'fa-linkedin-in', 'fa-youtube', 'fa-whatsapp', 'fa-telegram', 'fa-phone', 'fa-envelope', 'fa-globe'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Social Links | CAF PC POINT Admin</title>
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
                    <div class="col-sm-6"><h1>Social Links Management</h1></div>
                    <div class="col-sm-6"><ol class="breadcrumb float-sm-right"><li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li><li class="breadcrumb-item active">Social</li></ol></div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card card-primary">
                            <div class="card-header"><h3 class="card-title"><?php echo $editSocial ? 'Edit' : 'Add'; ?> Social Link</h3></div>
                            <form method="post">
                                <div class="card-body">
                                    <?php if($editSocial): ?><input type="hidden" name="id" value="<?php echo $editSocial['id']; ?>"><?php endif; ?>
                                    <div class="form-group">
                                        <label>Platform</label>
                                        <select name="platform" class="form-control" id="platformSelect">
                                            <option value="Facebook" <?php echo ($editSocial && $editSocial['platform'] == 'Facebook') ? 'selected' : ''; ?>>Facebook</option>
                                            <option value="Twitter" <?php echo ($editSocial && $editSocial['platform'] == 'Twitter') ? 'selected' : ''; ?>>Twitter</option>
                                            <option value="Instagram" <?php echo ($editSocial && $editSocial['platform'] == 'Instagram') ? 'selected' : ''; ?>>Instagram</option>
                                            <option value="LinkedIn" <?php echo ($editSocial && $editSocial['platform'] == 'LinkedIn') ? 'selected' : ''; ?>>LinkedIn</option>
                                            <option value="YouTube" <?php echo ($editSocial && $editSocial['platform'] == 'YouTube') ? 'selected' : ''; ?>>YouTube</option>
                                            <option value="WhatsApp" <?php echo ($editSocial && $editSocial['platform'] == 'WhatsApp') ? 'selected' : ''; ?>>WhatsApp</option>
                                            <option value="Telegram" <?php echo ($editSocial && $editSocial['platform'] == 'Telegram') ? 'selected' : ''; ?>>Telegram</option>
                                            <option value="Phone" <?php echo ($editSocial && $editSocial['platform'] == 'Phone') ? 'selected' : ''; ?>>Phone</option>
                                            <option value="Email" <?php echo ($editSocial && $editSocial['platform'] == 'Email') ? 'selected' : ''; ?>>Email</option>
                                            <option value="Website" <?php echo ($editSocial && $editSocial['platform'] == 'Website') ? 'selected' : ''; ?>>Website</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>URL</label>
                                        <input type="text" name="url" class="form-control" value="<?php echo $editSocial ? htmlspecialchars($editSocial['url']) : ''; ?>" placeholder="https://..." required>
                                    </div>
                                    <div class="form-group">
                                        <label>Icon</label>
                                        <select name="icon" class="form-control">
                                            <?php foreach($icons as $icon): ?><option value="<?php echo $icon; ?>" <?php echo ($editSocial && $editSocial['icon'] == $icon) ? 'selected' : ''; ?>><?php echo $icon; ?></option><?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="is_active" class="form-check-input" value="1" <?php echo (!$editSocial || $editSocial['is_active']) ? 'checked' : ''; ?>>
                                        <label class="form-check-label">Active</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="<?php echo $editSocial ? 'update_social' : 'add_social'; ?>" class="btn btn-primary"><?php echo $editSocial ? 'Update' : 'Add'; ?></button>
                                    <?php if($editSocial): ?><a href="manage-social.php" class="btn btn-secondary">Cancel</a><?php endif; ?>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-primary"><h3 class="card-title">Social Links</h3></div>
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead><tr><th>Icon</th><th>Platform</th><th>URL</th><th>Status</th><th>Actions</th></tr></thead>
                                    <tbody>
                                        <?php foreach($socials as $s): ?>
                                        <tr>
                                            <td><i class="fab <?php echo $s['icon']; ?> fa-lg"></i></td>
                                            <td><?php echo htmlspecialchars($s['platform']); ?></td>
                                            <td><?php echo htmlspecialchars($s['url']); ?></td>
                                            <td><?php echo $s['is_active'] ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-secondary">Inactive</span>'; ?></td>
                                            <td><a href="?edit=<?php echo $s['id']; ?>" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a> <a href="?delete=<?php echo $s['id']; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete?')"><i class="fas fa-trash"></i></a></td>
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
