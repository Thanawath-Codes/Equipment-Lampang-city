<?php
include '../../../system/database/DB_tablet.php';

$tablet_ram_id =  $_POST['tablet_ram_data'];

$tablet_rom = "SELECT * FROM tablet_roms WHERE tablet_ram_id = $tablet_ram_id";
$tablet_rom_qry = mysqli_query($conn, $tablet_rom);


$output = '<option value="">เลือก ความจุข้อมูลรอม</option>';
while ($tablet_rom_row = mysqli_fetch_assoc($tablet_rom_qry)) {
    $output .= '<option value="' . $tablet_rom_row['id'] . '">' . $tablet_rom_row['name'] . '</option>';
}
echo $output;
