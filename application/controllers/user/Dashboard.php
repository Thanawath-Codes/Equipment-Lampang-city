<?php

session_start();

if (!$_SESSION['userid']) {
  header("Location: ../Auth.php");
  exit();
} else {

  ?>


  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Dashboard Equipment.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>

   




    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../../assets/css/dashboard.css">
  </head>

  <body>
    <nav>
      <div class="container">
        <img src="../../../assets/images/logo.png" class="logo">
        <div class="search-bar">
                <span class="material-icons-sharp">search</span>
                <a href="search/Search_computer.php">ค้นหา...</a>
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
                    $row_name = $result->fetch_assoc();
                    // แสดงข้อมูล first_name และ last_name ในแท็ก <p>
                    echo "<p>" . $row_name['first_name'] . " " . $row_name['last_name'] . "</p>";
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
          <a href="#" class="active">
            <span class="material-icons-sharp">dashboard</span>
            <h4>แผงควบคุม</h4>
          </a>
          <a href="Equip_computer.php">
            <span class="material-icons-sharp">payment</span>
            <h4>เพิ่มครุภัณฑ์</h4>
          </a>
          <a href="#">
            <span class="material-icons-sharp">help_center</span>
            <h4>ศูนย์ช่วยเหลือ</h4>
          </a>
          <a href="../user/account/Profile.php">
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
          <a href="#">EQUIP Version 1.8.66</a>
        </div>
      </aside>
      <!------------------- END OF ASIDE ------------------->
    <section class="middle">
      <div class="header">
        <h1>ครุภัณฑ์คอมพิวเตอร์</h1>
      </div>

      <div class="cards">
        <div class="card">
          <div class="top">
            <div class="left">
              <img src="../../../assets/images/BTC.png">
              <h2>กำลังใช้งาน</h2>
            </div>
            <img src="../../../assets/images/visa.png" class="right">
          </div>

          <?php
          include('../../../system/database/DB_computer.php');

          $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN status_equipments st ON cl.status_equipment = st.id
            WHERE st.name = 'กำลังใช้งาน'
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

          <div class="middle">
            <h1>₵
              <?php echo $total_count; ?>
            </h1>
            <img src="../../../assets/images/card_chip.png" class="chip">
          </div>
          <div class="bottom">
            <div class="left">
              <small>Computer</small>
              <h5>LAMPANG CITY</h5>
            </div>
            <div class="right">
              <div class="expiry">
                <small>Explore</small>
                <h5>03/24</h5>
              </div>
              <div class="cvv">
                <small>SDAB</small>
                <h5>7418</h5>
              </div>
            </div>
          </div>
        </div>
        <!-- END OF CARD 1 -->

          <div class="card">
            <div class="top">
              <div class="left">
                <img src="../../../assets/images/ETH.png">
                <h2>ชำรุด/ซ่อมแซม</h2>
              </div>
              <img src="../../../assets/images/master_card.png" class="right">
            </div>

            <?php
            include('../../../system/database/DB_computer.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN status_equipments st ON cl.status_equipment = st.id
            WHERE st.name = 'ชำรุด/กำลังซ่อมแซม'
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

            <div class="middle">
              <h1>₵
                <?php echo $total_count; ?>
              </h1>
              <img src="../../../assets/images/card_chip.png" class="chip">
            </div>
            <div class="bottom">
              <div class="left">
                <small>Computer</small>
                <h5>LAMPANG CITY</h5>
              </div>
              <div class="right">
                <div class="expiry">
                  <small>Explore</small>
                  <h5>08/24</h5>
                </div>
                <div class="cvv">
                  <small>SDAB</small>
                  <h5>7419</h5>
                </div>
              </div>
            </div>
          </div>
          <!-- END OF CARD 2 -->

          <div class="card">
            <div class="top">
              <div class="left">
                <img src="../../../assets/images/BTC.png">
                <h2>โอนย้าย</h2>
              </div>
              <img src="../../../assets/images/visa.png" class="right">
            </div>

            <?php
            include('../../../system/database/DB_computer.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN status_equipments st ON cl.status_equipment = st.id
            WHERE st.name = 'โอนย้าย'
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

            <div class="middle">
              <h1>₵
                <?php echo $total_count; ?>
              </h1>
              <img src="../../../assets/images/card_chip.png" class="chip">
            </div>
            <div class="bottom">
              <div class="left">
                <small>Computer</small>
                <h5>LAMPANG CITY</h5>
              </div>
              <div class="right">
                <div class="expiry">
                  <small>Explore</small>
                  <h5>02/24</h5>
                </div>
                <div class="cvv">
                  <small>SDAB</small>
                  <h5>5555</h5>
                </div>
              </div>
            </div>
          </div>
          <!-- END OF CARD 3 -->
        </div>
        <!-- END OF CARDS -->

        <div class="monthly-report">
          <div class="report">
            <h3>Computer</h3>
            <div>
              <details>
                <?php
                include('../../../system/database/DB_computer.php');

                // ค้นหาปีล่าสุดใน year_equipment
                $sql = "SELECT MAX(year_equipment) as latest_year FROM computer_lists";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $latestYear = $row['latest_year'];
                } else {
                  $latestYear = null;
                }

                // ถ้าพบปีล่าสุด
                if ($latestYear) {
                  // นับจำนวนรายการที่ตรงกับปีล่าสุด
                  $sql = "SELECT COUNT(*) as total FROM computer_lists WHERE year_equipment = '$latestYear'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalRows = $row["total"];
                  } else {
                    $totalRows = 0;
                  }
                } else {
                  $totalRows = 0;
                }

                // ปิดการเชื่อมต่อ
                $conn->close();
                ?>
                <h1>₵<?php echo $totalRows; ?></h1>
                <h6 class="success">ประจำปีงบประมาณ <?php echo $latestYear; ?></h6>
              </details>
              <p class="text-muted">ครุภัณฑ์คอมพิวเตอร์ของเทศบาลนครลำปาง</p>
            </div>
          </div>
          <!-- END OF INCOME REPORT -->

          <div class="report">
            <h3>Printer</h3>
            <div>
              <details>
                <?php
                include('../../../system/database/DB_Printer.php');

                // ค้นหาปีล่าสุดใน year_equipment
                $sql = "SELECT MAX(year_equipment) as latest_year FROM printer_lists";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $latestYear = $row['latest_year'];
                } else {
                  $latestYear = null;
                }

                // ถ้าพบปีล่าสุด
                if ($latestYear) {
                  // นับจำนวนรายการที่ตรงกับปีล่าสุด
                  $sql = "SELECT COUNT(*) as total FROM printer_lists WHERE year_equipment = '$latestYear'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalRows = $row["total"];
                  } else {
                    $totalRows = 0;
                  }
                } else {
                  $totalRows = 0;
                }

                // ปิดการเชื่อมต่อ
                $conn->close();
                ?>
                <h1>₵<?php echo $totalRows; ?></h1>
                <h6 class="danger">ประจำปีงบประมาณ <?php echo $latestYear; ?></h6>
              </details>
              <p class="text-muted">ครุภัณฑ์ปริ้นเตอร์ของเทศบาลนครลำปาง</p>
            </div>
          </div>
          <!-- END OF EXPENSES REPORT -->

          <div class="report">
            <h3>Monitor</h3>
            <div>
              <details>
                <?php
                include('../../../system/database/DB_monitor.php');

                // ค้นหาปีล่าสุดใน year_equipment
                $sql = "SELECT MAX(year_equipment) as latest_year FROM monitor_lists";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $latestYear = $row['latest_year'];
                } else {
                  $latestYear = null;
                }

                // ถ้าพบปีล่าสุด
                if ($latestYear) {
                  // นับจำนวนรายการที่ตรงกับปีล่าสุด
                  $sql = "SELECT COUNT(*) as total FROM monitor_lists WHERE year_equipment = '$latestYear'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalRows = $row["total"];
                  } else {
                    $totalRows = 0;
                  }
                } else {
                  $totalRows = 0;
                }

                // ปิดการเชื่อมต่อ
                $conn->close();
                ?>
                <h1>₵<?php echo $totalRows; ?></h1>
                <h6 class="success">ประจำปีงบประมาณ <?php echo $latestYear; ?></h6>
              </details>
              <p class="text-muted">ครุภัณฑ์จอคอมพิวเตอร์ของเทศบาลนครลำปาง</p>
            </div>
          </div>
          <!-- END OF CASHBACK REPORT -->

          <div class="report">
            <h3>UPS</h3>
            <div>
              <details>
                <?php
                include('../../../system/database/DB_ups.php');

                // ค้นหาปีล่าสุดใน year_equipment
                $sql = "SELECT MAX(year_equipment) as latest_year FROM ups_lists";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $latestYear = $row['latest_year'];
                } else {
                  $latestYear = null;
                }

                // ถ้าพบปีล่าสุด
                if ($latestYear) {
                  // นับจำนวนรายการที่ตรงกับปีล่าสุด
                  $sql = "SELECT COUNT(*) as total FROM ups_lists WHERE year_equipment = '$latestYear'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalRows = $row["total"];
                  } else {
                    $totalRows = 0;
                  }
                } else {
                  $totalRows = 0;
                }

                // ปิดการเชื่อมต่อ
                $conn->close();
                ?>
                <h1>₵<?php echo $totalRows; ?></h1>
                <h6 class="danger">ประจำปีงบประมาณ <?php echo $latestYear; ?></h6>
              </details>
              <p class="text-muted">ครุภัณฑ์เครื่องสำรองไฟของเทศบาลนครลำปาง</p>
            </div>
          </div>
          <!-- END OF TRUNOVER REPORT -->

          <div class="report">
            <h3>Tablet</h3>
            <div>
              <details>
                <?php
                include('../../../system/database/DB_tablet.php');

                // ค้นหาปีล่าสุดใน year_equipment
                $sql = "SELECT MAX(year_equipment) as latest_year FROM tablet_lists";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $latestYear = $row['latest_year'];
                } else {
                  $latestYear = null;
                }

                // ถ้าพบปีล่าสุด
                if ($latestYear) {
                  // นับจำนวนรายการที่ตรงกับปีล่าสุด
                  $sql = "SELECT COUNT(*) as total FROM tablet_lists WHERE year_equipment = '$latestYear'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalRows = $row["total"];
                  } else {
                    $totalRows = 0;
                  }
                } else {
                  $totalRows = 0;
                }

                // ปิดการเชื่อมต่อ
                $conn->close();
                ?>
                <h1>₵<?php echo $totalRows; ?></h1>
                <h6 class="success">ประจำปีงบประมาณ <?php echo $latestYear; ?></h6>
              </details>
              <p class="text-muted">ครุภัณฑ์แท็บเล็ตของเทศบาลนครลำปาง</p>
            </div>
          </div>
          <!-- END OF TRUNOVER REPORT -->

          <div class="report">
            <h3>Scanner</h3>
            <div>
              <details>
                <?php
                include('../../../system/database/DB_scanner.php');

                // ค้นหาปีล่าสุดใน year_equipment
                $sql = "SELECT MAX(year_equipment) as latest_year FROM scanner_lists";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                  $row = $result->fetch_assoc();
                  $latestYear = $row['latest_year'];
                } else {
                  $latestYear = null;
                }

                // ถ้าพบปีล่าสุด
                if ($latestYear) {
                  // นับจำนวนรายการที่ตรงกับปีล่าสุด
                  $sql = "SELECT COUNT(*) as total FROM scanner_lists WHERE year_equipment = '$latestYear'";
                  $result = $conn->query($sql);

                  if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $totalRows = $row["total"];
                  } else {
                    $totalRows = 0;
                  }
                } else {
                  $totalRows = 0;
                }

                // ปิดการเชื่อมต่อ
                $conn->close();
                ?>
                <h1>₵<?php echo $totalRows; ?></h1>
                <h6 class="danger">ประจำปีงบประมาณ <?php echo $latestYear; ?></h6>
              </details>
              <p class="text-muted">ครุภัณฑ์สแกนเนอร์ของเทศบาลนครลำปาง</p>
            </div>
          </div>
          <!-- END OF TRUNOVER REPORT -->


        </div>
        <!-- END OF MONTLY REPORT -->

        <div class="fast-payment">
          <h2>
            หน่วยงานภายใน</h2>
          <div class="badges">
            <div class="badge">
              <span class="material-icons-sharp">
                add
              </span>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'สำนักปลัดเทศบาล'
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

            <div class="badge">
              <span class="bg-primary"></span>
              <div>
                <h5>สำนักปลัดเทศบาล</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'สำนักการศึกษา'
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

            <div class="badge">
              <span class="bg-primary"></span>
              <div>
                <h5>สำนักการศึกษา</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'กองคลัง'
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

            <div class="badge">
              <span class="bg-success"></span>
              <div>
                <h5>กองคลัง</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'กองสาธารณสุขและสิ่งแวดล้อม'
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

            <div class="badge">
              <span class="bg-danger"></span>
              <div>
                <h5>กองสาธารณสุขและสิ่งแวดล้อม</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'สำนักช่าง'
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

            <div class="badge">
              <span class="bg-primary"></span>
              <div>
                <h5>สำนักช่าง</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'กองสวัสดิการสังคม'
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

            <div class="badge">
              <span class="bg-danger"></span>
              <div>
                <h5>กองสวัสดิการสังคม</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'กองยุทธศาสตร์และงบประมาณ'
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

            <div class="badge">
              <span class="bg-success"></span>
              <div>
                <h5>กองยุทธศาสตร์และงบประมาณ</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'กองการเจ้าหน้าที่'
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

            <div class="badge">
              <span class="bg-danger"></span>
              <div>
                <h5>กองการเจ้าหน้าที่</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>

            <?php
            include('../../../system/database/DB_account.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN departments d ON u.department = d.id
            WHERE d.name = 'คณะผู้บริหาร'
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
            <div class="badge">
              <span class="bg-success"></span>
              <div>
                <h5>คณะผู้บริหาร</h5>
                <h4><?php echo $total_count; ?></h4>
              </div>
            </div>
          </div>
        </div>
        <!-- END OF FAST PAYMENT -->

        <canvas id="chart"></canvas>
      
        </section>
      <!-- END OF MIDDLE -->
      <section class="right">
        <div class="investments">
          <div class="header">
            <h2>ระบบปฎิบัติการ</h2>
            <a href="search/Search_computer.php">เพิ่มเติม<span class="material-icons-sharp">
                chevron_right
              </span></a>
          </div>

          <div class="investment">
            <img src="../../../assets/images/windows 11.png">
            <h4>Windows 11</h4>
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
              include('../../../system/database/DB_computer.php');

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
            <img src="../../../assets/images/windows 10.png">
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
              include('../../../system/database/DB_computer.php');

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
            <img src="../../../assets/images/windows 7.png">
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
              include('../../../system/database/DB_computer.php');

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
            <a href="Equip_computer.php">เพิ่มเติม<span class="material-icons-sharp">
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

    

    <script src="../../../assets/js/graph.js"></script>






  </body>

  </html>

<?php } ?>