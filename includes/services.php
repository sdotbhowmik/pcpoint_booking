<?php 
require_once __DIR__ . '/db.php';
$categories = getServiceCategories();
$default_lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'it');
?>

<section class="py-5" id="services">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Services</h2>
            <p class="section-subtitle">Professional services to help you | আপনাকে সাহায্য করার জন্য পেশাদার সেবা</p>
        </div>
        <div class="row g-4">
            <?php if(!empty($categories)): ?>
            <?php foreach($categories as $category): ?>
            <?php 
                $items = getServiceItems($category['id']);
                $cat_name = $default_lang === 'bn' && $category['name_bn'] ? $category['name_bn'] : $category['name'];
            ?>
            <div class="col-md-4">
                <div class="service-category-card">
                    <div class="service-category-header">
                        <div class="service-category-icon">
                            <i class="fas <?php echo $category['icon']; ?>"></i>
                        </div>
                        <h4><?php echo htmlspecialchars($category['name']); ?></h4>
                        <p><?php echo htmlspecialchars($cat_name); ?></p>
                    </div>
                    <ul class="service-list">
                        <?php foreach($items as $item): ?>
                        <?php 
                            $item_name = $default_lang === 'bn' && $item['name_bn'] ? $item['name_bn'] : $item['name'];
                            $item_desc = $default_lang === 'bn' && $item['description_bn'] ? $item['description_bn'] : $item['description'];
                        ?>
                        <li class="service-list-item">
                            <i class="fas fa-chevron-right"></i>
                            <div>
                                <span class="service-name"><?php echo htmlspecialchars($item['name']); ?></span>
                                <span class="service-desc"><?php echo htmlspecialchars($item_desc); ?></span>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <!-- Default services if none in database -->
            <div class="col-md-4">
                <div class="service-category-card">
                    <div class="service-category-header">
                        <div class="service-category-icon">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <h4>CAF</h4>
                        <p>কর সহায়তা</p>
                    </div>
                    <ul class="service-list">
                        <li class="service-list-item">
                            <i class="fas fa-chevron-right"></i>
                            <div>
                                <span class="service-name">Modello 730 / Unico</span>
                                <span class="service-desc">আয়কর জমা</span>
                            </div>
                        </li>
                        <li class="service-list-item">
                            <i class="fas fa-chevron-right"></i>
                            <div>
                                <span class="service-name">ISEE / ISEEU</span>
                                <span class="service-desc">আর্থিক অবস্থার সনদ</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>
