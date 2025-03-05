<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITVoting</title>
    <link rel="stylesheet" href="./css/index.css">
    <link rel="stylesheet" href="./dist/css/bootstrap.css">
</head>
<body>
    <div class="container w-50">
        <h2>สมัครสมาชิก</h2>


        <form action="./function/regis_fn.php" method="post">
        
            
        <div class="" style="text-align:left; margin-top:15px;">
      
        <div class="" style="text-align:left; margin-top:15px;">
        <label for="">ชื่อผู้ใข้งาน</label>
        <div class="input-box">
            <input type="text" name="username" id="citizen-id" placeholder="กรอกชื่อผู้ใข้งาน..." required>
        </div>
        </div>

        <div class="" style="text-align:left; margin-top:15px;">
        <label for="">ชื่อ-สกุล</label>
        <div class="input-box">
            <input type="text" name="fname" id="citizen-id" placeholder="กรอกชื่อ-สกุล..." required>
        </div>
        </div>

        <div class="" style="text-align:left; margin-top:15px;">
        <label for="">รหัสผ่าน</label>
        <div class="input-box">
            <input type="password" name="password" id="citizen-id" placeholder="กรอกรหัสผ่าน..." required>
        </div>
        </div>

        <div class="" style="text-align:left; margin-top:15px;">
        <label for="">ยืนยันรหัสผ่าน</label>
        <div class="input-box">
            <input type="password" name="c_password" id="citizen-id" placeholder="ยืนยันรหัสผ่าน..." required>
        </div>
        </div>
        
        <button class="mt-2" name="register">สมัครสมาชิก</button>
        </form>
      

        <div class="footer">
            <p>หากท่านมีบัญชีแล้ว คลิ๊กที่นี่เพื่อ <a href="./index.php">เข้าสู่ระบบ</a> </p>
        </div>
    </div>
    
    <?php if(isset($_REQUEST['msg'])){ ?>
    <div id="toast" class="toast show"><?= $_REQUEST['msg'] ?></div>

    <?php }elseif(isset($_REQUEST['success'])){?>
        <div id="toasts" class="toasts show"><?= $_REQUEST['success'] ?></div>
        <?php } ?>
    <script>
        window.onload = function() {
            var toast = document.getElementById("toast");
            setTimeout(function(){ toast.classList.remove("show"); }, 3000);
        };
    </script>



</body>
</html>