<?php

// เชื่อมต่อกับฐานข้อมูล
require_once '../database/DB_ups.php';
 
// ตรวจสอบว่ามีการส่งข้อมูลมาจากแบบฟอร์มหรือไม่
if (isset($_POST['submit'])) {
    // Debugging - check form data
    var_dump($_POST);
    // ดึงข้อมูลจากฟอร์ม
    $serial_number = $_POST['serial_number'];
    $year_equipment = $_POST['year_equipment'];
    $ups_brand = $_POST['ups_brand'];
    $ups_model = $_POST['ups_model'];
    $electrical_capacity = $_POST['electrical_capacity'];
    $department = $_POST['department'];
    $segment = $_POST['segment'];
    $division = $_POST['division'];
    $working = $_POST['working'];
    $status_equipment = $_POST['status_equipment'];
    $owner_ups = $_POST['owner_ups'];

    // เตรียมคำสั่ง SQL เพื่อแทรกข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO `ups_lists` (`serial_number`, `year_equipment`,
 `ups_brand`, `ups_model`, `electrical_capacity`, `department`,
 `segment`, `division`, `working`, `status_equipment`, `owner_ups`) 
    VALUES ('$serial_number', '$year_equipment', '$ups_brand',
     '$ups_model', '$electrical_capacity', '$department', '$segment',  
     '$division', '$working', '$status_equipment', '$owner_ups')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../messages/equipment/complete_ups.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
