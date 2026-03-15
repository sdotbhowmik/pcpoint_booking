<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "cafpcpointdb";

$conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
if($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

function runQuery($sql, $params = []) {
    global $conn;
    $stmt = $conn->prepare($sql);
    if($params) {
        $types = str_repeat('s', count($params));
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    return $stmt;
}

function fetchAll($sql, $params = []) {
    $stmt = runQuery($sql, $params);
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function fetchOne($sql, $params = []) {
    $stmt = runQuery($sql, $params);
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function getSetting($key) {
    $result = fetchOne("SELECT setting_value FROM tblsettings WHERE setting_key = ?", [$key]);
    return $result ? $result['setting_value'] : '';
}

function getAllSettings() {
    $results = fetchAll("SELECT * FROM tblsettings");
    $settings = [];
    foreach($results as $row) {
        $settings[$row['setting_key']] = $row['setting_value'];
    }
    return $settings;
}

function getActiveTheme() {
    return fetchOne("SELECT * FROM tblthemes WHERE is_active = 1");
}

function getHeroSlides() {
    return fetchAll("SELECT * FROM tblhero_slides WHERE is_active = 1 ORDER BY order_num ASC, id ASC");
}

function getFeatures() {
    return fetchAll("SELECT * FROM tblfeatures WHERE is_active = 1 ORDER BY order_num ASC, id ASC");
}

function getServiceCategories() {
    return fetchAll("SELECT * FROM tblservice_categories WHERE is_active = 1 ORDER BY order_num ASC, id ASC");
}

function getServiceItems($categoryId = null) {
    if($categoryId) {
        return fetchAll("SELECT * FROM tblservice_items WHERE category_id = ? AND is_active = 1 ORDER BY order_num ASC, id ASC", [$categoryId]);
    }
    return fetchAll("SELECT si.*, sc.name as category_name FROM tblservice_items si LEFT JOIN tblservice_categories sc ON si.category_id = sc.id WHERE si.is_active = 1 ORDER BY si.category_id, si.order_num ASC");
}

function getStats() {
    return fetchAll("SELECT * FROM tblstats ORDER BY order_num ASC, id ASC");
}

function getFaqs() {
    return fetchAll("SELECT * FROM tblfaq WHERE is_active = 1 ORDER BY order_num ASC, id ASC");
}

function getSocialLinks() {
    return fetchAll("SELECT * FROM tblsocial WHERE is_active = 1 ORDER BY id ASC");
}

function getCeoContent() {
    return fetchOne("SELECT * FROM tblceo ORDER BY id DESC LIMIT 1");
}

function getFooterContent() {
    return fetchOne("SELECT * FROM tblfooter_content ORDER BY id DESC LIMIT 1");
}

function getNavbarLinks() {
    return fetchAll("SELECT * FROM tblnavbar_links WHERE is_active = 1 ORDER BY order_num ASC, id ASC");
}

function getSettingWithDefault($key, $default = '') {
    $val = getSetting($key);
    return $val ? $val : $default;
}
