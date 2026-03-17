<?php
date_default_timezone_set('Europe/Rome');

$host = $_SERVER['HTTP_HOST'];
if (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false) {
    $base_path = '/pcpoint_booking/admin';
} else {
    $base_path = '/admin';
}

$con=mysqli_connect("localhost","root","","cafpcpointdb");
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

$table_check = mysqli_query($con, "SHOW TABLES LIKE 'tblcontactmessages'");
if (mysqli_num_rows($table_check) == 0) {
    $create_table = "CREATE TABLE IF NOT EXISTS tblcontactmessages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(100) NOT NULL,
        email VARCHAR(100) NOT NULL,
        service VARCHAR(100) NOT NULL,
        message TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )";
    mysqli_query($con, $create_table);
}

$table_check2 = @mysqli_query($con, "SHOW TABLES LIKE 'tblrestables'");
if (!$table_check2 || mysqli_num_rows($table_check2) == 0) {
    $create_table2 = "CREATE TABLE IF NOT EXISTS tblrestables (
        id INT AUTO_INCREMENT PRIMARY KEY,
        tableNumber VARCHAR(50) DEFAULT NULL,
        AddedBy INT(11) DEFAULT NULL,
        AdminName VARCHAR(150) DEFAULT NULL,
        creationDate TIMESTAMP NOT NULL DEFAULT current_timestamp()
    )";
    mysqli_query($con, $create_table2);
}

$result_check = @mysqli_query($con, "SELECT COUNT(*) as cnt FROM tblrestables");
if ($result_check) {
    $row_count = mysqli_fetch_assoc($result_check);
    if ($row_count['cnt'] == 0) {
        mysqli_query($con, "INSERT INTO tblrestables (tableNumber, AddedBy, AdminName) VALUES 
            ('A1 - ROME (Head Office)', 1, 'Super Admin'),
            ('A2 - ROME (Branch Office)', 1, 'Super Admin'),
            ('A3 - ROME (North Branch)', 1, 'Super Admin'),
            ('A4 - MILAN (Branch Office)', 1, 'Super Admin'),
            ('A5 - NAPLES (Branch Office)', 1, 'Super Admin')");
    }
}
?>
