<?php

// เชื่อมต่อกับฐานข้อมูล
require_once '../database/DB_computer.php';


// ตรวจสอบว่ามีการส่งข้อมูลมาจากแบบฟอร์มหรือไม่
if (isset($_POST['submit'])) {
    // Debugging - check form data
    var_dump($_POST);
    // ดึงข้อมูลจากฟอร์ม
    $serial_number = $_POST['serial_number'];
    $year_equipment = $_POST['year_equipment'];
    $computer_type = $_POST['computer_type'];
    $computer_case = $_POST['computer_case'];
    $computer_model = $_POST['computer_model'];
    $brand_cpu = $_POST['brand_cpu'];
    $spec_cpu = $_POST['spec_cpu'];
    $speed_cpu = $_POST['speed_cpu'];
    $storage_device = $_POST['storage_device'];
    $storage_spec = $_POST['storage_spec'];
    $ram_computer = $_POST['ram_computer'];
    $microsoft_office = $_POST['microsoft_office'];
    $key_product_office = $_POST['key_product_office'];
    $os_computer = $_POST['os_computer'];
    $key_product_windows = $_POST['key_product_windows'];
    $department = $_POST['department'];
    $segment = $_POST['segment'];
    $division = $_POST['division'];
    $working = $_POST['working'];
    $status_equipment = $_POST['status_equipment'];
    $owner_computer = $_POST['owner_computer'];

    // เตรียมคำสั่ง SQL เพื่อแทรกข้อมูลลงในฐานข้อมูล
    $sql = "INSERT INTO `computer_lists` (`serial_number`, `year_equipment`,
     `computer_type`, `computer_case`, `computer_model`, `brand_cpu`,
      `spec_cpu`, `speed_cpu`, `storage_device`, `storage_spec`,
       `ram_computer`, `microsoft_office`, `key_product_office`,
        `os_computer`, `key_product_windows`, `department`, `segment`,
         `division`, `working`, `status_equipment`, `owner_computer`) 
        VALUES ('$serial_number', '$year_equipment', '$computer_type',
         '$computer_case', '$computer_model', '$brand_cpu', '$spec_cpu',
          '$speed_cpu', '$storage_device', '$storage_spec', '$ram_computer',
           '$microsoft_office', '$key_product_office', '$os_computer',
            '$key_product_windows', '$department', '$segment', '$division',
             '$working', '$status_equipment', '$owner_computer')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../messages/equipment/complete_computer.php?msg=New record created successfully");
        exit();
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
