<?php
session_start();
require_once('../../system/database/DB_account.php');

if (isset($_POST['submit'])) {
    $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
    $email_address = mysqli_real_escape_string($conn, $_POST['email_address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $department = mysqli_real_escape_string($conn, $_POST['department']);
    $segment = mysqli_real_escape_string($conn, $_POST['segment']);
    $division = mysqli_real_escape_string($conn, $_POST['division']);
    $working = mysqli_real_escape_string($conn, $_POST['working']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password_hash = $_POST['password_hash'];
    $urole = mysqli_real_escape_string($conn, $_POST['urole']);

    // ตรวจสอบว่า username มีความยาวไม่ต่ำกว่า 5 ตัวและไม่เกิน 18 ตัว
    if (strlen($username) < 5 || strlen($username) > 18) {
        header("Location: ../messages/account/Username_invalids.php");
        exit();
    }

    // ตรวจสอบว่า password มีความยาวไม่ต่ำกว่า 5 ตัวและไม่เกิน 18 ตัว
    if (strlen($password_hash) < 5 || strlen($password_hash) > 18) {
        header("Location: ../messages/account/Password_invalids.php");
        exit();
    }

    // ตรวจสอบว่า username มีอักขระที่ไม่อนุญาตหรือไม่
    if (preg_match('/[\/\*\_\-\๑\+\!\$\#\|\.\&\^]/', $username)) {
        header("Location: ../messages/account/Username_invalids.php");
        exit();
    }

    // ตรวจสอบว่า username มีอักขระที่ไม่อนุญาตหรือไม่
    if (preg_match('/[\/\*\_\-\๑\+\!\$\#\|\.\&\^]/', $password_hash)) {
        header("Location: ../messages/account/Password_invalids.php");
        exit();
    }

    // ตรวจสอบว่า email_address มีอักขระที่ไม่อนุญาตหรือไม่
    if (preg_match('/[\/\*\-\+\!\$\#\|\&\^]/', $email_address)) {
        header("Location: ../messages/account/Email_address_invalids.php");
        exit();
    }

    // ตรวจสอบรูปแบบอีเมลและโดเมนที่อนุญาต
    if (!filter_var($email_address, FILTER_VALIDATE_EMAIL)) {
        header("Location: ../messages/account/Email_address_invalids.php");
        exit();
    }

    // ตรวจสอบว่า username มีอยู่แล้วในฐานข้อมูลหรือไม่
    $user_check = "SELECT * FROM user WHERE username = '$username' LIMIT 1";
    $result_username = mysqli_query($conn, $user_check);

    if (mysqli_num_rows($result_username) > 0) {
        header("Location: ../messages/account/Username_invalids.php");
        exit();
    }

    // ตรวจสอบว่า email_address มีอยู่แล้วในฐานข้อมูลหรือไม่
    $email_check = "SELECT * FROM user WHERE email_address = '$email_address' LIMIT 1";
    $result_email = mysqli_query($conn, $email_check);

    if (mysqli_num_rows($result_email) > 0) {
        header("Location: ../messages/account/Email_address_invalids.php");
        exit();
    }

    // ตรวจสอบว่า phone number มีอยู่แล้วในฐานข้อมูลหรือไม่
    $phone_check = "SELECT * FROM user WHERE phone = '$phone' LIMIT 1";
    $result_phone = mysqli_query($conn, $phone_check);

    if (mysqli_num_rows($result_phone) > 0) {
        header("Location: ../messages/account/Phone_invalids.php");
        exit();
    }

    // Hash the password using a more secure method (password_hash)
    $passwords_hash = password_hash($password_hash, PASSWORD_DEFAULT);

    // Insert new user into the database
    $query = "INSERT INTO user (first_name, last_name, email_address, phone, department, segment, division, working, username, password_hash, urole) 
              VALUES ('$first_name', '$last_name', '$email_address', '$phone', '$department', '$segment', '$division', '$working', '$username', '$passwords_hash', '$urole')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../messages/account/Complete_create_account.php");
        exit();
    } else {
        header("Location: ../../../application/controllers/admin/User_account.php");
        exit();
    }
}
?>
