<?php 
include_once __DIR__ . '/data/offices.php';
?>
<section class="operational-section" id="branches">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title">Contact Information</h2>
            <p class="section-subtitle">Our Business Hours</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="info-card text-center">
                    <div class="info-icon green mx-auto">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h5>Working Hours</h5>
                    <p><i class="fas fa-calendar-day me-2"></i><?php echo htmlspecialchars($working_hours['days']); ?></p>
                    <p><i class="fas fa-business-time me-2"></i><?php echo htmlspecialchars($working_hours['weekdays']); ?></p>
                    <p><i class="fas fa-calendar-week me-2"></i>Saturday: <?php echo htmlspecialchars($working_hours['saturday']); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
