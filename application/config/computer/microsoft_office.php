<?php
include '../../../system/database/DB_computer.php';

$ram_computer_id =  $_POST['ram_computer_data'];

$microsoft_office = "SELECT * FROM microsoft_offices WHERE ram_computer_id = $ram_computer_id";
$microsoft_office_qry = mysqli_query($conn, $microsoft_office);


$output = '<option value="">เลือกไมโครซอฟท์ออฟฟิศ</option>';
while ($microsoft_office_row = mysqli_fetch_assoc($microsoft_office_qry)) {
    $output .= '<option value="' . $microsoft_office_row['id'] . '">' . $microsoft_office_row['name'] . '</option>';
}
echo $output;
