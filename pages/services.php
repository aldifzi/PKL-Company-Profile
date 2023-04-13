<?php 
session_start();
include('../assets/connection.php');
$page = 'service';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Revetive - Free Business Corporate Template By MACode ID</title>

  <link rel="stylesheet" href="../assets/css/bootstrap.css">
  
  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/fancybox/css/jquery.fancybox.css">

  <link rel="stylesheet" href="../assets/css/theme.css">

</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <?php include('../components/navbar.php');?>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Our Services</div>
          <h2 class="title-section">See what can we do for your Projects</h2>
        </div>

        <div class="row justify-content-center">
        <?php 
$pagetype='aboutus';
$query=mysqli_query($con,"SELECT * from services ORDER BY id ASC");
while($row=mysqli_fetch_array($query))
{
?>
          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/<?= $row['icon'] ?>" alt="">
              </div>
              <h5><?= $row['title'] ?></h5>
            </div>
          </div>
          <?php } ?>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

   
  </main>


  <?php include('../components/footer.php');?>

  
<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

<script src="../assets/vendor/isotope/isotope.pkgd.min.js"></script>

<script src="../assets/js/google-maps.js"></script>

<script src="../assets/js/theme.js"></script>

</body>
</html>