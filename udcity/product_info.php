<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    require('./header.php');

   $sql = "SELECT * FROM products
   INNER JOIN villages ON villages.village_id = products.village_id";
   $qry = $conn->query($sql);

   $q_p = $conn->query($sql);
   $res_p = $q_p->fetch_assoc();

    ?>

    <div class="container-fluid mt-3 ms-3">
        
        
        <div class="d-flex justify-content-between">
            <a href="homepage.php" class="btn btn-primary" >< ย้อนกลับ </a>
            
        <?php if(isset($_SESSION['username'])){ ?>
        <form action="admin_add_product.php" method="post">
            <button  class="btn btn-success me-5" name="id" value="<?= $id ?>">เพิ่มสินค้าในชุมชน</button>
        </form>
        <?php } ?>
        </div>        
        <form action="search_product.php" method="post">
    <div class="d-flex mt-2">
        <input type="text" name="village_id" value="<?= $res_p['village_id'] ?>" class="d-none">
    <input class="form-control me-2 w-50" type="search" name="search" placeholder="ค้นหาข้อมูลสินค้าในชุมชน..." aria-label="Search" required>
    <button class="btn btn-danger" type="submit">ค้นหา</button>
    </div>
      </form>
    <div class="row">
    <?php while($row = $qry->fetch_assoc()){ ?>
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

    <?php } ?>
</div>


    </div>
</body>
</html>