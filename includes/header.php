<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$default_lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'it');
$allowed_langs = ['en', 'it', 'bn'];
if (!in_array($default_lang, $allowed_langs)) $default_lang = 'en';
$_SESSION['lang'] = $default_lang;

$lang_names = ['en' => 'English', 'it' => 'Italiano', 'bn' => 'বাংলা'];

require_once __DIR__ . '/db.php';

$theme = getActiveTheme();
$primary = $theme ? $theme['primary_color'] : '#228B22';
$secondary = $theme ? $theme['secondary_color'] : '#1a6b1a';
$accent = $theme ? $theme['accent_color'] : '#FFD700';
$bg_dark = $theme ? $theme['bg_dark'] : '#212529';
$bg_light = $theme ? $theme['bg_light'] : '#f8f9fa';
$text_dark = $theme ? $theme['text_dark'] : '#212529';
$text_light = $theme ? $theme['text_light'] : '#ffffff';
?>

<!DOCTYPE html>
<html lang="<?php echo $default_lang; ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php 
        $site_name = getSettingWithDefault('site_name', 'CAF PC POINT');
        $site_tagline = getSettingWithDefault('site_tagline', 'Your Trusted Partner for Italian Services');
        echo htmlspecialchars($site_name); 
    ?> - <?php echo htmlspecialchars($site_tagline); ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <?php if(file_exists('css/theme.css')): ?>
    <link rel="stylesheet" href="css/theme.css">
    <?php endif; ?>
    <style>
        :root {
            --primary: <?php echo $primary; ?>;
            --primary-dark: <?php echo $secondary; ?>;
            --accent: <?php echo $accent; ?>;
            --bg-dark: <?php echo $bg_dark; ?>;
            --bg-light: <?php echo $bg_light; ?>;
            --text-dark: <?php echo $text_dark; ?>;
            --text-light: <?php echo $text_light; ?>;
            --card-bg: #FFFFFF;
            --border-color: #E5E7EB;
            --shadow: 0 4px 20px rgba(34, 139, 34, 0.08);
            --shadow-hover: 0 12px 40px rgba(34, 139, 34, 0.15);
            --gradient-primary: linear-gradient(135deg, <?php echo $primary; ?> 0%, <?php echo $secondary; ?> 100%);
        }
        .bg-primary-custom { background-color: var(--primary) !important; }
        .bg-secondary-custom { background-color: var(--primary-dark) !important; }
        .text-primary-custom { color: var(--primary) !important; }
        .btn-primary-custom {
            background-color: var(--primary);
            border-color: var(--primary);
            color: white;
        }
        .btn-primary-custom:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }
        .section-title::after { background-color: var(--primary); }
        .service-category-header {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
        }
        .service-category-header h4 { color: #fff; }
        .service-category-header p { color: rgba(255,255,255,0.9); }
        .service-category-icon { background-color: rgba(255,255,255,0.2); }
        .service-category-icon i { color: #fff; }
        .feature-icon { background-color: var(--primary); }
        .stat-icon { background-color: var(--primary); }
        .hero-section { background: var(--primary); }
        .stats-section {
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: white;
        }
        .stats-section .stat-icon { background-color: rgba(255,255,255,0.2); }
        .stats-section .stat-number { color: var(--accent); }
        
        /* Booking Page Styles */
        .booking-section { padding: 60px 0; }
        .booking-card {
            background: var(--card-bg);
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
            border: 1px solid var(--border-color);
        }
        .booking-header {
            background: var(--gradient-primary);
            color: #fff;
            padding: 25px 30px;
        }
        .booking-header h3 { margin: 0; font-weight: 700; font-size: 1.3rem; }
        .booking-header p { margin: 8px 0 0; opacity: 0.9; font-size: 0.95rem; }
        .booking-body { padding: 35px; }
        .info-box {
            background: var(--card-bg);
            border-radius: 12px;
            padding: 25px;
            margin-bottom: 20px;
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
        }
        .info-box:hover { box-shadow: var(--shadow-hover); transform: translateY(-3px); }
        .info-box h5 { color: var(--primary-dark); font-weight: 700; margin-bottom: 18px; font-size: 1.1rem; }
        .info-box p { color: var(--text-dark); margin-bottom: 12px; font-size: 0.95rem; }
        .info-box p i { color: var(--primary); margin-right: 10px; width: 18px; }
        
        /* Webmail Page Styles */
        .webmail-hero {
            background: var(--gradient-primary);
            padding: 80px 0;
            text-align: center;
            color: #fff;
            position: relative;
            overflow: hidden;
        }
        .webmail-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
            opacity: 0.3;
        }
        .webmail-hero h1 { font-size: 2.8rem; font-weight: 700; margin-bottom: 10px; position: relative; z-index: 1; }
        .webmail-hero p { font-size: 1.15rem; opacity: 0.95; position: relative; z-index: 1; }
        .mail-section { padding: 80px 0; }
        .mail-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 45px 35px;
            text-align: center;
            box-shadow: var(--shadow);
            transition: all 0.3s ease;
            height: 100%;
            border: 1px solid var(--border-color);
        }
        .mail-card:hover { transform: translateY(-10px); box-shadow: var(--shadow-hover); }
        .mail-icon {
            width: 110px; height: 110px;
            margin: 0 auto 28px;
            background: var(--gradient-primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 30px rgba(34, 139, 34, 0.35);
        }
        .mail-card:hover .mail-icon { transform: scale(1.1); }
        .mail-icon i { font-size: 2.8rem; color: #fff; }
        .mail-card h3 { font-size: 1.6rem; font-weight: 700; margin-bottom: 12px; color: var(--text-dark); }
        .mail-card p { color: var(--text-dark); margin-bottom: 8px; font-size: 1.05rem; }
        .mail-card .bn { color: #888; font-size: 0.95rem; font-style: italic; margin-bottom: 28px; }
        .btn-mail {
            background: var(--gradient-primary);
            color: #fff;
            padding: 14px 38px;
            font-size: 1.05rem;
            font-weight: 600;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 6px 20px rgba(34, 139, 34, 0.3);
        }
        .btn-mail:hover { transform: translateY(-3px); color: #fff; }
        
        /* Check Status Page Styles */
        .search-section { padding: 60px 0; }
        .search-card {
            background: #fff;
            border-radius: 16px;
            box-shadow: var(--shadow);
            overflow: hidden;
            max-width: 600px;
            margin: 0 auto;
        }
        .search-header { background: var(--bg-dark); color: #fff; padding: 30px; text-align: center; }
        .search-header h3 { margin: 0; font-weight: 600; font-size: 1.5rem; }
        .search-header p { margin: 10px 0 0; opacity: 0.9; font-size: 0.95rem; }
        .search-body { padding: 40px; }
        .btn-search {
            background: var(--primary);
            border: none;
            color: #fff;
            padding: 14px 40px;
            font-weight: 600;
            border-radius: 8px;
            font-size: 1.1rem;
            transition: all 0.3s;
            width: 100%;
        }
        .btn-search:hover { transform: translateY(-2px); }
        .quick-links { margin-top: 30px; text-align: center; }
        .quick-links p { color: var(--text-dark); font-size: 0.95rem; }
        .quick-links a { color: var(--primary); font-weight: 600; text-decoration: none; }
        .quick-links a:hover { text-decoration: underline; }
        .icon-box {
            width: 80px; height: 80px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .icon-box i { font-size: 2rem; color: #fff; }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <?php 
        $favicon = getSetting('favicon');
        if($favicon && file_exists('images/'.$favicon)): 
    ?>
    <link rel="icon" type="image/x-icon" href="images/<?php echo $favicon; ?>">
    <?php endif; ?>
</head>
