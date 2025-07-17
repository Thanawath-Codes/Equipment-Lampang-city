<?php
// เริ่มต้น session หรือเชื่อมต่อฐานข้อมูลตามความจำเป็น
require_once '../../../system/database/DB_scanner.php';

// กำหนดค่าเริ่มต้นสำหรับ start และ limit
$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

$sql = "SELECT sl.id, sl.serial_number, sl.year_equipment,
        sb.name AS scanner_brand_name, sm.name AS scanner_model_name,
        ps.name AS printing_speed_name, sp.name AS scanner_paper_size_name,
        se.name AS status_equipment_name, d.name AS department_name, 
        s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, sl.owner_scanner, sl.created_at
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
        ORDER BY sl.id ASC
        LIMIT $start, $limit";

$result = mysqli_query($conn, $sql);

if (!$result) {
        echo json_encode(['error' => "Error executing query: " . mysqli_error($conn)]);
        exit;
}

$data = [];

while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
}

header('Content-Type: application/json');

echo json_encode($data);
exit;
