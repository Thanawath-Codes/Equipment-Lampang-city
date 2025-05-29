<?php
session_start();

if (isset($_POST['username']) && isset($_POST['password'])) {
    require_once '../../system/database/DB_account.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the stored password hash from the database
    $query = "SELECT * FROM user WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $stored_hash = $row['password_hash'];

        // Verify the password
        
if (password_verify($password, $stored_hash)) {
    $_SESSION['userid'] = $row['id'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['user'] = $row['firstname'] . " " . $row['lastname'];
    $_SESSION['urole'] = $row['urole'];

    if ($_SESSION['urole'] == '1') {
        header("Location: ../../application/controllers/admin/Dashboard.php");
        exit();
    } elseif ($_SESSION['urole'] == '2') {
        header("Location: ../../application/controllers/user/Dashboard.php");
        exit();
    }
} else {
    $_SESSION['error'] = 'ขออภัย รหัสผ่านไม่ถูกต้อง ลองอีกครั้งหรือติดต่อเจ้าหน้าที่เพื่อรีเซ็ตรหัส';
    header("Location: ../../application/controllers/Auth.php");
    exit();
}

}
}