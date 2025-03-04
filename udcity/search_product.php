<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    require('./header.php');
    $village_id = $_POST['village_id'];
    $search = $_POST['search'];

    $sql = "SELECT * FROM products 
    INNER JOIN villages ON villages.village_id = '$village_id'
    WHERE product_name LIKE '%".$search."%'
     ";
    $qry = $conn->query($sql);
    
   
    ?>

    <div class="container-fluid mt-3 ms-3">
    <a href="product_info.php" class="btn btn-primary " style="width:100px;" >< ย้อนกลับ </a>
    <div class="row">

    <?php
    if($qry->num_rows > 0){
    while($row = $qry->fetch_assoc()){ 
  
            ?>
    <div class="col col-lg-3">
    <div class="card h-100 mt-2" style="">
            <img src="./product_img/<?= $row['product_img'] ?>" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title"><?= $row['product_name'] ?></h5>
                <p class="card-text"><?= $row['details'] ?> </p>
                <p class="card-text">ราคา : <?= $row['price'] ?> บาท</p>
                <p class="card-text">หมู่บ้าน : <?= $row['village_name'] ?> </p>
                <?php if(isset($_SESSION['username'])){ ?>
                      <div class="d-flex">
                      <form action="admin_edit_product.php" method="post">
                            <button class="btn btn-primary mx-2" name="product_id" value="<?= $row['product_id'] ?>">แก้ไข</button>
                        </form>
                        <form action="./function/del_product_fn.php" method="post">
                            <button class="btn btn-danger"  name="product_id" value="<?= $row['product_id'] ?>">ลบ</button>
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
    <a href="product_info.php" class="btn btn-primary " style="width:100px;" >< ย้อนกลับ </a>
    <?php
    echo "<div class='col-12'><h3 class='text-center text-danger'>ไม่พบข้อมูล</h3></div>";

}
 
  ?>
</div>
    </div>
</body>
</html>