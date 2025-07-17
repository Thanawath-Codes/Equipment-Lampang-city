<?php

include '../../../system/database/DB_printer.php';

$printer_kind_id =  $_POST['printer_kind_data'];

$connecting_printer = "SELECT * FROM connecting_printers WHERE printer_kind_id = $printer_kind_id";
$connecting_printer_qry = mysqli_query($conn, $connecting_printer);


$output = '<option value="">เลือก การเชื่อมต่อเครื่องพิมพ์เอกสาร</option>';
while ($connecting_printer_row = mysqli_fetch_assoc($connecting_printer_qry)) {
    $output .= '<option value="' . $connecting_printer_row['id'] . '">' . $connecting_printer_row['name'] . '</option>';
}
echo $output;
