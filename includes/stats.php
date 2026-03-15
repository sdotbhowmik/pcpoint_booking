<?php 
// Fetch stats from database
if (!function_exists('getStats')) {
    include_once __DIR__ . '/db.php';
}

$stats = function_exists('getStats') ? getStats() : [];

if (empty($stats)) {
    $stats = [
        ['label' => 'Year Started', 'value' => '2020', 'icon' => 'fa-calendar'],
        ['label' => 'Awards Won', 'value' => '3', 'icon' => 'fa-trophy'],
        ['label' => 'Years Experience', 'value' => '2', 'icon' => 'fa-briefcase'],
        ['label' => 'Customers Served', 'value' => '3000', 'icon' => 'fa-users']
    ];
}
?>

<section class="stats-section">
    <div class="container">
        <div class="row">
            <?php foreach($stats as $stat): ?>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-icon"><i class="fas <?php echo $stat['icon']; ?>"></i></div>
                    <div class="stat-number" data-target="<?php echo $stat['value']; ?>">0</div>
                    <div class="stat-label"><?php echo $stat['label']; ?></div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
