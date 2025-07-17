<?php
include '../../../system/database/DB_computer.php';

$computer_case_id =  $_POST['computer_case_data'];

$computer_model = "SELECT * FROM computer_models WHERE computer_case_id = $computer_case_id";
$computer_model_qry = mysqli_query($conn, $computer_model);


$output = '<option value="">เลือก รุ่น/โมเดล</option>';
while ($computer_model_row = mysqli_fetch_assoc($computer_model_qry)) {
    $output .= '<option value="' . $computer_model_row['id'] . '">' . $computer_model_row['name'] . '</option>';
}
echo $output;
