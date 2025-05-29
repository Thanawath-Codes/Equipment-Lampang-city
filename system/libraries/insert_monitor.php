<?php

// เชื่อมต่อกับฐานข้อมูล
require_once('../database/DB_monitor.php');


// ตรวจสอบว่ามีการส่งข้อมูลมาจากแบบฟอร์มหรือไม่
if (isset($_POST['submit'])) {
    // Debugging - check form data
    var_dump($_POST);
    // ดึงข้อมูลจากฟอร์ม
    $serial_number = $_POST['serial_number'];
    $year_equipment = $_POST['year_equipment'];
    $monitor_brand = $_POST['monitor_brand'];
    $monitor_model = $_POST['monitor_model'];
    $monitor_size = $_POST['monitor_size'];
    $department = $_POST['department'];
    $segment = $_POST['segment'];
    $division = $_POST['division'];
    $working = $_POST['working'];
    $status_equipment = $_POST['status_equipment'];
    $owner_monitor = $_POST['owner_monitor'];

    // เตรียมคำสั่ง SQL เพื่อแทรกข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO `monitor_lists` (`serial_number`, `year_equipment`,
    `monitor_brand`, `monitor_model`, `monitor_size`, `department`,`segment`,
    `division`, `working`, `status_equipment`, `owner_monitor`) 
    VALUES ('$serial_number', '$year_equipment', '$monitor_brand',
    '$monitor_model', '$monitor_size', '$department', '$segment',
    '$division', '$working', '$status_equipment', '$owner_monitor')";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location:../messages/equipment/complete_monitor.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
