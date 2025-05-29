<?php

include '../../../system/database/DB_printer.php';

$connecting_printer_id =  $_POST['connecting_printer_data'];

$color_printing = "SELECT * FROM color_printings WHERE connecting_printer_id = $connecting_printer_id";
$color_printing_qry = mysqli_query($conn, $color_printing);


$output = '<option value="">เลือก สีหมึกเครื่องพิมพ์</option>';
while ($color_printing_row = mysqli_fetch_assoc($color_printing_qry)) {
    $output .= '<option value="' . $color_printing_row['id'] . '">' . $color_printing_row['name'] . '</option>';
}
echo $output;
