<?php
// เชื่อมต่อกับฐานข้อมูล
require_once '../DB_printer.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ล้างไฟล์ CSV เดิมก่อนสร้างใหม่
$filename = "Equipment_printer_Lampang-city.csv";
file_put_contents($filename, ""); 

// เปิดไฟล์ CSV เพื่อเขียนข้อมูล
$fp = fopen($filename, 'w');

// เขียนหัวข้อคอลัมน์ลงในไฟล์ CSV
$fields = array('ลำดับ', 'เลขครุภัณฑ์', 'ปีงบประมาณ', 'แบรนด์', 'รุ่น/โมเดล', 'ประเภท', 'ชนิด', 'การเชื่อมต่อ', 'สี', 'ขนาดกระดาษ', 'สถานะครุภัณฑ์', 'กอง/สำนัก', 'ส่วน', 'ฝ่าย', 'งาน', 'ผู้ใช้งานครุภัณฑ์');
fputcsv($fp, $fields);

// ปิด Query Cache
mysqli_query($conn, "SET SESSION query_cache_type = OFF;");
mysqli_query($conn, "FLUSH TABLES;");

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT pl.id, pl.serial_number, pl.year_equipment, pl.owner_printer,
        pb.name AS printer_brand_name, pm.name AS printer_model_name, 
        pt.name AS printer_type_name, pk.name AS printer_kind_name,
        cn.name AS connecting_printer_name, cl.name AS color_printing_name,
        ps.name AS paper_size_printing_name, se.name AS status_equipment_name,
        d.name AS department_name, s.name AS segment_name,
        v.name AS division_name, w.name AS working_name
        FROM `printer_lists` AS pl
        INNER JOIN `printer_brands` AS pb ON pl.printer_brand = pb.id
        INNER JOIN `printer_models` AS pm ON pl.printer_model = pm.id
        INNER JOIN `printer_types` AS pt ON pl.printer_type = pt.id
        INNER JOIN `printer_kinds` AS pk ON pl.printer_kind = pk.id
        INNER JOIN `connecting_printers` AS cn ON pl.connecting_printer = cn.id
        INNER JOIN `color_printings` AS cl ON pl.color_printing = cl.id
        INNER JOIN `paper_size_printings` AS ps ON pl.paper_size_printing = ps.id
        INNER JOIN `status_equipments` AS se ON pl.status_equipment = se.id
        INNER JOIN `departments` AS d ON pl.department = d.id
        INNER JOIN `segments` AS s ON pl.segment = s.id
        INNER JOIN `divisions` AS v ON pl.division = v.id
        INNER JOIN `workings` AS w ON pl.working = w.id
        ORDER BY pl.id DESC";

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
        $row['printer_brand_name'],
        $row['printer_model_name'],
        $row['printer_type_name'],
        $row['printer_kind_name'],
        $row['connecting_printer_name'],
        $row['color_printing_name'],
        $row['paper_size_printing_name'],
        $row['status_equipment_name'],
        $row['department_name'],
        $row['segment_name'],
        $row['division_name'],
        $row['working_name'],
        $row['owner_printer']
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
