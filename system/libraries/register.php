<?php
session_start();
require_once "../../system/database/DB_account.php";

if (isset($_POST['submit'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $phone = $_POST['phone'];
    $department = $_POST['department'];
    $segment = $_POST['segment'];
    $division = $_POST['division'];
    $working = $_POST['working'];
    $username = $_POST['username'];
    $password_hash = $_POST['password_hash'];

    // ตรวจสอบว่า username มีความยาวไม่ต่ำกว่า 5 ตัวและไม่เกิน 18 ตัว
    if (strlen($username) < 5 || strlen($username) > 18) {
        header("Location: ../messages/account/Username_invalid.php");
        exit();
    }

    // ตรวจสอบว่า password มีความยาวไม่ต่ำกว่า 5 ตัวและไม่เกิน 18 ตัว
    if (strlen($password_hash) < 5 || strlen($password_hash) > 18) {
        header("Location: ../messages/account/Password_invalid.php");
        exit();
    }

    // ตรวจสอบว่า username มีอักขระที่ไม่อนุญาตหรือไม่
    if (preg_match('/[\/\*\-\๑\+\!\$\#\|\&\^]/', $username)) {
        header("Location: ../messages/account/Username_invalid.php");
        exit();
    }

    // ตรวจสอบว่า password มีอักขระที่ไม่อนุญาตหรือไม่
    if (preg_match('/[\/\*\_\-\๑\+\!\$\#\|\&\^]/', $password_hash)) {
        header("Location: ../messages/account/Password_invalid.php");
        exit();
    }
    
    // ตรวจสอบว่า email_address มีอักขระที่ไม่อนุญาตหรือไม่
    if (preg_match('/[\/\*\-\+\!\$\#\|\&\^]/', $email_address)) {
        header("Location: ../messages/account/Email_address_invalid.php");
        exit();
    }

    // ตรวจสอบรูปแบบอีเมลและโดเมนที่อนุญาต
    if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../messages/account/Email_address_invalid.php");
        exit();
    }


    // Check if username exists
    $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
    $result_username = mysqli_query($conn, $user_check);
    $user_username = mysqli_fetch_assoc($result_username);

    if ($user_username) {
        header("Location: ../messages/account/Username_invalid.php");
        exit();
    }

    // Check if email address exists
    $email_check = "SELECT * FROM user WHERE email_address = '$email_address' LIMIT 1";
    $result_email = mysqli_query($conn, $email_check);
    $user_email = mysqli_fetch_assoc($result_email);

    if ($user_email) {
        header("Location: ../messages/account/Email_address_invalid.php");
        exit();
    }

    // Check if phone number exists
    $phone_check = "SELECT * FROM user WHERE phone = '$phone' LIMIT 1";
    $result_phone = mysqli_query($conn, $phone_check);
    $user_phone = mysqli_fetch_assoc($result_phone);

    if ($user_phone) {
        header("Location: ../messages/account/Phone_invalid.php");
        exit();
    }

    // Hash the password using a more secure method (password_hash)
    $passwords_hash = password_hash($password_hash, PASSWORD_DEFAULT);

    // Insert new user into the database
    $query = "INSERT INTO user (first_name, last_name, email_address, phone, department, segment, division, working, username, password_hash, urole)
              VALUES ('$first_name', '$last_name', '$email_address', '$phone', '$department', '$segment', '$division', '$working', '$username', '$passwords_hash', '2')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: ../messages/account/Complete_register.php");
    } else {
        header("Location: ../../Auth.php");
    }
    exit(); // Stop execution after redirect
}
?>