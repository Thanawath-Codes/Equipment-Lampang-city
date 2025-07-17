<?php
include $_SERVER['DOCUMENT_ROOT'] . '/Equipment-Lampang-city/system/database/DB_account.php';

$segment_id =  $_POST['segment_data'];

$division = "SELECT * FROM divisions WHERE segment_id = $segment_id";
$division_qry = mysqli_query($conn, $division);


$output = '<option value="">เลือกฝ่าย</option>';
while ($division_row = mysqli_fetch_assoc($division_qry)) {
    $output .= '<option value="' . $division_row['id'] . '">' . $division_row['name'] . '</option>';
}
echo $output;
