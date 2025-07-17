<?php
include "../database/DB_monitor.php";

// Get the ID of the data to be deleted
$id = $_GET["id"];

// Delete the data from the database
$sql = "DELETE FROM `monitor_lists` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Reorder the data after deletion
    $reorder_sql = "SET @counter = 0; 
    UPDATE `monitor_lists` SET id = @counter := @counter + 1; 
    ALTER TABLE `monitor_lists` AUTO_INCREMENT = 1;";
    mysqli_multi_query($conn, $reorder_sql);

    // Redirect to the page with a success message
    header("Location: ../../application/controllers/admin/Equip_monitor.php?msg=Data deleted successfully");
} else {
    // If deletion failed, show error message
    echo "Failed: " . mysqli_error($conn);
}
