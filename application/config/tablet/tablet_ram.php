<?php
include '../../../system/database/DB_tablet.php';

$tablet_speed_id =  $_POST['tablet_speed_data'];

$tablet_ram = "SELECT * FROM tablet_rams WHERE tablet_speed_id = $tablet_speed_id";
$tablet_ram_qry = mysqli_query($conn, $tablet_ram);


$output = '<option value="">เลือก ความจุข้อมูลแรม</option>';
while ($tablet_ram_row = mysqli_fetch_assoc($tablet_ram_qry)) {
    $output .= '<option value="' . $tablet_ram_row['id'] . '">' . $tablet_ram_row['name'] . '</option>';
}
echo $output;
