<?php
include '../../../system/database/DB_scanner.php';

$scanner_model_id =  $_POST['scanner_model_data'];

$printing_speed = "SELECT * FROM printing_speeds WHERE scanner_model_id = $scanner_model_id";
$printing_speed_qry = mysqli_query($conn, $printing_speed);


$output = '<option value="">เลือก ความเร็วในการพิมพ์เอกสาร</option>';
while ($printing_speed_row = mysqli_fetch_assoc($printing_speed_qry)) {
    $output .= '<option value="' . $printing_speed_row['id'] . '">' . $printing_speed_row['name'] . '</option>';
}
echo $output;
