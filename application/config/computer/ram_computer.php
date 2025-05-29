<?php
include '../../../system/database/DB_computer.php';

$storage_spec_id =  $_POST['storage_spec_data'];

$ram_computer = "SELECT * FROM ram_computers WHERE storage_spec_id = $storage_spec_id";
$ram_computer_qry = mysqli_query($conn, $ram_computer);


$output = '<option value="">เลือก แรมคอมพิวเตอร์</option>';
while ($ram_computer_row = mysqli_fetch_assoc($ram_computer_qry)) {
    $output .= '<option value="' . $ram_computer_row['id'] . '">' . $ram_computer_row['name'] . '</option>';
}
echo $output;
