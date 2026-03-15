<?php 
include_once __DIR__ . '/data/offices.php';
?>
<div class="sns-section">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-6 col-md-5 mb-3 mb-md-0">
                <div class="working-hours-bar">
                    <div class="working-hours-item">
                        <i class="fas fa-clock"></i>
                        <span><strong data-translate="mon_fri">Mon-Fri:</strong> <span data-translate="hours_weekday">9:00 AM - 6:00 PM</span></span>
                    </div>
                    <div class="working-hours-separator">|</div>
                    <div class="working-hours-item">
                        <i class="fas fa-calendar-week"></i>
                        <span><strong data-translate="sat">Sat:</strong> <span data-translate="hours_saturday">10:00 AM - 4:00 PM</span></span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-7 text-md-end">
                <div class="sns-links">
                    <a href="https://facebook.com/cafpcpoint" target="_blank" class="sns-link"><i class="fab fa-facebook"></i></a>
                    <a href="https://wa.me/390687880399" target="_blank" class="sns-link"><i class="fab fa-whatsapp"></i></a>
                    <a href="mailto:info@cafpcpoint.it" class="sns-link"><i class="fas fa-envelope"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.sns-section {
    background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
    padding: 15px 0;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

.working-hours-bar {
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    gap: 10px;
    color: #fff;
    font-size: 0.9rem;
}

.working-hours-item {
    display: flex;
    align-items: center;
    gap: 8px;
}

.working-hours-item i {
    font-size: 1rem;
    opacity: 0.9;
}

.working-hours-item strong {
    font-weight: 600;
}

.working-hours-separator {
    color: rgba(255,255,255,0.5);
    font-size: 1.2rem;
}

.sns-links {
    display: flex;
    justify-content: flex-end;
    gap: 15px;
}

.sns-link {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 38px;
    height: 38px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    color: #fff !important;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    border: 2px solid rgba(255,255,255,0.3);
    text-decoration: none;
}

.sns-link:hover {
    background: #FFD700;
    transform: translateY(-2px);
    color: #1a6b1a !important;
    border-color: #FFD700;
    text-decoration: none;
}

@media (max-width: 768px) {
    .working-hours-bar {
        justify-content: center;
    }
    .sns-links {
        justify-content: center;
        margin-top: 10px;
    }
}
</style>
