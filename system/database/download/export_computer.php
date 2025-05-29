<?php
// เชื่อมต่อกับฐานข้อมูล
require_once '../DB_computer.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ล้างไฟล์ CSV เดิมก่อนสร้างใหม่
$filename = "Equipment_computer_Lampang-city.csv";
file_put_contents($filename, ""); 

// เปิดไฟล์ CSV เพื่อเขียนข้อมูล
$fp = fopen($filename, 'w');

// เขียนหัวข้อคอลัมน์ลงในไฟล์ CSV
$fields = array(
    'ลำดับ', 'เลขครุภัณฑ์', 'ปีงบประมาณ', 'อุปกรณ์', 'เคสคอมพิวเตอร์', 'โมเดล', 'ชิปคอมพิวเตอร์', 'สเปค', 'ความเร็ว',
    'อุปกรณ์จัดเก็บข้อมูล', 'พื้นที่จัดเก็บข้อมูล', 'แรม', 'ไมโครซอฟท์ออฟฟิศ', 'คีย์ผลิตภัณฑ์ไมโครซอฟท์ออฟฟิศ', 'ระบบปฏิบัติการ', 'คีย์ผลิตภัณฑ์ระบบปฏิบัติการ',
    'สถานะครุภัณฑ์', 'กอง/สำนัก', 'ส่วน', 'ฝ่าย', 'งาน', 'ผู้ใช้งานครุภัณฑ์'
);
fputcsv($fp, $fields);

// ปิด Query Cache
mysqli_query($conn, "SET SESSION query_cache_type = OFF;");
mysqli_query($conn, "FLUSH TABLES;");

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT cl.id, cl.serial_number, cl.year_equipment,
        ct.name AS computer_type_name, cc.name AS computer_case_name,
        cm.name AS computer_model_name, bc.name AS brand_cpu_name,
        sc.name AS spec_cpu_name, cl.speed_cpu, sd.name AS storage_device_name,
        sp.name AS storage_spec_name, rc.name AS ram_computer_name, 
        ms.name AS microsoft_office_name, cl.key_product_office,
        os.name AS os_computer_name, cl.key_product_windows,
        st.name AS status_equipment_name, d.name AS department_name, 
        s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, cl.owner_computer
        FROM `computer_lists` AS cl
        INNER JOIN `computer_types` AS ct ON cl.computer_type = ct.id
        INNER JOIN `computer_cases` AS cc ON cl.computer_case = cc.id
        INNER JOIN `computer_models` AS cm ON cl.computer_model = cm.id
        INNER JOIN `brand_cpus` AS bc ON cl.brand_cpu = bc.id
        INNER JOIN `spec_cpus` AS sc ON cl.spec_cpu = sc.id
        INNER JOIN `storage_devices` AS sd ON cl.storage_device = sd.id
        INNER JOIN `storage_specs` AS sp ON cl.storage_spec = sp.id
        INNER JOIN `ram_computers` AS rc ON cl.ram_computer = rc.id
        INNER JOIN `microsoft_offices` AS ms ON cl.microsoft_office = ms.id
        INNER JOIN `os_computers` AS os ON cl.os_computer = os.id
        INNER JOIN `status_equipments` AS st ON cl.status_equipment = st.id
        INNER JOIN `departments` AS d ON cl.department = d.id
        INNER JOIN `segments` AS s ON cl.segment = s.id
        INNER JOIN `divisions` AS v ON cl.division = v.id
        INNER JOIN `workings` AS w ON cl.working = w.id
        ORDER BY cl.id DESC";

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
        $row['computer_type_name'],
        $row['computer_case_name'],
        $row['computer_model_name'],
        $row['brand_cpu_name'],
        $row['spec_cpu_name'],
        $row['speed_cpu'],
        $row['storage_device_name'],
        $row['storage_spec_name'],
        $row['ram_computer_name'],
        $row['microsoft_office_name'],
        $row['key_product_office'],
        $row['os_computer_name'],
        $row['key_product_windows'],
        $row['status_equipment_name'],
        $row['department_name'],
        $row['segment_name'],
        $row['division_name'],
        $row['working_name'],
        $row['owner_computer'],
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
