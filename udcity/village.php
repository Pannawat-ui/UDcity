<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    require('./header.php');
    $distric_id = $_REQUEST['id'];

    $sql = "SELECT * FROM villages
    INNER JOIN subdistricts ON subdistricts.subdistrict_id = '$distric_id'
     WHERE villages.subdistrict_id = '$distric_id' ";
    $qry = $conn->query($sql);
    ?>

<div class="container-fluid mt-5">
    <table class="table">
  <thead class="table-danger">
    <tr>
      <th scope="col">ชื่อหมู่บ้าน</th>
      <th scope="col">ตำบล</th>
    </tr>
  </thead>
  <tbody>
    <?php while($res = $qry->fetch_assoc()){ ?>
    <tr>
      <td><?= $res['village_name'] ?></td>
      <td><?= $res['subdistrict_name'] ?></td>
      
    </tr>
    <?php } ?>
 
  </tbody>
</table>
    </div>

</body>
</html>