<?php
include '../../../system/database/DB_ups.php';

$ups_model_id =  $_POST['ups_model_data'];

$electrical_capacity = "SELECT * FROM electrical_capacitys WHERE ups_model_id = $ups_model_id";
$electrical_capacity_qry = mysqli_query($conn, $electrical_capacity);


$output = '<option value="">เลือก กำลังการผลิตไฟฟ้า</option>';
while ($electrical_capacity_row = mysqli_fetch_assoc($electrical_capacity_qry)) {
    $output .= '<option value="' . $electrical_capacity_row['id'] . '">' . $electrical_capacity_row['name'] . '</option>';
}
echo $output;
