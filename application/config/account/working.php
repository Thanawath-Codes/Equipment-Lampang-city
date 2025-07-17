<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Equipment-Lampang-city/system/database/DB_account.php';

$division_id =  $_POST['division_data'];

$working = "SELECT * FROM workings WHERE division_id = $division_id";
$working_qry = mysqli_query($conn, $working);


$output = '<option value="">เลือกงาน</option>';
while ($working_row = mysqli_fetch_assoc($working_qry)) {
    $output .= '<option value="' . $working_row['id'] . '">' . $working_row['name'] . '</option>';
}
echo $output;
