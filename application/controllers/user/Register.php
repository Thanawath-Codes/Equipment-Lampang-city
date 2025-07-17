<?php

session_start();

if (isset($_SESSION['success']) || isset($_SESSION['error'])) {
  session_destroy();
}

?>


<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title>ลงทะเบียน</title>
  <!--MATERIAL ICONS CDN-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <!--MENU BAR STYLE-->
  <link rel="stylesheet" href="../../../assets/css/register.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>

  <div class="container">
    <div class="title">ลงทะเบียน</div>
    <div class="content">
      <form action="../../../system/libraries/register.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">ชื่อ</span>
            <input type="text" name="first_name" placeholder="Enter your first name" required>
          </div>
          <div class="input-box">
            <span class="details">นามสกุล</span>
            <input type="text" name="last_name" placeholder="Enter your last name" required>
          </div>
          <div class="input-box">
            <span class="details">อีเมล์</span>
            <input type="text" name="email_address" placeholder="Enter your email address" required>
          </div>
          <div class="input-box">
            <span class="details">เบอร์โทร</span>
            <input type="text" name="phone" id="phone" maxlength="12" placeholder="Enter your number" required>
          </div>
        </div>

        <?php

        include('../../../system/database/DB_account.php');

        $department = "SELECT * FROM departments";
        $department_qry = mysqli_query($conn, $department);

        ?>

        <div class="state-agency">
          <div class="column">
            <div class="select-box">
              <select class="select-box" id="department" name="department">
                <option selected disabled>กอง/สำนัก</option>
                <?php while ($row = mysqli_fetch_assoc($department_qry)) : ?>
                  <option value="<?php echo $row['id']; ?>"> <?php echo $row['name']; ?> </option>
                <?php endwhile; ?>
              </select>
            </div>
            <div class="select-box">
              <select class="form-select" id="segment" name='segment'>
                <option selected disabled>ส่วน</option>
              </select>
            </div>
            <div class="select-box">
              <select class="form-select" id="division" name='division'>
                <option selected disabled>ฝ่าย</option>
              </select>
            </div>
            <div class="select-box">
              <select class="form-select" id="working" name='working'>
                <option selected disabled>งาน</option>
              </select>
            </div>
          </div>
        </div>

        <div class="user-details">
          <div class="input-box">
            <span class="details">ชื่อผู้ใช้งานในระบบ</span>
            <input type="text" name="username" placeholder="Enter your username" maxlength="22" required>
          </div>
          <div class="input-box">
            <span class="details">รหัสผ่าน</span>
            <input type="password" name="password_hash" placeholder="Enter your password" maxlength="12" required>
          </div>
        </div>
        <p><span class="material-icons-sharp">
            error
          </span>
          การตั้งไอดีและรหัสผ่านต้องมีความยาวไม่ต่ำกว่า 5-18 ตัวอักษร
        </p>
        <p><span class="material-icons-sharp">
            error
          </span>
          อนุญาติให้ใช้เฉพาะตัวอักษร (a-z), ตัวเลข(0-9) เท่านั้น
        </p>
        
        <div class="button">
          <input type="submit" name="submit" value="สมัครสมาชิก">
        </div>
      </form>
      <div class="message-links">
        <p class="register-message">ฉันมีบัญชีในการใช้งานอยู่แล้ว <a href="../Auth.php"> คลิกเพื่อเข้าสู่ระบบ</a></p>
      </div>
    </div>
  </div>

  
  <script src="../../../assets/js/agency.js"></script>
  <script src="../../../assets/js/phone.js"></script>

</body>

</html>