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

     $sql = "SELECT * FROM place_types";
     $qry = $conn->query($sql);

     $sql_village = "SELECT * FROM villages";
     $qry_village = $conn->query($sql_village);
    ?>

    <div class="container mt-5 ms-3 ">
        <h1>เพิ่มข้อมูลสินค้าในชุมชน</h1>
        <form action="./function/add_product_fn.php" method="post" enctype="multipart/form-data">
            <label class="form-label mt-2" for="">ชื่อสินค้าในชุมชน</label>
            <input name="product_name" type="text" class="form-control w-100" placeholder="กรอกชื่อสินค้าในชุมชน..." required>
            <label class="form-label mt-2" for="">รายละเอียด</label>
            <input name="detail" type="text" class="form-control w-100" placeholder="กรอกรายละเอียด..." required>
            <label class="form-label mt-2" for="">ราคา</label>
            <input name="price" type="text" class="form-control w-100" placeholder="กรอกราคา..." required>
           

            <label class="form-label mt-2" for="">หมู่บ้าน</label>
            <select name="village_id" id="" class="form-select">
            <?php while($res = $qry_village->fetch_assoc() ){ ?>
                <option value="<?= $res['village_id'] ?>"><?= $res['village_name'] ?></option>
            <?php } ?>
            </select>

            <label for="" class="form-label mt-2">รูปสินค้า</label>
            <input type="file" name="img" id="" class="form-control">

            <button class="btn btn-success mt-2 w-100" name="id" value="<?= $id ?>">เพิ่มข้อมูลสถานที่</button>
        </form>
    </div>
</body>
</html>