<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Equipment Tablet.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../../assets/css/equip_tablet.css">

    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <nav>
        <div class="container">
            <img src="../../../assets/images/logo.png" class="logo">
            <div class="search-bar">
                <span class="material-icons-sharp">search</span>
                <a href="search/Search_tablet.php">ค้นหา...</a>
            </div>
            <div class="profile-area">
            <div class="theme-btn">
                    <span class="material-icons-sharp active">light_mode</span>
                    <p>.USER</p>
                </div>
                <div class="profile">
                    <div class="profile-photo">
                        <img src="../../../assets/images/profiled.png">
                    </div>
                    <h5>
                        <!--Firstname & Lastname-->
                        <?php

                        if (!isset($_SESSION['userid'])) {
                            header("Location: ../Auth.php");
                            exit();
                        }

                        // ตรวจสอบบทบาทของผู้ใช้
                        if ($_SESSION['urole'] == '1' || $_SESSION['urole'] == '2') {
                            include('../../../system/database/DB_account.php');

                            // คำสั่ง SQL ในการดึงข้อมูล first_name และ last_name ของผู้ใช้ที่ล็อกอินอยู่
                            $username = $_SESSION['username'];
                            $sql = "SELECT first_name, last_name FROM user WHERE username = '$username'";

                            $result = $conn->query($sql);

                            // ตรวจสอบว่า query สำเร็จหรือไม่
                            if ($result === false) {
                                echo "Error: " . $conn->error; // แสดงข้อผิดพลาดถ้าเกิดขึ้น
                            } else {
                                // ตรวจสอบว่ามีข้อมูลที่ได้จากการคิวรี่หรือไม่
                                if ($result->num_rows > 0) {
                                    // ดึงข้อมูล first_name และ last_name จากแถวแรก
                                    $row = $result->fetch_assoc();
                                    // แสดงข้อมูล first_name และ last_name ในแท็ก <p>
                                    echo "<p>" . $row['first_name'] . " " . $row['last_name'] . "</p>";
                                } else {
                                    echo "Name not found";
                                }
                            }

                            // ปิดการเชื่อมต่อกับฐานข้อมูล
                            $conn->close();
                        }
                        ?>
                    </h5>
                      <a href="account/Profile.php">
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
                <a href="Dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>แผงควบคุม</h4>
                </a>
                <a href="Equip_tablet.php">
                    <span class="material-icons-sharp primary">
                        tablet_mac
                    </span>
                    <h4>แท็บเล็ต</h4>
                </a>
                <a href="Equip_computer.php">
                    <span class="material-icons-sharp">
                        screenshot_monitor
                    </span>
                    <h4>คอมพิวเตอร์</h4>
                </a>
                <a href="Equip_monitor.php">
                    <span class="material-icons-sharp">
                        laptop_chromebook
                    </span>
                    <h4>จอคอมพิวเตอร์</h4>
                </a>
                <a href="Equip_printer.php">
                    <span class="material-icons-sharp">
                        print
                    </span>
                    <h4>ปริ้นเตอร์</h4>
                </a>
                <a href="Equip_scanner.php">
                    <span class="material-icons-sharp">
                        document_scanner
                    </span>
                    <h4>สแกนเนอร์</h4>
                </a>
                <a href="Equip_ups.php">
                    <span class="material-icons-sharp">
                        charging_station
                    </span>
                    <h4>เครื่องสำรองไฟ</h4>
                </a>
                <a href="account/Profile.php">
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
                <a href="#">EQUIP Version 1.8.15</a>
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->
        <section class="middle">
            <div class="header">
                <h1>ครุภัณฑ์แทบเล็ต</h1>
            </div>
            <div class="wrapper">
                <div class="btns">
                    <a href="../user/add/Add_tablet.php">เพิ่มข้อมูลผู้ใช้งาน</a>
                    <a href="../../../system/database/download/export_tablet.php">ดาวน์โหลดข้อมูลครุภัณฑ์</a>
                </div>
            </div>
            <div class="content_wrapper">
                <div id="tablet_list_container" class="data_equipment_tablet">
                    <div class="table_equipment_tablet">
                        <table>
                            <thead>
                                <tr>
                                    <th>ลำดับ</th>
                                    <th>เลขครุภัณฑ์</th>
                                    <th>ปีงบประมาณ</th>
                                    <th>แบรนด์</th>
                                    <th>รุ่น/โมเดล</th>
                                    <th>รหัสประจำเครื่อง</th>
                                    <th>ซีพียู</th>
                                    <th>ความเร็ว</th>
                                    <th>แรม</th>
                                    <th>รอม</th>
                                    <th>ระบบปฏิบัติการ</th>
                                    <th>สถานะครุภัณฑ์</th>
                                    <th>กอง/สำนัก</th>
                                    <th>ส่วน</th>
                                    <th>ฝ่าย</th>
                                    <th>งาน</th>
                                    <th>ผู้ใช้งานครุภัณฑ์</th>
                                    <th>วันที่และเวลา</th>
                                    <th>แก้ไข</th>
                                    <th>ลบ</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div id="loading" style="display:none;">กำลังโหลด...</div>
        </section>

        <script>
            let start = 0;
            const limit = 10;
            const container = document.querySelector('#tablet_list_container tbody');
            const loading = document.getElementById('loading');
            let isLoading = false;

            function loadMoreData() {
                if (isLoading) return;
                isLoading = true;
                loading.style.display = 'block';
                const xhr = new XMLHttpRequest();
                xhr.open('GET', `../../config/load/conn_tablet.php?start=${start}&limit=${limit}`, true);
                xhr.onload = function () {
                    if (this.status === 200) {
                        console.log(this.responseText); // เพิ่มการดีบัก
                        const data = JSON.parse(this.responseText);
                        if (data.length > 0) {
                            data.forEach(item => {
                                const tr = document.createElement('tr');
                                tr.innerHTML = `
                            <td>${item.id}</td>
                            <td class="serial_number">${item.serial_number}</td>
                            <td class="year_equipment">${item.year_equipment}</td>
                            <td class="tablet_brand">${item.tablet_brand_name}</td>
                            <td class="tablet_model">${item.tablet_model_name}</td>
                            <td class="imei_number">${item.imei_number}</td>
                            <td class="tablet_cpu">${item.tablet_cpu_name}</td>
                            <td class="tablet_speed">${item.tablet_speed_name}</td>
                            <td class="tablet_ram">${item.tablet_ram_name}</td>
                            <td class="tablet_rom">${item.tablet_rom_name}</td>
                            <td class="os_tablet">${item.os_tablet_name}</td>
                            <td class="status_equipment">${item.status_equipment_name}</td>
                            <td class="department">${item.department_name}</td>
                            <td class="segment">${item.segment_name}</td>
                            <td class="division">${item.division_name}</td>
                            <td class="working">${item.working_name}</td>
                            <td class="owner_tablet">${item.owner_tablet}</td>
                            <td class="created_at">${item.created_at}</td>
                        <td>
                            <td>
                                <a href="update/Update_tablet.php?id=${item.id}">
                                    <span class="material-icons-sharp">drive_file_rename_outline</span>
                                </a>
                            </td>
                            <td>
                                <a href="../../../system/libraries/delete_tablet.php?id=${item.id}">
                                    <span class="material-icons-sharp">delete_forever</span>
                                </a>
                            </td>`;
                                container.appendChild(tr);
                            });
                            start += limit;
                            loading.style.display = 'none';
                            isLoading = false;
                        } else {
                            loading.innerHTML = 'ไม่มีข้อมูลเพิ่มเติม';
                        }
                    } else {
                        loading.innerHTML = 'เกิดข้อผิดพลาดในการโหลดข้อมูล';
                        isLoading = false;
                    }
                };
                xhr.onerror = function () {
                    loading.innerHTML = 'เกิดข้อผิดพลาดในการโหลดข้อมูล';
                    isLoading = false;
                };
                xhr.send();
            }

            document.querySelector('#tablet_list_container').addEventListener('scroll', () => {
                const containerElement = document.querySelector('#tablet_list_container');
                if (containerElement.scrollTop + containerElement.clientHeight >= containerElement.scrollHeight - 10) {
                    loadMoreData();
                }
            });

            document.addEventListener('DOMContentLoaded', () => {
                loadMoreData();
            });
        </script>



        <!-- END OF MIDDLE -->
        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>แบรนด์แทบเล็ต</h2>
                    <a href="search/Search_tablet.php">เพิ่มเติม <span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../../assets/images/icon-samsung.svg">
                    <h4>Samsung</h4>
                    <div class="date-time">
                        <p>
                            Tablet
                        </p>
                        <small class="text-muted">
                            Lampang city
                        </small>
                    </div>
                    <div class="bonds">
                        <p>Android</p>
                        <small class="text-muted">OS Tablet</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../../system/database/DB_tablet.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM tablet_lists tl
            JOIN os_tablets os ON tl.os_tablet = os.id
            WHERE os.name = 'Android'
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
                <img src="../../../assets/images/icon-apple.svg">
                    <h4>Apple</h4>
                          <div class="date-time">
                        <p>
                            Tablet
                        </p>
                        <small class="text-muted">
                            Lampang city
                        </small>
                    </div>
                    <div class="bonds">
                        <p>IOS</p>
                        <small class="text-muted">OS Tablet</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../../system/database/DB_tablet.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM tablet_lists tl
            JOIN os_tablets os ON tl.os_tablet = os.id
            WHERE os.name = 'IOS'
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
            <a href="Dashboard.php">เพิ่มเติม<span class="material-icons-sharp">
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
                <img src="../../../assets/images/visa.png">
              </div>
              <div class="details">                
              </div>
            </div>

            <?php
            include('../../../system/database/DB_computer.php');
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
              <img src="../../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../../system/database/DB_monitor.php');
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
              <img src="../../../assets/images/master_card.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../../system/database/DB_tablet.php');
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
              <img src="../../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../../system/database/DB_printer.php');
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
              <img src="../../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../../system/database/DB_scanner.php');
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
              <img src="../../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../../system/database/DB_ups.php');
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

    <script src="../../../assets/js/btn_wrapper.js"></script>


</body>

</html>