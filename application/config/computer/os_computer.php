<?php
include '../../../system/database/DB_computer.php';

$microsoft_office_id =  $_POST['microsoft_office_data'];

$os_computer = "SELECT * FROM os_computers WHERE microsoft_office_id = $microsoft_office_id";
$os_computer_qry = mysqli_query($conn, $os_computer);


$output = '<option value="">เลือก ระบบปฏิบัติการ</option>';
while ($os_computer_row = mysqli_fetch_assoc($os_computer_qry)) {
    $output .= '<option value="' . $os_computer_row['id'] . '">' . $os_computer_row['name'] . '</option>';
}
echo $output;
