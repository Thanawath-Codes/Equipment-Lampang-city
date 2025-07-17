<?php
// เชื่อมต่อกับฐานข้อมูล
require_once '../../../system/database/DB_scanner.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ล้างไฟล์ CSV เดิมก่อนสร้างใหม่
$filename = "Equipment_scanner_Lampang-city.csv";
file_put_contents($filename, ""); 

// เปิดไฟล์ CSV เพื่อเขียนข้อมูล
$fp = fopen($filename, 'w');

// เขียนหัวข้อคอลัมน์ลงในไฟล์ CSV
$fields = array('ลำดับ', 'เลขครุภัณฑ์', 'ปีงบประมาณ', 'แบรนด์', 'รุ่น/โมเดล', 'ความเร็วในการพิมพ์', 'ขนาดกระดาษ', 'สถานะครุภัณฑ์', 'กอง/สำนัก', 'ส่วน', 'ฝ่าย', 'งาน', 'ผู้ใช้งานครุภัณฑ์');
fputcsv($fp, $fields);

// ปิด Query Cache
mysqli_query($conn, "SET SESSION query_cache_type = OFF;");
mysqli_query($conn, "FLUSH TABLES;");

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT sl.id, sl.serial_number, sl.year_equipment, sl.owner_scanner,
        sb.name AS scanner_brand_name, sm.name AS scanner_model_name,
        ps.name AS printing_speed_name, sp.name AS scanner_paper_size_name,
        se.name AS status_equipment_name, d.name AS department_name, s.name AS segment_name,
        v.name AS division_name, w.name AS working_name
        FROM `scanner_lists` AS sl
        INNER JOIN `scanner_brands` AS sb ON sl.scanner_brand = sb.id
        INNER JOIN `scanner_models` AS sm ON sl.scanner_model = sm.id
        INNER JOIN `printing_speeds` AS ps ON sl.printing_speed = ps.id
        INNER JOIN `scanner_paper_sizes` AS sp ON sl.scanner_paper_size = sp.id
        INNER JOIN `status_equipments` AS se ON sl.status_equipment = se.id
        INNER JOIN `departments` AS d ON sl.department = d.id
        INNER JOIN `segments` AS s ON sl.segment = s.id
        INNER JOIN `divisions` AS v ON sl.division = v.id
        INNER JOIN `workings` AS w ON sl.working = w.id
        ORDER BY sl.id DESC";

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
        $row['scanner_brand_name'],
        $row['scanner_model_name'],
        $row['printing_speed_name'],
        $row['scanner_paper_size_name'],
        $row['status_equipment_name'],
        $row['department_name'],
        $row['segment_name'],
        $row['division_name'],
        $row['working_name'],
        $row['owner_scanner']
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
