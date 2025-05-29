<?php
require_once '../../../system/database/DB_printer.php';

$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;

$sql = "SELECT pl.id, pl.serial_number, pl.year_equipment,
        pb.name AS printer_brand_name, pm.name AS printer_model_name, 
        pt.name AS printer_type_name, pk.name AS printer_kind_name,
        cn.name AS connecting_printer_name, cl.name AS color_printing_name,
        ps.name AS paper_size_printing_name,
        st.name AS status_equipment_name, d.name AS department_name, 
        s.name AS segment_name, v.name AS division_name, 
        w.name AS working_name, pl.owner_printer, pl.created_at
        FROM `printer_lists` AS pl
        INNER JOIN `printer_brands` AS pb ON pl.printer_brand = pb.id
        INNER JOIN `printer_models` AS pm ON pl.printer_model = pm.id
        INNER JOIN `printer_types` AS pt ON pl.printer_type = pt.id
        INNER JOIN `printer_kinds` AS pk ON pl.printer_kind = pk.id
        INNER JOIN `connecting_printers` AS cn ON pl.connecting_printer = cn.id
        INNER JOIN `color_printings` AS cl ON pl.color_printing = cl.id
        INNER JOIN `paper_size_printings` AS ps ON pl.paper_size_printing = ps.id
        INNER JOIN `status_equipments` AS st ON pl.status_equipment = st.id
        INNER JOIN `departments` AS d ON pl.department = d.id
        INNER JOIN `segments` AS s ON pl.segment = s.id
        INNER JOIN `divisions` AS v ON pl.division = v.id
        INNER JOIN `workings` AS w ON pl.working = w.id
        ORDER BY pl.id ASC
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
