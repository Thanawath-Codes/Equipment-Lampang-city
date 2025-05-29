<?php
include '../../../system/database/DB_scanner.php';

$scanner_brand_id =   $_POST['scanner_brand_data'];

$scanner_model = "SELECT * FROM scanner_models WHERE scanner_brand_id = $scanner_brand_id";

$scanner_model_qry = mysqli_query($conn, $scanner_model);
// $output="";
$output = '<option value="">เลือก รุ่น/โมเดล</option>';
while ($scanner_model_row = mysqli_fetch_assoc($scanner_model_qry)) {
    $output .= '<option value="' . $scanner_model_row['id'] . '">' . $scanner_model_row['name'] . '</option>';
}
echo $output;
