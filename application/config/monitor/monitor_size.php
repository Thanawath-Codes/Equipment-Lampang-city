<?php
include '../../../system/database/DB_monitor.php';

$monitor_model_id =  $_POST['monitor_model_data'];

$monitor_size = "SELECT * FROM monitor_sizes WHERE monitor_model_id = $monitor_model_id";
$monitor_size_qry = mysqli_query($conn, $monitor_size);


$output = '<option value="">เลือก ขนาดหน้าจอคอมพิวเตอร์</option>';
while ($monitor_size_row = mysqli_fetch_assoc($monitor_size_qry)) {
    $output .= '<option value="' . $monitor_size_row['id'] . '">' . $monitor_size_row['name'] . '</option>';
}
echo $output;
