<?php
// เชื่อมต่อกับฐานข้อมูล
require_once '../DB_tablet.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ล้างไฟล์ CSV เดิมก่อนสร้างใหม่
$filename = "Equipment_Tablet_lampangcity.csv";
file_put_contents($filename, ""); 

// เปิดไฟล์ CSV เพื่อเขียนข้อมูล
$fp = fopen($filename, 'w');

// เขียนหัวข้อคอลัมน์ลงในไฟล์ CSV
$fields = array('ลำดับ', 'เลขครุภัณฑ์', 'ปีงบประมาณ', 'แบรนด์', 'รุ่น/โมเดล', 'รหัสประจำเครื่อง', 'ซีพียู', 'ความเร็ว','แรม','รอม','ระบบปฏิบัติการ','สถานะครุภัณฑ์', 'กอง/สำนัก', 'ส่วน', 'ฝ่าย', 'งาน', 'ผู้ใช้งานครุภัณฑ์');
fputcsv($fp, $fields);

// ปิด Query Cache
mysqli_query($conn, "SET SESSION query_cache_type = OFF;");
mysqli_query($conn, "FLUSH TABLES;");

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT tl.id, tl.serial_number, tl.year_equipment,tl.owner_tablet,
        tb.name AS tablet_brand_name, tm.name AS tablet_model_name, 
        tl.imei_number, tc.name AS tablet_cpu_name, ts.name AS tablet_speed_name,
        ra.name AS tablet_ram_name, ro.name AS tablet_rom_name, os.name AS os_tablet_name,
        st.name AS status_equipment_name, d.name AS department_name, s.name AS segment_name,
        v.name AS division_name, w.name AS working_name
        FROM `tablet_lists` AS tl
        INNER JOIN `tablet_brands` AS tb ON tl.tablet_brand = tb.id
        INNER JOIN `tablet_models` AS tm ON tl.tablet_model = tm.id
        INNER JOIN `tablet_cpus` AS tc ON tl.tablet_cpu = tc.id
        INNER JOIN `tablet_speeds` AS ts ON tl.tablet_speed = ts.id
        INNER JOIN `tablet_rams` AS ra ON tl.tablet_ram = ra.id
        INNER JOIN `tablet_roms` AS ro ON tl.tablet_rom = ro.id
        INNER JOIN `os_tablets` AS os ON tl.os_tablet = os.id
        INNER JOIN `status_equipments` AS st ON tl.status_equipment = st.id
        INNER JOIN `departments` AS d ON tl.department = d.id
        INNER JOIN `segments` AS s ON tl.segment = s.id
        INNER JOIN `divisions` AS v ON tl.division = v.id
        INNER JOIN `workings` AS w ON tl.working = w.id
        ORDER BY tl.id DESC";

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
        $row['tablet_brand_name'],
        $row['tablet_model_name'],
        $row['imei_number'],
        $row['tablet_cpu_name'],
        $row['tablet_speed_name'],
        $row['tablet_ram_name'],
        $row['tablet_rom_name'],
        $row['os_tablet_name'],
        $row['status_equipment_name'],
        $row['department_name'],
        $row['segment_name'],
        $row['division_name'],
        $row['working_name'],
        $row['owner_tablet']
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
