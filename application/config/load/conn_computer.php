<?php
require_once '../../../system/database/DB_computer.php';

$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

$sql = "SELECT cl.id, cl.serial_number, cl.year_equipment,
        ct.name AS computer_type_name, cc.name AS computer_case_name,
        cm.name AS computer_model_name, bc.name AS brand_cpu_name,
        sc.name AS spec_cpu_name, cl.speed_cpu,
        sd.name AS storage_device_name, sp.name AS storage_spec_name
        FROM `computer_lists` AS cl
        INNER JOIN `computer_types` AS ct ON cl.computer_type = ct.id
        INNER JOIN `computer_cases` AS cc ON cl.computer_case = cc.id
        INNER JOIN `computer_models` AS cm ON cl.computer_model = cm.id
        INNER JOIN `brand_cpus` AS bc ON cl.brand_cpu = bc.id
        INNER JOIN `spec_cpus` AS sc ON cl.spec_cpu = sc.id
        INNER JOIN `storage_devices` AS sd ON cl.storage_device = sd.id
        INNER JOIN `storage_specs` AS sp ON cl.storage_spec = sp.id
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
