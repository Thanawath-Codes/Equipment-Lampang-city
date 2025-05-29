<?php

// เชื่อมต่อกับฐานข้อมูล
require_once '../database/DB_tablet.php';

// ตรวจสอบว่ามีการส่งข้อมูลมาจากแบบฟอร์มหรือไม่
if (isset($_POST['submit'])) {
    // Debugging - check form data
    var_dump($_POST);
    // ดึงข้อมูลจากฟอร์ม
    $serial_number = $_POST['serial_number'];
    $year_equipment = $_POST['year_equipment'];
    $tablet_brand = $_POST['tablet_brand'];
    $tablet_model = $_POST['tablet_model'];
    $imei_number = $_POST['imei_number'];
    $tablet_cpu = $_POST['tablet_cpu'];
    $tablet_speed = $_POST['tablet_speed'];
    $tablet_ram = $_POST['tablet_ram'];
    $tablet_rom = $_POST['tablet_rom'];
    $os_tablet = $_POST['os_tablet'];
    $department = $_POST['department'];
    $segment = $_POST['segment'];
    $division = $_POST['division'];
    $working = $_POST['working'];
    $status_equipment = $_POST['status_equipment'];
    $owner_tablet = $_POST['owner_tablet'];

    // เตรียมคำสั่ง SQL เพื่อแทรกข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO `tablet_lists` (`serial_number`, `year_equipment`,
    `tablet_brand`, `tablet_model`, `imei_number`, `tablet_cpu`, `tablet_speed`, 
    `tablet_ram`, `tablet_rom`, `os_tablet`,  `department`,`segment`, 
    `division`, `working`, `status_equipment`, `owner_tablet`) 
    VALUES ('$serial_number', '$year_equipment', '$tablet_brand',
    '$tablet_model', '$imei_number', '$tablet_cpu', '$tablet_speed', 
    '$tablet_ram', '$tablet_rom', '$os_tablet', '$department', '$segment',
    '$division', '$working', '$status_equipment', '$owner_tablet')";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../messages/equipment/complete_tablet.php?msg=New record created successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
