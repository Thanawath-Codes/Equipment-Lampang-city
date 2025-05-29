<?php
include "../database/DB_account.php";

// Get the ID of the data to be deleted
$id = $_GET["id"];

// Delete the data from the database
$sql = "DELETE FROM `user` WHERE id = $id";
$result = mysqli_query($conn, $sql);

if ($result) {
    // Reorder the data after deletion
    $reorder_sql = "SET @counter = 0; 
    UPDATE `user` SET id = @counter := @counter + 1; 
    ALTER TABLE `user` AUTO_INCREMENT = 1;";
    mysqli_multi_query($conn, $reorder_sql);

    // Redirect to the page with a success message
    header("Location: /Equipment-Lampang-city/application/controllers/admin/User_account.php?msg=Data%20deleted%20successfully");
    exit();
} else {
    // If deletion failed, show error message
    echo "Failed: " . mysqli_error($conn);
}