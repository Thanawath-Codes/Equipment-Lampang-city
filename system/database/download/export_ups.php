
<?php
// เชื่อมต่อกับฐานข้อมูล
require_once '../DB_ups.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ล้างไฟล์ CSV เดิมก่อนสร้างใหม่
$filename = "equipment_ups_lampangcity.csv";
file_put_contents($filename, ""); 

// เปิดไฟล์ CSV เพื่อเขียนข้อมูล
$fp = fopen($filename, 'w');

// เขียนหัวข้อคอลัมน์ลงในไฟล์ CSV
$fields = array('ลำดับ', 'เลขครุภัณฑ์', 'ปีงบประมาณ', 'แบรนด์', 'รุ่น/โมเดล', 'ความจุไฟฟ้า', 'สถานะครุภัณฑ์', 'กอง/สำนัก', 'ส่วน', 'ฝ่าย', 'งาน', 'ผู้ใช้งานครุภัณฑ์');
fputcsv($fp, $fields);

// ปิด Query Cache
mysqli_query($conn, "SET SESSION query_cache_type = OFF;");
mysqli_query($conn, "FLUSH TABLES;");

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT ul.id, ul.serial_number, ul.year_equipment, ul.owner_ups,
        ub.name AS ups_brand_name, um.name AS ups_model_name, 
        cp.name AS electrical_capacity_name, st.name AS status_equipment_name,
        d.name AS department_name, s.name AS segment_name,
        v.name AS division_name, w.name AS working_name
        FROM `ups_lists` AS ul
        INNER JOIN `ups_brands` AS ub ON ul.ups_brand = ub.id
        INNER JOIN `ups_models` AS um ON ul.ups_model = um.id
        INNER JOIN `electrical_capacitys` AS cp ON ul.electrical_capacity = cp.id
        INNER JOIN `status_equipments` AS st ON ul.status_equipment = st.id
        INNER JOIN `departments` AS d ON ul.department = d.id
        INNER JOIN `segments` AS s ON ul.segment = s.id
        INNER JOIN `divisions` AS v ON ul.division = v.id
        INNER JOIN `workings` AS w ON ul.working = w.id";
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
        $row['ups_brand_name'],
        $row['ups_model_name'],
        $row['electrical_capacity_name'],
        $row['status_equipment_name'],
        $row['department_name'],
        $row['segment_name'],
        $row['division_name'],
        $row['working_name'],
        $row['owner_ups']
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
