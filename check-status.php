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
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title">Check Booking Status</h1>
                <p class="hero-subtitle">Track your appointment status easily</p>
            </div>
        </div>
    </section>

    <!-- Search Section -->
    <section class="search-section">
        <div class="container">
            <div class="search-card">
                <div class="search-header">
                    <div class="icon-box">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3>Search Your Booking</h3>
                    <p>Enter your booking number or phone number</p>
                </div>
                <div class="search-body">
                    <form action="search-result.php" method="post">
                        <div class="mb-4">
                            <label class="form-label">Booking Number / Phone Number</label>
                            <input type="text" class="form-control" name="searchdata" placeholder="Enter booking number or phone number" required>
                        </div>
                        <button type="submit" class="btn-search" name="submit">
                            <i class="fas fa-search me-2"></i>Search
                        </button>
                    </form>
                    <div class="quick-links">
                        <p>Need to make a new booking? <a href="book.php">Book Now</a></p>
                        <p>Back to <a href="index.php">Home</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php include 'includes/footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
