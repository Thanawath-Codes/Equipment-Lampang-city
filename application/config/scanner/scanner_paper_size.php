<?php
include '../../../system/database/DB_scanner.php';

$printing_speed_id =  $_POST['printing_speed_data'];

$scanner_paper_size = "SELECT * FROM scanner_paper_sizes WHERE printing_speed_id = $printing_speed_id";
$scanner_paper_size_qry = mysqli_query($conn, $scanner_paper_size);


$output = '<option value="">เลือก ขนาดกระดาษ</option>';
while ($scanner_paper_size_row = mysqli_fetch_assoc($scanner_paper_size_qry)) {
    $output .= '<option value="' . $scanner_paper_size_row['id'] . '">' . $scanner_paper_size_row['name'] . '</option>';
}
echo $output;
