<?php 
// Direct database connection for footer
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "cafpcpointdb";

$footer_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
$footer = null;

$result = $footer_conn->query("SELECT * FROM tblfooter_content ORDER BY id DESC LIMIT 1");
if ($result && $result->num_rows > 0) {
    $footer = $result->fetch_assoc();
}
$footer_conn->close();

// Get social links
$social_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
$socials = [];
$social_result = $social_conn->query("SELECT * FROM tblsocial WHERE is_active = 1 ORDER BY id ASC");
if ($social_result && $social_result->num_rows > 0) {
    $socials = $social_result->fetch_all(MYSQLI_ASSOC);
}
$social_conn->close();

$site_name = 'CAF PC POINT';
$setting_conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
$setting_result = $setting_conn->query("SELECT setting_value FROM tblsettings WHERE setting_key = 'site_name' LIMIT 1");
if ($setting_result && $setting_result->num_rows > 0) {
    $site_name = $setting_result->fetch_assoc()['setting_value'];
}
$setting_conn->close();

$default_lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'it');
?>

<footer id="contact">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 footer-section">
                <h5 data-translate="about_caf">About <?php echo htmlspecialchars($site_name); ?></h5>
                <p style="line-height: 1.8; margin-bottom: 20px;" data-translate="about_caf_desc">
                <?php if($footer && !empty($footer['about_text'])): ?>
                    <?php echo nl2br(htmlspecialchars($default_lang === 'bn' && !empty($footer['about_text_bn']) ? $footer['about_text_bn'] : $footer['about_text'])); ?>
                <?php else: ?>
                    We are a group formed to provide citizens and businesses with a comprehensive range of administrative and contributory services, ensuring a prompt and accurate response to requests ranging from tax assistance to accounting.
                <?php endif; ?>
                </p>
                <div class="footer-social">
                    <?php if(!empty($socials)): ?>
                    <?php foreach($socials as $social): ?>
                    <a href="<?php echo htmlspecialchars($social['url']); ?>" target="_blank"><i class="fab <?php echo $social['icon']; ?>"></i></a>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 footer-section">
                <h5 data-translate="quick_links">Quick Links</h5>
                <p><a href="#services" data-translate="our_services">Our Services</a></p>
                <p><a href="#locations" data-translate="locations">Locations</a></p>
                <p><a href="#contact" data-translate="contact_us">Contact Us</a></p>
                <p><a href="book.php" data-translate="book_appointment">Book Appointment</a></p>
                <p><a href="check-status.php" data-translate="check_status">Check Status</a></p>
                <p><a href="webmail.php">Web Mail</a></p>
            </div>
            <div class="col-lg-3 col-md-6 footer-section">
                <h5 data-translate="our_services">Our Services</h5>
                <p><a href="#">CAF Services</a></p>
                <p><a href="#">Patronato</a></p>
                <p><a href="#">Immigration</a></p>
                <p><a href="#">Accounting</a></p>
                <p><a href="#">Legal Advice</a></p>
            </div>
            <div class="col-lg-3 col-md-6 footer-section">
                <h5>Contact Info</h5>
                <p><i class="fas fa-map-marker-alt me-2"></i><?php echo ($footer && !empty($footer['contact_address'])) ? htmlspecialchars($footer['contact_address']) : 'Via Flavio Stilicone 11, 00175 Roma'; ?></p>
                <p><i class="fas fa-phone me-2"></i><?php echo ($footer && !empty($footer['contact_phone'])) ? htmlspecialchars($footer['contact_phone']) : '+39 068 788 0399'; ?></p>
                <p><i class="fas fa-envelope me-2"></i><?php echo ($footer && !empty($footer['contact_email'])) ? htmlspecialchars($footer['contact_email']) : 'info@cafpcpoint.it'; ?></p>
                <p><i class="fab fa-whatsapp me-2"></i><?php echo ($footer && !empty($footer['whatsapp'])) ? htmlspecialchars($footer['whatsapp']) : '+39 068 788 0399'; ?></p>
                <p><i class="fas fa-globe me-2"></i><?php echo ($footer && !empty($footer['website'])) ? htmlspecialchars($footer['website']) : 'www.cafpcpoint.it'; ?></p>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <p>&copy; <?php echo date('Y'); ?> <?php echo htmlspecialchars($site_name); ?>. <span data-translate="all_rights_reserved">All Rights Reserved.</span></p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">
                        <a href="#" style="margin-right: 20px;">Privacy Policy</a>
                        <a href="#" style="margin-right: 20px;">Terms & Conditions</a>
                        <a href="#">Cookie Policy</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/main.js"></script>
