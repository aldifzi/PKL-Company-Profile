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

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

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
          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/icons/web_development.svg" alt="">
              </div>
              <h5>Web Development</h5>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/icons/graphics_design.svg" alt="">
              </div>
              <h5>Graphics Design</h5>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/icons/seo_and_marketing.svg" alt="">
              </div>
              <h5>SEO & Marketing</h5>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/icons/customer_services.svg" alt="">
              </div>
              <h5>Customer Services</h5>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/icons/app_development.svg" alt="">
              </div>
              <h5>App Development</h5>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/icons/ui_ux_design.svg" alt="">
              </div>
              <h5>UI/UX Design</h5>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/icons/product_design.svg" alt="">
              </div>
              <h5>Product Design</h5>
            </div>
          </div>

          <div class="col-md-6 col-lg-4 col-xl-3 py-3 mb-3">
            <div class="text-center">
              <div class="img-fluid mb-4">
                <img src="../assets/img/icons/data_analyst.svg" alt="">
              </div>
              <h5>Data Analyst</h5>
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
    </div> 

    <!-- Testimonials -->
    <div class="page-section">
      <div class="container">
        <div class="owl-carousel testimonial-carousel">
          <div class="card-testimonial">
            <div class="content">
              The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
            </div>
            <div class="author">
              <div class="avatar">
                <img src="../assets/img/person/person_1.jpg" alt="">
              </div>
              <div class="d-inline-block ml-2">
                <div class="author-name">Sam Watson</div>
                <div class="author-info">CEO - Mosh Elite Ltd.</div>
              </div>
            </div>
          </div>

          <div class="card-testimonial">
            <div class="content">
              The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
            </div>
            <div class="author">
              <div class="avatar">
                <img src="../assets/img/person/person_2.jpg" alt="">
              </div>
              <div class="d-inline-block ml-2">
                <div class="author-name">Edinson Alfa</div>
                <div class="author-info">CEO - Mosh Elite Ltd.</div>
              </div>
            </div>
          </div>

          <div class="card-testimonial">
            <div class="content">
              The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
            </div>
            <div class="author">
              <div class="avatar">
                <img src="../assets/img/person/person_3.jpg" alt="">
              </div>
              <div class="d-inline-block ml-2">
                <div class="author-name">May Halloway</div>
                <div class="author-info">CEO - Mosh Elite Ltd.</div>
              </div>
            </div>
          </div>

          <div class="card-testimonial">
            <div class="content">
              The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
            </div>
            <div class="author">
              <div class="avatar">
                <img src="../assets/img/person/person_1.jpg" alt="">
              </div>
              <div class="d-inline-block ml-2">
                <div class="author-name">Sam Watson</div>
                <div class="author-info">CEO - Mosh Elite Ltd.</div>
              </div>
            </div>
          </div>

          <div class="card-testimonial">
            <div class="content">
              The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
            </div>
            <div class="author">
              <div class="avatar">
                <img src="../assets/img/person/person_2.jpg" alt="">
              </div>
              <div class="d-inline-block ml-2">
                <div class="author-name">Edinson Alfa</div>
                <div class="author-info">CEO - Mosh Elite Ltd.</div>
              </div>
            </div>
          </div>

          <div class="card-testimonial">
            <div class="content">
              The quick, brown fox jumps over a lazy dog. DJs flock by when MTV ax quiz prog. Junk MTV quiz graced by fox whelps. Bawds jog, flick quartz, vex nymphs. Waltz, bad nymph
            </div>
            <div class="author">
              <div class="avatar">
                <img src="../assets/img/person/person_3.jpg" alt="">
              </div>
              <div class="d-inline-block ml-2">
                <div class="author-name">May Halloway</div>
                <div class="author-info">CEO - Mosh Elite Ltd.</div>
              </div>
            </div>
          </div>

        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .page-section -->

    <div class="page-section">
      <div class="container">
        <div class="text-center">
          <div class="subhead">News</div>
          <h2 class="title-section">Read Our Latest News</h2>
        </div>

        <div class="row my-5 card-blog-row">
          <div class="col-lg-3 py-3">
            <div class="card-blog">
              <div class="header">
                <div class="entry-footer">
                  <div class="post-author">Sam Newman</div>
                  <a href="#" class="post-date">23 Apr 2020</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single">What is Business Management?</a></div>
              </div>
              <div class="footer">
                <a href="blog-single">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 py-3">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                  <img src="../assets/img/person/person_1.jpg" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">Sam Newman</div>
                  <a href="#" class="post-date">23 Apr 2020</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single">What is Business Management?</a></div>
                <div class="post-excerpt">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
              </div>
              <div class="footer">
                <a href="blog-single">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 py-3">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                  <img src="../assets/img/person/person_2.jpg" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">Sam Newman</div>
                  <a href="#" class="post-date">23 Apr 2020</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single">What is Business Management?</a></div>
                <div class="post-excerpt">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
              </div>
              <div class="footer">
                <a href="blog-single">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
          <div class="col-lg-3 py-3">
            <div class="card-blog">
              <div class="header">
                <div class="avatar">
                  <img src="../assets/img/person/person_3.jpg" alt="">
                </div>
                <div class="entry-footer">
                  <div class="post-author">Sam Newman</div>
                  <a href="#" class="post-date">23 Apr 2020</a>
                </div>
              </div>
              <div class="body">
                <div class="post-title"><a href="blog-single">What is Business Management?</a></div>
                <div class="post-excerpt">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</div>
              </div>
              <div class="footer">
                <a href="blog-single">Read More <span class="mai-chevron-forward text-sm"></span></a>
              </div>
            </div>
          </div>
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
            <form action="#" class="form-contact">
              <div class="row">
                <div class="col-sm-6 py-2">
                  <label for="name" class="fg-grey">Name</label>
                  <input type="text" class="form-control" id="name" placeholder="Enter name..">
                </div>
                <div class="col-sm-6 py-2">
                  <label for="email" class="fg-grey">Email</label>
                  <input type="text" class="form-control" id="email" placeholder="Email address..">
                </div>
                <div class="col-12 py-2">
                  <label for="subject" class="fg-grey">Subject</label>
                  <input type="text" class="form-control" id="subject" placeholder="Subject..">
                </div>
                <div class="col-12 py-2">
                  <label for="message" class="fg-grey">Message</label>
                  <textarea id="message" rows="8" class="form-control" placeholder="Enter message.."></textarea>
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

    <div class="page-section">
      <div class="container-fluid">
        <div class="row row-cols-md-3 row-cols-lg-5 justify-content-center text-center">
          <div class="py-3 px-5">
            <img src="../assets/img/clients/airbnb.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="../assets/img/clients/google.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="../assets/img/clients/mailchimp.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="../assets/img/clients/paypal.png" alt="">
          </div>
          <div class="py-3 px-5">
            <img src="../assets/img/clients/stripe.png" alt="">
          </div>
        </div>
      </div> <!-- .container-fluid -->
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

<!-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIA_zqjFMsJM_sxP9-6Pde5vVCTyJmUHM&callback=initMap"></script> -->

</body>
</html>