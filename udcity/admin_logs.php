<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<?php
    require('./header.php');

    $sql = "SELECT * FROM login_logs
    INNER JOIN admins ON admins.user_id = login_logs.user_id";
    $qry = $conn->query($sql);
    
    ?>

    <div class="container-fluid mt-5">
    <table class="table">
  <thead class="table-danger">
    <tr>
      <th scope="col">#</th>
      <th scope="col">ชื่อผู้ใช้</th>
      <th scope="col">ip address</th>
      <th scope="col">บราวเซอร์</th>
      <th scope="col">เวลา</th>
    </tr>
  </thead>
  <tbody>
    <?php while($res = $qry->fetch_assoc()){ ?>
    <tr>
      <th><?= $res['id'] ?></th>
      <td><?= $res['fname'] ?></td>
      <td><?= $res['ip_address'] ?></td>
      <td><?= $res['user_agent'] ?></td>
      <td><?= $res['login_time'] ?></td>
    </tr>
    <?php } ?>
 
  </tbody>
</table>
    </div>
</body>
</html>