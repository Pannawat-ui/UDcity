<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    require('./header.php');

    $sql = "SELECT * FROM subdistricts";
    $qry = $conn->query($sql);

    ?>

    <div class="container-fluid mt-3 ">
        
        <div class="d-flex justify-content-between">
            <h2>ข้อมูลสถานที่ในตำบล</h2>
        </div>

        <div class="row">

    <?php while($res = $qry->fetch_assoc()){  ?>
        <div class="col col-lg-3">

    <div class="card ms-3 mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $res['subdistrict_name'] ?></h5>
    <form action="./admin_info_thumbon.php" method="post">
        <button name="id" class="btn btn-dark" value="<?= $res['subdistrict_id'] ?>">ไปที่ตำบล <?= $res['subdistrict_name'] ?> </button>
    </form>
  </div>
    </div>
    </div>

    <?php }?>

    </div>
    </div>
</body>
</html>