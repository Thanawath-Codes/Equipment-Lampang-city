<?php
require_once '../../../system/database/DB_account.php';

$start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
$query = isset($_GET['query']) ? $_GET['query'] : '';

$sql = "SELECT us.id, us.first_name, us.last_name, 
        us.email_address, us.phone,
        d.name AS department_name, s.name AS segment_name, 
        v.name AS division_name, w.name AS working_name, 
        r.name AS urole_name, us.username, us.created_at
        FROM `user` AS us
        INNER JOIN `departments` AS d ON us.department = d.id
        INNER JOIN `segments` AS s ON us.segment = s.id
        INNER JOIN `divisions` AS v ON us.division = v.id
        INNER JOIN `workings` AS w ON us.working = w.id
        INNER JOIN `uroles` AS r ON us.urole = r.id";

if (!empty($query)) {
    $sql .= " WHERE us.first_name LIKE '%$query%' 
              OR us.last_name LIKE '%$query%' 
              OR us.email_address LIKE '%$query%' 
              OR us.username LIKE '%$query%' ";
}

$sql .= " ORDER BY us.id ASC LIMIT $start, $limit";

$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["error" => "Error executing query: " . $conn->error]);
    exit;
}

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

header('Content-Type: application/json');
echo json_encode($data);
exit;
