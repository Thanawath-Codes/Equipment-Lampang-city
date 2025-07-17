<?php
// เชื่อมต่อฐานข้อมูล
require_once '../../system/database/DB_computer.php';

// รับค่าจาก GET
    $serial_number = $_GET['serial_number'] ?? '';
    $year_equipment = $_GET['year_equipment'] ?? '';
    $computer_type = $_GET['computer_type'] ?? '';
    $computer_case = $_GET['computer_case'] ?? '';
    $computer_model = $_GET['computer_model'] ?? '';
    $brand_cpu = $_GET['brand_cpu'] ?? '';
    $spec_cpu = $_GET['spec_cpu'] ?? '';
    $speed_cpu = $_GET['speed_cpu'] ?? '';
    $storage_device = $_GET['storage_device'] ?? '';
    $storage_spec = $_GET['storage_spec'] ?? '';
    $ram_computer = $_GET['ram_computer'] ?? '';
    $microsoft_office = $_GET['microsoft_office'] ?? '';
    $key_product_office = $_GET['key_product_office'] ?? '';
    $os_computer = $_GET['os_computer'] ?? '';
    $key_product_windows = $_GET['key_product_windows'] ?? '';
    $department = $_GET['department'] ?? '';
    $segment = $_GET['segment'] ?? '';
    $division = $_GET['division'] ?? '';
    $working = $_GET['working'] ?? '';
    $status_equipment = $_GET['status_equipment'] ?? '';
    $owner_computer = $_GET['owner_computer'] ?? '';

$where = [];

if (!empty($serial_number)) {
    $where[] = "cl.serial_number LIKE '%" . mysqli_real_escape_string($conn, $serial_number) . "%'";
}
if (!empty($year_equipment)) {
    $where[] = "cl.year_equipment = '" . mysqli_real_escape_string($conn, $year_equipment) . "'";
}
if (!empty($computer_type)) {
    $where[] = "cl.computer_type = '" . mysqli_real_escape_string($conn, $computer_type) . "'";
}
if (!empty($computer_case)) {
    $where[] = "cl.computer_case = '" . mysqli_real_escape_string($conn, $computer_case) . "'";
}
if (!empty($computer_model)) {
    $where[] = "cl.computer_model = '" . mysqli_real_escape_string($conn, $computer_model) . "'";
}
if (!empty($brand_cpu)) {
    $where[] = "cl.brand_cpu = '" . mysqli_real_escape_string($conn, $brand_cpu) . "'";
}
if (!empty($spec_cpu)) {
    $where[] = "cl.spec_cpu = '" . mysqli_real_escape_string($conn, $spec_cpu) . "'";
}
if (!empty($speed_cpu)) {
    $where[] = "cl.speed_cpu = '" . mysqli_real_escape_string($conn, $speed_cpu) . "'";
}
if (!empty($storage_device)) {
    $where[] = "cl.storage_device = '" . mysqli_real_escape_string($conn, $storage_device) . "'";
}
if (!empty($storage_spec)) {
    $where[] = "cl.storage_spec = '" . mysqli_real_escape_string($conn, $storage_spec) . "'";
}
if (!empty($ram_computer)) {
    $where[] = "cl.ram_computer = '" . mysqli_real_escape_string($conn, $ram_computer) . "'";
}
if (!empty($microsoft_office)) {
    $where[] = "cl.microsoft_office = '" . mysqli_real_escape_string($conn, $microsoft_office) . "'";
}
if (!empty($key_product_office)) {
    $where[] = "cl.key_product_office = '" . mysqli_real_escape_string($conn, $key_product_office) . "'";
}
if (!empty($os_computer)) {
    $where[] = "cl.os_computer = '" . mysqli_real_escape_string($conn, $os_computer) . "'";
}
if (!empty($key_product_window)) {
    $where[] = "cl.key_product_window = '" . mysqli_real_escape_string($conn, $key_product_window) . "'";
}
if (!empty($status_equipment)) {
    $where[] = "cl.status_equipment = '" . mysqli_real_escape_string($conn, $status_equipment) . "'";
}
if (!empty($department)) {
    $where[] = "cl.department = '" . mysqli_real_escape_string($conn, $department) . "'";
}
if (!empty($segment)) {
    $where[] = "cl.segment = '" . mysqli_real_escape_string($conn, $segment) . "'";
}
if (!empty($division)) {
    $where[] = "cl.division = '" . mysqli_real_escape_string($conn, $division) . "'";
}
if (!empty($working)) {
    $where[] = "cl.working = '" . mysqli_real_escape_string($conn, $working) . "'";
}
if (!empty($owner_computer)) {
    $where[] = "cl.owner_computer LIKE '%" . mysqli_real_escape_string($conn, $owner_computer) . "%'";
}

$sql = "SELECT cl.id, cl.serial_number, cl.year_equipment, cl.speed_cpu,
        ct.name AS computer_type_name, cc.name AS computer_case_name,
        cm.name AS computer_model_name, bc.name AS brand_cpu_name,
        sc.name AS spec_cpu_name, sd.name AS storage_device_name,
        sp.name AS storage_spec_name, rc.name AS ram_computer_name, 
        ms.name AS microsoft_office_name, cl.key_product_office,
        os.name AS os_computer_name, cl.key_product_windows,
        st.name AS status_equipment_name, d.name AS department_name, 
        s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, cl.owner_computer, cl.created_at
        FROM `computer_lists` AS cl
        LEFT JOIN `computer_types` AS ct ON cl.computer_type = ct.id
        LEFT JOIN `computer_cases` AS cc ON cl.computer_case = cc.id
        LEFT JOIN `computer_models` AS cm ON cl.computer_model = cm.id
        LEFT JOIN `brand_cpus` AS bc ON cl.brand_cpu = bc.id
        LEFT JOIN `spec_cpus` AS sc ON cl.spec_cpu = sc.id
        LEFT JOIN `storage_devices` AS sd ON cl.storage_device = sd.id
        LEFT JOIN `storage_specs` AS sp ON cl.storage_spec = sp.id
        LEFT JOIN `ram_computers` AS rc ON cl.ram_computer = rc.id
        LEFT JOIN `microsoft_offices` AS ms ON cl.microsoft_office = ms.id
        LEFT JOIN `os_computers` AS os ON cl.os_computer = os.id
        LEFT JOIN `status_equipments` AS st ON cl.status_equipment = st.id
        LEFT JOIN `departments` AS d ON cl.department = d.id
        LEFT JOIN `segments` AS s ON cl.segment = s.id
        LEFT JOIN `divisions` AS v ON cl.division = v.id
        LEFT JOIN `workings` AS w ON cl.working = w.id";

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
    <title>EQUIP | Data Equipment Computer.</title>
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
                <a href="../../application/controllers/user/Equip_computer.php">
                    <span class="material-icons-sharp primary">
                        screenshot_monitor
                    </span>
                    <h4>คอมพิวเตอร์</h4>
                </a>
                </a>
                <a href="../../application/controllers/user/Equip_monitor.php">
                    <span class="material-icons-sharp">
                        laptop_chromebook
                    </span>
                    <h4>จอคอมพิวเตอร์</h4>
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
    'computer_type' => 'อุปกรณ์',
    'computer_case' => 'เคสคอมพิวเตอร์',
    'computer_model' => 'โมเดล/รุ่น',
    'brand_cpu' => 'ชิปคอมพิวเตอร์',
    'spec_cpu' => 'สเปค',
    'speed_cpu' => 'ความเร็ว',
    'storage_device' => 'อุปกรณ์จัดเก็บข้อมูล',
    'storage_spec' => 'พื้นที่จัดเก็บข้อมูล',
    'ram_computer' => 'แรม',
    'microsoft_office' => 'ไมโครซอฟท์ออฟฟิศ',
    'key_product_office' => 'คีย์ผลิตภัณฑ์ออฟฟิศ',
    'os_computer' => 'ระบบปฏิบัติการ',
    'key_product_windows' => 'คีย์ผลิตภัณฑ์ระบบ',
    'status_equipment' => 'สถานะ',
    'department' => 'กอง/สำนัก',
    'segment' => 'ส่วน',
    'division' => 'ฝ่าย',
    'working' => 'งาน',
    'owner_computer' => 'ผู้ใช้งาน',
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
            case 'computer_type':
                $displayValue = getNameById($conn, 'computer_types', $value);
                break;
            case 'computer_case':
                $displayValue = getNameById($conn, 'computer_cases', $value);
                break;
            case 'computer_model':
                $displayValue = getNameById($conn, 'computer_models', $value);
                break;
            case 'brand_cpu':
                $displayValue = getNameById($conn, 'brand_cpus', $value);
                break;
            case 'spec_cpu':
                $displayValue = getNameById($conn, 'spec_cpus', $value);
                break;
            case 'storage_device':
                $displayValue = getNameById($conn, 'storage_devices', $value);
                break;
            case 'storage_spec':
                $displayValue = getNameById($conn, 'storage_specs', $value);
                break;
            case 'ram_computer':
                $displayValue = getNameById($conn, 'ram_computers', $value);
                break;
            case 'microsoft_office':
                $displayValue = getNameById($conn, 'microsoft_offices', $value);
                break;
            case 'os_computer':
                $displayValue = getNameById($conn, 'os_computers', $value);
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

                  
                <a href="../../application/controllers/user/search/Search_computer.php">ค้นหาข้อมูล</a>     
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->
        <section class="middle">
            
            <div class="wrapper">
                <div class="btns">
                    <a href="../../application/controllers/user/add/Add_computer.php">เพิ่มข้อมูลผู้ใช้งาน</a>
                    <a href="../database/download/export_computer.php">ดาวน์โหลดข้อมูล</a>
                </div>
            </div>
            <div class="content_wrapper">
    <div id="ups_list_container" class="data_equipment_computer">
        <div class="table_equipment_computer">
            <table>
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>เลขครุภัณฑ์</th>
                        <th>ปีงบประมาณ</th>
                        <th>อุปกรณ์</th>
                        <th>เคสคอมพิวเตอร์</th>
                        <th>โมเดล</th>
                        <th>ชิปคอมพิวเตอร์</th>
                        <th>สเปค</th>
                        <th>ความเร็ว</th>
                        <th>อุปกรณ์จัดเก็บข้อมูล</th>
                        <th>พื้นที่จัดเก็บข้อมูล</th>
                        <th>แรม</th>
                        <th>ไมโครซอฟท์ออฟฟิศ</th>
                        <th>คีย์ผลิตภัณฑ์ไมโครซอฟท์ออฟฟิศ</th>
                        <th>ระบบปฏิบัติการ</th>
                        <th>คีย์ผลิตภัณฑ์ระบบปฏิบัติการ</th>
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
                                <td>{$row['computer_type_name']}</td>
                                <td>{$row['computer_case_name']}</td>
                                <td>{$row['computer_model_name']}</td>
                                <td>{$row['brand_cpu_name']}</td>
                                <td>{$row['spec_cpu_name']}</td>
                                <td>{$row['speed_cpu']}</td>
                                <td>{$row['storage_device_name']}</td>
                                <td>{$row['storage_spec_name']}</td>
                                <td>{$row['ram_computer_name']}</td>
                                <td>{$row['microsoft_office_name']}</td>
                                <td>{$row['key_product_office']}</td>
                                <td>{$row['os_computer_name']}</td>
                                <td>{$row['key_product_windows']}</td>
                                <td>{$row['status_equipment_name']}</td>
                                <td>{$row['department_name']}</td>
                                <td>{$row['segment_name']}</td>
                                <td>{$row['division_name']}</td>
                                <td>{$row['working_name']}</td>
                                <td>{$row['owner_computer']}</td>
                                <td>{$row['created_at']}</td>
                                <td><a href='/Equipment-Lampang-city//application/controllers/admin/update/Update_computer.php?id=" . $row['id'] . "'>
                                    <span class='material-icons-sharp'>drive_file_rename_outline</span>
                                </a>
                                </td>
                                
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
            <h2>ระบบปฎิบัติการ</h2>
            <a href="../../application/controllers/user/search/Search_computer.php">เพิ่มเติม<span class="material-icons-sharp">
                chevron_right
              </span></a>
          </div>

          <div class="investment">
            <img src="../../assets/images/windows 11.png">
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
              include('../../system/database/DB_computer.php');

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
            <img src="../../assets/images/windows 10.png">
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
              include('../../system/database/DB_computer.php');

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
            <img src="../../assets/images/windows 7.png">
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
              include('../../system/database/DB_computer.php');

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