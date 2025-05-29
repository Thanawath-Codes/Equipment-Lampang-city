<?php
include '../../../system/database/DB_monitor.php';

$monitor_brand_id =   $_POST['monitor_brand_data'];

$monitor_model = "SELECT * FROM monitor_models WHERE monitor_brand_id = $monitor_brand_id";

$monitor_model_qry = mysqli_query($conn, $monitor_model);
// $output="";
$output = '<option value="">เลือก รุ่น/โมเดล</option>';
while ($monitor_model_row = mysqli_fetch_assoc($monitor_model_qry)) {
    $output .= '<option value="' . $monitor_model_row['id'] . '">' . $monitor_model_row['name'] . '</option>';
}
echo $output;
