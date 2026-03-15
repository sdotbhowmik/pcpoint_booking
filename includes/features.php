<?php 
require_once __DIR__ . '/db.php';
$features = getFeatures();
$default_lang = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'it');

// Default modal content as fallback (using English keys to match database)
$defaultFeatures = [
    'caf' => [
        ['name' => 'Modello 730 / Unico', 'desc' => 'Dichiarazione dei redditi'],
        ['name' => 'ISEE / ISEEU', 'desc' => 'Indicatore situazione economica'],
        ['name' => 'IMU / TASI / TARI', 'desc' => 'Tasse sugli immobili'],
        ['name' => 'Successioni / Volture', 'desc' => 'Eredita e registri']
    ],
    'patronato' => [
        ['name' => 'Pensioni INPS / Invalidita', 'desc' => 'Pensione e invalidita'],
        ['name' => 'NASpI / Disoccupazione', 'desc' => 'Sussidio di disoccupazione'],
        ['name' => 'Assegno Unico Familiare', 'desc' => 'Sostegno per i figli'],
        ['name' => 'Maternita / Bonus', 'desc' => 'Indennita di maternita']
    ],
    'immigration' => [
        ['name' => 'Rinnovo Permesso Soggiorno', 'desc' => 'Rinnovo carta e permesso'],
        ['name' => 'Cittadinanza Italiana', 'desc' => 'Richiesta cittadinanza'],
        ['name' => 'Ricongiungimento Famigliare', 'desc' => 'Nulla Osta per famiglia'],
        ['name' => 'Visti d Ingresso', 'desc' => 'Visti per l Italia']
    ],
    'courses' => [
        ['name' => 'Italian Language Courses', 'desc' => 'Learn Italian language'],
        ['name' => 'Computer Training', 'desc' => 'Basic computer skills'],
        ['name' => 'Tax Preparation Classes', 'desc' => 'Tax filing training'],
        ['name' => 'Immigration Document Prep', 'desc' => 'Document preparation']
    ]
];
?>

<script>
const featureDetails = {
    'caf': {
        'title': 'CAF',
        'title_bn': 'CAF',
        'title_it': 'Servizi CAF',
        'services': [
            {'name': 'Modello 730 / Unico', 'desc': 'Income tax return'},
            {'name': 'ISEE / ISEEU', 'desc': 'Financial status certificate'},
            {'name': 'IMU / TASI / TARI', 'desc': 'Property taxes'},
            {'name': 'Successioni / Volture', 'desc': 'Inheritance and name changes'}
        ]
    },
    'patronato': {
        'title': 'Patronato',
        'title_bn': 'Patronato',
        'title_it': 'Servizi Patronato',
        'services': [
            {'name': 'Pensioni INPS / Invalidita', 'desc': 'Pensions and disability benefits'},
            {'name': 'NASpI / Disoccupazione', 'desc': 'Unemployment benefits'},
            {'name': 'Assegno Unico Familiare', 'desc': 'Family and child support'},
            {'name': 'Maternita / Bonus', 'desc': 'Maternity allowance'}
        ]
    },
    'immigration': {
        'title': 'Immigration',
        'title_bn': 'Immigration',
        'title_it': 'Servizi di Immigrazione',
        'services': [
            {'name': 'Rinnovo Permesso Soggiorno', 'desc': 'Residence permit renewal'},
            {'name': 'Cittadinanza Italiana', 'desc': 'Italian citizenship application'},
            {'name': 'Ricongiungimento Famigliare', 'desc': 'Family reunification'},
            {'name': 'Visti d Ingresso', 'desc': 'Entry visas for Italy'}
        ]
    },
    'courses': {
        'title': 'Courses',
        'title_bn': 'Courses',
        'title_it': 'Corsi',
        'services': [
            {'name': 'Italian Language Courses', 'desc': 'Learn Italian from beginner to advanced'},
            {'name': 'Computer Training', 'desc': 'Basic and advanced computer skills'},
            {'name': 'Tax Preparation Classes', 'desc': 'Tax filing training'},
            {'name': 'Immigration Document Prep', 'desc': 'Document preparation'}
        ]
    }
};
<?php if(!empty($features)): ?>
<?php foreach($features as $feature): ?>
<?php 
$featureKey = strtolower($feature['title']);
$modalContent = $feature['modal_content'] ?? '';
$servicesList = [];

if (!empty($modalContent)) {
    $servicesList = json_decode($modalContent, true);
    if (!is_array($servicesList)) {
        $servicesList = [];
    }
}

// Use default if no services defined
if (empty($servicesList) && isset($defaultFeatures[$featureKey])) {
    $servicesList = $defaultFeatures[$featureKey];
}

if (!empty($servicesList)):
?>
featureDetails['<?php echo $featureKey; ?>'] = {
    'title': '<?php echo addslashes($feature['title'] ?? ''); ?>',
    'title_bn': '<?php echo addslashes($feature['title_bn'] ?? $feature['title']); ?>',
    'title_it': '<?php echo addslashes($feature['title_it'] ?? $feature['title']); ?>',
    'services': <?php echo json_encode($servicesList); ?>
};
<?php endif; ?>
<?php endforeach; ?>
<?php endif; ?>
</script>

<section class="features-section py-5">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="section-title" data-translate="our_features">Our Features</h2>
            <p class="section-subtitle" data-translate="explore_services">Explore our key service areas</p>
        </div>
        <div class="row g-4">
            <?php if(!empty($features)): ?>
            <?php foreach($features as $feature): ?>
            <?php 
            $featureKey = strtolower($feature['title']);
            $hasLink = !empty($feature['link']) && $feature['link'] !== '#' && $feature['link'] !== '';
            ?>
            <div class="col-md-3 col-6">
                <?php if($hasLink): ?>
                <a href="<?php echo htmlspecialchars($feature['link']); ?>" class="feature-card-link" <?php echo strpos($feature['link'], 'http') === 0 ? 'target="_blank"' : ''; ?>>
                <?php endif; ?>
                    <div class="feature-card" data-feature="<?php echo $featureKey; ?>" <?php echo !$hasLink ? 'data-bs-toggle="modal" data-bs-target="#featureModal" style="cursor:pointer;"' : ''; ?>>
                        <div class="feature-icon"><i class="fas <?php echo $feature['icon']; ?>"></i></div>
                        <h4 data-translate="<?php echo $featureKey; ?>"><?php echo htmlspecialchars($feature['title']); ?></h4>
                        <p data-translate="<?php echo $featureKey; ?>_text"><?php echo htmlspecialchars($feature['description']); ?></p>
                    </div>
                <?php if($hasLink): ?>
                </a>
                <?php endif; ?>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <div class="col-md-3 col-6">
                <div class="feature-card" data-feature="caf" data-bs-toggle="modal" data-bs-target="#featureModal" style="cursor:pointer;">
                    <div class="feature-icon"><i class="fas fa-file-invoice-dollar"></i></div>
                    <h4 data-translate="caf">CAF</h4>
                    <p data-translate="caf_services_text">CAF Services</p>
                    <p class="bn">CAF সেবা</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="feature-card" data-feature="patronato" data-bs-toggle="modal" data-bs-target="#featureModal" style="cursor:pointer;">
                    <div class="feature-icon"><i class="fas fa-handshake"></i></div>
                    <h4 data-translate="patronato">Patronato</h4>
                    <p data-translate="patronato_text">Social Services</p>
                    <p class="bn">সামাজিক সেবা</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="feature-card" data-feature="immigrazione" data-bs-toggle="modal" data-bs-target="#featureModal" style="cursor:pointer;">
                    <div class="feature-icon"><i class="fas fa-passport"></i></div>
                    <h4 data-translate="immigrazione">Immigrazione</h4>
                    <p data-translate="immigration_text">Immigration</p>
                    <p class="bn">অভিবাসন</p>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <a href="https://corsi.cafpcpoint.it/" target="_blank" class="feature-card-link">
                    <div class="feature-card" data-feature="corsi">
                        <div class="feature-icon"><i class="fas fa-graduation-cap"></i></div>
                        <h4 data-translate="corsi">Corsi</h4>
                        <p data-translate="courses">Courses</p>
                        <p class="bn">কোর্স</p>
                    </div>
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<div class="modal fade" id="featureModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="featureModalTitle">Feature Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul class="feature-modal-list" id="featureModalList">
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    var modal = document.getElementById('featureModal');
    if (modal) {
        modal.addEventListener('shown.bs.modal', function(event) {
            var button = event.relatedTarget;
            if (button) {
                var featureId = button.getAttribute('data-feature');
                var feature = featureDetails[featureId];
                
                console.log('Feature ID:', featureId);
                console.log('Feature Data:', feature);
                
                if (feature) {
                    var lang = document.documentElement.lang || 'en';
                    var titleEl = document.getElementById('featureModalTitle');
                    var listEl = document.getElementById('featureModalList');
                    
                    // Set title based on language
                    if (lang === 'bn' && feature.title_bn) {
                        titleEl.textContent = feature.title_bn;
                    } else if (lang === 'it' && feature.title_it) {
                        titleEl.textContent = feature.title_it;
                    } else {
                        titleEl.textContent = feature.title;
                    }
                    
                    // Build services list
                    var listHtml = '';
                    if (feature.services && feature.services.length > 0) {
                        feature.services.forEach(function(service) {
                            listHtml += '<li><i class="fas fa-check-circle"></i><div><strong>' + service.name + '</strong><span>' + service.desc + '</span></div></li>';
                        });
                    } else {
                        listHtml = '<li class="text-center text-muted">No services available</li>';
                    }
                    listEl.innerHTML = listHtml;
                }
            }
        });
    }
});
</script>
