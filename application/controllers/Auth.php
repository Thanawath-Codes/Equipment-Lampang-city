<?php
session_start();

if (isset($_SESSION['error'])) {
    echo "<script>alert('" . $_SESSION['error'] . "');</script>";
    unset($_SESSION['error']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome CDN Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/auth.css">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <title>เข้าสู่ระบบ</title>
</head>

<body>

    <section class="side">
        <div class="images-container">
            <img src="../../assets/images/emp.png">
        </div>
    </section>

    <section class="message">
        <div class="message-container">
            <div class="notification">
                <img src="../../assets/images/notice.png">
            </div>
            <div class="notification">
                <img src="../../assets/images/notices.png">
            </div>
        </div>
    </section>

    <section class="main">
        <div class="login-container">
            <p class="title">เข้าสู่ระบบ</p>
            <div class="separator"></div>
            <p class="welcome-message">โปรด!
                ระบุข้อมูลรับรองการเข้าสู่ระบบเพื่อดำเนินการต่อและเข้าถึงบริการทั้งหมดของเรา
            </p>

            <form action="../../system/libraries/tier_auth.php" method="post" class="login-form">
                <div class="form-control">
                    <input type="text" name="username" placeholder="Personnel Name">
                    <i class="fas fa-user"></i>
                </div>
                <div class="form-control">
                    <input type="password" name="password" placeholder="Password">
                    <i class="fas fa-lock"></i>
                </div>

                <button class="submit" name="submit" value="submit">เข้าสู่ระบบ</button>
            </form>
            <div class="message-links">
                <p class="register-message">หากยังไม่มีบัญชี? <a href="user/Register.php"> ลงทะเบียนรับรหัสผ่านที่นี่</a></p>  
            </div>
        </div>
    </section>


</body>

</html>

<?php

if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
    session_destroy();
}

?>