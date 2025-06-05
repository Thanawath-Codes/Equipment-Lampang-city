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
    <link rel="stylesheet" href="../../../assets/css/dashboardA.css">
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
                    <p>.ADMIN</p>
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
            <span class="material-icons-sharp">pie_chart</span>
            <h4>การวิเคราะห์</h4>
          </a>
          <a href="User_account.php">
            <span class="material-icons-sharp">message</span>
            <h4>บัญชีผู้ใช้</h4>
          </a>
          <a href="../admin/account/Profile.php">
            <span class="material-icons-sharp">settings</span>
            <h4>ตั้งค่า</h4>
          </a>
        </div>
        <!-- END OF SIDEBAR -->

        <div class="updates">
          <span class="material-icons-sharp">filter_drama</span>
          <h4>User Lampang-city</h4>

          <?php
          include('../../../system/database/DB_account.php');

          $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN uroles ur ON u.urole = ur.id
            WHERE ur.name = 'ADMIN'
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


          <p>ADMIN <?php echo $total_count; ?> Users.</p>

          <?php
          include('../../../system/database/DB_account.php');

          $sql = "
            SELECT COUNT(*) AS total
            FROM user u
            JOIN uroles ur ON u.urole = ur.id
            WHERE ur.name = 'PERSONNEL'
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

          <p>PERSONNEL <?php echo $total_count; ?> Users.</p>
          <a href="User_account.php">Data Personnels</a>
        </div>

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
          <h2>หน่วยงานภายใน</h2>
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

        <!-- CANVAS -->  

          <h2>Ms-Office</h2>
          <div class="badges">
            <div class="badge">
              <span class="material-icons-sharp">
                add
              </span>
              <div class="select-box">
    <select class="form-select" id="year-selector" name="year_equipment">
      <option selected disabled>ปีงบประมาณ</option>
      <?php
      $currentYear = date("Y"); // ปี ค.ศ.
      $earliestYear = 1970;
      while ($currentYear >= $earliestYear) {
          $buddhistYear = $currentYear + 543; // แสดงเป็น พ.ศ.
          echo "<option value=\"$currentYear\">$buddhistYear</option>"; // value = ค.ศ.
          $currentYear--;
      }
      ?>
    </select>
  </div>
            </div>
            <br>


  <canvas id="barchart"></canvas>


  <div class="fast-payment">
          <h4>Windows</h4>
          <div class="badges">
            <div class="badge">
              <span class="material-icons-sharp">
                add
              </span>
            </div>


        <canvas id="doughnut"></canvas>
        
        <!-- END CANVAS -->

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
            <h4>Windows 7</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

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
                include('../../../system/database/DB_computer.php');

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
              include('../../../system/database/DB_computer.php');

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

              <?php
              include('../../../system/database/DB_computer.php');

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
            <img src="../../../assets/images/windows 10.png">
            <h4>Windows 10</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

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
                include('../../../system/database/DB_computer.php');

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
              include('../../../system/database/DB_computer.php');

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

              <?php
              include('../../../system/database/DB_computer.php');

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
            <img src="../../../assets/images/windows 7.png">
            <h4>Windows 7</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

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
                include('../../../system/database/DB_computer.php');

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
              include('../../../system/database/DB_computer.php');

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

              <?php
              include('../../../system/database/DB_computer.php');

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
                <?php
                include('../../../system/database/DB_computer.php');

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
                <img src="../../../assets/images/visa.png">
              </div>
              <div class="details">
                <?php
                include('../../../system/database/DB_computer.php');

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
                include('../../../system/database/DB_computer.php');

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
              <?php
              include('../../../system/database/DB_monitor.php');

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
              <img src="../../../assets/images/visa.png">
            </div>
            <div class="details">
              <?php
              include('../../../system/database/DB_monitor.php');

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
              include('../../../system/database/DB_monitor.php');

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
              <?php
              include('../../../system/database/DB_tablet.php');

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
              <img src="../../../assets/images/master_card.png">
            </div>
            <div class="details">
              <?php
              include('../../../system/database/DB_tablet.php');

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
              include('../../../system/database/DB_tablet.php');

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

              <?php
              include('../../../system/database/DB_printer.php');

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
              <img src="../../../assets/images/visa.png">
            </div>
            <div class="details">
              <?php
              include('../../../system/database/DB_printer.php');

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
              include('../../../system/database/DB_printer.php');

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

              <?php
              include('../../../system/database/DB_scanner.php');

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
              <img src="../../../assets/images/visa.png">
            </div>
            <div class="details">

              <?php
              include('../../../system/database/DB_scanner.php');

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
              include('../../../system/database/DB_scanner.php');

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

              <?php
              include('../../../system/database/DB_ups.php');

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
              <img src="../../../assets/images/visa.png">
            </div>
            <div class="details">
              <?php
              include('../../../system/database/DB_ups.php');

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
              include('../../../system/database/DB_ups.php');

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
        <br>
        <div class="investments">
          <div class="header">
            <h2>ไมโครซอฟออฟฟิศ</h2>
            <a href="#">เพิ่มเติม<span class="material-icons-sharp">
                chevron_right
              </span></a>
          </div>

          <div class="investment">
            <img src="../../../assets/images/microsoft 365.svg">
            <h4>Microsoft 365</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                          SELECT 
                              microsoft_offices.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                          WHERE 
                              microsoft_offices.name = 'MICROSOFT OFFICE 365'
                          GROUP BY 
                              microsoft_offices.name
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
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                        SELECT 
                            microsoft_offices.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                        WHERE 
                            microsoft_offices.name = 'MICROSOFT OFFICE 365'
                        GROUP BY 
                            microsoft_offices.name
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
              include('../../../system/database/DB_computer.php');

              $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                    WHERE ms.name = 'MICROSOFT OFFICE 365'
                    AND cl.key_product_office != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
              $result = $conn->query($sql);

              if ($result === false) {
                // If query fails, display error message
                echo "Error: " . $conn->error;
                $total_lice = 0;
              } else {
                // Check for results
                if ($result->num_rows > 0) {
                  // Fetch the count
                  $row = $result->fetch_assoc();
                  $total_lice = $row['total'];
                } else {
                  $total_lice = 0;
                }
              }

              $conn->close();
              ?>
              <p><?php echo $total_lice; ?></p>
              <small class="text-muted">Lice</small>

            </div>

            <?php
            include('../../../system/database/DB_computer.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
            WHERE ms.name = 'MICROSOFT OFFICE 365'
            ";
            $result = $conn->query($sql);

            if ($result === false) {
              // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
              echo "Error: " . $conn->error;
              $total_counts = 0;
            } else {
              // ตรวจสอบผลลัพธ์
              if ($result->num_rows > 0) {
                // ดึงข้อมูลออกมา
                $row = $result->fetch_assoc();
                $total_counts = $row['total'];
              } else {
                $total_counts = 0;
              }
            }

            $conn->close();
            ?>

            <div class="amount">
              <h4>₵<?php echo $total_counts; ?></h4>

              <?php
              include('../../../system/database/DB_computer.php');

              // ดึงวันที่ล่าสุดของ MICROSOFT OFFICE 365
              $sql_date = "
    SELECT DATE(MAX(cl.created_at)) AS latest_date
    FROM computer_lists cl
    JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
    WHERE ms.name = 'MICROSOFT OFFICE 365'
";
              $result_date = $conn->query($sql_date);

              if ($result_date === false) {
                die("Error (Latest Date Query): " . $conn->error);
              } else {
                $row_date = $result_date->fetch_assoc();
                $latest_date = $row_date['latest_date']; // วันที่ล่าสุดของ MICROSOFT OFFICE 365
              }

              if ($latest_date) {
                // นับจำนวนข้อมูล MICROSOFT OFFICE 365 ที่ตรงกับวันที่ล่าสุด
                $sql_count = "
        SELECT COUNT(*) AS total
        FROM computer_lists cl
        JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
        WHERE ms.name = 'MICROSOFT OFFICE 365' AND DATE(cl.created_at) = '$latest_date'
    ";
                $result_count = $conn->query($sql_count);

                if ($result_count === false) {
                  die("Error (Count Query): " . $conn->error);
                } else {
                  $row_count = $result_count->fetch_assoc();
                  $total_count = $row_count['total']; // จำนวนที่ตรงกับวันที่ล่าสุด
                }
              } else {
                $total_count = 0; // ถ้าไม่มีข้อมูล MICROSOFT OFFICE 365 เลย
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
            <img src="../../../assets/images/microsoft 2021.svg">
            <h4>Microsoft 2021</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                          SELECT 
                              microsoft_offices.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                          WHERE 
                              microsoft_offices.name = 'MICROSOFT OFFICE 2021'
                          GROUP BY 
                              microsoft_offices.name
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
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                        SELECT 
                            microsoft_offices.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                        WHERE 
                            microsoft_offices.name = 'MICROSOFT OFFICE 2021'
                        GROUP BY 
                            microsoft_offices.name
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
              include('../../../system/database/DB_computer.php');

              $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                    WHERE ms.name = 'MICROSOFT OFFICE 2021'
                    AND cl.key_product_office != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
              $result = $conn->query($sql);

              if ($result === false) {
                // If query fails, display error message
                echo "Error: " . $conn->error;
                $total_lice = 0;
              } else {
                // Check for results
                if ($result->num_rows > 0) {
                  // Fetch the count
                  $row = $result->fetch_assoc();
                  $total_lice = $row['total'];
                } else {
                  $total_lice = 0;
                }
              }

              $conn->close();
              ?>
              <p><?php echo $total_lice; ?></p>
              <small class="text-muted">Lice</small>

            </div>

            <?php
            include('../../../system/database/DB_computer.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
            WHERE ms.name = 'MICROSOFT OFFICE 2021'
            ";
            $result = $conn->query($sql);

            if ($result === false) {
              // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
              echo "Error: " . $conn->error;
              $total_counts = 0;
            } else {
              // ตรวจสอบผลลัพธ์
              if ($result->num_rows > 0) {
                // ดึงข้อมูลออกมา
                $row = $result->fetch_assoc();
                $total_counts = $row['total'];
              } else {
                $total_counts = 0;
              }
            }

            $conn->close();
            ?>

            <div class="amount">
              <h4>₵<?php echo $total_counts; ?></h4>

              <?php
              include('../../../system/database/DB_computer.php');

              // ดึงวันที่ล่าสุดของ MICROSOFT OFFICE 365
              $sql_date = "
                  SELECT DATE(MAX(cl.created_at)) AS latest_date
                  FROM computer_lists cl
                  JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                  WHERE ms.name = 'MICROSOFT OFFICE 2021'
              ";
              $result_date = $conn->query($sql_date);

              if ($result_date === false) {
                die("Error (Latest Date Query): " . $conn->error);
              } else {
                $row_date = $result_date->fetch_assoc();
                $latest_date = $row_date['latest_date']; // วันที่ล่าสุดของ MICROSOFT OFFICE 365
              }

              if ($latest_date) {
                // นับจำนวนข้อมูล MICROSOFT OFFICE 365 ที่ตรงกับวันที่ล่าสุด
                $sql_count = "
        SELECT COUNT(*) AS total
        FROM computer_lists cl
        JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
        WHERE ms.name = 'MICROSOFT OFFICE 2021' AND DATE(cl.created_at) = '$latest_date'
    ";
                $result_count = $conn->query($sql_count);

                if ($result_count === false) {
                  die("Error (Count Query): " . $conn->error);
                } else {
                  $row_count = $result_count->fetch_assoc();
                  $total_count = $row_count['total']; // จำนวนที่ตรงกับวันที่ล่าสุด
                }
              } else {
                $total_count = 0; // ถ้าไม่มีข้อมูล MICROSOFT OFFICE 365 เลย
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
            <img src="../../../assets/images/microsoft 2019.svg">
            <h4>Microsoft 2019</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                          SELECT 
                              microsoft_offices.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                          WHERE 
                              microsoft_offices.name = 'MICROSOFT OFFICE 2019'
                          GROUP BY 
                              microsoft_offices.name
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
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                        SELECT 
                            microsoft_offices.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                        WHERE 
                            microsoft_offices.name = 'MICROSOFT OFFICE 2019'
                        GROUP BY 
                            microsoft_offices.name
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
              include('../../../system/database/DB_computer.php');

              $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                    WHERE ms.name = 'MICROSOFT OFFICE 2019'
                    AND cl.key_product_office != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
              $result = $conn->query($sql);

              if ($result === false) {
                // If query fails, display error message
                echo "Error: " . $conn->error;
                $total_lice = 0;
              } else {
                // Check for results
                if ($result->num_rows > 0) {
                  // Fetch the count
                  $row = $result->fetch_assoc();
                  $total_lice = $row['total'];
                } else {
                  $total_lice = 0;
                }
              }

              $conn->close();
              ?>
              <p><?php echo $total_lice; ?></p>
              <small class="text-muted">Lice</small>

            </div>

            <?php
            include('../../../system/database/DB_computer.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
            WHERE ms.name = 'MICROSOFT OFFICE 2019'
            ";
            $result = $conn->query($sql);

            if ($result === false) {
              // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
              echo "Error: " . $conn->error;
              $total_counts = 0;
            } else {
              // ตรวจสอบผลลัพธ์
              if ($result->num_rows > 0) {
                // ดึงข้อมูลออกมา
                $row = $result->fetch_assoc();
                $total_counts = $row['total'];
              } else {
                $total_counts = 0;
              }
            }

            $conn->close();
            ?>

            <div class="amount">
              <h4>₵<?php echo $total_counts; ?></h4>

              <?php
              include('../../../system/database/DB_computer.php');

              // ดึงวันที่ล่าสุดของ MICROSOFT OFFICE 365
              $sql_date = "
                  SELECT DATE(MAX(cl.created_at)) AS latest_date
                  FROM computer_lists cl
                  JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                  WHERE ms.name = 'MICROSOFT OFFICE 2019'
              ";
              $result_date = $conn->query($sql_date);

              if ($result_date === false) {
                die("Error (Latest Date Query): " . $conn->error);
              } else {
                $row_date = $result_date->fetch_assoc();
                $latest_date = $row_date['latest_date']; // วันที่ล่าสุดของ MICROSOFT OFFICE 365
              }

              if ($latest_date) {
                // นับจำนวนข้อมูล MICROSOFT OFFICE 365 ที่ตรงกับวันที่ล่าสุด
                $sql_count = "
        SELECT COUNT(*) AS total
        FROM computer_lists cl
        JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
        WHERE ms.name = 'MICROSOFT OFFICE 2019' AND DATE(cl.created_at) = '$latest_date'
    ";
                $result_count = $conn->query($sql_count);

                if ($result_count === false) {
                  die("Error (Count Query): " . $conn->error);
                } else {
                  $row_count = $result_count->fetch_assoc();
                  $total_count = $row_count['total']; // จำนวนที่ตรงกับวันที่ล่าสุด
                }
              } else {
                $total_count = 0; // ถ้าไม่มีข้อมูล MICROSOFT OFFICE 365 เลย
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
            <img src="../../../assets/images/microsoft 2019.svg">
            <h4>Microsoft 2016</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                          SELECT 
                              microsoft_offices.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                          WHERE 
                              microsoft_offices.name = 'MICROSOFT OFFICE 2016'
                          GROUP BY 
                              microsoft_offices.name
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
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                        SELECT 
                            microsoft_offices.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                        WHERE 
                            microsoft_offices.name = 'MICROSOFT OFFICE 2016'
                        GROUP BY 
                            microsoft_offices.name
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
              include('../../../system/database/DB_computer.php');

              $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                    WHERE ms.name = 'MICROSOFT OFFICE 2016'
                    AND cl.key_product_office != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
              $result = $conn->query($sql);

              if ($result === false) {
                // If query fails, display error message
                echo "Error: " . $conn->error;
                $total_lice = 0;
              } else {
                // Check for results
                if ($result->num_rows > 0) {
                  // Fetch the count
                  $row = $result->fetch_assoc();
                  $total_lice = $row['total'];
                } else {
                  $total_lice = 0;
                }
              }

              $conn->close();
              ?>
              <p><?php echo $total_lice; ?></p>
              <small class="text-muted">Lice</small>

            </div>

            <?php
            include('../../../system/database/DB_computer.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
            WHERE ms.name = 'MICROSOFT OFFICE 2016'
            ";
            $result = $conn->query($sql);

            if ($result === false) {
              // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
              echo "Error: " . $conn->error;
              $total_counts = 0;
            } else {
              // ตรวจสอบผลลัพธ์
              if ($result->num_rows > 0) {
                // ดึงข้อมูลออกมา
                $row = $result->fetch_assoc();
                $total_counts = $row['total'];
              } else {
                $total_counts = 0;
              }
            }

            $conn->close();
            ?>

            <div class="amount">
              <h4>₵<?php echo $total_counts; ?></h4>

              <?php
              include('../../../system/database/DB_computer.php');

              // ดึงวันที่ล่าสุดของ MICROSOFT OFFICE 365
              $sql_date = "
                  SELECT DATE(MAX(cl.created_at)) AS latest_date
                  FROM computer_lists cl
                  JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                  WHERE ms.name = 'MICROSOFT OFFICE 2016'
              ";
              $result_date = $conn->query($sql_date);

              if ($result_date === false) {
                die("Error (Latest Date Query): " . $conn->error);
              } else {
                $row_date = $result_date->fetch_assoc();
                $latest_date = $row_date['latest_date']; // วันที่ล่าสุดของ MICROSOFT OFFICE 365
              }

              if ($latest_date) {
                // นับจำนวนข้อมูล MICROSOFT OFFICE 365 ที่ตรงกับวันที่ล่าสุด
                $sql_count = "
        SELECT COUNT(*) AS total
        FROM computer_lists cl
        JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
        WHERE ms.name = 'MICROSOFT OFFICE 2016' AND DATE(cl.created_at) = '$latest_date'
    ";
                $result_count = $conn->query($sql_count);

                if ($result_count === false) {
                  die("Error (Count Query): " . $conn->error);
                } else {
                  $row_count = $result_count->fetch_assoc();
                  $total_count = $row_count['total']; // จำนวนที่ตรงกับวันที่ล่าสุด
                }
              } else {
                $total_count = 0; // ถ้าไม่มีข้อมูล MICROSOFT OFFICE 365 เลย
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
            <img src="../../../assets/images/microsoft 2019.svg">
            <h4>Microsoft 2013</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                          SELECT 
                              microsoft_offices.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                          WHERE 
                              microsoft_offices.name = 'MICROSOFT OFFICE 2013'
                          GROUP BY 
                              microsoft_offices.name
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
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                        SELECT 
                            microsoft_offices.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                        WHERE 
                            microsoft_offices.name = 'MICROSOFT OFFICE 2013'
                        GROUP BY 
                            microsoft_offices.name
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
              include('../../../system/database/DB_computer.php');

              $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                    WHERE ms.name = 'MICROSOFT OFFICE 2013'
                    AND cl.key_product_office != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
              $result = $conn->query($sql);

              if ($result === false) {
                // If query fails, display error message
                echo "Error: " . $conn->error;
                $total_lice = 0;
              } else {
                // Check for results
                if ($result->num_rows > 0) {
                  // Fetch the count
                  $row = $result->fetch_assoc();
                  $total_lice = $row['total'];
                } else {
                  $total_lice = 0;
                }
              }

              $conn->close();
              ?>
              <p><?php echo $total_lice; ?></p>
              <small class="text-muted">Lice</small>

            </div>

            <?php
            include('../../../system/database/DB_computer.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
            WHERE ms.name = 'MICROSOFT OFFICE 2013'
            ";
            $result = $conn->query($sql);

            if ($result === false) {
              // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
              echo "Error: " . $conn->error;
              $total_counts = 0;
            } else {
              // ตรวจสอบผลลัพธ์
              if ($result->num_rows > 0) {
                // ดึงข้อมูลออกมา
                $row = $result->fetch_assoc();
                $total_counts = $row['total'];
              } else {
                $total_counts = 0;
              }
            }

            $conn->close();
            ?>

            <div class="amount">
              <h4>₵<?php echo $total_counts; ?></h4>

              <?php
              include('../../../system/database/DB_computer.php');

              // ดึงวันที่ล่าสุดของ MICROSOFT OFFICE 365
              $sql_date = "
                  SELECT DATE(MAX(cl.created_at)) AS latest_date
                  FROM computer_lists cl
                  JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                  WHERE ms.name = 'MICROSOFT OFFICE 2013'
              ";
              $result_date = $conn->query($sql_date);

              if ($result_date === false) {
                die("Error (Latest Date Query): " . $conn->error);
              } else {
                $row_date = $result_date->fetch_assoc();
                $latest_date = $row_date['latest_date']; // วันที่ล่าสุดของ MICROSOFT OFFICE 365
              }

              if ($latest_date) {
                // นับจำนวนข้อมูล MICROSOFT OFFICE 365 ที่ตรงกับวันที่ล่าสุด
                $sql_count = "
        SELECT COUNT(*) AS total
        FROM computer_lists cl
        JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
        WHERE ms.name = 'MICROSOFT OFFICE 2013' AND DATE(cl.created_at) = '$latest_date'
    ";
                $result_count = $conn->query($sql_count);

                if ($result_count === false) {
                  die("Error (Count Query): " . $conn->error);
                } else {
                  $row_count = $result_count->fetch_assoc();
                  $total_count = $row_count['total']; // จำนวนที่ตรงกับวันที่ล่าสุด
                }
              } else {
                $total_count = 0; // ถ้าไม่มีข้อมูล MICROSOFT OFFICE 365 เลย
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
            <img src="../../../assets/images/microsoft 2010.svg">
            <h4>microsoft 2010</h4>
            <div class="date-time">
              <p>
                <?php
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                          SELECT 
                              microsoft_offices.name,
                              MAX(computer_lists.created_at) AS latest_date
                          FROM 
                              computer_lists
                          JOIN 
                              microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                          WHERE 
                              microsoft_offices.name = 'MICROSOFT OFFICE 2010'
                          GROUP BY 
                              microsoft_offices.name
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
                include('../../../system/database/DB_computer.php');

                // สร้าง query
                $sql = "
                        SELECT 
                            microsoft_offices.name,
                            MAX(computer_lists.created_at) AS latest_date
                        FROM 
                            computer_lists
                        JOIN 
                            microsoft_offices ON computer_lists.microsoft_office = microsoft_offices.id
                        WHERE 
                            microsoft_offices.name = 'MICROSOFT OFFICE 2010'
                        GROUP BY 
                            microsoft_offices.name
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
              include('../../../system/database/DB_computer.php');

              $sql = "
                    SELECT COUNT(*) AS total
                    FROM computer_lists cl
                    JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                    WHERE ms.name = 'MICROSOFT OFFICE 2010'
                    AND cl.key_product_office != 'XXXXX-XXXXX-XXXXX-XXXXX-XXXXX'
                ";
              $result = $conn->query($sql);

              if ($result === false) {
                // If query fails, display error message
                echo "Error: " . $conn->error;
                $total_lice = 0;
              } else {
                // Check for results
                if ($result->num_rows > 0) {
                  // Fetch the count
                  $row = $result->fetch_assoc();
                  $total_lice = $row['total'];
                } else {
                  $total_lice = 0;
                }
              }

              $conn->close();
              ?>
              <p><?php echo $total_lice; ?></p>
              <small class="text-muted">Lice</small>

            </div>

            <?php
            include('../../../system/database/DB_computer.php');

            $sql = "
            SELECT COUNT(*) AS total
            FROM computer_lists cl
            JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
            WHERE ms.name = 'MICROSOFT OFFICE 2010'
            ";
            $result = $conn->query($sql);

            if ($result === false) {
              // กรณีที่ query ผิดพลาด ให้แสดงข้อผิดพลาด
              echo "Error: " . $conn->error;
              $total_counts = 0;
            } else {
              // ตรวจสอบผลลัพธ์
              if ($result->num_rows > 0) {
                // ดึงข้อมูลออกมา
                $row = $result->fetch_assoc();
                $total_counts = $row['total'];
              } else {
                $total_counts = 0;
              }
            }

            $conn->close();
            ?>

            <div class="amount">
              <h4>₵<?php echo $total_counts; ?></h4>

              <?php
              include('../../../system/database/DB_computer.php');

              // ดึงวันที่ล่าสุดของ MICROSOFT OFFICE 365
              $sql_date = "
                  SELECT DATE(MAX(cl.created_at)) AS latest_date
                  FROM computer_lists cl
                  JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
                  WHERE ms.name = 'MICROSOFT OFFICE 2010'
              ";
              $result_date = $conn->query($sql_date);

              if ($result_date === false) {
                die("Error (Latest Date Query): " . $conn->error);
              } else {
                $row_date = $result_date->fetch_assoc();
                $latest_date = $row_date['latest_date']; // วันที่ล่าสุดของ MICROSOFT OFFICE 365
              }

              if ($latest_date) {
                // นับจำนวนข้อมูล MICROSOFT OFFICE 365 ที่ตรงกับวันที่ล่าสุด
                $sql_count = "
        SELECT COUNT(*) AS total
        FROM computer_lists cl
        JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
        WHERE ms.name = 'MICROSOFT OFFICE 2010' AND DATE(cl.created_at) = '$latest_date'
    ";
                $result_count = $conn->query($sql_count);

                if ($result_count === false) {
                  die("Error (Count Query): " . $conn->error);
                } else {
                  $row_count = $result_count->fetch_assoc();
                  $total_count = $row_count['total']; // จำนวนที่ตรงกับวันที่ล่าสุด
                }
              } else {
                $total_count = 0; // ถ้าไม่มีข้อมูล MICROSOFT OFFICE 365 เลย
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
      </section>
      <!---------------------------------------- END OF RIGHT ---------------------------------------->
    </main>
    <!--================================== END OF ASIDE ==================================-->

    



    <script src="../../../assets/js/chart1.js"></script>






  </body>

  </html>

<?php } ?>