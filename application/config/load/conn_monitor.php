<?php
require_once '../../../system/database/DB_monitor.php';

$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

$sql = "SELECT ml.id, ml.serial_number, ml.year_equipment,
        mb.name AS monitor_brand_name, mm.name AS monitor_model_name, 
        ms.name AS monitor_size_name, st.name AS status_equipment_name,
        d.name AS department_name, 
        s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, ml.owner_monitor, ml.created_at
        FROM `monitor_lists` AS ml
        INNER JOIN `monitor_brands` AS mb ON ml.monitor_brand = mb.id
        INNER JOIN `monitor_models` AS mm ON ml.monitor_model = mm.id
        INNER JOIN `monitor_sizes` AS ms ON ml.monitor_size = ms.id
        INNER JOIN `status_equipments` AS st ON ml.status_equipment = st.id
        INNER JOIN `departments` AS d ON ml.department = d.id
        INNER JOIN `segments` AS s ON ml.segment = s.id
        INNER JOIN `divisions` AS v ON ml.division = v.id
        INNER JOIN `workings` AS w ON ml.working = w.id
        ORDER BY ml.id ASC
        LIMIT $start, $limit";

$result = mysqli_query($conn, $sql);

if (!$result) {
        echo json_encode(["error" => "Error executing query: " . mysqli_error($conn)]);
        exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
exit;
