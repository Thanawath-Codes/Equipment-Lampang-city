<?php
include '../../../system/database/DB_printer.php';

$printer_brand_id =   $_POST['printer_brand_data'];

$printer_model = "SELECT * FROM printer_models WHERE printer_brand_id = $printer_brand_id";

$printer_model_qry = mysqli_query($conn, $printer_model);
// $output="";
$output = '<option value="">เลือก รุ่น/โมเดล</option>';
while ($printer_model_row = mysqli_fetch_assoc($printer_model_qry)) {
    $output .= '<option value="' . $printer_model_row['id'] . '">' . $printer_model_row['name'] . '</option>';
}
echo $output;
