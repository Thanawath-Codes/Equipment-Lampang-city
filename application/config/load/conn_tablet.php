<?php
require_once '../../../system/database/DB_tablet.php';

$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

$sql = "SELECT tl.id, tl.serial_number, tl.year_equipment,
        tb.name AS tablet_brand_name, tm.name AS tablet_model_name, 
        tl.imei_number, tc.name AS tablet_cpu_name,
        ts.name AS tablet_speed_name, ra.name AS tablet_ram_name, ro.name AS tablet_rom_name,
        os.name AS os_tablet_name, st.name AS status_equipment_name,
        d.name AS department_name, s.name AS segment_name, 
        v.name AS division_name, w.name AS working_name, 
        tl.owner_tablet, tl.created_at 
        FROM `tablet_lists` AS tl
        INNER JOIN `tablet_brands` AS tb ON tl.tablet_brand = tb.id
        INNER JOIN `tablet_models` AS tm ON tl.tablet_model = tm.id
        INNER JOIN `tablet_cpus` AS tc ON tl.tablet_cpu = tc.id
        INNER JOIN `tablet_speeds` AS ts ON tl.tablet_speed = ts.id
        INNER JOIN `tablet_rams` AS ra ON tl.tablet_ram = ra.id
        INNER JOIN `tablet_roms` AS ro ON tl.tablet_rom = ro.id
        INNER JOIN `os_tablets` AS os ON tl.os_tablet = os.id
        INNER JOIN `status_equipments` AS st ON tl.status_equipment = st.id
        INNER JOIN `departments` AS d ON tl.department = d.id
        INNER JOIN `segments` AS s ON tl.segment = s.id
        INNER JOIN `divisions` AS v ON tl.division = v.id
        INNER JOIN `workings` AS w ON tl.working = w.id
        ORDER BY tl.id ASC
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
