<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    require('./header.php');
    $t_id = $_POST['t_id'];
    $search = $_POST['search'];

    $sql = "SELECT * FROM places 
    INNER JOIN villages ON villages.subdistrict_id = '$t_id'
    INNER JOIN place_types ON place_types.type_id =  places.type_id
    WHERE place_name LIKE '%".$search."%'
     ";
    $qry = $conn->query($sql);
    
   
    ?>

    <div class="container-fluid mt-3 ms-3">
        <a href="admin_info_thumbon.php?id=<?= $t_id?>" class="btn btn-primary mb-2" style="width:100px;" >< ย้อนกลับ </a>
    <div class="row">

    <?php
    if($qry->num_rows > 0){
    while($row = $qry->fetch_assoc()){ 
  
            ?>
    <div class="col col-lg-3">
        <div class="card h-100" >
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

    <?php 
 }
}else{ ?>
    <a href="admin_info_thumbon.php?id=<?= $t_id?>" class="btn btn-primary " style="width:100px;" >< ย้อนกลับ </a>
    <?php
    echo "<div class='col-12'><h3 class='text-center text-danger'>ไม่พบข้อมูล</h3></div>";

}
 
  ?>
</div>
    </div>
</body>
</html>