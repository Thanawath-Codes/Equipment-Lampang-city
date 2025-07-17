<?php
// เชื่อมต่อกับฐานข้อมูล
require_once '../DB_monitor.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ล้างไฟล์ CSV เดิมก่อนสร้างใหม่
$filename = "equipment_monitor_lampangcity.csv";
file_put_contents($filename, ""); 

// เปิดไฟล์ CSV เพื่อเขียนข้อมูล
$fp = fopen($filename, 'w');

// เขียนหัวข้อคอลัมน์ลงในไฟล์ CSV
$fields = array('ลำดับ', 'เลขครุภัณฑ์', 'ปีงบประมาณ', 'แบรนด์', 'รุ่น/โมเดล', 'ขนาดหน้าจอ', 'สถานะครุภัณฑ์', 'กอง/สำนัก', 'ส่วน', 'ฝ่าย', 'งาน', 'ผู้ใช้งานครุภัณฑ์');
fputcsv($fp, $fields);

// ปิด Query Cache
mysqli_query($conn, "SET SESSION query_cache_type = OFF;");
mysqli_query($conn, "FLUSH TABLES;");

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT ml.id, ml.serial_number, ml.year_equipment, ml.owner_monitor,
        mb.name AS monitor_brand_name, mm.name AS monitor_model_name, ms.name AS monitor_size_name,
        st.name AS status_equipment_name, d.name AS department_name, s.name AS segment_name,
        v.name AS division_name, w.name AS working_name
        FROM `monitor_lists` AS ml
        INNER JOIN `monitor_brands` AS mb ON ml.monitor_brand = mb.id
        INNER JOIN `monitor_models` AS mm ON ml.monitor_model = mm.id
        INNER JOIN `monitor_sizes` AS ms ON ml.monitor_size = ms.id
        INNER JOIN `status_equipments` AS st ON ml.status_equipment = st.id
        INNER JOIN `departments` AS d ON ml.department = d.id
        INNER JOIN `segments` AS s ON ml.segment = s.id
        INNER JOIN `divisions` AS v ON ml.division = v.id
        INNER JOIN `workings` AS w ON ml.working = w.id
        ORDER BY ml.id DESC";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// เขียนข้อมูลลง CSV
while ($row = mysqli_fetch_assoc($result)) {
    $csv_data = array(
        $row['id'],
        $row['serial_number'],
        $row['year_equipment'],
        $row['monitor_brand_name'],
        $row['monitor_model_name'],
        $row['monitor_size_name'],
        $row['status_equipment_name'],
        $row['department_name'],
        $row['segment_name'],
        $row['division_name'],
        $row['working_name'],
        $row['owner_monitor']
    );
    fputcsv($fp, $csv_data);
}

// ปิดไฟล์ CSV
fclose($fp);

// ตั้งค่า Header ป้องกันแคช
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '"');
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// ล้าง output buffer
if (ob_get_contents()) ob_clean();

// ส่งไฟล์ CSV
readfile($filename);
exit; // ออกจากสคริปต์ก่อนลบไฟล์

// ลบไฟล์ (เอาออกถ้าไม่ต้องการให้ลบทันที)
unlink($filename);
?>
