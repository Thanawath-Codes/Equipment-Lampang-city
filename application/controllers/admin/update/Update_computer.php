<?php
session_start();

include "../../../../system/database/DB_computer.php";


$id = $_GET["id"];

// Fetch data from the database
$sql = "SELECT * FROM `computer_lists` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Error: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

if (!$row) {
    die("No data found for id $id");
}

if (isset($_POST["submit"])) {
    // Check and use existing values if new values are not provided
    $serial_number = !empty($_POST['serial_number']) ? $_POST['serial_number'] : $row['serial_number'];
    $year_equipment = !empty($_POST['year_equipment']) ? $_POST['year_equipment'] : $row['year_equipment'];
    $computer_type = !empty($_POST['computer_type']) ? $_POST['computer_type'] : $row['computer_type'];
    $computer_case = !empty($_POST['computer_case']) ? $_POST['computer_case'] : $row['computer_case'];
    $computer_model = !empty($_POST['computer_model']) ? $_POST['computer_model'] : $row['computer_model'];
    $brand_cpu = !empty($_POST['brand_cpu']) ? $_POST['brand_cpu'] : $row['brand_cpu'];
    $spec_cpu = !empty($_POST['spec_cpu']) ? $_POST['spec_cpu'] : $row['spec_cpu'];
    $speed_cpu = !empty($_POST['speed_cpu']) ? $_POST['speed_cpu'] : $row['speed_cpu'];
    $storage_device = !empty($_POST['storage_device']) ? $_POST['storage_device'] : $row['storage_device'];
    $storage_spec = !empty($_POST['storage_spec']) ? $_POST['storage_spec'] : $row['storage_spec'];
    $ram_computer = !empty($_POST['ram_computer']) ? $_POST['ram_computer'] : $row['ram_computer'];
    $microsoft_office = !empty($_POST['microsoft_office']) ? $_POST['microsoft_office'] : $row['microsoft_office'];
    $key_product_office = !empty($_POST['key_product_office']) ? $_POST['key_product_office'] : $row['key_product_office'];
    $os_computer = !empty($_POST['os_computer']) ? $_POST['os_computer'] : $row['os_computer'];
    $key_product_windows = !empty($_POST['key_product_windows']) ? $_POST['key_product_windows'] : $row['key_product_windows'];
    $status_equipment = !empty($_POST['status_equipment']) ? $_POST['status_equipment'] : $row['status_equipment'];
    $department = !empty($_POST['department']) ? $_POST['department'] : $row['department'];
    $segment = !empty($_POST['segment']) ? $_POST['segment'] : $row['segment'];
    $division = !empty($_POST['division']) ? $_POST['division'] : $row['division'];
    $working = !empty($_POST['working']) ? $_POST['working'] : $row['working'];
    $owner_computer = !empty($_POST['owner_computer']) ? $_POST['owner_computer'] : $row['owner_computer'];

    // Update data in the database
    $sql = "UPDATE `computer_lists` SET 
        `serial_number`='$serial_number',
        `year_equipment`='$year_equipment',
        `computer_type`='$computer_type',
        `computer_case`='$computer_case',
        `computer_model`='$computer_model',
        `brand_cpu`='$brand_cpu',
        `spec_cpu`='$spec_cpu',
        `speed_cpu`='$speed_cpu',
        `storage_device`='$storage_device',
        `storage_spec`='$storage_spec',
        `ram_computer`='$ram_computer',
        `microsoft_office`='$microsoft_office',
        `key_product_office`='$key_product_office',
        `os_computer`='$os_computer',
        `key_product_windows`='$key_product_windows',
        `status_equipment`='$status_equipment',
        `department`='$department',
        `segment`='$segment',
        `division`='$division',
        `working`='$working',
        `owner_computer`='$owner_computer'
        WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../../../system/messages/equipment/Complete_computer.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Update Equipment Computer.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../../../assets/css/update_computer.css">
    <!--AJAX-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--SCRIPT JQUERY-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <nav>
        <div class="container">
            <img src="../../../../assets/images/logo.png" class="logo">
            
            <div class="profile-area">
                
                <div class="profile">
                    <div class="profile-photo">
                        <img src="../../../../assets/images/profiled.png">
                    </div>
                    <h5>ADMINISRATOR</h5>
                    <a href="../account/Account.php">
                        <span class="material-icons-sharp">expand_more</span>
                    </a>
                </div>
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <main>
        <aside>
            <button id="close-btn">
                <span class="material-icons-sharp">close</span>
            </button>
            <div class="sidebar">
                <a href="../Dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>แผงควบคุม</h4>
                </a>
                <a href="../Equip_computer.php">
                    <span class="material-icons-sharp">
                        screenshot_monitor
                    </span>
                    <h4>คอมพิวเตอร์</h4>
                </a>
                <a href="../Equip_monitor.php">
                    <span class="material-icons-sharp">
                        laptop_chromebook
                    </span>
                    <h4>จอคอมพิวเตอร์</h4>
                </a>
                <a href="../Equip_tablet.php">
                    <span class="material-icons-sharp">
                        tablet_mac
                    </span>
                    <h4>แท็บเล็ต</h4>
                </a>
                <a href="../Equip_printer.php">
                    <span class="material-icons-sharp">
                        print
                    </span>
                    <h4>ปริ้นเตอร์</h4>
                </a>
                <a href="../Equip_scanner.php">
                    <span class="material-icons-sharp">
                        document_scanner
                    </span>
                    <h4>สแกนเนอร์</h4>
                </a>
                <a href="../Equip_ups.php">
                    <span class="material-icons-sharp">
                        charging_station
                    </span>
                    <h4>เครื่องสำรองไฟ</h4>
                </a>
                <a href="../account/Account.php">
                    <span class="material-icons-sharp">settings</span>
                    <h4>ตั้งค่า</h4>
                </a>
            </div>
            <!-- END OF SIDEBAR -->

            <div class="updates">
                <span class="material-icons-sharp">update</span>
                <h4>Updates Available</h4>
                <p>Security Updates</p>
                <p>General Updates</p>
                <a href="#">EQUIP Version 1.8.20</a>
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->

        <section class="middle">

            <?php
            $sql = "SELECT * FROM `computer_lists` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="add_equipment_lampangcity">
                <div class="title">แก้ไขครุภัณฑ์</div>
                <div class="content">
                    <form action="" method="post">
                        <div class="equipment_lampangcity">
                            <div class="column">
                                <div class="input-field">
                                    <input type="text" name="serial_number" id="serial_number"
                                        value="<?php echo $row['serial_number'] ?>" maxlength="11" required>
                                    <label for="first_name">เลขครุภัณฑ์ภัณฑ์คอมพิวเตอร์</label>
                                </div>
                            </div>
                        </div>

                        <div class="notification_message">
                            <p>
                                <span class="material-icons-sharp">error</span>
                                กรอกเลขครุภัณฑ์ภัณฑ์คอมพิวเตอร์ ตัวอย่าง 416-67-1943.
                            </p>
                        </div>
                        <br>

                        <div class="equipment_lampangcity" id="update_equipment">
                            <div class="column">
                                <div class="select-box">
                                    <select class="form-select" name="year_equipment">
                                        <option selected disabled>ปีงบประมาณ</option>
                                        <?php
                                        $currentYear = date("Y");
                                        $earliestYear = 1970;
                                        while ($currentYear >= $earliestYear) {
                                            $buddhistYear = $currentYear + 543;
                                            $selected = $buddhistYear == $row['year_equipment'] ? 'selected' : '';
                                            echo "<option value=\"$buddhistYear\" $selected>$buddhistYear</option>";
                                            $currentYear--;
                                        }
                                        ?>
                                    </select>
                                </div>

                                <script>
                                    document.getElementById('serial_number').addEventListener('input', function (e) {
                                        let input = e.target.value.replace(/\D/g, ''); // ลบทุกตัวที่ไม่ใช่ตัวเลข
                                        let formattedInput = '';
                                        for (let i = 0; i < input.length; i++) {
                                            if (i === 3 || i === 5) { // เพิ่มขีดหลังเลขที่ 3 และ 6
                                                formattedInput += '-';
                                            }
                                            formattedInput += input[i];
                                        }
                                        e.target.value = formattedInput;
                                    });
                                </script>

                                <?php

                                include('../../../../system/database/DB_computer.php');

                                $computer_type = "SELECT * FROM computer_types";
                                $computer_type_qry = mysqli_query($conn, $computer_type);

                                ?>

                                <div class="select-box">
                                    <select class="form-select" id="computer_type" name="computer_type">
                                        <option selected disabled>เลือก อุปกรณ์</option>
                                        <?php while ($computer_type_row = mysqli_fetch_assoc($computer_type_qry)): ?>
                                        <option value="<?php echo $computer_type_row['id']; ?>" <?php if ($computer_type_row['id'] == $row['computer_type'])
                                               echo 'selected'; ?>>
                                            <?php echo $computer_type_row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="computer_case" name="computer_case">
                                        <option selected disabled>เลือก เคสคอมพิวเตอร์</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก computer_type แล้วหรือยัง
                                        if (!empty($row['computer_type'])) {
                                            $computer_case_qry = mysqli_query($conn, "SELECT * FROM computer_cases WHERE computer_type_id = {$row['computer_type']}");
                                            while ($computer_case_row = mysqli_fetch_assoc($computer_case_qry)): ?>
                                        <option value="<?php echo $computer_case_row['id']; ?>" <?php if ($computer_case_row['id'] == $row['computer_case'])
                                               echo 'selected'; ?>>
                                            <?php echo $computer_case_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="computer_model" name="computer_model">
                                        <option selected disabled>เลือก รุ่น/โมเดล</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก computer_case แล้วหรือยัง
                                        if (!empty($row['computer_case'])) {
                                            $computer_model_qry = mysqli_query($conn, "SELECT * FROM computer_models WHERE computer_case_id = {$row['computer_case']}");
                                            while ($computer_model_row = mysqli_fetch_assoc($computer_model_qry)): ?>
                                        <option value="<?php echo $computer_model_row['id']; ?>" <?php if ($computer_model_row['id'] == $row['computer_model'])
                                               echo 'selected'; ?>>
                                            <?php echo $computer_model_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>

                                <?php

                                include('../../../../system/database/DB_computer.php');

                                $brand_cpu = "SELECT * FROM brand_cpus";
                                $brand_cpu_qry = mysqli_query($conn, $brand_cpu);

                                ?>

                                <div class="select-box">
                                    <select class="form-select" id="brand_cpu" name="brand_cpu">
                                        <option selected disabled>เลือก ชิปคอมพิวเตอร์</option>
                                        <?php while ($brand_cpu_row = mysqli_fetch_assoc($brand_cpu_qry)): ?>
                                        <option value="<?php echo $brand_cpu_row['id']; ?>" <?php if ($brand_cpu_row['id'] == $row['brand_cpu'])
                                               echo 'selected'; ?>>
                                            <?php echo $brand_cpu_row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="spec_cpu" name="spec_cpu">
                                        <option selected disabled>เลือก สเปคชิปคอมพิวเตอร์</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก brand_cpu แล้วหรือยัง
                                        if (!empty($row['brand_cpu'])) {
                                            $spec_cpu_qry = mysqli_query($conn, "SELECT * FROM spec_cpus WHERE brand_cpu_id = {$row['brand_cpu']}");
                                            while ($spec_cpu_row = mysqli_fetch_assoc($spec_cpu_qry)): ?>
                                        <option value="<?php echo $spec_cpu_row['id']; ?>" <?php if ($spec_cpu_row['id'] == $row['spec_cpu'])
                                               echo 'selected'; ?>>
                                            <?php echo $spec_cpu_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="column">
                            <div class="input-field">
                                <input type="text" name="speed_cpu" id="speed_cpu"
                                    value="<?php echo $row['speed_cpu'] ?>" maxlength="4" required />
                                <label for="speed_cpu">ความเร็วชิปคอมพิวเตอร์</label>
                            </div>
                        </div>
                </div>

                <div class="notification_message">
                    <p>
                        <span class="material-icons-sharp">error</span>
                        กรอกความเร็วชิปคอมพิวเตอร์ ตัวอย่าง 2.93GHz.
                    </p>
                </div>

                <div class="equipment_lampangcity" id="update_disk">
                    <?php

                    include('../../../../system/database/DB_computer.php');

                    $storage_device = "SELECT * FROM storage_devices";
                    $storage_device_qry = mysqli_query($conn, $storage_device);

                    ?>
                    <div class="column">
                        <div class="select-box">
                            <select class="form-select" id="storage_device" name="storage_device">
                                <option selected disabled>เลือก อุปกรณ์จัดเก็บข้อมูล</option>
                                <?php while ($storage_device_row = mysqli_fetch_assoc($storage_device_qry)): ?>
                                <option value="<?php echo $storage_device_row['id']; ?>" <?php if ($storage_device_row['id'] == $row['storage_device'])
                                       echo 'selected'; ?>>
                                    <?php echo $storage_device_row['name']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="select-box">
                            <select class="form-select" id="storage_spec" name="storage_spec">
                                <option selected disabled>เลือก พื้นที่จัดเก็บข้อมูล</option>
                                <?php
                                // ตรวจสอบว่ามีการเลือก storage_device แล้วหรือยัง
                                if (!empty($row['storage_device'])) {
                                    $storage_spec_qry = mysqli_query($conn, "SELECT * FROM storage_specs WHERE storage_device_id = {$row['storage_device']}");
                                    while ($storage_spec_row = mysqli_fetch_assoc($storage_spec_qry)): ?>
                                <option value="<?php echo $storage_spec_row['id']; ?>" <?php if ($storage_spec_row['id'] == $row['storage_spec'])
                                       echo 'selected'; ?>>
                                    <?php echo $storage_spec_row['name']; ?>
                                </option>
                                <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="select-box">
                            <select class="form-select" id="ram_computer" name="ram_computer">
                                <option selected disabled>เลือก แรมคอมพิวเตอร์</option>
                                <?php
                                // ตรวจสอบว่ามีการเลือก storage_spec แล้วหรือยัง
                                if (!empty($row['storage_spec'])) {
                                    $ram_computer_qry = mysqli_query($conn, "SELECT * FROM ram_computers WHERE storage_spec_id = {$row['storage_spec']}");
                                    while ($ram_computer_row = mysqli_fetch_assoc($ram_computer_qry)): ?>
                                <option value="<?php echo $ram_computer_row['id']; ?>" <?php if ($ram_computer_row['id'] == $row['ram_computer'])
                                       echo 'selected'; ?>>
                                    <?php echo $ram_computer_row['name']; ?>
                                </option>
                                <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="equipment_lampangcity" id="update_os">
                    <div class="title">แก้ไขระบบปฎิบัติการ</div>
                    <div class="column">
                        <div class="select-box">
                            <select class="form-select" id="microsoft_office" name="microsoft_office">
                                <option selected disabled>เลือก ไมโครซอฟท์ออฟฟิศ</option>
                                <?php
                                // ตรวจสอบว่ามีการเลือก ram_computer แล้วหรือยัง
                                if (!empty($row['ram_computer'])) {
                                    $microsoft_office_qry = mysqli_query($conn, "SELECT * FROM microsoft_offices WHERE ram_computer_id = {$row['ram_computer']}");
                                    while ($microsoft_office_row = mysqli_fetch_assoc($microsoft_office_qry)): ?>
                                <option value="<?php echo $microsoft_office_row['id']; ?>" <?php if ($microsoft_office_row['id'] == $row['microsoft_office'])
                                       echo 'selected'; ?>>
                                    <?php echo $microsoft_office_row['name']; ?>
                                </option>
                                <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>

                        <div class="input-field">
                            <input type="text" name="key_product_office" id="key_product_office"
                                value="<?php echo $row['key_product_office'] ?>" maxlength="29" required />
                            <label for="key_product_office">คีย์ไมโครซอฟท์ออฟฟิศ</label>
                        </div>

                        <div class="notification_message">
                            <p>
                                <span class="material-icons-sharp">error</span>
                                กรอกคีย์ผลิตภัณฑ์ไมโครซอฟท์ออฟฟิศ ตัวอย่าง X2YWD-NWJ42-3PGD6-M37DP-VFP9K.
                            </p>
                        </div>

                        <div class="select-box">
                            <select class="form-select" id="os_computer" name="os_computer">
                                <option selected disabled>เลือก ระบบปฏิบัติการ</option>
                                <?php
                                // ตรวจสอบว่ามีการเลือก microsoft_office แล้วหรือยัง
                                if (!empty($row['microsoft_office'])) {
                                    $os_computer_qry = mysqli_query($conn, "SELECT * FROM os_computers WHERE microsoft_office_id = {$row['microsoft_office']}");
                                    while ($os_computer_row = mysqli_fetch_assoc($os_computer_qry)): ?>
                                <option value="<?php echo $os_computer_row['id']; ?>" <?php if ($os_computer_row['id'] == $row['os_computer'])
                                       echo 'selected'; ?>>
                                    <?php echo $os_computer_row['name']; ?>
                                </option>
                                <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-field">
                            <input type="text" name="key_product_windows" id="key_product_windows"
                                value="<?php echo $row['key_product_windows'] ?>" maxlength="29" required />
                            <label for="first_name">คีย์ระบบปฏิบัติการ</label>
                        </div>
                    </div>

                    <div class="notification_message">
                        <p>
                            <span class="material-icons-sharp">error</span>
                            กรอกคีย์ผลิตภัณฑ์ระบบปฏิบัติการ ตัวอย่าง DPH2V-TTNVB-4X9Q3-TJR4H-KHJW.
                        </p>
                    </div>
                </div>

                <div class="equipment_lampangcity" id="update_status">
                    <div class="title">แก้ไขสถานะครุภัณฑ์</div>
                    <?php

                    include('../../../../system/database/DB_computer.php');


                    $status_equipment = "SELECT * FROM status_equipments";
                    $status_equipment_qry = mysqli_query($conn, $status_equipment);

                    ?>
                    <div class="column">
                        <div class="select-box">
                            <select class="select-box" id="status_equipment" name="status_equipment">
                                <option selected disabled>เลือกสถานะคอมพิวเตอร์</option>
                                <?php while ($status_equipment_row = mysqli_fetch_assoc($status_equipment_qry)): ?>
                                <option value="<?php echo $status_equipment_row['id']; ?>" <?php if ($status_equipment_row['id'] == $row['status_equipment'])
                                       echo 'selected'; ?>>
                                    <?php echo $status_equipment_row['name']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="department_lampangcity" id="update_department">
                    <div class="title">แก้ไขผู้ใช้</div>
                    <?php

                    include('../../../../system/database/DB_account.php');

                    $department = "SELECT * FROM departments";
                    $department_qry = mysqli_query($conn, $department);

                    ?>
                    <div class="column">
                        <div class="select-box">
                            <select class="select-box" id="department" name="department">
                                <option selected disabled>กอง/สำนัก</option>
                                <?php while ($department_row = mysqli_fetch_assoc($department_qry)): ?>
                                <option value="<?php echo $department_row['id']; ?>" <?php if ($department_row['id'] == $row['department'])
                                       echo 'selected'; ?>>
                                    <?php echo $department_row['name']; ?>
                                </option>
                                <?php endwhile; ?>
                            </select>
                        </div>
                        <div class="select-box">
                            <select class="form-select" id="segment" name='segment'>
                                <option selected disabled>ส่วน</option>
                                <?php
                                // ตรวจสอบว่ามีการเลือก department แล้วหรือยัง
                                if (!empty($row['department'])) {
                                    $segment_qry = mysqli_query($conn, "SELECT * FROM segments WHERE department_id = {$row['department']}");
                                    while ($segment_row = mysqli_fetch_assoc($segment_qry)): ?>
                                <option value="<?php echo $segment_row['id']; ?>" <?php if ($segment_row['id'] == $row['segment'])
                                       echo 'selected'; ?>>
                                    <?php echo $segment_row['name']; ?>
                                </option>
                                <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="select-box">
                            <select class="form-select" id="division" name='division'>
                                <option selected disabled>ฝ่าย</option>
                                <?php
                                // ตรวจสอบว่ามีการเลือก segment แล้วหรือยัง
                                if (!empty($row['segment'])) {
                                    $division_qry = mysqli_query($conn, "SELECT * FROM divisions WHERE segment_id = {$row['segment']}");
                                    while ($division_row = mysqli_fetch_assoc($division_qry)): ?>
                                <option value="<?php echo $division_row['id']; ?>" <?php if ($division_row['id'] == $row['division'])
                                       echo 'selected'; ?>>
                                    <?php echo $division_row['name']; ?>
                                </option>
                                <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                        <div class="select-box">
                            <select class="form-select" id="working" name='working'>
                                <option selected disabled>งาน</option>
                                <?php
                                // ตรวจสอบว่ามีการเลือก division แล้วหรือยัง
                                if (!empty($row['division'])) {
                                    $working_qry = mysqli_query($conn, "SELECT * FROM workings WHERE division_id = {$row['division']}");
                                    while ($working_row = mysqli_fetch_assoc($working_qry)): ?>
                                <option value="<?php echo $working_row['id']; ?>" <?php if ($working_row['id'] == $row['working'])
                                       echo 'selected'; ?>>
                                    <?php echo $working_row['name']; ?>
                                </option>
                                <?php endwhile;
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="title">แก้ไขผู้ใช้ครุภัณฑ์</div>
                <div class="equipment_lampangcity">
                    <div class="column">
                        <div class="input-field">
                            <input type="text" name="owner_computer" value="<?php echo $row['owner_computer'] ?>"
                                required />
                            <label for="first_name">ชื่อผู้ใช้งานครุภัณฑ์คอมพิวเตอร์</label>
                        </div>
                    </div>
                </div>

                <div class="notification_message">
                    <p>
                        <span class="material-icons-sharp">error</span>
                        กรอกชื่อเจ้าของครุภัณฑ์ ตัวอย่าง นางสาวรสิกา สุริยะกานต์.
                    </p>
                </div>

                <div class="wrapper">
                    <div class="btns">
                        <div class="update_page">
                            <div class="btn_update">
                                <button type="submit" name="submit">บันทึกข้อมูล</button>
                            </div>
                        </div>
                        <div class="back_page">
                            <div class="btn_back">
                                <a href="../Equip_computer.php">ย้อนกลับ</a>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
            </div>
            <!-- END OF EQUIPMENT MICRO COMPUTER -->

        </section>
        <!-- END OF MIDDLE -->

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>ระบบปฎิบัติการ</h2>
                    <a href="#">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../../../assets/images/windows 11.png">
                    <h4>Windows 11</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              os_computers.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              os_computers ON computer_lists.os_computer = os_computers.id
                          WHERE 
                              os_computers.name = 'WINDOWS 11'
                          GROUP BY 
                              os_computers.name
                      ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงวันที่ให้เป็นรูปแบบ 7 Nov, 2021
                                    $final_date = date('j M, Y', strtotime($latest_date));

                                    // แสดงผลใน <> tag
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>

                        </p>
                        <small class="text-muted">
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            os_computers.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            os_computers ON computer_lists.os_computer = os_computers.id
                        WHERE 
                            os_computers.name = 'WINDOWS 11'
                        GROUP BY 
                            os_computers.name
                    ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                    $final_date = date('g:ia', strtotime($latest_date));

                                    // แสดงผลเฉพาะเวลา
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>
                        </small>
                    </div>
                    <div class="bonds">
                        <?php
                        include('../../../../system/database/DB_computer.php');

                        $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN os_computers os ON cl.os_computer = os.id
                    WHERE os.name = 'WINDOWS 11'
                    AND cl.key_product_windows != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // If query fails, display error message
                            echo "Error: " . $conn->error;
                            $total_counts = 0;
                        } else {
                            // Check for results
                            if ($result->num_rows > 0) {
                                // Fetch the count
                                $row = $result->fetch_assoc();
                                $total_counts = $row['total'];
                            } else {
                                $total_counts = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <p><?php echo $total_counts; ?></p>
                        <small class="text-muted">Lice</small>
                    </div>

                    <div class="amount">
                        <?php
                        include('../../../../system/database/DB_computer.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN os_computers os ON cl.os_computer = os.id
            WHERE os.name = 'WINDOWS 11'
            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4>₵<?php echo $total_count; ?></h4>

                        <?php
                        include('../../../../system/database/DB_computer.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 11
                        $sql_date = "
    SELECT DATE(MAX(cl.created_at)) AS latest_date
    FROM computer_lists cl
    JOIN os_computers os ON cl.os_computer = os.id
    WHERE os.name = 'WINDOWS 11'
";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 11 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
        SELECT COUNT(*) AS total
        FROM computer_lists cl
        JOIN os_computers os ON cl.os_computer = os.id
        WHERE os.name = 'WINDOWS 11' AND DATE(cl.created_at) = '$latest_date'
    ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <small class="success">
                            +<?php echo $total_count; ?> Mc
                        </small>
                    </div>
                </div>
                <!-- END OF INVESTMENT -->

                <div class="investment">
                    <img src="../../../../assets/images/windows 10.png">
                    <h4>Windows 10</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              os_computers.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              os_computers ON computer_lists.os_computer = os_computers.id
                          WHERE 
                              os_computers.name = 'WINDOWS 10'
                          GROUP BY 
                              os_computers.name
                      ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงวันที่ให้เป็นรูปแบบ 7 Nov, 2021
                                    $final_date = date('j M, Y', strtotime($latest_date));

                                    // แสดงผลใน <> tag
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>

                        </p>
                        <small class="text-muted">
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            os_computers.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            os_computers ON computer_lists.os_computer = os_computers.id
                        WHERE 
                            os_computers.name = 'WINDOWS 10'
                        GROUP BY 
                            os_computers.name
                    ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                    $final_date = date('g:ia', strtotime($latest_date));

                                    // แสดงผลเฉพาะเวลา
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>
                        </small>
                    </div>
                    <div class="bonds">
                        <?php
                        include('../../../../system/database/DB_computer.php');

                        $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN os_computers os ON cl.os_computer = os.id
                    WHERE os.name = 'WINDOWS 10'
                    AND cl.key_product_windows != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // If query fails, display error message
                            echo "Error: " . $conn->error;
                            $total_counts = 0;
                        } else {
                            // Check for results
                            if ($result->num_rows > 0) {
                                // Fetch the count
                                $row = $result->fetch_assoc();
                                $total_counts = $row['total'];
                            } else {
                                $total_counts = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <p><?php echo $total_counts; ?></p>
                        <small class="text-muted">Lice</small>
                    </div>

                    <div class="amount">
                        <?php
                        include('../../../../system/database/DB_computer.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN os_computers os ON cl.os_computer = os.id
            WHERE os.name = 'WINDOWS 10'
            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4>₵<?php echo $total_count; ?></h4>

                        <?php
                        include('../../../../system/database/DB_computer.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 10
                        $sql_date = "
                  SELECT DATE(MAX(cl.created_at)) AS latest_date
                  FROM computer_lists cl
                  JOIN os_computers os ON cl.os_computer = os.id
                  WHERE os.name = 'WINDOWS 10'
              ";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 10 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN os_computers os ON cl.os_computer = os.id
                    WHERE os.name = 'WINDOWS 10' AND DATE(cl.created_at) = '$latest_date'
                ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <small class="danger">
                            +<?php echo $total_count; ?> Mc
                        </small>
                    </div>
                </div>
                <!-- END OF INVESTMENT -->

                <div class="investment">
                    <img src="../../../../assets/images/windows 7.png">
                    <h4>Windows 7</h4>
                    <div class="date-time">
                        <p>
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // สร้าง query
                            $sql = "
                          SELECT 
                              os_computers.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              os_computers ON computer_lists.os_computer = os_computers.id
                          WHERE 
                              os_computers.name = 'WINDOWS 7'
                          GROUP BY 
                              os_computers.name
                      ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงวันที่ให้เป็นรูปแบบ 7 Nov, 2021
                                    $final_date = date('j M, Y', strtotime($latest_date));

                                    // แสดงผลใน <> tag
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>

                        </p>
                        <small class="text-muted">
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // สร้าง query
                            $sql = "
                        SELECT 
                            os_computers.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            os_computers ON computer_lists.os_computer = os_computers.id
                        WHERE 
                            os_computers.name = 'WINDOWS 7'
                        GROUP BY 
                            os_computers.name
                    ";

                            // ดำเนินการ query
                            $result = mysqli_query($conn, $sql);

                            if ($result) {
                                // ดึงข้อมูล
                                $row = mysqli_fetch_assoc($result);
                                if ($row) {
                                    $latest_date = $row['latest_date'];

                                    // แปลงเวลาให้เป็นรูปแบบ 9:14pm
                                    $final_date = date('g:ia', strtotime($latest_date));

                                    // แสดงผลเฉพาะเวลา
                                    echo "$final_date";
                                } else {
                                    echo "ไม่พบข้อมูล.";
                                }
                            } else {
                                echo "เกิดข้อผิดพลาดในการ query: " . mysqli_error($conn);
                            }
                            ?>
                        </small>
                    </div>
                    <div class="bonds">
                        <?php
                        include('../../../../system/database/DB_computer.php');

                        $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN os_computers os ON cl.os_computer = os.id
                    WHERE os.name = 'WINDOWS 7'
                    AND cl.key_product_windows != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // If query fails, display error message
                            echo "Error: " . $conn->error;
                            $total_counts = 0;
                        } else {
                            // Check for results
                            if ($result->num_rows > 0) {
                                // Fetch the count
                                $row = $result->fetch_assoc();
                                $total_counts = $row['total'];
                            } else {
                                $total_counts = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <p><?php echo $total_counts; ?></p>
                        <small class="text-muted">Lice</small>
                    </div>

                    <div class="amount">
                        <?php
                        include('../../../../system/database/DB_computer.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN os_computers os ON cl.os_computer = os.id
            WHERE os.name = 'WINDOWS 7'
            ";
                        $result = $conn->query($sql);

                        if ($result === false) {
                            // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
                            echo "Error: " . $conn->error;
                            $total_count = 0;
                        } else {
                            // ตรวจสอบผลลัพธ์
                            if ($result->num_rows > 0) {
                                // ดึงข้อมูลออกมา
                                $row = $result->fetch_assoc();
                                $total_count = $row['total'];
                            } else {
                                $total_count = 0;
                            }
                        }

                        $conn->close();
                        ?>
                        <h4>₵<?php echo $total_count; ?></h4>

                        <?php
                        include('../../../../system/database/DB_computer.php');

                        // ดึงวันที่ล่าสุดของเฉพาะข้อมูล WINDOWS 7
                        $sql_date = "
    SELECT DATE(MAX(cl.created_at)) AS latest_date
    FROM computer_lists cl
    JOIN os_computers os ON cl.os_computer = os.id
    WHERE os.name = 'WINDOWS 7'
";
                        $result_date = $conn->query($sql_date);

                        if ($result_date === false) {
                            die("Error (Latest Date Query): " . $conn->error);
                        } else {
                            $row_date = $result_date->fetch_assoc();
                            $latest_date = $row_date['latest_date']; // รูปแบบเป็น YYYY-MM-DD
                        }

                        if ($latest_date) {
                            // นับจำนวนข้อมูล WINDOWS 7 ในวันที่ล่าสุดของเฉพาะ WINDOWS 10
                            $sql_count = "
        SELECT COUNT(*) AS total
        FROM computer_lists cl
        JOIN os_computers os ON cl.os_computer = os.id
        WHERE os.name = 'WINDOWS 7' AND DATE(cl.created_at) = '$latest_date'
    ";
                            $result_count = $conn->query($sql_count);

                            if ($result_count === false) {
                                die("Error (Count Query): " . $conn->error);
                            } else {
                                $row_count = $result_count->fetch_assoc();
                                $total_count = $row_count['total'];
                            }
                        } else {
                            $total_count = 0;
                        }

                        $conn->close();
                        ?>
                        <small class="success">
                            +<?php echo $total_count; ?> Mc
                        </small>
                    </div>
                </div>
                <!-------------- END OF INVESTMENT -------------->
            </div>
            <!-------------------- END OF INVESTMENTS -------------------->

            <div class="recent-transactions">
                <div class="header">
                    <h2>ครุภัณฑ์อิเล็กทรอนิกส์</h2>
                    <a href="#">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">
                                laptop_chromebook
                            </span>
                        </div>
                        <div class="details">
                            <h4>Computer</h4>
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            $sql = "SELECT created_at FROM computer_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p><?php echo $formattedDate; ?></p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM computer_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM computer_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p><?php echo $totalRows; ?> Mach</p>

                            <?php
                            include('../../../../system/database/DB_computer.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM computer_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted"><?php echo $formattedTime; ?></small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_computer.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM computer_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4><?php echo $totalRows; ?></h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">
                                screenshot_monitor
                            </span>
                        </div>
                        <div class="details">
                            <h4>Monitor</h4>
                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            $sql = "SELECT created_at FROM monitor_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM monitor_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM monitor_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_monitor.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM monitor_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_monitor.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM monitor_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">
                                tablet_mac
                            </span>
                        </div>
                        <div class="details">
                            <h4>Tablet</h4>
                            <?php
                            include('../../../../system/database/DB_tablet.php');

                            $sql = "SELECT created_at FROM tablet_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-dark">
                            <img src="../../../../assets/images/master_card.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_tablet.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM tablet_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM tablet_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_tablet.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM tablet_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_tablet.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM tablet_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">
                                print
                            </span>
                        </div>
                        <div class="details">
                            <h4>Printer</h4>

                            <?php
                            include('../../../../system/database/DB_printer.php');

                            $sql = "SELECT created_at FROM printer_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_printer.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM printer_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM printer_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_printer.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM printer_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_printer.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM printer_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">
                                document_scanner
                            </span>
                        </div>
                        <div class="details">
                            <h4>Scanner</h4>

                            <?php
                            include('../../../../system/database/DB_scanner.php');

                            $sql = "SELECT created_at FROM scanner_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">

                            <?php
                            include('../../../../system/database/DB_scanner.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM scanner_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM scanner_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_scanner.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM scanner_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_scanner.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM scanner_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">
                                charging_station
                            </span>
                        </div>
                        <div class="details">
                            <h4>UPS</h4>

                            <?php
                            include('../../../../system/database/DB_ups.php');

                            $sql = "SELECT created_at FROM ups_lists ORDER BY id DESC LIMIT 1"; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่ และ id ด้วยคอลัมน์ที่ใช้เป็น primary key
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                // รับค่าผลลัพธ์
                                $row = $result->fetch_assoc();
                                $latestDate = $row["created_at"]; // แทนที่ date_column ด้วยชื่อคอลัมน์ที่เก็บวันที่
                                // แปลงรูปแบบวันที่เป็นพุทธศักราช
                                $date = new DateTime($latestDate);
                                $year = $date->format('Y') + 543; // แปลงปีเป็นพุทธศักราช
                                $formattedDate = $date->format('d.m.') . $year;
                            } else {
                                $formattedDate = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $formattedDate; ?>
                            </p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="../../../../assets/images/visa.png">
                        </div>
                        <div class="details">
                            <?php
                            include('../../../../system/database/DB_ups.php');

                            // ดึงวันที่ล่าสุด
                            $sql_latest_date = "SELECT created_at FROM ups_lists ORDER BY id DESC LIMIT 1";
                            $result_latest_date = $conn->query($sql_latest_date);

                            if ($result_latest_date->num_rows > 0) {
                                $row_latest_date = $result_latest_date->fetch_assoc();
                                $latestDate = $row_latest_date["created_at"];
                                // แปลงวันที่ให้เป็นรูปแบบ Y-m-d เพื่อใช้ในคำสั่ง SQL
                                $latestDateFormatted = date("Y-m-d", strtotime($latestDate));

                                // นับจำนวนแถวที่มีวันที่เป็นวันที่ล่าสุด
                                $sql_count = "SELECT COUNT(*) as total FROM ups_lists WHERE DATE(created_at) = '$latestDateFormatted'";
                                $result_count = $conn->query($sql_count);

                                if ($result_count->num_rows > 0) {
                                    $row_count = $result_count->fetch_assoc();
                                    $totalRows = $row_count["total"];
                                } else {
                                    $totalRows = 0;
                                }
                            } else {
                                $totalRows = 0;
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <p>
                                <?php echo $totalRows; ?> Mach
                            </p>

                            <?php
                            include('../../../../system/database/DB_ups.php');

                            // ดึงข้อมูลเวลาจากฐานข้อมูล
                            $sql = "SELECT created_at FROM ups_lists ORDER BY id DESC LIMIT 1";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                $row = $result->fetch_assoc();
                                $createdAt = $row["created_at"];

                                // แปลงเวลาให้เป็นรูปแบบ 12 ชั่วโมงพร้อม am/pm
                                $formattedTime = date('g:iA', strtotime($createdAt));
                                $formattedTime = strtolower($formattedTime); // แปลง AM/PM ให้เป็น am/pm
                            } else {
                                $formattedTime = "ไม่มีข้อมูล";
                            }

                            // ปิดการเชื่อมต่อ
                            $conn->close();
                            ?>
                            <small class="text-muted">
                                <?php echo $formattedTime; ?>
                            </small>
                        </div>
                    </div>

                    <?php
                    include('../../../../system/database/DB_ups.php');
                    // การนับจำนวนแถวในตาราง
                    $sql = "SELECT COUNT(*) as total FROM ups_lists";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // รับค่าผลลัพธ์
                        $row = $result->fetch_assoc();
                        $totalRows = $row["total"];
                    } else {
                        $totalRows = 0;
                    }

                    // ปิดการเชื่อมต่อ
                    $conn->close();
                    ?>
                    <h4>
                        <?php echo $totalRows; ?>
                    </h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->
            </div>
            <!-------------------------- END OF TRANSACTIONS -------------------------->
        </section>
        <!---------------------------------------- END OF RIGHT ---------------------------------------->
    </main>
    <!--================================== END OF ASIDE ==================================-->

    <script src="../../../../assets/js/serial_number.js"></script>
    <script src="../../../../assets/js/computer/speed_cpu.js"></script>
    <script src="../../../../assets/js/computer/key_product_office.js"></script>
    <script src="../../../../assets/js/computer/key_product_windows.js"></script>


    <script src="../../../../assets/js/computer/db_computer.js"></script>

    <script src="../../../../assets/js/connect_list.js"></script>




</body>

</html>