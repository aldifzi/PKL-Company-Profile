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
          <div class="team-wrap">
            <div class="team-profile">
              <img src="../assets/img/teams/team_1.jpg" alt="">
            </div>
            <div class="team-content">
              <h5>Walter White</h5>
              <div class="text-sm fg-grey">Chief Executive Officer</div>

              <div class="social-button">
                <a href="#"><span class="mai-logo-facebook-messenger"></span></a>
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

          <div class="team-wrap">
            <div class="team-profile">
              <img src="../assets/img/teams/team_2.jpg" alt="">
            </div>
            <div class="team-content">
              <h5>Sarah Johanson</h5>
              <div class="text-sm fg-grey">Chief Technology Officer</div>

              <div class="social-button">
                <a href="#"><span class="mai-logo-facebook-messenger"></span></a>
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

          <div class="team-wrap">
            <div class="team-profile">
              <img src="../assets/img/teams/team_3.jpg" alt="">
            </div>
            <div class="team-content">
              <h5>Anna Anderson</h5>
              <div class="text-sm fg-grey">Product Manager</div>

              <div class="social-button">
                <a href="#"><span class="mai-logo-facebook-messenger"></span></a>
                <a href="#"><span class="mai-call"></span></a>
                <a href="#"><span class="mai-mail"></span></a>
              </div>
            </div>
          </div>

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