<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    require('./header.php');
    $id = $_REQUEST['id'];

    $sql = "SELECT * FROM subdistricts WHERE subdistrict_id = '$id' ";
    $qry = $conn->query($sql);
    $res = $qry->fetch_assoc();

    $places = "SELECT * FROM places 
    INNER JOIN villages ON villages.subdistrict_id = '$id'
    INNER JOIN place_types ON place_types.type_id =  places.type_id
    WHERE places.village_id = villages.village_id
    ";
    $q_place = $conn->query($places);

    ?>

    <div class="container-fluid mt-3 ms-3">
    <div class="d-flex justify-content-between">
        
    <a href="admin_thumbon.php" class="btn btn-primary" >< ย้อนกลับ </a>
    <?php if(isset($_SESSION['username'])){ ?>
       
        <form action="admin_add_place.php" method="post">
                <button  class="btn btn-success me-5" name="id" value="<?= $id ?>">เพิ่มข้อมูลสถานที่</button>
            </form>
       <?php } ?>
        </div>
    <form action="search_place.php" method="post">
    <div class="d-flex mt-2">
        <input type="text" name="t_id" value="<?= $id ?>" class="d-none">
    <input class="form-control me-2 w-50" type="search" name="search" placeholder="ค้นหาข้อมูลสถานที่ในตำบล..." aria-label="Search" required>
    <button class="btn btn-danger" type="submit">ค้นหา</button>
    </div>
      </form>

        <div class="d-flex justify-content-between">
        <h1>ตำบล <?= $res['subdistrict_name'] ?></h1>
        <?php if(isset($_SESSION['username'])){ ?>
       
        <?php } ?>
        </div>        
    <div class="row">
    <?php while($row = $q_place->fetch_assoc()){ ?>
    <div class="col col-lg-3">

        <div class="card h-100" style="">
            <img src="./place_img/<?= $row['place_img'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $row['place_name'] ?></h5>
                <p class="card-text">ละติจูด : <?= $row['latitude'] ?> </p>
                <p class="card-text">ลองจิจูด : <?= $row['longitude'] ?> </p>
                <p class="card-text"><?= $row['details'] ?> </p>
                <p class="card-text">ประเภทสถานที่ : <?= $row['type_name'] ?> </p>
                <p class="card-text">หมู่บ้าน : <?= $row['village_name'] ?> </p>
                <?php if(isset($_SESSION['username'])){ ?>
                      <div class="d-flex">
                      <form action="admin_edit_place.php" method="post">
                            <input type="text" name="t_id" value="<?= $id ?>" class="d-none">
                            <button class="btn btn-primary mx-2" name="place_id" value="<?= $row['place_id'] ?>">แก้ไข</button>
                        </form>
                        <form action="./function/del_place_fn.php" method="post">
                        <input type="text" name="t_id" value="<?= $id ?>" class="d-none">
                            <button class="btn btn-danger"  name="place_id" value="<?= $row['place_id'] ?>">ลบ</button>
                        </form>
                      </div>
                    <?php }else{ ?>
                <!-- <a href="#" class="btn btn-primary">ดูรายละเอียด</a> -->
                <?php } ?>
            </div>
        </div>
        
    </div>

    <?php } ?>
</div>


    </div>
</body>
</html>