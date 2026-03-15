<?php
date_default_timezone_set('Europe/Rome');
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
?>
