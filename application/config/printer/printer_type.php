<?php
include '../../../system/database/DB_printer.php';
$printer_model_id =  $_POST['printer_model_data'];

$printer_type = "SELECT * FROM printer_types WHERE printer_model_id = $printer_model_id";
$printer_type_qry = mysqli_query($conn, $printer_type);


$output = '<option value="">เลือก ประเภทเครื่องพิมพ์เอกสาร</option>';
while ($printer_type_row = mysqli_fetch_assoc($printer_type_qry)) {
    $output .= '<option value="' . $printer_type_row['id'] . '">' . $printer_type_row['name'] . '</option>';
}
echo $output;
