<?php
include '../../../system/database/DB_tablet.php';

$tablet_cpu_id =  $_POST['tablet_cpu_data'];

$tablet_speed = "SELECT * FROM tablet_speeds WHERE tablet_cpu_id = $tablet_cpu_id";
$tablet_speed_qry = mysqli_query($conn, $tablet_speed);


$output = '<option value="">เลือก ความเร็ว</option>';
while ($tablet_speed_row = mysqli_fetch_assoc($tablet_speed_qry)) {
    $output .= '<option value="' . $tablet_speed_row['id'] . '">' . $tablet_speed_row['name'] . '</option>';
}
echo $output;
