<?php

include '../../../system/database/DB_printer.php';

$printer_type_id =  $_POST['printer_type_data'];

$printer_kind = "SELECT * FROM printer_kinds WHERE printer_type_id = $printer_type_id";
$printer_kind_qry = mysqli_query($conn, $printer_kind);


$output = '<option value="">เลือก ชนิดเครื่องพิมพ์เอกสาร</option>';
while ($printer_kind_row = mysqli_fetch_assoc($printer_kind_qry)) {
    $output .= '<option value="' . $printer_kind_row['id'] . '">' . $printer_kind_row['name'] . '</option>';
}
echo $output;
