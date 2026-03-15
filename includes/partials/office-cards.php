<?php
if (!isset($offices)) {
    include_once __DIR__ . '/../data/offices.php';
}

$show_type = $show_type ?? 'all';
$variant = $variant ?? 'default';
?>

<?php if ($show_type === 'all'): ?>
    <div class="row g-4">
        <?php foreach (get_all_offices() as $office): ?>
            <div class="col-md-<?php echo count(get_all_offices()) === 2 ? '6' : '12'; ?>">
                <div class="info-card">
                    <div class="info-icon <?php echo $office['type'] === 'main' ? 'orange' : 'blue'; ?>">
                        <i class="fas fa-building"></i>
                    </div>
                    <h5><?php echo htmlspecialchars($office['name']); ?></h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i><?php echo htmlspecialchars($office['address']); ?></p>
                    <p><i class="fas fa-phone me-2"></i><?php echo htmlspecialchars($office['phone']); ?></p>
                    <p><i class="fas fa-envelope me-2"></i><?php echo htmlspecialchars($office['email']); ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php elseif ($show_type === 'single' && $office): ?>
    <div class="info-card">
        <div class="info-icon <?php echo $office['type'] === 'main' ? 'orange' : 'blue'; ?>">
            <i class="fas fa-building"></i>
        </div>
        <h5><?php echo htmlspecialchars($office['name']); ?></h5>
        <p><i class="fas fa-map-marker-alt me-2"></i><?php echo htmlspecialchars($office['address']); ?></p>
        <p><i class="fas fa-phone me-2"></i><?php echo htmlspecialchars($office['phone']); ?></p>
        <p><i class="fas fa-envelope me-2"></i><?php echo htmlspecialchars($office['email']); ?></p>
    </div>
<?php endif; ?>
