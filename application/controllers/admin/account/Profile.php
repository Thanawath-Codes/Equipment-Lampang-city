<?php
session_start(); // ต้องเรียกก่อนใช้ตัวแปรเซสชัน

// ตรวจสอบว่ามีการตั้งค่าเซสชัน userid หรือไม่
if (!isset($_SESSION['userid'])) {
  header("Location: ../../Auth.php"); // หากไม่มีค่าเซสชัน ให้กลับไปที่หน้า login
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@500;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../../../assets/css/account.css">
  <title>EQUIP | Account.</title>
</head>

<body>

  <section id="result-summary-container">
    <div class="your-result-container">
      <h2 class="title-text">ACCOUNT</h2>
      <div class="result-number-circle">

      <?php
// เรียกใช้งานไฟล์ที่เชื่อมต่อกับฐานข้อมูล
include('../../../../system/database/DB_account.php');

if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // สร้างคำสั่ง SQL เพื่อดึงลำดับของ username จากตาราง user
    $sql = "SELECT id, username FROM user WHERE username = '$username'";  // SQL query โดยตรง

    // ใช้ MySQLi เชื่อมต่อและดึงข้อมูล
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ดึงข้อมูลผลลัพธ์
        $row = $result->fetch_assoc();
        $user_id = $row['id'];
        $user_username = $row['username'];

    } else {
        echo "ไม่พบข้อมูลผู้ใช้งาน";
    }
} else {
    echo "โปรดล็อกอินก่อน";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
<!-- แสดงค่า user_id ใน HTML -->
<p class="large-number"><?php echo $user_id; ?></p>

        <p class="small-number">
          of
          <?php
          // เรียกไฟล์การเชื่อมต่อฐานข้อมูล
          include('../../../../system/database/DB_account.php');

          // คำสั่ง SQL เพื่อดึงจำนวน username ที่ไม่ซ้ำกันทั้งหมด
          $sql = "SELECT COUNT(DISTINCT username) AS total_usernames FROM user";
          $result = $conn->query($sql);  // ใช้ $conn แทน $connection
          
          // ตรวจสอบและดึงค่าผลลัพธ์
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $counts = $row['total_usernames'];
          } else {
            $counts = 0;
          }

          // ปิดการเชื่อมต่อ
          $conn->close();  // ใช้ $conn แทน $connection
          ?>

          <!-- แสดงผลจำนวน username ที่ไม่ซ้ำกัน -->
          <?php echo $counts; ?>
      </div>
      <div class="performance-text">
        <h3>ADMIN</h3>
        <p>ข้อมูลผู้ใช้งานระบบครุภัณฑ์ <br> เทศบาลนครลำปาง</p>
      </div>
    </div>
    <div class="summary-container">
      <h2>Profile</h2>
      <div class="stats-container">
        <div id="name" class="result">
          <div class="stat-img-container">
            <img src="../../../../assets/images/icon-reaction.svg" alt="lightning bolt">
            <span class="red-text p-left">ชื่อ</span>
          </div>
          <div class="stat-score-container">
            <p>
              <!--Firstname & Lastname-->
              <?php

              // ตรวจสอบบทบาทของผู้ใช้
              if ($_SESSION['urole'] == '1' || $_SESSION['urole'] == '2') {
                include('../../../../system/database/DB_account.php');

                // คำสั่ง SQL ในการดึงข้อมูล first_name และ last_name ของผู้ใช้ที่ล็อกอินอยู่
                $username = $_SESSION['username'];
                $sql = "SELECT first_name FROM user WHERE username = '$username'";

                $result = $conn->query($sql);

                // ตรวจสอบว่า query สำเร็จหรือไม่
                if ($result === false) {
                  echo "Error: " . $conn->error; // แสดงข้อผิดพลาดถ้าเกิดขึ้น
                } else {
                  // ตรวจสอบว่ามีข้อมูลที่ได้จากการคิวรี่หรือไม่
                  if ($result->num_rows > 0) {
                    // ดึงข้อมูล first_name และ last_name จากแถวแรก
                    $row_name = $result->fetch_assoc();
                    // แสดงข้อมูล first_name และ last_name ในแท็ก <p>
                    echo "<p>" . $row_name['first_name'] . "</p>";
                  } else {
                    echo "Name not found";
                  }
                }

                // ปิดการเชื่อมต่อกับฐานข้อมูล
                $conn->close();
              } else {
                echo "Unauthorized access";
              }
              ?>
              <span class="light-text">
                <p>
                  <!--Firstname & Lastname-->
                  <?php

                  // ตรวจสอบบทบาทของผู้ใช้
                  if ($_SESSION['urole'] == '1' || $_SESSION['urole'] == '2') {
                    include('../../../../system/database/DB_account.php');

                    // คำสั่ง SQL ในการดึงข้อมูล first_name และ last_name ของผู้ใช้ที่ล็อกอินอยู่
                    $username = $_SESSION['username'];
                    $sql = "SELECT last_name FROM user WHERE username = '$username'";

                    $result = $conn->query($sql);

                    // ตรวจสอบว่า query สำเร็จหรือไม่
                    if ($result === false) {
                      echo "Error: " . $conn->error; // แสดงข้อผิดพลาดถ้าเกิดขึ้น
                    } else {
                      // ตรวจสอบว่ามีข้อมูลที่ได้จากการคิวรี่หรือไม่
                      if ($result->num_rows > 0) {
                        // ดึงข้อมูล first_name และ last_name จากแถวแรก
                        $row_name = $result->fetch_assoc();
                        // แสดงข้อมูล first_name และ last_name ในแท็ก <p>
                        echo "<p>" . $row_name['last_name'] . "</p>";
                      } else {
                        echo "Name not found";
                      }
                    }

                    // ปิดการเชื่อมต่อกับฐานข้อมูล
                    $conn->close();
                  } else {
                    echo "Unauthorized access";
                  }
                  ?>
              </span>
            </p>
          </div>
        </div>
        <div id="email" class="result">
          <div class="stat-img-container">
            <img src="../../../../assets/images/icon-memory.svg" alt="lightning bolt">
            <span class="yellow-text p-left">อีเมล์</span>
          </div>
          <div class="stat-score-container">
            <p>
              <?php
              // ตรวจสอบบทบาทของผู้ใช้
              if ($_SESSION['urole'] == '1' || $_SESSION['urole'] == '2') {
                include('../../../../system/database/DB_account.php');

                // คำสั่ง SQL ในการดึงข้อมูล email ของผู้ใช้ที่ล็อกอินอยู่
                $username = $_SESSION['username'];
                $sql = "SELECT email_address FROM user WHERE username = '$username'";

                $result = $conn->query($sql);

                // ตรวจสอบว่า query สำเร็จหรือไม่
                if ($result === false) {
                  echo "Error: " . $conn->error; // แสดงข้อผิดพลาดถ้าเกิดขึ้น
                } else {
                  // ตรวจสอบว่ามีข้อมูลที่ได้จากการคิวรี่หรือไม่
                  if ($result->num_rows > 0) {
                    // ดึงข้อมูล email จากแถวแรก
                    $row_name = $result->fetch_assoc();
                    // แสดงข้อมูล email ในแท็ก <p>
                    echo "<p>" . $row_name['email_address'] . "</p>";
                  } else {
                    echo "Email not found";
                  }
                }

                // ปิดการเชื่อมต่อกับฐานข้อมูล
                $conn->close();
              } else {
                echo "Unauthorized access";
              }
              ?>
            </p>
          </div>
        </div>
        <div id="phone" class="result">
          <div class="stat-img-container">
            <img src="../../../../assets/images/icon-verbal.svg" alt="lightning bolt">
            <span class="green-text p-left">เบอร์โทร</span>
          </div>
          <div class="stat-score-container">
            <p>
              <?php
              // ตรวจสอบบทบาทของผู้ใช้
              if ($_SESSION['urole'] == '1' || $_SESSION['urole'] == '2') {
                include('../../../../system/database/DB_account.php');

                // คำสั่ง SQL ในการดึงข้อมูล email ของผู้ใช้ที่ล็อกอินอยู่
                $username = $_SESSION['username'];
                $sql = "SELECT phone FROM user WHERE username = '$username'";

                $result = $conn->query($sql);

                // ตรวจสอบว่า query สำเร็จหรือไม่
                if ($result === false) {
                  echo "Error: " . $conn->error; // แสดงข้อผิดพลาดถ้าเกิดขึ้น
                } else {
                  // ตรวจสอบว่ามีข้อมูลที่ได้จากการคิวรี่หรือไม่
                  if ($result->num_rows > 0) {
                    // ดึงข้อมูล email จากแถวแรก
                    $row_name = $result->fetch_assoc();
                    // แสดงข้อมูล email ในแท็ก <p>
                    echo "<p>" . $row_name['phone'] . "</p>";
                  } else {
                    echo "Email not found";
                  }
                }

                // ปิดการเชื่อมต่อกับฐานข้อมูล
                $conn->close();
              } else {
                echo "Unauthorized access";
              }
              ?>
            </p>
          </div>
        </div>
        <div id="department" class="result">
          <div class="stat-img-container">
            <img src="../../../../assets/images/icon-visual.svg" alt="lightning bolt">
            <span class="purple-text p-left">กอง/สำนัก</span>
          </div>
          <div class="stat-score-container">
            <p>

              <?php
              // ตรวจสอบบทบาทของผู้ใช้
              if ($_SESSION['urole'] == '1' || $_SESSION['urole'] == '2') {
                include('../../../../system/database/DB_account.php');

                $username = $_SESSION['username'];
                // Use a JOIN to match the department ID in user with the name in departments
                $sql = "
                            SELECT d.name AS department_name
                            FROM user u
                            JOIN departments d ON u.department = d.id
                            WHERE u.username = '$username'
                        ";

                $result = $conn->query($sql);

                // ตรวจสอบว่า query สำเร็จหรือไม่
                if ($result === false) {
                  echo "Error: " . $conn->error; // แสดงข้อผิดพลาดถ้าเกิดขึ้น
                } else {
                  // ตรวจสอบว่ามีข้อมูลที่ได้จากการคิวรี่หรือไม่
                  if ($result->num_rows > 0) {
                    $row_name = $result->fetch_assoc();
                    // แสดงข้อมูล department ในแท็ก <p>
                    echo "<p>" . $row_name['department_name'] . "</p>";
                  } else {
                    echo "Department not found";
                  }
                }

                // ปิดการเชื่อมต่อกับฐานข้อมูล
                $conn->close();
              } else {
                echo "Unauthorized access";
              }
              ?>

            </p>
          </div>
        </div>
        <a href="../../Auth.php"><button id="btn-personal">ออกจากระบบ</button></a>
      </div>
    </div>

  </section>

</body>

</html>