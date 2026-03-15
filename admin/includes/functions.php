<?php
require_once 'config.php';

global $con;

function runQuery($sql, $params = []) {
    global $con;
    $stmt = mysqli_prepare($con, $sql);
    if ($params) {
        $types = str_repeat('s', count($params));
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    mysqli_stmt_execute($stmt);
    return $stmt;
}

function fetchAll($sql, $params = []) {
    $stmt = runQuery($sql, $params);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_all($result, MYSQLI_ASSOC);
}

function fetchOne($sql, $params = []) {
    $stmt = runQuery($sql, $params);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_fetch_assoc($result);
}

function execute($sql, $params = []) {
    $stmt = runQuery($sql, $params);
    return mysqli_stmt_affected_rows($stmt);
}

function getLastId() {
    global $con;
    return mysqli_insert_id($con);
}

// Settings Functions
function getSetting($key) {
    $result = fetchOne("SELECT setting_value FROM tblsettings WHERE setting_key = ?", [$key]);
    return $result ? $result['setting_value'] : '';
}

function updateSetting($key, $value) {
    return execute("INSERT INTO tblsettings (setting_key, setting_value) VALUES (?, ?) ON DUPLICATE KEY UPDATE setting_value = ?", [$key, $value, $value]);
}

function getAllSettings() {
    $results = fetchAll("SELECT * FROM tblsettings");
    $settings = [];
    foreach ($results as $row) {
        $settings[$row['setting_key']] = $row['setting_value'];
    }
    return $settings;
}

// Theme Functions
function getActiveTheme() {
    return fetchOne("SELECT * FROM tblthemes WHERE is_active = 1");
}

function getAllThemes() {
    return fetchAll("SELECT * FROM tblthemes ORDER BY id");
}

function setActiveTheme($themeId) {
    global $con;
    mysqli_begin_transaction($con);
    try {
        mysqli_query($con, "UPDATE tblthemes SET is_active = 0");
        $stmt = mysqli_prepare($con, "UPDATE tblthemes SET is_active = 1 WHERE id = ?");
        mysqli_stmt_bind_param($stmt, "i", $themeId);
        mysqli_stmt_execute($stmt);
        mysqli_commit($con);
        return mysqli_stmt_affected_rows($stmt);
    } catch (Exception $e) {
        mysqli_rollback($con);
        return false;
    }
}

// Hero Slides Functions
function getHeroSlides() {
    return fetchAll("SELECT * FROM tblhero_slides ORDER BY order_num ASC, id ASC");
}

function getHeroSlide($id) {
    return fetchOne("SELECT * FROM tblhero_slides WHERE id = ?", [$id]);
}

function addHeroSlide($data) {
    return execute("INSERT INTO tblhero_slides (title, subtitle, cta_text, cta_link, image, order_num, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)", [
        $data['title'] ?? '',
        $data['subtitle'] ?? '',
        $data['cta_text'] ?? '',
        $data['cta_link'] ?? '#',
        $data['image'] ?? '',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1
    ]);
}

function updateHeroSlide($id, $data) {
    return execute("UPDATE tblhero_slides SET title = ?, subtitle = ?, cta_text = ?, cta_link = ?, image = ?, order_num = ?, is_active = ? WHERE id = ?", [
        $data['title'] ?? '',
        $data['subtitle'] ?? '',
        $data['cta_text'] ?? '',
        $data['cta_link'] ?? '#',
        $data['image'] ?? '',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1,
        $id
    ]);
}

function deleteHeroSlide($id) {
    return execute("DELETE FROM tblhero_slides WHERE id = ?", [$id]);
}

// Features Functions
function getFeatures() {
    return fetchAll("SELECT * FROM tblfeatures ORDER BY order_num ASC, id ASC");
}

function getFeature($id) {
    return fetchOne("SELECT * FROM tblfeatures WHERE id = ?", [$id]);
}

function addFeature($data) {
    return execute("INSERT INTO tblfeatures (title, title_bn, title_it, description, description_bn, description_it, modal_content, icon, link, order_num, is_active) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
        $data['title'] ?? '',
        $data['title_bn'] ?? '',
        $data['title_it'] ?? '',
        $data['description'] ?? '',
        $data['description_bn'] ?? '',
        $data['description_it'] ?? '',
        $data['modal_content'] ?? '',
        $data['icon'] ?? 'fa-star',
        $data['link'] ?? '#',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1
    ]);
}

function updateFeature($id, $data) {
    return execute("UPDATE tblfeatures SET title = ?, title_bn = ?, title_it = ?, description = ?, description_bn = ?, description_it = ?, modal_content = ?, icon = ?, link = ?, order_num = ?, is_active = ? WHERE id = ?", [
        $data['title'] ?? '',
        $data['title_bn'] ?? '',
        $data['title_it'] ?? '',
        $data['description'] ?? '',
        $data['description_bn'] ?? '',
        $data['description_it'] ?? '',
        $data['modal_content'] ?? '',
        $data['icon'] ?? 'fa-star',
        $data['link'] ?? '#',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1,
        $id
    ]);
}

function deleteFeature($id) {
    return execute("DELETE FROM tblfeatures WHERE id = ?", [$id]);
}

// Service Categories Functions
function getServiceCategories() {
    return fetchAll("SELECT * FROM tblservice_categories ORDER BY order_num ASC, id ASC");
}

function getServiceCategory($id) {
    return fetchOne("SELECT * FROM tblservice_categories WHERE id = ?", [$id]);
}

function addServiceCategory($data) {
    return execute("INSERT INTO tblservice_categories (name, name_bn, icon, description, order_num, is_active) VALUES (?, ?, ?, ?, ?, ?)", [
        $data['name'] ?? '',
        $data['name_bn'] ?? '',
        $data['icon'] ?? 'fa-star',
        $data['description'] ?? '',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1
    ]);
}

function updateServiceCategory($id, $data) {
    return execute("UPDATE tblservice_categories SET name = ?, name_bn = ?, icon = ?, description = ?, order_num = ?, is_active = ? WHERE id = ?", [
        $data['name'] ?? '',
        $data['name_bn'] ?? '',
        $data['icon'] ?? 'fa-star',
        $data['description'] ?? '',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1,
        $id
    ]);
}

function deleteServiceCategory($id) {
    return execute("DELETE FROM tblservice_categories WHERE id = ?", [$id]);
}

// Service Items Functions
function getServiceItems($categoryId = null) {
    if ($categoryId) {
        return fetchAll("SELECT * FROM tblservice_items WHERE category_id = ? ORDER BY order_num ASC, id ASC", [$categoryId]);
    }
    return fetchAll("SELECT si.*, sc.name as category_name FROM tblservice_items si LEFT JOIN tblservice_categories sc ON si.category_id = sc.id ORDER BY si.category_id, si.order_num ASC");
}

function getServiceItem($id) {
    return fetchOne("SELECT * FROM tblservice_items WHERE id = ?", [$id]);
}

function addServiceItem($data) {
    return execute("INSERT INTO tblservice_items (category_id, name, name_bn, description, description_bn, order_num, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)", [
        $data['category_id'] ?? 1,
        $data['name'] ?? '',
        $data['name_bn'] ?? '',
        $data['description'] ?? '',
        $data['description_bn'] ?? '',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1
    ]);
}

function updateServiceItem($id, $data) {
    return execute("UPDATE tblservice_items SET category_id = ?, name = ?, name_bn = ?, description = ?, description_bn = ?, order_num = ?, is_active = ? WHERE id = ?", [
        $data['category_id'] ?? 1,
        $data['name'] ?? '',
        $data['name_bn'] ?? '',
        $data['description'] ?? '',
        $data['description_bn'] ?? '',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1,
        $id
    ]);
}

function deleteServiceItem($id) {
    return execute("DELETE FROM tblservice_items WHERE id = ?", [$id]);
}

// Stats Functions
function getStats() {
    return fetchAll("SELECT * FROM tblstats ORDER BY order_num ASC, id ASC");
}

function getStat($id) {
    return fetchOne("SELECT * FROM tblstats WHERE id = ?", [$id]);
}

function addStat($data) {
    return execute("INSERT INTO tblstats (label, value, icon, order_num) VALUES (?, ?, ?, ?)", [
        $data['label'] ?? '',
        $data['value'] ?? '0',
        $data['icon'] ?? 'fa-star',
        $data['order_num'] ?? 0
    ]);
}

function updateStat($id, $data) {
    return execute("UPDATE tblstats SET label = ?, value = ?, icon = ?, order_num = ? WHERE id = ?", [
        $data['label'] ?? '',
        $data['value'] ?? '0',
        $data['icon'] ?? 'fa-star',
        $data['order_num'] ?? 0,
        $id
    ]);
}

function deleteStat($id) {
    return execute("DELETE FROM tblstats WHERE id = ?", [$id]);
}

// FAQ Functions
function getFaqs() {
    return fetchAll("SELECT * FROM tblfaq ORDER BY order_num ASC, id ASC");
}

function getFaq($id) {
    return fetchOne("SELECT * FROM tblfaq WHERE id = ?", [$id]);
}

function addFaq($data) {
    return execute("INSERT INTO tblfaq (question, answer, order_num, is_active) VALUES (?, ?, ?, ?)", [
        $data['question'] ?? '',
        $data['answer'] ?? '',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1
    ]);
}

function updateFaq($id, $data) {
    return execute("UPDATE tblfaq SET question = ?, answer = ?, order_num = ?, is_active = ? WHERE id = ?", [
        $data['question'] ?? '',
        $data['answer'] ?? '',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1,
        $id
    ]);
}

function deleteFaq($id) {
    return execute("DELETE FROM tblfaq WHERE id = ?", [$id]);
}

// Social Links Functions
function getSocialLinks() {
    return fetchAll("SELECT * FROM tblsocial ORDER BY id ASC");
}

function getSocialLink($id) {
    return fetchOne("SELECT * FROM tblsocial WHERE id = ?", [$id]);
}

function addSocialLink($data) {
    return execute("INSERT INTO tblsocial (platform, url, icon, is_active) VALUES (?, ?, ?, ?)", [
        $data['platform'] ?? '',
        $data['url'] ?? '',
        $data['icon'] ?? 'fa-facebook',
        $data['is_active'] ?? 1
    ]);
}

function updateSocialLink($id, $data) {
    return execute("UPDATE tblsocial SET platform = ?, url = ?, icon = ?, is_active = ? WHERE id = ?", [
        $data['platform'] ?? '',
        $data['url'] ?? '',
        $data['icon'] ?? 'fa-facebook',
        $data['is_active'] ?? 1,
        $id
    ]);
}

function deleteSocialLink($id) {
    return execute("DELETE FROM tblsocial WHERE id = ?", [$id]);
}

// CEO Functions
function getCeoContent() {
    return fetchOne("SELECT * FROM tblceo ORDER BY id DESC LIMIT 1");
}

function updateCeoContent($data) {
    $existing = getCeoContent();
    if ($existing) {
        return execute("UPDATE tblceo SET name = ?, title = ?, message = ?, photo = ?, signature = ? WHERE id = ?", [
            $data['name'] ?? '',
            $data['title'] ?? '',
            $data['message'] ?? '',
            $data['photo'] ?? '',
            $data['signature'] ?? '',
            $existing['id']
        ]);
    } else {
        return execute("INSERT INTO tblceo (name, title, message, photo, signature) VALUES (?, ?, ?, ?, ?)", [
            $data['name'] ?? '',
            $data['title'] ?? '',
            $data['message'] ?? '',
            $data['photo'] ?? '',
            $data['signature'] ?? ''
        ]);
    }
}

// Footer Content Functions
function getFooterContent() {
    return fetchOne("SELECT * FROM tblfooter_content ORDER BY id DESC LIMIT 1");
}

function updateFooterContent($data) {
    $existing = getFooterContent();
    if ($existing) {
        return execute("UPDATE tblfooter_content SET about_text = ?, about_text_bn = ?, contact_address = ?, contact_phone = ?, contact_email = ?, website = ?, whatsapp = ? WHERE id = ?", [
            $data['about_text'] ?? '',
            $data['about_text_bn'] ?? '',
            $data['contact_address'] ?? '',
            $data['contact_phone'] ?? '',
            $data['contact_email'] ?? '',
            $data['website'] ?? '',
            $data['whatsapp'] ?? '',
            $existing['id']
        ]);
    } else {
        return execute("INSERT INTO tblfooter_content (about_text, about_text_bn, contact_address, contact_phone, contact_email, website, whatsapp) VALUES (?, ?, ?, ?, ?, ?, ?)", [
            $data['about_text'] ?? '',
            $data['about_text_bn'] ?? '',
            $data['contact_address'] ?? '',
            $data['contact_phone'] ?? '',
            $data['contact_email'] ?? '',
            $data['website'] ?? '',
            $data['whatsapp'] ?? ''
        ]);
    }
}

// Navbar Links Functions
function getNavbarLinks() {
    return fetchAll("SELECT * FROM tblnavbar_links ORDER BY order_num ASC, id ASC");
}

function addNavbarLink($data) {
    return execute("INSERT INTO tblnavbar_links (label, label_en, label_it, label_bn, url, order_num, is_active) VALUES (?, ?, ?, ?, ?, ?, ?)", [
        $data['label'] ?? '',
        $data['label_en'] ?? '',
        $data['label_it'] ?? '',
        $data['label_bn'] ?? '',
        $data['url'] ?? '#',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1
    ]);
}

function updateNavbarLink($id, $data) {
    return execute("UPDATE tblnavbar_links SET label = ?, label_en = ?, label_it = ?, label_bn = ?, url = ?, order_num = ?, is_active = ? WHERE id = ?", [
        $data['label'] ?? '',
        $data['label_en'] ?? '',
        $data['label_it'] ?? '',
        $data['label_bn'] ?? '',
        $data['url'] ?? '#',
        $data['order_num'] ?? 0,
        $data['is_active'] ?? 1,
        $id
    ]);
}

function deleteNavbarLink($id) {
    return execute("DELETE FROM tblnavbar_links WHERE id = ?", [$id]);
}

// Image Upload Function
function uploadImage($file, $folder = '../images/cms/') {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return ['success' => false, 'message' => 'No file uploaded or upload error'];
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($file['type'], $allowedTypes)) {
        return ['success' => false, 'message' => 'Invalid file type. Only JPG, PNG, GIF, WebP allowed'];
    }

    $maxSize = 5 * 1024 * 1024;
    if ($file['size'] > $maxSize) {
        return ['success' => false, 'message' => 'File too large. Maximum 5MB allowed'];
    }

    if (!is_dir($folder)) {
        mkdir($folder, 0755, true);
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = time() . '_' . bin2hex(random_bytes(4)) . '.' . $extension;
    $destination = $folder . $filename;

    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return ['success' => true, 'filename' => $filename, 'path' => $destination];
    }

    return ['success' => false, 'message' => 'Failed to move uploaded file'];
}
