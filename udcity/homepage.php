<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="./css/slide.css">
</head>
<body>
    <?php
    require('./header.php');

    $sql = "SELECT * FROM subdistricts";
    $qry = $conn->query($sql);
    ?>



<div class="slider-container">
        <div class="slider">
            <img src="./ud_img/1.jpg"  alt="Image 1">
            <img src="./ud_img/2.jpg" alt="Image 2">
            <img src="./ud_img/3.jpg" alt="Image 3">
        </div>
        <button class="botton prev" onclick="changeSlide(-1)">&#10094;</button>
        <button class="botton next" onclick="changeSlide(1)">&#10095;</button>
    </div>

    <hr>

    <div class="container-fluid mt-3 ">
        
        <div class="d-flex justify-content-between">
            <h2>ชื่อตำบล</h2>
        </div>

        <div class="row">

    <?php while($res = $qry->fetch_assoc()){  ?>
        <div class="col col-lg-3">

    <div class="card ms-3 mt-3" style="width: 18rem;">
  <div class="card-body">
    <h5 class="card-title"><?= $res['subdistrict_name'] ?></h5>
    <form action="./village.php" method="post">
        <button name="id" class="btn btn-dark " value="<?= $res['subdistrict_id'] ?>">หมู่บ้านตำบล <?= $res['subdistrict_name'] ?> </button>
    </form>
  </div>
    </div>
    </div>

    <?php }?>

    </div>
    </div>

















    <script>
        let currentIndex = 0;

function changeSlide(direction) {
    const slides = document.querySelectorAll(".slider img");
    const totalSlides = slides.length;

    currentIndex += direction;

    if (currentIndex >= totalSlides) {
        currentIndex = 0;
    }
    if (currentIndex < 0) {
        currentIndex = totalSlides - 1;
    }

    const slider = document.querySelector(".slider");
    slider.style.transform = `translateX(-${currentIndex * 100}%)`;
}

// Optional: Auto-change slide every 3 seconds
setInterval(() => changeSlide(1), 3000);

    </script>
</body>
</html>