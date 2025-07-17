<?php
require_once '../../../system/database/DB_computer.php';

$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

$sql = "SELECT cl.id, rc.name AS ram_computer_name, 
        ms.name AS microsoft_office_name, cl.key_product_office,
        os.name AS os_computer_name, cl.key_product_windows,
        st.name AS status_equipment_name, d.name AS department_name, 
        s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, cl.owner_computer, cl.created_at
        FROM `computer_lists` AS cl
        INNER JOIN `ram_computers` AS rc ON cl.ram_computer = rc.id
        INNER JOIN `microsoft_offices` AS ms ON cl.microsoft_office = ms.id
        INNER JOIN `os_computers` AS os ON cl.os_computer = os.id
        INNER JOIN `status_equipments` AS st ON cl.status_equipment = st.id
        INNER JOIN `departments` AS d ON cl.department = d.id
        INNER JOIN `segments` AS s ON cl.segment = s.id
        INNER JOIN `divisions` AS v ON cl.division = v.id
        INNER JOIN `workings` AS w ON cl.working = w.id
        ORDER BY cl.id ASC
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
