<?php
session_start();
$page = 'home';
include('../assets/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  

  <meta name="title" content="company profile">
<meta name="description" content="A company profile website is a digital platform that provides an overview of a company's history, mission, values, products or services, achievements,">
<meta name="keywords" content="company profile, website, marketing">
<meta name="robots" content="index, follow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="language" content="English">
<meta name="author" content="aldi">


  <title>Company Profile</title>

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

  <?php include('../components/navbar.php'); ?>

  <main>
    <div class="page-section">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3">
            <?php
            $pagetype = 'aboutus';
            $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <div class="subhead">About Us</div>
              <h2 class="title-section"><?= ($row['PageTitle']) ?></h2>

              <p><?= ($row['Description']) ?></p>

              <a href="about" class="btn btn-primary mt-4">Read More</a>
            <?php } ?>
          </div>
          <div class="col-lg-6 py-3">
            <div class="about-img">
              <img src="../assets/img/about.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">Our Services</div>
          <h2 class="title-section">See what can we do for your Projects</h2>
        </div>
        <div class="row justify-content-center">
          <?php
          $pagetype = 'aboutus';
          $query = mysqli_query($con, "SELECT * from services ORDER BY id ASC");
          while ($row = mysqli_fetch_array($query)) {
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

    <!-- Testimonials -->


    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">News</div>
          <h2 class="title-section">Read Our Latest News</h2>
        </div>

        <div class="row my-5 card-blog-row">
          <?php
          if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
          } else {
            $pageno = 1;
          }
          $no_of_records_per_page = 4;
          $offset = ($pageno - 1) * $no_of_records_per_page;


          $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
          $result = mysqli_query($con, $total_pages_sql);
          $total_rows = mysqli_fetch_array($result)[0];
          $total_pages = ceil($total_rows / $no_of_records_per_page);


          $query = mysqli_query($con, "select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.name,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
          while ($row = mysqli_fetch_array($query)) {
          ?>
            <div class="col-lg-3 py-3">
              <div class="card-blog">
                <div class="header">
                  <div class="avatar">
                    <img src="../assets/img/person/person_3.jpg" alt="">
                  </div>
                  <div class="entry-footer">
                    <div class="post-author"><?php echo htmlentities($row['name']); ?></div>
                    <a href="#" class="post-date"><?php echo htmlentities($row['postingdate']); ?>20</a>
                  </div>
                </div>
                <div class="body">
                  <div class="post-title"><a href="blog-single"><?php echo htmlentities($row['posttitle']); ?></a></div>
                  <div class="post-excerpt"><?php custom_echo($row['postdetails'], 80);  ?></div>
                </div>
                <div class="footer">
                  <a href="blog-single?nid=<?php echo htmlentities($row['pid']); ?>">Read More <span class="mai-chevron-forward text-sm"></span></a>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>

        <div class="text-center">
          <a href="blog" class="btn btn-primary">View More</a>
        </div>

      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <h2 class="title-section mb-3">Stay in touch</h2>
          <p>Just say hello or drop us a line. You can manualy send us email on <a href="mailto:example@mail.com">example@mail.com</a></p>
        </div>
        <div class="row justify-content-center mt-5">
          <div class="col-lg-8">
            <form method="POST" action="form_proses.php" class="form-contact">
              <div class="row">
                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter name.." required>
                </div>
                <div class="col-sm-6 py-2">
                  <label for="email" class="fg-grey">Email</label>
                  <input type="text" class="form-control" name="email" id="email" placeholder="Email address.." required>
                </div>
                <div class="col-12 py-2">
                  <label for="message" class="fg-grey">Message</label>
                  <textarea id="message" name="message" rows="8" class="form-control" required placeholder="Enter message.."></textarea>
                </div>
                <div class="col-12 mt-3">
                  <button type="submit" class="btn btn-primary px-5">Submit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    

  </main>

  <?php include('../components/footer.php'); ?>


  <script src="../assets/js/jquery-3.5.1.min.js"></script>

  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

  <script src="../assets/vendor/wow/wow.min.js"></script>

  <script src="../assets/vendor/fancybox/js/jquery.fancybox.min.js"></script>

  <script src="../assets/vendor/isotope/isotope.pkgd.min.js"></script>

  <script src="../assets/js/google-maps.js"></script>

  <script src="../assets/js/theme.js"></script>

  <!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->

</body>

</html>
<?php
function custom_echo($x, $length)
{
  if (strlen($x) <= $length) {
    echo $x;
  } else {
    $y = substr($x, 0, $length) . '...';
    echo $y;
  }
}
?>