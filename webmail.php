<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$default_lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'it');
$allowed_langs = ['en', 'it', 'bn'];
if (!in_array($default_lang, $allowed_langs)) $default_lang = 'it';
$_SESSION['lang'] = $default_lang;

$lang_names = ['en' => 'English', 'it' => 'Italiano', 'bn' => 'বাংলা'];
?>

<?php include 'includes/header.php'; ?>

<body>
    <?php include 'includes/navbar.php'; ?>

    <!-- Hero Section -->
    <section class="webmail-hero">
        <div class="container">
            <h1>Webmail Access</h1>
            <p>Access your email accounts | আপনার ইমেল অ্যাক্সেস করুন</p>
        </div>
    </section>

    <!-- Mail Cards Section -->
    <section class="mail-section">
        <div class="container">
            <div class="row g-4 justify-content-center">
                <div class="col-md-5">
                    <div class="mail-card">
                        <div class="mail-icon">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <h3>CAF Mail</h3>
                        <p>Access your professional CAF email</p>
                        <p class="bn">আপনার পেশাদার CAF ইমেল অ্যাক্সেস করুন</p>
                        <a href="https://mail.cafpcpoint.it/" target="_blank" class="btn-mail">
                            Access Now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="mail-card">
                        <div class="mail-icon">
                            <i class="fas fa-envelope-square"></i>
                        </div>
                        <h3>PEC Mail</h3>
                        <p>Access your certified PEC email</p>
                        <p class="bn">আপনার প্রত্যয়িত PEC ইমেল অ্যাক্সেস করুন</p>
                        <a href="https://pec.cafpcpoint.it/" target="_blank" class="btn-mail">
                            Access Now <i class="fas fa-arrow-right ms-2"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
