<?php 
session_start();
$default_lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'it');
$allowed_langs = ['en', 'it', 'bn'];
if (!in_array($default_lang, $allowed_langs)) $default_lang = 'en';
$_SESSION['lang'] = $default_lang;

$lang_names = ['en' => 'English', 'it' => 'Italiano', 'bn' => 'বাংলা'];
?>

<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/hero.php'; ?>
    <?php include 'includes/sns.php'; ?>
    <?php include 'includes/features.php'; ?>
    <?php include 'includes/software.php'; ?>
    <?php include 'includes/services.php'; ?>
    <?php include 'includes/stats.php'; ?>
    <?php include 'includes/ceo.php'; ?>
    <?php include 'includes/locations.php'; ?>
    <?php include 'includes/contact.php'; ?>
    <?php include 'includes/footer.php'; ?>
