<?php 
require_once __DIR__ . '/db.php';

$navbar_links = getNavbarLinks();
$logo = getSetting('logo');

$primary = '#228B22';
if (function_exists('getActiveTheme')) {
    $theme = getActiveTheme();
    if ($theme) {
        $primary = $theme['primary_color'];
    }
}
?>

<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <?php if($logo && file_exists('images/'.$logo)): ?>
            <img src="images/<?php echo $logo; ?>" alt="CAF PC POINT" height="45">
            <?php else: ?>
            <img src="images/site_logo.png" alt="CAF PC POINT" height="45">
            <?php endif; ?>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" style="border-color: var(--primary);">
            <span class="navbar-toggler-icon" style="background-image: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 viewBox=%270 0 30 30%27%3E%3Cpath stroke=%27<?php echo urlencode($primary); ?>%27 stroke-linecap=%27round%27 stroke-miterlimit=%2710%27 stroke-width=%272%27 d=%27M4 7h22M4 15h22M4 23h22%27/%3E%3C/svg%27');"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto align-items-center">
                <li class="nav-item">
                    <div class="lang-dropdown">
                        <button class="lang-btn">
                            <span class="lang-flag"><?php echo $default_lang === 'en' ? '🇬🇧' : ($default_lang === 'it' ? '🇮🇹' : '🇧🇩'); ?></span>
                            <span><?php echo $lang_names[$default_lang]; ?></span>
                            <i class="fas fa-chevron-down ms-1" style="font-size: 0.7rem;"></i>
                        </button>
                        <div class="lang-dropdown-menu">
                            <a href="?lang=en" class="lang-option">
                                <span class="lang-flag">🇬🇧</span> English
                            </a>
                            <a href="?lang=it" class="lang-option">
                                <span class="lang-flag">🇮🇹</span> Italiano
                            </a>
                            <a href="?lang=bn" class="lang-option">
                                <span class="lang-flag">🇧🇩</span> বাংলা
                            </a>
                        </div>
                    </div>
                </li>
                <?php foreach($navbar_links as $link): ?>
                <?php 
                    $label = $default_lang === 'bn' && $link['label_bn'] ? $link['label_bn'] : ($default_lang === 'en' && $link['label_en'] ? $link['label_en'] : ($link['label_it'] ? $link['label_it'] : $link['label']));
                ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo htmlspecialchars($link['url']); ?>"><?php echo htmlspecialchars($label); ?></a></li>
                <?php endforeach; ?>
                <li class="nav-item ms-lg-3">
                    <a class="btn btn-secondary" href="admin/index.php" target="_blank">
                        <i class="fas fa-sign-in-alt me-1"></i>Login
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
