<?php
// เชื่อมต่อกับฐานข้อมูล
require_once '../DB_account.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// ล้างไฟล์ CSV เดิมก่อนสร้างใหม่
$filename = "Account_Lampang-city.csv";
file_put_contents($filename, ""); 

// เปิดไฟล์ CSV เพื่อเขียนข้อมูล
$fp = fopen($filename, 'w');

// เขียนหัวข้อคอลัมน์ลงในไฟล์ CSV
$fields = array('ลำดับ', 'ชื่อ', 'นามสกุล', 'อีเมล', 'เบอร์โทร', 'กอง/สำนัก', 'ส่วน', 'ฝ่าย', 'งาน', 'ชื่อผู้ใช้', 'สิทธิ์ผู้ใช้');
fputcsv($fp, $fields);

// ปิด Query Cache
mysqli_query($conn, "SET SESSION query_cache_type = OFF;");
mysqli_query($conn, "FLUSH TABLES;");

// ดึงข้อมูลจากฐานข้อมูล
$sql = "SELECT u.id, u.first_name, u.last_name, u.email_address, u.phone, 
               d.name AS department_name, s.name AS segment_name,
               i.name AS division_name, w.name AS working_name,
               u.username, u.urole
        FROM `user` AS u
        INNER JOIN `departments` AS d ON u.department = d.id
        INNER JOIN `segments` AS s ON u.segment = s.id
        INNER JOIN `divisions` AS i ON u.division = i.id
        INNER JOIN `workings` AS w ON u.working = w.id
        ORDER BY ml.id DESC";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Error executing query: " . mysqli_error($conn));
}

// เขียนข้อมูลลง CSV
while ($row = mysqli_fetch_assoc($result)) {
    $csv_data = array(
        $row['id'],
        $row['first_name'],
        $row['last_name'],
        $row['email_address'],
        $row['phone'],
        $row['department_name'],
        $row['segment_name'],
        $row['division_name'],
        $row['working_name'],
        $row['urole']
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
