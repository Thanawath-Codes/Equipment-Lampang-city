<?php
// เชื่อมต่อฐานข้อมูล
include_once '../../../system/database/DB_computer.php';

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if (!isset($conn) || !mysqli_ping($conn)) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(["error" => "Database connection failed"]);
    exit;
}

// รับค่าพารามิเตอร์ start และ limit
$start = isset($_GET['start']) && is_numeric($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) && is_numeric($_GET['limit']) ? (int)$_GET['limit'] : 10;
if ($start < 0) $start = 0;
if ($limit < 1) $limit = 10;

// SQL Query
$sql = "SELECT cl.year_equipment, ms.name AS microsoft_office, COUNT(*) AS user_count
        FROM `computer_lists` AS cl
        INNER JOIN `microsoft_offices` AS ms ON cl.microsoft_office = ms.id
        GROUP BY cl.year_equipment, ms.name
        ORDER BY cl.year_equipment ASC
        LIMIT $start, $limit";

$result = mysqli_query($conn, $sql);

// ตรวจสอบผลลัพธ์
if (!$result) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(["error" => "Query failed: " . mysqli_error($conn)]);
    exit;
}

// ดึงข้อมูลจากฐานข้อมูล
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

// กำหนด Content-Type และส่งข้อมูล JSON
header('Content-Type: application/json');
echo json_encode($data);
exit;
?>
