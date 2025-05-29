<?php
include '../../../system/database/DB_computer.php';

$computer_type_id = $_POST['computer_type_data'];

$computer_case = "SELECT * FROM computer_cases WHERE computer_type_id = $computer_type_id";
$computer_case_qry = mysqli_query($conn, $computer_case);

$output = '<option value="">เลือก เคสคอมพิวเตอร์</option>';
while ($computer_case_row = mysqli_fetch_assoc($computer_case_qry)) {
    $output .= '<option value="' . $computer_case_row['id'] . '">' . $computer_case_row['name'] . '</option>';
}
echo $output;
