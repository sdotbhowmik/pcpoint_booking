<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) {
    header('location:index.php');
    exit;
} else {

$msg = '';

if(isset($_POST['theme_id'])) {
    $theme_id = intval($_POST['theme_id']);
    $result = setActiveTheme($theme_id);
    $msg = '<div class="alert alert-success">Theme changed successfully! (Theme ID: ' . $theme_id . ', Result: ' . $result . ')</div>';
}

$activeTheme = getActiveTheme();
$allThemes = getAllThemes();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Theme Settings | CAF PC POINT Admin</title>
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
    <style>
        .theme-card {
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            border: 3px solid transparent;
        }
        .theme-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        .theme-card.active {
            border-color: #28a745;
        }
        .theme-preview {
            height: 80px;
            border-radius: 8px 8px 0 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .theme-info {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 0 0 8px 8px;
        }
        .color-swatch {
            width: 25px;
            height: 25px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
            border: 1px solid rgba(0,0,0,0.1);
        }
    </style>
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
                        <h1>Theme Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                            <li class="breadcrumb-item"><a href="index.php">Settings</a></li>
                            <li class="breadcrumb-item active">Theme</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Select Color Theme</h3>
                    </div>
                    <div class="card-body">
                        <form method="post" id="themeForm">
                            <input type="hidden" name="theme_id" id="selected_theme_id" value="<?php echo $activeTheme['id']; ?>">
                            <div class="row">
                                <?php foreach($allThemes as $theme): ?>
                                <div class="col-md-4 col-sm-6 mb-4">
                                    <div class="theme-card card <?php echo $theme['is_active'] ? 'active' : ''; ?>" onclick="selectTheme(<?php echo $theme['id']; ?>)">
                                        <div class="theme-preview" style="background: linear-gradient(135deg, <?php echo $theme['primary_color']; ?>, <?php echo $theme['secondary_color']; ?>);">
                                            <i class="fas fa-palette fa-2x text-white"></i>
                                        </div>
                                        <div class="theme-info">
                                            <h5 class="mb-2"><?php echo htmlspecialchars($theme['theme_name']); ?></h5>
                                            <div class="mb-2">
                                                <span class="color-swatch" style="background: <?php echo $theme['primary_color']; ?>;" title="Primary"></span>
                                                <span class="color-swatch" style="background: <?php echo $theme['secondary_color']; ?>;" title="Secondary"></span>
                                                <span class="color-swatch" style="background: <?php echo $theme['accent_color']; ?>;" title="Accent"></span>
                                            </div>
                                            <div class="form-check">
                                                <input type="radio" name="theme_id_radio" value="<?php echo $theme['id']; ?>" id="theme_<?php echo $theme['id']; ?>" class="form-check-input" <?php echo $theme['is_active'] ? 'checked' : ''; ?> onchange="selectTheme(<?php echo $theme['id']; ?>)">
                                                <label class="form-check-label">
                                                    <?php echo $theme['is_active'] ? '<strong>Active Theme</strong>' : 'Click to select'; ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="mt-3">
                                <button type="submit" name="change_theme" class="btn btn-primary">Apply Theme</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Current Theme Colors</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon" style="background: <?php echo $activeTheme['primary_color']; ?>;">&nbsp;</span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Primary Color</span>
                                        <span class="info-box-number"><?php echo $activeTheme['primary_color']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon" style="background: <?php echo $activeTheme['secondary_color']; ?>;">&nbsp;</span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Secondary Color</span>
                                        <span class="info-box-number"><?php echo $activeTheme['secondary_color']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon" style="background: <?php echo $activeTheme['accent_color']; ?>;">&nbsp;</span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Accent Color</span>
                                        <span class="info-box-number"><?php echo $activeTheme['accent_color']; ?></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="info-box">
                                    <span class="info-box-icon" style="background: <?php echo $activeTheme['bg_dark']; ?>;">&nbsp;</span>
                                    <div class="info-box-content">
                                        <span class="info-box-text">Dark Background</span>
                                        <span class="info-box-number"><?php echo $activeTheme['bg_dark']; ?></span>
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
<script>
function selectTheme(themeId) {
    document.getElementById('selected_theme_id').value = themeId;
    document.getElementById('themeForm').submit();
}
</script>
</body>
</html>
<?php } ?>
