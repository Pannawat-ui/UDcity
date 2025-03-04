<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UdCity</title>
    <style>
      * {
    font-family: Arial, Helvetica, sans-serif;
        }
    </style>

    <link rel="stylesheet" href="./dist/css/bootstrap.css">
</head>
<body>
  <?php
  session_start();
  // error_reporting(0);
  require('./function/connect.php');
  ?>
    <div class="container-fluid " style="background-color:#780000;">
        <nav class="navbar navbar-expand-lg d-flex justify-content-between  align-items-center" style="background-color:#780000;">
            <a href="homepage.php" class="navbar-brand text-light fs-2 fw-bolder">UDcity</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active text-light" aria-current="page" href="homepage.php">หน้าหลัก</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="admin_thumbon.php">ข้อมูลสถานที่ในตำบล</a>
        </li>
       
        <li class="nav-item">
          <a class="nav-link text-light" href="product_info.php">ข้อมูลสินค้าชุมชน</a>
        </li>
        <?php if(isset($_SESSION['username'])){ ?>

        <li class="nav-item">
          <a class="nav-link text-light" href="admin_logs.php">ตรวจสอบสิทธิ์เข้าระบบ</a>
        </li>
        <?php } ?>
      
      </ul>
      <form method="post" action="" class="d-flex" role="search">

      <?php if(isset($_SESSION['username'])){ ?>
      <li class="nav-item dropdown me-5 mt-1" style="list-style:none;">
          <a class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?= $_SESSION['fname'] ?>
          </a>
          <ul class="dropdown-menu">
            <!-- <li><a class="dropdown-item" href="#">แก้ไขข้อมูลส่วนตัว</a></li> -->
            <!-- <li><hr class="dropdown-divider"></li> -->
            <li><a class="dropdown-item" href="./function/logout.php">ออกจากระบบ</a></li>
          </ul>
        </li>
        <?php }elseif(!isset($_SESSION['username'])){ ?>
          <li class="nav-item w-100" style="list-style:none;">
          <a class="nav-link text-light" href="login.php">เข้าสู่ระบบผู้ดูแลระบบ</a>
        </li>
          <?php }?>

    
      </form>
      

    </div>
    </nav>
    
    </div>
  
    

<script src="./dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>