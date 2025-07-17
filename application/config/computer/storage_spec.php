<?php
include '../../../system/database/DB_computer.php';

$storage_device_id =   $_POST['storage_device_data'];

$storage_spec = "SELECT * FROM storage_specs WHERE storage_device_id = $storage_device_id";

$storage_spec_qry = mysqli_query($conn, $storage_spec);
// $output="";
$output = '<option value="">เลือก พื้นที่จัดเก็บข้อมูล</option>';
while ($storage_spec_row = mysqli_fetch_assoc($storage_spec_qry)) {
    $output .= '<option value="' . $storage_spec_row['id'] . '">' . $storage_spec_row['name'] . '</option>';
}
echo $output;
