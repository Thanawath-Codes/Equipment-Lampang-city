<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Equipment-Lampang-city/system/database/DB_account.php';

$department_id =   $_POST['department_data'];

$segment = "SELECT * FROM segments WHERE department_id = $department_id";

$segment_qry = mysqli_query($conn, $segment);
// $output="";
$output = '<option value="">เลือกส่วน</option>';
while ($segment_row = mysqli_fetch_assoc($segment_qry)) {
    $output .= '<option value="' . $segment_row['id'] . '">' . $segment_row['name'] . '</option>';
}
echo $output;
