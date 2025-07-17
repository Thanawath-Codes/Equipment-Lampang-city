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


$sql = "
    SELECT 
        cl.year_equipment,
        ms.name AS microsoft_office,
        COUNT(*) AS user_count
    FROM computer_lists cl
    INNER JOIN microsoft_offices ms ON cl.microsoft_office = ms.id
    GROUP BY cl.year_equipment, ms.name
";


$result = mysqli_query($conn, $sql);

// ตรวจสอบผลลัพธ์
if (!$result) {
    header('Content-Type: application/json');
    http_response_code(500);
    echo json_encode(["error" => "Query failed: " . mysqli_error($conn)]);
    exit;
}

// แปลงผลลัพธ์เป็น JSON
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        'year_equipment' => (int)$row['year_equipment'],             // ค.ศ.
        'microsoft_office' => trim($row['microsoft_office']),
        'user_count' => (int)$row['user_count']
    ];
}

header('Content-Type: application/json');
echo json_encode($data);
exit;
?>
