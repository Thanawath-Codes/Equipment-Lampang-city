<?php

// เชื่อมต่อกับฐานข้อมูล
require_once '../database/DB_scanner.php';

// ตรวจสอบว่ามีการส่งข้อมูลมาจากแบบฟอร์มหรือไม่
if (isset($_POST['submit'])) {
    // Debugging - check form data
    var_dump($_POST);
    // ดึงข้อมูลจากฟอร์ม
    $serial_number = $_POST['serial_number'];
    $year_equipment = $_POST['year_equipment'];
    $scanner_brand = $_POST['scanner_brand'];
    $scanner_model = $_POST['scanner_model'];
    $printing_speed = $_POST['printing_speed'];
    $scanner_paper_size = $_POST['scanner_paper_size'];
    $department = $_POST['department'];
    $segment = $_POST['segment'];
    $division = $_POST['division'];
    $working = $_POST['working'];
    $status_equipment = $_POST['status_equipment'];
    $owner_scanner = $_POST['owner_scanner'];

    // เตรียมคำสั่ง SQL เพื่อแทรกข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO `scanner_lists` (`serial_number`, `year_equipment`,
    `scanner_brand`, `scanner_model`, `printing_speed`, `scanner_paper_size`,
    `department`,`segment`, `division`, `working`, `status_equipment`, 
    `owner_scanner`) 
    VALUES ('$serial_number', '$year_equipment', '$scanner_brand',
    '$scanner_model', '$printing_speed', '$scanner_paper_size',
    '$department', '$segment','$division', '$working',
    '$status_equipment', '$owner_scanner')";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../messages/equipment/complete_scanner.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
