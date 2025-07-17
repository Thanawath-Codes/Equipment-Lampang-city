<?php
require_once '../../../system/database/DB_ups.php';

$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

$sql = "SELECT ul.id, ul.serial_number, ul.year_equipment,
        ub.name AS ups_brand_name, um.name AS ups_model_name, 
        el.name AS electrical_capacity_name, 
        st.name AS status_equipment_name, 
        d.name AS department_name, 
        s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, ul.owner_ups, ul.created_at
        FROM `ups_lists` AS ul
        INNER JOIN `ups_brands` AS ub ON ul.ups_brand = ub.id
        INNER JOIN `ups_models` AS um ON ul.ups_model = um.id
        INNER JOIN `electrical_capacitys` AS el ON ul.electrical_capacity = el.id
        INNER JOIN `status_equipments` AS st ON ul.status_equipment = st.id
        INNER JOIN `departments` AS d ON ul.department = d.id
        INNER JOIN `segments` AS s ON ul.segment = s.id
        INNER JOIN `divisions` AS v ON ul.division = v.id
        INNER JOIN `workings` AS w ON ul.working = w.id
        ORDER BY ul.id ASC
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
