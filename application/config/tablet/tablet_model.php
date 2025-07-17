<?php
include '../../../system/database/DB_tablet.php';

$tablet_brand_id =   $_POST['tablet_brand_data'];

$tablet_model = "SELECT * FROM tablet_models WHERE tablet_brand_id = $tablet_brand_id";

$tablet_model_qry = mysqli_query($conn, $tablet_model);
// $output="";
$output = '<option value="">เลือก รุ่น/โมเดล</option>';
while ($tablet_model_row = mysqli_fetch_assoc($tablet_model_qry)) {
    $output .= '<option value="' . $tablet_model_row['id'] . '">' . $tablet_model_row['name'] . '</option>';
}
echo $output;
