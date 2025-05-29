<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EQUIP | Create Account Finish.</title>
  <link rel="stylesheet" href="../../../assets/css/register_message.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <div class="wrapper">
    <input type="radio" name="slider" id="tab-1">
    <input type="radio" name="slider" id="tab-2" checked>
    <input type="radio" name="slider" id="tab-3">
    <header>
      <label for="tab-1" class="tab-1">Error</label>
      <label for="tab-2" class="tab-2">Success</label>
      <label for="tab-3" class="tab-3">Warning</label>
      <div class="slider"></div>
    </header>
    <div class="card-area">
      <div class="cards">
        <div class="row">
          <div class="price-details">
            <?php
            include('../../database/DB_account.php');

            // ดึงข้อมูลแถวล่าสุดจากตาราง user
            $sql = "SELECT * FROM user ORDER BY id DESC LIMIT 1";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
              // รับค่าผลลัพธ์
              $row = $result->fetch_assoc();
              $latestRowId = $row["id"];
            } else {
              $latestRowId = "No records found";
            }

            // ปิดการเชื่อมต่อ
            $conn->close();
            ?>
            <span class="price"> <?php echo $latestRowId; ?> </span>
            <p>การลงทะเบียนเสร็จสิ้น</p>
          </div>
          <ul class="features">
            <li><i class="fas fa-check"></i><span>ลงทะเบียนด้วยอีเมลนั้นสำเร็จ</span></li>
            <li><i class="fas fa-check"></i><span>ลงทะเบียนด้วยเบอร์โทรศัพท์นั้นสำเร็จ</span></li>
            <li><i class="fas fa-check"></i><span>ลงทะเบียนด้วยชื่อผู้ใช้นั้นสำเร็จ</span></li>
            <li><i class="fas fa-check"></i><span>ลงทะเบียนด้วยรหัสผ่านนั้นสำเร็จ</span></li>
            <li><i class="fas fa-check"></i><span>ลงทะเบียนสำเร็จ</span></li>
          </ul>
        </div>
      </div>
    </div>
    <a href="../../../application/controllers/admin/User_account.php"><button>ตกลง</button></a>
  </div>

</body>

</html>