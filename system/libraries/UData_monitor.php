<?php
// เชื่อมต่อฐานข้อมูล
require_once '../../system/database/DB_monitor.php';

// รับค่าจาก GET
$serial_number = $_GET['serial_number'] ?? '';
$year_equipment = $_GET['year_equipment'] ?? '';
$monitor_brand = $_GET['monitor_brand'] ?? '';
$monitor_model = $_GET['monitor_model'] ?? '';
$monitor_size = $_GET['monitor_size'] ?? '';  
$status_equipment = $_GET['status_equipment'] ?? '';
$department = $_GET['department'] ?? '';
$segment = $_GET['segment'] ?? '';
$division = $_GET['division'] ?? '';
$working = $_GET['working'] ?? '';
$owner_monitor = $_GET['owner_monitor'] ?? '';


$where = [];

if (!empty($serial_number)) {
    $where[] = "ml.serial_number LIKE '%" . mysqli_real_escape_string($conn, $serial_number) . "%'";
}
if (!empty($year_equipment)) {
    $where[] = "ml.year_equipment = '" . mysqli_real_escape_string($conn, $year_equipment) . "'";
}
if (!empty($monitor_brand)) {
    $where[] = "ml.monitor_brand = '" . mysqli_real_escape_string($conn, $monitor_brand) . "'";
}
if (!empty($monitor_model)) {
    $where[] = "ml.monitor_model = '" . mysqli_real_escape_string($conn, $monitor_model) . "'";
}
if (!empty($monitor_size)) {
    $where[] = "ml.monitor_size = '" . mysqli_real_escape_string($conn, $monitor_size) . "'";
}
if (!empty($status_equipment)) {
    $where[] = "ml.status_equipment = '" . mysqli_real_escape_string($conn, $status_equipment) . "'";
}
if (!empty($department)) {
    $where[] = "ml.department = '" . mysqli_real_escape_string($conn, $department) . "'";
}
if (!empty($segment)) {
    $where[] = "ml.segment = '" . mysqli_real_escape_string($conn, $segment) . "'";
}
if (!empty($division)) {
    $where[] = "ml.division = '" . mysqli_real_escape_string($conn, $division) . "'";
}
if (!empty($working)) {
    $where[] = "ml.working = '" . mysqli_real_escape_string($conn, $working) . "'";
}
if (!empty($owner_monitor)) {
    $where[] = "ml.owner_monitor LIKE '%" . mysqli_real_escape_string($conn, $owner_monitor) . "%'";
}

$sql = "SELECT ml.id, ml.serial_number, ml.year_equipment, ml.owner_monitor, ml.created_at,
        mb.name AS monitor_brand_name, mm.name AS monitor_model_name, ms.name AS monitor_size_name,
        st.name AS status_equipment_name, d.name AS department_name, s.name AS segment_name,
        v.name AS division_name, w.name AS working_name
        FROM `monitor_lists` AS ml
        LEFT JOIN `monitor_brands` AS mb ON ml.monitor_brand = mb.id
        LEFT JOIN `monitor_models` AS mm ON ml.monitor_model = mm.id
        LEFT JOIN `monitor_sizes` AS ms ON ml.monitor_size = ms.id
        LEFT JOIN `status_equipments` AS st ON ml.status_equipment = st.id
        LEFT JOIN `departments` AS d ON ml.department = d.id
        LEFT JOIN `segments` AS s ON ml.segment = s.id
        LEFT JOIN `divisions` AS v ON ml.division = v.id
        LEFT JOIN `workings` AS w ON ml.working = w.id";

// เช็กว่ามีเงื่อนไขไหม
if (!empty($where)) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

// รันคำสั่ง SQL
$result = mysqli_query($conn, $sql);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Data Equipment Monitor.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../assets/css/search_ups.css">


    <!-- Boxiocns CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>

    <main>
        <aside>
            <button id="close-btn">
                <span class="material-icons-sharp">close</span>
            </button>
            <div class="sidebar">
                <a href="../../application/controllers/user/Dashboard.php" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>แผงควบคุม</h4>
                </a>
                <a href="../../application/controllers/user/Equip_monitor.php">
                    <span class="material-icons-sharp primary">
                        laptop_chromebook
                    </span>
                    <h4>จอคอมพิวเตอร์</h4>
                </a>
                <a href="../../application/controllers/user/Equip_computer.php">
                    <span class="material-icons-sharp">
                        screenshot_monitor
                    </span>
                    <h4>คอมพิวเตอร์</h4>
                </a>
                <a href="../../application/controllers/user/Equip_tablet.php">
                    <span class="material-icons-sharp">
                        tablet_mac
                    </span>
                    <h4>แท็บเล็ต</h4>
                </a>
                <a href="../../application/controllers/user/Equip_printer.php">
                    <span class="material-icons-sharp">
                        print
                    </span>
                    <h4>ปริ้นเตอร์</h4>
                </a>
                <a href="../../application/controllers/user/Equip_scanner.php">
                    <span class="material-icons-sharp">
                        document_scanner
                    </span>
                    <h4>สแกนเนอร์</h4>
                </a>
                <a href="../../application/controllers/user/Equip_ups.php">
                    <span class="material-icons-sharp">
                        charging_station
                    </span>
                    <h4>เครื่องสำรองไฟ</h4>
                </a>
                <a href="../../application/controllers/user/account/Profile.php">
                    <span class="material-icons-sharp">settings</span>
                    <h4>ตั้งค่า</h4>
                </a>
            </div>
            <!-- END OF SIDEBAR -->

            <div class="updates">
                <span class="material-icons-sharp">pending_actions</span>
                <h4>ข้อมูลที่ค้นหา</h4>
                
                <?php
$labels = [
    'serial_number' => 'เลขครุภัณฑ์',
    'year_equipment' => 'ปีงบประมาณ',
    'monitor_brand' => 'แบรนด์',
    'monitor_model' => 'รุ่น/โมเดล',
    'monitor_size' => 'ขนาดหน้าจอ',
    'status_equipment' => 'สถานะ',
    'department' => 'กอง/สำนัก',
    'segment' => 'ส่วน',
    'division' => 'ฝ่าย',
    'working' => 'งาน',
    'owner_ups' => 'ผู้ใช้งาน',
];

function getNameById($conn, $table, $id) {
    $stmt = $conn->prepare("SELECT name FROM $table WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->bind_result($name);
    $stmt->fetch();
    $stmt->close();
    return $name;
}

echo "<pre>";
foreach ($_GET as $key => $value) {
    if (!empty($value)) {
        $label = $labels[$key] ?? $key;
        $displayValue = $value;

        // ตรวจสอบและแปลงรหัสเป็นชื่อ
        switch ($key) {
            case 'monitor_brand':
                $displayValue = getNameById($conn, 'monitor_brands', $value);
                break;
            case 'monitor_model':
                $displayValue = getNameById($conn, 'monitor_models', $value);
                break;
            case 'monitor_size':
                $displayValue = getNameById($conn, 'monitor_sizes', $value);
                break;
            case 'status_equipment':
                $displayValue = getNameById($conn, 'status_equipments', $value);
                break;
            case 'department':
                $displayValue = getNameById($conn, 'departments', $value);
                break;
            case 'segment':
                $displayValue = getNameById($conn, 'segments', $value);
                break;
            case 'division':
                $displayValue = getNameById($conn, 'divisions', $value);
                break;
            case 'working':
                $displayValue = getNameById($conn, 'workings', $value);
                break;
            // เพิ่มกรณีอื่น ๆ ตามต้องการ
        }

        echo "<p>$label : $displayValue\n</p>";
    }
}
echo "</pre>";

?>

                              
<?php
$result = mysqli_query($conn, $sql);

if (!$result) {
    // แสดง error หาก query ล้มเหลว
    echo "<p style='color:red;'>เกิดข้อผิดพลาดในการค้นหา: " . mysqli_error($conn) . "</p>";
    echo "<pre>$sql</pre>"; // สำหรับ debug
} else {
    // นับจำนวนแถวและแสดงผล
    $total_rows = mysqli_num_rows($result);
    echo "<p>จำนวนทั้งหมด : {$total_rows} แถว</p>";
}
?>

                  
                <a href="../../application/controllers/user/search/Search_monitor.php">ค้นหาข้อมูล</a>     
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->
        <section class="middle">
            
            <div class="wrapper">
                <div class="btns">
                    <a href="../../application/controllers/user/add/Add_monitor.php">เพิ่มข้อมูลผู้ใช้งาน</a>
                    <a href="../database/download/export_ups.php">ดาวน์โหลดข้อมูล</a>
                </div>
            </div>
            <div class="content_wrapper">
    <div id="ups_list_container" class="data_equipment_monitor">
        <div class="table_equipment_monitor">
            <table>
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>เลขครุภัณฑ์</th>
                        <th>ปีงบประมาณ</th>
                        <th>แบรนด์</th>
                        <th>รุ่น/โมเดล</th>
                        <th>ขนาดหน้าจอ</th>
                        <th>สถานะครุภัณฑ์</th>
                        <th>กอง/สำนัก</th>
                        <th>ส่วน</th>
                        <th>ฝ่าย</th>
                        <th>งาน</th>
                        <th>ผู้ใช้งาน</th>
                        <th>เวลา</th>
                        <th>แก้ไข</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['serial_number']}</td>
                                <td>{$row['year_equipment']}</td>
                                <td>{$row['monitor_brand_name']}</td>
                                <td>{$row['monitor_model_name']}</td>
                                <td>{$row['monitor_size_name']}</td>
                                <td>{$row['status_equipment_name']}</td>
                                <td>{$row['department_name']}</td>
                                <td>{$row['segment_name']}</td>
                                <td>{$row['division_name']}</td>
                                <td>{$row['working_name']}</td>
                                <td>{$row['owner_monitor']}</td>
                                <td>{$row['created_at']}</td>
                                <td><a href='/Equipment-Lampang-city//application/controllers/admin/update/Update_monitor.php?id=" . $row['id'] . "'>
                                    <span class='material-icons-sharp'>drive_file_rename_outline</span>
                                </a></td>
                                
                            </tr>";

                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
   
</div>
        </section>
        
        <!-- END OF MIDDLE -->
        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>แบรนด์จอคอมพิวเตอร์</h2>
                    <a href="../../application/controllers/user/search/Search_monitor.php">เพิ่มเติม<span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="../../assets/images/icon-hp.svg">
                    <h4>HP</h4>
                    <div class="date-time">
                        <p>
                            Monitor
                        </p>
                        <small class="text-muted">
                           Lampang city
                        </small>
                    </div>
                    <div class="bonds">
                        <p>Model</p>
                        <small class="text-muted">Standard</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../system/database/DB_monitor.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM monitor_lists ml
            JOIN monitor_brands mb ON ml.monitor_brand = mb.id
            WHERE mb.name = 'HP'
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
                    <img src="../../assets/images/icon-acer.svg">
                    <h4>ACER</h4>
                    <div class="date-time">
                        <p>
                           Monitor 
                        </p>
                        <small class="text-muted">
                           Lampang city 
                        </small>
                    </div>
                    <div class="bonds">
                        <p>Model</p>
                        <small class="text-muted">Standard</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../system/database/DB_monitor.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM monitor_lists ml
            JOIN monitor_brands mb ON ml.monitor_brand = mb.id
            WHERE mb.name = 'ACER'
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
                    <img src="../../assets/images/icon-aoc.svg">
                    <h4>AOC</h4>
                    <div class="date-time">
                        <p>
                            Monitor  
                        </p>
                        <small class="text-muted">
                           Lampang city
                        </small>
                    </div>
                    <div class="bonds">
                        <p>Model</p>
                        <small class="text-muted">Standard</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../system/database/DB_monitor.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM monitor_lists ml
            JOIN monitor_brands mb ON ml.monitor_brand = mb.id
            WHERE mb.name = 'AOC'
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
                    <img src="../../assets/images/icon-benq.svg">
                    <h4>BENQ</h4>
                    <div class="date-time">
                        <p>
                            Monitor
                        </p>
                        <small class="text-muted">
                            Lampang city
                        </small>
                    </div>
                    <div class="bonds">
                       <p>Model</p>
                        <small class="text-muted">Standard</small>
                    </div>
                    <div class="amount">
                        <?php
                        include('../../system/database/DB_monitor.php');

                        $sql = "
            SELECT COUNT(*) AS total
            FROM monitor_lists ml
            JOIN monitor_brands mb ON ml.monitor_brand = mb.id
            WHERE mb.name = 'BENQ'
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
            <!-------------- END OF INVESTMENT -------------->
            </div>
            <!-------------------- END OF INVESTMENTS -------------------->

            <div class="recent-transactions">
          <div class="header">
            <h2>ครุภัณฑ์อิเล็กทรอนิกส์</h2>
            <a href="../../application/controllers/user/Dashboard.php">เพิ่มเติม<span class="material-icons-sharp">
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
                <img src="../../assets/images/visa.png">
              </div>
              <div class="details">                
              </div>
            </div>

            <?php
            include('../../system/database/DB_computer.php');
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
              <img src="../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_monitor.php');
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
              <img src="../../assets/images/master_card.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_tablet.php');
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
              <img src="../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_printer.php');
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
              <img src="../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_scanner.php');
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
              <img src="../../assets/images/visa.png">
            </div>
            <div class="details">
            </div>
          </div>

          <?php
          include('../../system/database/DB_ups.php');
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

    <script src="../../assets/js/btn_wrapper.js"></script>


</body>

</html>