<!DOCTYPE html>
<!-- Coding By CodingNepal - youtube.com/codingnepal -->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EQUIP | Register Fail.</title>
  <link rel="stylesheet" href="../../../assets/css/register_message.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>
  <div class="wrapper">
    <input type="radio" name="slider" id="tab-1" checked>
    <input type="radio" name="slider" id="tab-2">
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
            <span class="price"> 0 </span>
            <p>การลงทะเบียนล้มเหลว</p>
          </div>
          <ul class="features">
            <li><i class="fas fa-times"></i><span>ลงทะเบียนด้วยอีเมลนั้นไม่สำเร็จ</span></li>
            <li><i class="fas fa-check"></i><span>ลงทะเบียนด้วยเบอร์โทรศัพท์นั้นสำเร็จ</span></li>
            <li><i class="fas fa-check"></i><span>ลงทะเบียนด้วยชื่อผู้ใช้นั้นสำเร็จ</span></li>
            <li><i class="fas fa-check"></i><span>ลงทะเบียนด้วยรหัสผ่านนั้นสำเร็จ</span></li>
            <li><i class="fas fa-times"></i><span>ลงทะเบียนไม่สำเร็จ</span></li>
          </ul>
        </div>
      </div>
    </div>
    <a href="../../../application/controllers/Auth.php"><button>ตกลง</button></a>
    </div>

</body>

</html>