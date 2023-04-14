<?php 
session_start();
$page = 'about';
include('../assets/connection.php');
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="title" content="company profile">
<meta name="description" content="A company profile website is a digital platform that provides an overview of a company's history, mission, values, products or services, achievements,">
<meta name="keywords" content="company profile, about, marketing">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="aldi">


  <title>About</title>

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
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
          <?php 
$pagetype='aboutus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{
?>
            <div class="subhead">About Us</div>
            <h2 class="title-section"><?= ($row['PageTitle']) ?></h2>

            <p><?= ($row['Description']) ?></p>
          </div>
          <?php } ?>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="../assets/img/about.jpg" alt="">
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Our Teams</div>
          <h2 class="title-section">The Expert Team on ReveTive</h2>
        </div>

        <div class="owl-carousel team-carousel mt-5">
        <?php
          $pagetype = 'aboutus';
          $query = mysqli_query($con, "SELECT * from team ORDER BY id ASC");
          while ($row = mysqli_fetch_array($query)) {
          ?>
          <div class="team-wrap">
            <div class="team-profile">
              <img src="../assets/img/teams/<?= $row['gambar'] ?>" alt="">
            </div>
            <div class="team-content">
              <h5><?= $row['nama'] ?></h5>
              <div class="text-sm fg-grey"><?= $row['detail'] ?></div>

             
            </div>
          </div>
          <?php }?>
        </div>
      </div> <!-- .container -->
    </div>

    
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