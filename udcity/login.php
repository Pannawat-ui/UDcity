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
    <div class="container w-50  ">
        <h2>เข้าสู่ระบบ</h2>
       

        <form action="./function/login_fn.php" method="post">
        
        <label for="">ชื่อผู้ใข้งาน</label>
        <div class="input-box">
            <input type="text" name="username" id="citizen-id" placeholder="ชื่อผู้ใข้งาน" required>
        </div>

        <label for="">รหัสผ่าน</label>
        <div class="input-box">
            <input type="password" name="password" id="citizen-id" placeholder="รหัสผ่าน" required>
        </div>
        
        <button class="btn btn-danger mt-2" style="">เข้าสู่ระบบ</button>
        </form>

        <!-- <div class="footer">
            <p>หากท่านยังไม่มีบัญชี คลิ๊กที่นี่เพื่อ <a href="./register.php">สมัครสมาชิก</a> </p>
        </div> -->
    </div>


  <?php if(isset($_REQUEST['msg'])){ ?>
    <div id="toast" class="toast show"><?= $_REQUEST['msg'] ?></div>

    <?php }elseif(isset($_REQUEST['success'])){?>
        <div id="toasts" class="toasts show"><?= $_REQUEST['success'] ?></div>
        <?php } ?>


    <script>
        window.onload = function() {
            var toast = document.getElementById("toast");
            setTimeout(function(){ toast.classList.remove("show"); }, 20000);
        };
    </script>

</body>
</html>


