<?php
include '../../../system/database/DB_tablet.php';

$tablet_rom_id =  $_POST['tablet_rom_data'];

$os_tablet = "SELECT * FROM os_tablets WHERE tablet_rom_id = $tablet_rom_id";
$os_tablet_qry = mysqli_query($conn, $os_tablet);


$output = '<option value="">เลือก ระบบปฏิบัติการ</option>';
while ($os_tablet_row = mysqli_fetch_assoc($os_tablet_qry)) {
    $output .= '<option value="' . $os_tablet_row['id'] . '">' . $os_tablet_row['name'] . '</option>';
}
echo $output;
