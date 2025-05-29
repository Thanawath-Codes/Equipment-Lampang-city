<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Add Equipment Computer.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../../../assets/css/add_equipment.css">
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
                    <h5>USERS</h5>
                    <a href="../account/Profile.php">
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
                <a href="../account/Profile.php">
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

            <div class="add_equipment_lampangcity">
                <div class="title">เพิ่มครุภัณฑ์</div>
                <div class="content">
                    <form action="../../../../system/libraries/insert_computer.php" method="post">
                        <div class="equipment_lampangcity">
                            <div class="column">
                                <div class="input-field">
                                    <input type="text" name="serial_number" id="serial_number" maxlength="11" required>
                                    <label for="first_name">เลขครุภัณฑ์ภัณฑ์คอมพิวเตอร์</label>
                                </div>
                            </div>
                        </div>

                        <div class="notification_message">
                            <p>
                                <span class="material-icons-sharp">error</span>
                                กรอกเลขครุภัณฑ์ภัณฑ์คอมพิวเตอร์ ตัวอย่าง 512-67-1943.
                            </p>
                        </div>

                        <div class="equipment_lampangcity">
                            <div class="column">
                                <div class="select-box">
                                    <select class="form-select" id="year_equipment" name="year_equipment">
                                        <option selected disabled>ปีงบประมาณ</option>
                                    </select>
                                </div>

                                <?php

                                include('../../../../system/database/DB_computer.php');

                                $computer_type = "SELECT * FROM computer_types";
                                $computer_type_qry = mysqli_query($conn, $computer_type);

                                ?>

                                <div class="select-box">
                                    <select class="form-select" id="computer_type" name="computer_type">
                                        <option selected disabled>เลือก อุปกรณ์</option>
                                        <?php while ($row = mysqli_fetch_assoc($computer_type_qry)): ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="computer_case" name="computer_case">
                                        <option selected disabled>เลือก เคสคอมพิวเตอร์</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="computer_model" name="computer_model">
                                        <option selected disabled>เลือก รุ่น/โมเดล</option>
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
                                        <?php while ($row = mysqli_fetch_assoc($brand_cpu_qry)): ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="spec_cpu" name="spec_cpu">
                                        <option selected disabled>เลือก สเปคชิปคอมพิวเตอร์</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="equipment_lampangcity">
                            <div class="column">
                                <div class="input-field">
                                    <input type="text" name="speed_cpu" id="speed_cpu" maxlength="4" required />
                                    <label for="first_name">ความเร็วชิปคอมพิวเตอร์</label>
                                </div>
                            </div>
                        </div>

                        <?php

                        include('../../../../system/database/DB_computer.php');

                        $storage_device = "SELECT * FROM storage_devices";
                        $storage_device_qry = mysqli_query($conn, $storage_device);

                        ?>

                        <div class="equipment_lampangcity">
                            <div class="column">
                                <div class="select-box">
                                    <select class="form-select" id="storage_device" name="storage_device">
                                        <option selected disabled>เลือก อุปกรณ์จัดเก็บข้อมูล</option>
                                        <?php while ($row = mysqli_fetch_assoc($storage_device_qry)): ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="storage_spec" name="storage_spec">
                                        <option selected disabled>เลือก พื้นที่จัดเก็บข้อมูล</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="ram_computer" name="ram_computer">
                                        <option selected disabled>เลือก แรมคอมพิวเตอร์</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="title">เพิ่มระบบปฎิบัติการ</div>
                        <div class="equipment_lampangcity">
                            <div class="column">
                                <div class="select-box">
                                    <select class="form-select" id="microsoft_office" name="microsoft_office">
                                        <option selected disabled>เลือก ไมโครซอฟท์ออฟฟิศ</option>
                                    </select>
                                </div>
                                <div class="input-field">
                                    <input type="text" name="key_product_office" id="key_product_office" maxlength="29"
                                        placeholder="กรอกคีย์ผลิตภัณฑ์ไมโครซอฟท์ออฟฟิศ" required />
                                    <label for="key_product_office">คีย์ผลิตภัณฑ์ไมโครซอฟท์ออฟฟิศ</label>
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
                                    </select>
                                </div>
                                <div class="input-field">
                                    <input type="text" name="key_product_windows" id="key_product_windows" maxlength="29"
                                        placeholder="กรอกคีย์ผลิตภัณฑ์ระบบปฏิบัติการ" required />
                                    <label for="first_name">คีย์ผลิตภัณฑ์ระบบปฏิบัติการ</label>
                                </div>
                            </div>
                        </div>

                        <div class="notification_message">
                            <p>
                                <span class="material-icons-sharp">error</span>
                                กรอกคีย์ผลิตภัณฑ์ระบบปฏิบัติการ ตัวอย่าง DPH2V-TTNVB-4X9Q3-TJR4H-KHJW.
                            </p>
                        </div>
                        <br>
                        <div class="title">เพิ่มสถานะครุภัณฑ์</div>
                        <div class="equipment_lampangcity">
                            <?php

                            include('../../../../system/database/DB_computer.php');


                            $status_equipment = "SELECT * FROM status_equipments";
                            $status_equipment_qry = mysqli_query($conn, $status_equipment);

                            ?>
                            <div class="column">
                                <div class="select-box">
                                    <select class="select-box" id="status_equipment" name="status_equipment">
                                        <option selected disabled>เลือกสถานะคอมพิวเตอร์</option>
                                        <?php while ($row = mysqli_fetch_assoc($status_equipment_qry)): ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="title">เพิ่มสถานะผู้ใช้</div>

                        <div class="department_lampangcity">
                            <?php

                            include('../../../../system/database/DB_computer.php');

                            $department = "SELECT * FROM departments";
                            $department_qry = mysqli_query($conn, $department);

                            ?>
                            <div class="column">
                                <div class="select-box">
                                    <select class="select-box" id="department" name="department">
                                        <option selected disabled>กอง/สำนัก</option>
                                        <?php while ($row = mysqli_fetch_assoc($department_qry)): ?>
                                        <option value="<?php echo $row['id']; ?>">
                                            <?php echo $row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="segment" name='segment'>
                                        <option selected disabled>ส่วน</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="division" name='division'>
                                        <option selected disabled>ฝ่าย</option>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="working" name='working'>
                                        <option selected disabled>งาน</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="title">เพิ่มผู้ใช้งานครุภัณฑ์</div>
                        <div class="equipment_lampangcity">
                            <div class="column">
                                <div class="input-field">
                                    <input type="text" name="owner_computer" required />
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
            <a href="../search/Search_monitor.php">เพิ่มเติม<span class="material-icons-sharp">
                chevron_right
              </span></a>
          </div>

          <div class="investment">
            <img src="../../../../assets/images/windows 11.png">
            <h4>Windows 7</h4>
            <div class="date-time">
              <p>Pro</p>
              <small class="text-muted">
                OS Windows
              </small>
            </div>
            <div class="bonds">
              <p>Lice</p>
              <small class="text-muted">Standard</small>
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
            </div>
          </div>
          <!-- END OF INVESTMENT -->

          <div class="investment">
            <img src="../../../../assets/images/windows 10.png">
            <h4>Windows 10</h4>
            <div class="date-time">
              <p>
               Pro
              </p>
              <small class="text-muted">
                OS Windows 
              </small>
            </div>
            <div class="bonds">
              <p>Lice</p>
              <small class="text-muted">Standard</small>
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

            </div>
          </div>
          <!-- END OF INVESTMENT -->

          <div class="investment">
            <img src="../../../../assets/images/windows 7.png">
            <h4>Windows 7</h4>
            <div class="date-time">
              <p>
              Ultimate
              </p>
              <small class="text-muted">
                OS Windows 
              </small>
            </div>
            <div class="bonds">
              <p>Lice</p>
              <small class="text-muted">Standard</small>
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

              
            </div>
          </div>
          <!-------------- END OF INVESTMENT -------------->
        </div>
        <!-------------------- END OF INVESTMENTS -------------------->

        <div class="recent-transactions">
          <div class="header">
            <h2>ครุภัณฑ์อิเล็กทรอนิกส์</h2>
            <a href="../Dashboard.php">เพิ่มเติม<span class="material-icons-sharp">
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
                <p>Lampang city</p>
              </div>
            </div>
            <div class="card-details">
              <div class="card bg-danger">
                <img src="../../../../assets/images/visa.png">
              </div>
              <div class="details">                
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
              <p>
                Lampang city
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-primary">
              <img src="../../../../assets/images/visa.png">
            </div>
            <div class="details">
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
              <p>
                Lampang city 
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-dark">
              <img src="../../../../assets/images/master_card.png">
            </div>
            <div class="details">
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
              <p>
                Lampang city 
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-danger">
              <img src="../../../../assets/images/visa.png">
            </div>
            <div class="details">
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
              <p>
                Lampang city 
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-primary">
              <img src="../../../../assets/images/visa.png">
            </div>
            <div class="details">
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

              
              <p>
                Lampang city 
              </p>
            </div>
          </div>
          <div class="card-details">
            <div class="card bg-primary">
              <img src="../../../../assets/images/visa.png">
            </div>
            <div class="details">
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
    <script src="../../../../assets/js/year_equipment.js"></script>
    <script src="../../../../assets/js/computer/speed_cpu.js"></script>
    <script src="../../../../assets/js/computer/key_product_office.js"></script>
    <script src="../../../../assets/js/computer/key_product_windows.js"></script>

    <script src="../../../../assets/js/connect_list.js"></script>

    <script src="../../../../assets/js/computer/db_computer.js"></script>



</body>

</html>