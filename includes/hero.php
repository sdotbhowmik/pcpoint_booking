<?php 
require_once __DIR__ . '/db.php';
$hero_slides = getHeroSlides();
$default_lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'it');
?>

<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 hero-content">
                <?php if(!empty($hero_slides)): ?>
                <?php $first = reset($hero_slides); ?>
                <h1 class="hero-title" data-translate="hero_title"><?php echo htmlspecialchars($first['title']); ?></h1>
                <p class="hero-subtitle" data-translate="hero_subtitle"><?php echo htmlspecialchars($first['subtitle']); ?></p>
                <div class="hero-buttons">
                    <?php if($first['cta_text']): ?>
                    <a href="<?php echo htmlspecialchars($first['cta_link']); ?>" class="btn btn-secondary">
                        <i class="fas fa-calendar-check me-2"></i><span data-translate="book_appointment"><?php echo htmlspecialchars($first['cta_text']); ?></span>
                    </a>
                    <?php endif; ?>
                    <a href="#contact" class="btn btn-outline">
                        <i class="fas fa-phone me-2"></i><span data-translate="contact_us">Contact Us</span>
                    </a>
                </div>
                <?php else: ?>
                <h1 class="hero-title" data-translate="hero_title">Your Trusted Partner for Italian Services</h1>
                <p class="hero-subtitle" data-translate="hero_subtitle">Professional assistance with CAF, Patronato, Tax Services, and Immigration support in Italy</p>
                <div class="hero-buttons">
                    <a href="book.php" class="btn btn-secondary">
                        <i class="fas fa-calendar-check me-2"></i><span data-translate="book_appointment">Book Appointment</span>
                    </a>
                    <a href="#contact" class="btn btn-outline">
                        <i class="fas fa-phone me-2"></i><span data-translate="contact_us">Contact Us</span>
                    </a>
                </div>
                <?php endif; ?>
                <div class="hero-features">
                    <div class="hero-feature">
                        <i class="fas fa-file-invoice-dollar"></i> <span data-translate="caf_services">CAF Services</span>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-calculator"></i> <span data-translate="tax_consulting">Tax Consulting</span>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-handshake"></i> <span data-translate="patronato">Patronato</span>
                    </div>
                    <div class="hero-feature">
                        <i class="fas fa-passport"></i> <span data-translate="immigration">Immigration</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="hero-image">
                    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
                        <?php if(count($hero_slides) > 1): ?>
                        <div class="carousel-indicators">
                            <?php foreach($hero_slides as $index => $slide): ?>
                            <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo $index; ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="true" aria-label="Slide <?php echo $index + 1; ?>"></button>
                            <?php endforeach; ?>
                        </div>
                        <?php endif; ?>
                        <div class="carousel-inner rounded-3">
                            <?php foreach($hero_slides as $index => $slide): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <?php if($slide['image'] && file_exists('admin/images/cms/'.$slide['image'])): ?>
                                <img src="admin/images/cms/<?php echo $slide['image']; ?>" alt="<?php echo htmlspecialchars($slide['title']); ?>" class="d-block w-100" style="height: 400px; object-fit: cover;">
                                <?php else: ?>
                                <img src="images/hero_image.jpeg" alt="Hero" class="d-block w-100" style="height: 400px; object-fit: cover;">
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                            <?php if(empty($hero_slides)): ?>
                            <div class="carousel-item active">
                                <img src="images/hero_image.jpeg" alt="Professional Tax Services" class="d-block w-100" style="height: 400px; object-fit: cover;">
                            </div>
                            <?php endif; ?>
                        </div>
                        <?php if(count($hero_slides) > 1): ?>
                        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
