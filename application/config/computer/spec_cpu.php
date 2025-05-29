<?php
include '../../../system/database/DB_computer.php';

$brand_cpu_id =  $_POST['brand_cpu_data'];

$spec_cpu = "SELECT * FROM spec_cpus WHERE brand_cpu_id = $brand_cpu_id";
$spec_cpu_qry = mysqli_query($conn, $spec_cpu);


$output = '<option value="">เลือก สเปคชิปคอมพิวเตอร์</option>';
while ($spec_cpu_row = mysqli_fetch_assoc($spec_cpu_qry)) {
    $output .= '<option value="' . $spec_cpu_row['id'] . '">' . $spec_cpu_row['name'] . '</option>';
}
echo $output;
