<?php
include '../../../system/database/DB_tablet.php';

$tablet_model_id =  $_POST['tablet_model_data'];

$tablet_cpu = "SELECT * FROM tablet_cpus WHERE tablet_model_id = $tablet_model_id";
$tablet_cpu_qry = mysqli_query($conn, $tablet_cpu);


$output = '<option value="">เลือก ชิปเซตแท็บเล็ต</option>';
while ($tablet_cpu_row = mysqli_fetch_assoc($tablet_cpu_qry)) {
    $output .= '<option value="' . $tablet_cpu_row['id'] . '">' . $tablet_cpu_row['name'] . '</option>';
}
echo $output;
