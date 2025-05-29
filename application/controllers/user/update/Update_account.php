<?php
session_start();

include "../../../../system/database/DB_account.php";

$id = $_GET["id"];

if (isset($_POST["submit"])) {
    // ตรวจสอบและดึงข้อมูลจากฐานข้อมูล
    $sql = "SELECT * FROM `user` WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_address = $_POST['email_address'];
    $phone = $_POST['phone'];
    $department = isset($_POST['department']) ? $_POST['department'] : $row['department'];
    $segment = isset($_POST['segment']) ? $_POST['segment'] : $row['segment'];
    $division = isset($_POST['division']) ? $_POST['division'] : $row['division'];
    $working = isset($_POST['working']) ? $_POST['working'] : $row['working'];
    $username = $_POST['username'];
    $password_hash = $_POST['password_hash'];
    $urole = $_POST['urole'];

    // ตรวจสอบและแปลงรหัสผ่านเป็นรหัสผ่านที่เข้ารหัสแบบเครื่องหมาย md5
    $hashed_password = md5($password_hash);

    // ถ้าไม่มีการเลือกค่า ให้ใช้ค่าเดิมจากฐานข้อมูล
    // หรือสามารถกำหนดให้เป็นค่าว่างได้โดยใช้เงื่อนไขอื่น ๆ ตามต้องการ

    // ดำเนินการอัปเดตข้อมูลในฐานข้อมูล
    $sql = "UPDATE `user` SET `first_name`='$first_name',`last_name`='$last_name',
            `email_address`='$email_address',`phone`='$phone', `department`='$department',
            `segment`='$segment', `division`='$division', `working`='$working', 
            `username`='$username', `password_hash`='$hashed_password',
            `urole`='$urole' WHERE id = $id";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: ../../../../system/messages/update/Complete_update_account.php");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EQUIP | Update User Account.</title>
    <!--MATERIAL ICONS CDN-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <!--GOOGLE FONTS (POPPINS)-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!--STYLESHEET-->
    <link rel="stylesheet" href="../../../../assets/css/update_account.css">
    <!--AJAX-->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"
        integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <nav>
        <div class="container">
            <img src="../../../../assets/images/logo.png" class="logo">
            
            <div class="profile-area">
                
                <div class="profile">
                    <div class="profile-photo">
                        <img src="../../../../assets/images/profiled.png">
                    </div>
                    <h5>ADMINISRATOR</h5>
                    <span class="material-icons-sharp">expand_more</span>
                </div>
                <button id="menu-btn">
                    <span class="material-icons-sharp">menu</span>
                </button>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <main>
        <aside>
            <button id="close-btn">
                <span class="material-icons-sharp">close</span>
            </button>
            <div class="sidebar">
                <a href="#" class="active">
                    <span class="material-icons-sharp">dashboard</span>
                    <h4>แผงควบคุม</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">currency_exchange</span>
                    <h4>สั่งซื้อครุภัณฑ์</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">account_balance_wallet</span>
                    <h4>เบิกครุภัณฑ์</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">payment</span>
                    <h4>เพิ่มครุภัณฑ์</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">pie_chart</span>
                    <h4>การวิเคราะห์</h4>
                </a>
                <a href="#">
                    <span class="material-icons-sharp">message</span>
                    <h4>ข้อความ</h4>
                </a>
                <a href="https://forms.gle/tphScZttbFQ4bZTP8">
                    <span class="material-icons-sharp">help_center</span>
                    <h4>ศูนย์ช่วยเหลือ</h4>
                </a>
                <a href="personal_account.php">
                    <span class="material-icons-sharp">settings</span>
                    <h4>ตั้งค่า</h4>
                </a>
            </div>
            <!-- END OF SIDEBAR -->

            <div class="updates">
                <span class="material-icons-sharp">update</span>
                <h4>Updates Available</h4>
                <p>Security Updates</p>
                <p>General Updates</p>
                <a href="#">EQUIP Version 1.8.20</a>
            </div>
        </aside>
        <!------------------- END OF ASIDE ------------------->

        <section class="middle">

            <?php
            $sql = "SELECT * FROM `user` WHERE id = $id LIMIT 1";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            ?>

            <div class="container_update">
                <div class="title">แก้ไขประวัติส่วนตัว</div>
                <div class="content">
                    <form action="" method="post">
                        <div class="user-details">
                            <div class="input-box">
                                <span class="details"> ชื่อ</span>
                                <input type="text" name="first_name" value="<?php echo $row['first_name'] ?>"
                                    placeholder="-- ตัวอย่างชื่อ นางสาวนริญทรลักษณ์ --" required>
                            </div>
                            <div class="input-box">
                                <span class="details">นามสกุล</span>
                                <input type="text" name="last_name" value="<?php echo $row['last_name'] ?>"
                                    placeholder="-- ตัวอย่างนามสกุล กุญจ์สิริลัญฉกร  --" required>
                            </div>
                            <div class="input-box">
                                <span class="details">อีเมล์</span>
                                <input type="text" name="email_address" value="<?php echo $row['email_address'] ?>"
                                    placeholder="-- ตัวอย่างอีเมล narintharuk@gmail.com  --" required>
                            </div>
                            <div class="input-box">
                                <span class="details">เบอร์โทร</span>
                                <input type="text" name="phone" value="<?php echo $row['phone'] ?>" id="phone_number"
                                    maxlength="12" placeholder="-- ตัวอย่างเบอร์โทร 025-412-0000 --" required>
                            </div>
                        </div>

                        <div class="update_department" id="update_department">
                            <div class="title">แก้ไขข้อมูลผู้ใช้</div>


                            <?php

                            include('../../../../system/database/DB_account.php');

                            $department = "SELECT * FROM departments";
                            $department_qry = mysqli_query($conn, $department);

                            ?>
                            <div class="column">
                                <div class="select-box">
                                    <select class="select-box" id="department" name="department">
                                        <option selected disabled>กอง/สำนัก</option>
                                        <?php while ($department_row = mysqli_fetch_assoc($department_qry)): ?>
                                        <option value="<?php echo $department_row['id']; ?>" <?php if ($department_row['id'] == $row['department'])
                                               echo 'selected'; ?>>
                                            <?php echo $department_row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="segment" name='segment'>
                                        <option selected disabled>ส่วน</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก department แล้วหรือยัง
                                        if (!empty($row['department'])) {
                                            $segment_qry = mysqli_query($conn, "SELECT * FROM segments WHERE department_id = {$row['department']}");
                                            while ($segment_row = mysqli_fetch_assoc($segment_qry)): ?>
                                        <option value="<?php echo $segment_row['id']; ?>" <?php if ($segment_row['id'] == $row['segment'])
                                               echo 'selected'; ?>>
                                            <?php echo $segment_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="division" name='division'>
                                        <option selected disabled>ฝ่าย</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก segment แล้วหรือยัง
                                        if (!empty($row['segment'])) {
                                            $division_qry = mysqli_query($conn, "SELECT * FROM divisions WHERE segment_id = {$row['segment']}");
                                            while ($division_row = mysqli_fetch_assoc($division_qry)): ?>
                                        <option value="<?php echo $division_row['id']; ?>" <?php if ($division_row['id'] == $row['division'])
                                               echo 'selected'; ?>>
                                            <?php echo $division_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="select-box">
                                    <select class="form-select" id="working" name='working'>
                                        <option selected disabled>งาน</option>
                                        <?php
                                        // ตรวจสอบว่ามีการเลือก division แล้วหรือยัง
                                        if (!empty($row['division'])) {
                                            $working_qry = mysqli_query($conn, "SELECT * FROM workings WHERE division_id = {$row['division']}");
                                            while ($working_row = mysqli_fetch_assoc($working_qry)): ?>
                                        <option value="<?php echo $working_row['id']; ?>" <?php if ($working_row['id'] == $row['working'])
                                               echo 'selected'; ?>>
                                            <?php echo $working_row['name']; ?>
                                        </option>
                                        <?php endwhile;
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <?php

                            include('../../../../system/database/DB_account.php');

                            $urole = "SELECT * FROM uroles";
                            $urole_qry = mysqli_query($conn, $urole);

                            ?>

                            <div class="column">
                                <div class="select-box">
                                    <select class="select-box" id="urole" name="urole">
                                        <option selected disabled>สิทธ์ผู้ใช้</option>
                                        <?php while ($urole_row = mysqli_fetch_assoc($urole_qry)): ?>
                                        <option value="<?php echo $urole_row['id']; ?>" <?php if ($urole_row['id'] == $row['urole'])
                                               echo 'selected'; ?>>
                                            <?php echo $urole_row['name']; ?>
                                        </option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details">ชื่อผู้ใช้</span>
                                    <input type="text" name="username" value="<?php echo $row['username']; ?>"
                                        placeholder="ตัวอย่างชื่อผู้ใช้ Kasemkomkit" maxlength="22" required>
                                </div>
                                <div class="input-box">
                                    <span class="details">รหัสผ่าน</span>
                                    <input type="password" name="password_hash"
                                        placeholder="ตัวอย่างรหัสผ่าน 25479, 8q1m1LC" required>
                                </div>
                            </div>

                            <div class="notification_message">
                                <p>
                                    <span class="material-icons-sharp">error</span>
                                    รหัสผ่านควรมีความยาว 5-12 ตัวอักษรขึ้นไปเท่านั้น.
                                </p>
                            </div>
                            <div class="notification_message">
                                <p>
                                    <span class="material-icons-sharp">error</span>
                                    อนุญาติให้ใช้เฉพาะตัวอักษร (a-z) หรือ (A-Z) ตัวเลข(0-9) และเครื่องหมายสัญประกาศ (_)
                                    เท่านั้น.
                                </p>
                            </div>


                            <div class="wrapper">
                                <div class="btns">
                                    <div class="update_page">
                                        <div class="btn_update">
                                            <button type="submit" name="submit">บันทึกข้อมูล</button>
                                        </div>
                                    </div>
                                    <div class="back_page">
                                        <div class="btn_back">
                                            <a href="../User_account.php">ย้อนกลับ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
            <!-- END OF EQUIPMENT MICRO COMPUTER -->
        </section>
        <!-- END OF MIDDLE -->

        <section class="right">
            <div class="investments">
                <div class="header">
                    <h2>หน่วยงานภายใน</h2>
                    <a href="#">More <span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="investment">
                    <img src="./images/windows 12.png">
                    <h4>คณะผู้บริหาร</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>100</h4>
                        <small class="danger">-4.27%</small>
                    </div>
                </div>
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="./images/windows 12.png">
                    <h4>สำนักปลัดเทศบาล</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>100</h4>
                        <small class="danger">-4.27%</small>
                    </div>
                </div>
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="./images/windows 11.png">
                    <h4>กองคลัง</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="success">36.09%</small>
                    </div>
                </div>
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="./images/windows 11.png">
                    <h4>สำนักช่าง</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="success">36.09%</small>
                    </div>
                </div>
                <!-- END OF INVESTMENT -->
                <div class="investment">
                    <img src="./images/windows 11.png">
                    <h4>กองสาธารณสุข <br> และสิ่งแวดล้อม</h4>
                    <div class="date-time">
                        <p>7 Nov, 2021</p>
                        <small class="text-muted">9:14pm</small>
                    </div>
                    <div class="bonds">
                        <p>1402</p>
                        <small class="text-muted">Bonds</small>
                    </div>
                    <div class="amount">
                        <h4>$20,033</h4>
                        <small class="success">36.09%</small>
                    </div>
                </div>
                <!-------------- END OF INVESTMENT -------------->
            </div>
            <!-------------------- END OF INVESTMENTS -------------------->

            <div class="recent-transactions">
                <div class="header">
                    <h2>ครุภัณฑ์อิเล็กทรอนิกส์</h2>
                    <a href="#">More <span class="material-icons-sharp">
                            chevron_right
                        </span></a>
                </div>

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">
                                laptop_chromebook
                            </span>
                        </div>
                        <div class="details">
                            <h4>คอมพิวเตอร์</h4>
                            <p>20.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="./images/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>-$20</h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-purple-light">
                            <span class="material-icons-sharp purple">
                                screenshot_monitor
                            </span>
                        </div>
                        <div class="details">
                            <h4>จอคอมพิวเตอร์</h4>
                            <p>21.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="./images/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>-$799</h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">
                                tablet_mac
                            </span>
                        </div>
                        <div class="details">
                            <h4>แท็บเล็ต</h4>
                            <p>19.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-dark">
                            <img src="./images/master card.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Master Card</small>
                        </div>
                    </div>
                    <h4>-$50</h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">
                                print
                            </span>
                        </div>
                        <div class="details">
                            <h4>ปริ้นเตอร์</h4>
                            <p>15.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-danger">
                            <img src="./images/visa.png">
                        </div>
                        <div class="details">
                            <p>*2757</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>-$44</h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-danger-light">
                            <span class="material-icons-sharp danger">
                                document_scanner
                            </span>
                        </div>
                        <div class="details">
                            <h4>สแกนเนอร์</h4>
                            <p>15.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="./images/visa.png">
                        </div>
                        <div class="details">
                            <p>*1920</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$20</h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->

                <div class="transaction">
                    <div class="service">
                        <div class="icon bg-success-light">
                            <span class="material-icons-sharp success">
                                charging_station
                            </span>
                        </div>
                        <div class="details">
                            <h4>เครื่องสำรองไฟ</h4>
                            <p>15.11.2021</p>
                        </div>
                    </div>
                    <div class="card-details">
                        <div class="card bg-primary">
                            <img src="./images/visa.png">
                        </div>
                        <div class="details">
                            <p>*1920</p>
                            <small class="text-muted">Credit Card</small>
                        </div>
                    </div>
                    <h4>$20</h4>
                </div>
                <!------------------- END OF TRANSACTION ------------------->
            </div>
            <!-------------------------- END OF TRANSACTIONS -------------------------->
        </section>
        <!---------------------------------------- END OF RIGHT ---------------------------------------->
    </main>
    <!--================================== END OF ASIDE ==================================-->

    <script src="./js/sign_account.js"></script>
    <script src="./js/phone_number.js"></script>



</body>

</html>