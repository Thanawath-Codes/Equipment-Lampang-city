<?php

include '../../../system/database/DB_printer.php';

$color_printing_id =  $_POST['color_printing_data'];

$paper_size_printing = "SELECT * FROM paper_size_printings WHERE color_printing_id = $color_printing_id";
$paper_size_printing_qry = mysqli_query($conn, $paper_size_printing);


$output = '<option value="">เลือก ขนาดกระดาษ</option>';
while ($paper_size_printing_row = mysqli_fetch_assoc($paper_size_printing_qry)) {
    $output .= '<option value="' . $paper_size_printing_row['id'] . '">' . $paper_size_printing_row['name'] . '</option>';
}
echo $output;
