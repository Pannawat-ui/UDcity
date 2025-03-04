<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>
<body>
    <?php
    require('./header.php');
    $place_id = $_POST['place_id'];
    $t_id = $_REQUEST['t_id'];

    $sql_pl = "SELECT * FROM places WHERE place_id = '$place_id' ";
    $qry_pl = $conn->query($sql_pl);
    $res_p = $qry_pl->fetch_assoc();

    $sql = "SELECT * FROM place_types";
    $qry = $conn->query($sql);

    
    $sql_village = "SELECT * FROM villages";
    $qry_village = $conn->query($sql_village);
    ?>

<div class="container mt-5 ms-3 ">
        <h1>เพิ่มข้อมูลสถานที่</h1>
        <form action="./function/edit_place_fn.php" method="post" enctype="multipart/form-data">
            <label class="form-label mt-2" for="">ชื่อสถานที่</label>
            <input name="place_name" type="text" class="form-control w-100" value="<?= $res_p['place_name'] ?>" required>
            <label class="form-label mt-2" for="">ละติจูด</label>
            <input name="latitude" type="text" class="form-control w-100" value="<?= $res_p['latitude'] ?>" required>
            <label class="form-label mt-2" for="">ลองจิจูด</label>
            <input name="longitude" type="text" class="form-control w-100" value="<?= $res_p['longitude'] ?>" required>
            <label class="form-label mt-2" for="">รายละเอียด</label>
            <input name="details" type="text" class="form-control w-100" value="<?= $res_p['details'] ?>" required>
            <label class="form-label mt-2" for="">ประเภท</label>
            <select name="type_id" id="" class="form-select">
            <?php while($res = $qry->fetch_assoc() ){ ?>
                <option value="<?= $res['type_id'] ?>"><?= $res['type_name'] ?></option>
            <?php } ?>
            </select>

            <label class="form-label mt-2" for="">หมู่บ้าน</label>
            <select name="village_id" id="" class="form-select">
            <?php while($res = $qry_village->fetch_assoc() ){ ?>
                <option value="<?= $res['village_id'] ?>"><?= $res['village_name'] ?></option>
            <?php } ?>
            </select>

            <label for="" class="form-label mt-2">รูปสถานที่</label>
            <input type="file" name="img" id="" class="form-control">
            <input type="text" name="t_id" value="<?= $t_id ?>" class="d-none">
            <button class="btn btn-success mt-2 w-100" name="id" value="<?= $res_p['place_id'] ?>">แก้ไขสถานที่</button>
        </form>
    </div>
    
</body>
</html>