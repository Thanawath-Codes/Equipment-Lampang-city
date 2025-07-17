<?php

// เชื่อมต่อกับฐานข้อมูล
require_once '../database/DB_printer.php';

// ตรวจสอบว่ามีการส่งข้อมูลมาจากแบบฟอร์มหรือไม่
if (isset($_POST['submit'])) {
    // Debugging - check form data
    var_dump($_POST);
    // ดึงข้อมูลจากฟอร์ม
    $serial_number = $_POST['serial_number'];
    $year_equipment = $_POST['year_equipment'];
    $printer_brand = $_POST['printer_brand'];
    $printer_model = $_POST['printer_model'];
    $printer_type = $_POST['printer_type'];
    $printer_kind = $_POST['printer_kind'];
    $connecting_printer = $_POST['connecting_printer'];
    $color_printing = $_POST['color_printing'];
    $paper_size_printing = $_POST['paper_size_printing'];
    $status_equipment = $_POST['status_equipment'];
    $department = $_POST['department'];
    $segment = $_POST['segment'];
    $division = $_POST['division'];
    $working = $_POST['working'];
    $owner_printer = $_POST['owner_printer'];

    // เตรียมคำสั่ง SQL เพื่อแทรกข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO `printer_lists` (`serial_number`, `year_equipment`,
    `printer_brand`, `printer_model`, `printer_type`, `printer_kind`, 
    `connecting_printer`, `color_printing`, `paper_size_printing`,
    `status_equipment`, `department`,`segment`, `division`, `working`,  
    `owner_printer`) 
    VALUES ('$serial_number', '$year_equipment', '$printer_brand',
    '$printer_model', '$printer_type', '$printer_kind', '$connecting_printer', 
    '$color_printing', '$paper_size_printing', '$status_equipment', '$department', '$segment',
    '$division', '$working', '$owner_printer')";


    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../messages/equipment/complete_printer.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
