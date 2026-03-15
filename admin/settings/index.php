<?php session_start();
include('../includes/config.php');
include('../includes/functions.php');

if(strlen($_SESSION['aid'])==0) {
    header('location:index.php');
    exit;
} else {

$msg = '';

if(isset($_POST['save_settings'])) {
    foreach($_POST as $key => $value) {
        if($key != 'save_settings') {
            updateSetting($key, $value);
        }
    }
    $msg = '<div class="alert alert-success">Settings saved successfully!</div>';
}

$settings = getAllSettings();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>General Settings | CAF PC POINT Admin</title>
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
                        <h1>General Settings</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="../dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <?php echo $msg; ?>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Site Information</h3>
                            </div>
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Site Name</label>
                                        <input type="text" name="site_name" class="form-control" value="<?php echo htmlspecialchars(getSetting('site_name')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Site Tagline</label>
                                        <input type="text" name="site_tagline" class="form-control" value="<?php echo htmlspecialchars(getSetting('site_tagline')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Default Language</label>
                                        <select name="default_language" class="form-control">
                                            <option value="it" <?php echo getSetting('default_language') == 'it' ? 'selected' : ''; ?>>Italiano</option>
                                            <option value="en" <?php echo getSetting('default_language') == 'en' ? 'selected' : ''; ?>>English</option>
                                            <option value="bn" <?php echo getSetting('default_language') == 'bn' ? 'selected' : ''; ?>>Bengali</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Timezone</label>
                                        <select name="timezone" class="form-control">
                                            <option value="Europe/Rome" <?php echo getSetting('timezone') == 'Europe/Rome' ? 'selected' : ''; ?>>Europe/Rome</option>
                                            <option value="Europe/London" <?php echo getSetting('timezone') == 'Europe/London' ? 'selected' : ''; ?>>Europe/London</option>
                                            <option value="Asia/Dhaka" <?php echo getSetting('timezone') == 'Asia/Dhaka' ? 'selected' : ''; ?>>Asia/Dhaka</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="save_settings" class="btn btn-primary">Save Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Contact Information</h3>
                            </div>
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="site_email" class="form-control" value="<?php echo htmlspecialchars(getSetting('site_email')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="site_phone" class="form-control" value="<?php echo htmlspecialchars(getSetting('site_phone')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>WhatsApp</label>
                                        <input type="text" name="whatsapp_number" class="form-control" value="<?php echo htmlspecialchars(getSetting('whatsapp_number')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea name="site_address" class="form-control" rows="2"><?php echo htmlspecialchars(getSetting('site_address')); ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Website URL</label>
                                        <input type="text" name="site_website" class="form-control" value="<?php echo htmlspecialchars(getSetting('site_website')); ?>">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="save_settings" class="btn btn-info">Save Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Booking Settings</h3>
                            </div>
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Booking Start Time</label>
                                        <input type="time" name="booking_availability_start" class="form-control" value="<?php echo htmlspecialchars(getSetting('booking_availability_start')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Booking End Time</label>
                                        <input type="time" name="booking_availability_end" class="form-control" value="<?php echo htmlspecialchars(getSetting('booking_availability_end')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Slot Duration (minutes)</label>
                                        <input type="number" name="booking_slot_duration" class="form-control" value="<?php echo htmlspecialchars(getSetting('booking_slot_duration')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Max Advance Booking (days)</label>
                                        <input type="number" name="max_advance_booking_days" class="form-control" value="<?php echo htmlspecialchars(getSetting('max_advance_booking_days')); ?>">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" name="auto_approve_booking" class="form-check-input" id="autoApprove" value="1" <?php echo getSetting('auto_approve_booking') == '1' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="autoApprove">Auto-approve bookings</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="save_settings" class="btn btn-success">Save Settings</button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-warning">
                            <div class="card-header">
                                <h3 class="card-title">Notification Settings</h3>
                            </div>
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input type="checkbox" name="email_notifications" class="form-check-input" id="emailNotif" value="1" <?php echo getSetting('email_notifications') == '1' ? 'checked' : ''; ?>>
                                            <label class="form-check-label" for="emailNotif">Enable email notifications</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>Contact Email (for notifications)</label>
                                        <input type="email" name="contact_email" class="form-control" value="<?php echo htmlspecialchars(getSetting('contact_email')); ?>">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" name="save_settings" class="btn btn-warning">Save Settings</button>
                                </div>
                            </form>
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
