<?php
include '../../../system/database/DB_ups.php';

$ups_brand_id =   $_POST['ups_brand_data'];

$ups_model = "SELECT * FROM ups_models WHERE ups_brand_id = $ups_brand_id";

$ups_model_qry = mysqli_query($conn, $ups_model);
// $output="";
$output = '<option value="">เลือก รุ่น/โมเดล</option>';
while ($ups_model_row = mysqli_fetch_assoc($ups_model_qry)) {
    $output .= '<option value="' . $ups_model_row['id'] . '">' . $ups_model_row['name'] . '</option>';
}
echo $output;
