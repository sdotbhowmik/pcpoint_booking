<?php 
include_once __DIR__ . '/data/offices.php';
?>
<section class="location-section" id="locations">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Our Locations</h2>
            <p class="section-subtitle">Find us at these locations</p>
        </div>
        <div class="row">
            <?php foreach (get_all_offices() as $office): ?>
            <div class="col-md-6">
                <div class="location-card">
                    <span class="location-badge">
                        <i class="fas <?php echo $office['type'] === 'main' ? 'fa-star' : 'fa-code-branch'; ?> me-1"></i>
                        <?php echo $office['type'] === 'main' ? 'Main Branch' : 'Branch'; ?>
                    </span>
                    <div class="map-container">
                        <iframe 
                            src="<?php echo htmlspecialchars($office['coordinates']['embed_url']); ?>" 
                            width="100%" 
                            height="220" 
                            style="border:0;" 
                            allowfullscreen="" 
                            loading="lazy" 
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                    <div class="location-card-body">
                        <h5><i class="fas fa-building"></i> <?php echo htmlspecialchars($office['name']); ?></h5>
                        <p><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($office['address']); ?></p>
                        <p><i class="fas fa-phone"></i> <?php echo htmlspecialchars($office['phone']); ?></p>
                        <p><i class="fas fa-envelope"></i> <?php echo htmlspecialchars($office['email']); ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
