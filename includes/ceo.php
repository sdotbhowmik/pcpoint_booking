<?php 
require_once __DIR__ . '/db.php';
$ceo = getCeoContent();
?>

<section class="ceo-section">
    <div class="container ceo-container">
        <div class="row align-items-center">
            <div class="col-md-4">
                <div class="ceo-image-wrapper">
                    <?php if($ceo && $ceo['photo'] && file_exists('admin/images/cms/'.$ceo['photo'])): ?>
                    <img src="admin/images/cms/<?php echo $ceo['photo']; ?>" alt="CEO" class="ceo-image">
                    <?php else: ?>
                    <img src="images/ceo-img (Custom).jpg" alt="CEO" class="ceo-image">
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-md-8">
                <div class="ceo-message">
                    <h3 data-translate="ceo_welcome"><?php echo $ceo ? htmlspecialchars($ceo['name']) : 'Welcome to CAF PC-POINT'; ?></h3>
                    <p data-translate="ceo_desc1"><?php echo $ceo ? nl2br(htmlspecialchars($ceo['message'])) : 'We are here to help immigrants and residents with important services in Italy.'; ?></p>
                    <p data-translate="ceo_desc2"><?php echo $ceo ? '' : 'We also assist with immigration-related processes, making it easier for you to manage your legal and administrative tasks in Italy.'; ?></p>
                    <p data-translate="ceo_desc3"><?php echo $ceo ? '' : 'Explore our software at <a href="https://cafpcpoint.it/" target="_blank">cafpcpoint.it</a> and discover how it can benefit you too!'; ?></p>
                    <div class="ceo-signature">
                        <h5><?php echo $ceo ? htmlspecialchars($ceo['name']) : 'Nibash Chakraborty'; ?></h5>
                        <p data-translate="ceo_title"><?php echo $ceo ? htmlspecialchars($ceo['title']) : 'Chief Executive Officer'; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
