<header>
    <div class="top-bar">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-md-8">
            <div class="d-inline-block">
              <span class=" fg-primary" id="jam"></span>
            </div>
          </div>
          <div class="col-md-4 text-right d-none d-md-block">
            <div class="social-mini-button">
            <?php
                        $pagetype = 'fb';
                        $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
                        while ($row = mysqli_fetch_array($query)) {

                        ?>
              <a target="_blank" href="<?php echo htmlentities($row['Description']) ?>"><span class="mai-logo-facebook-f"></span></a>
              <?php } ?>
              <?php
                        $pagetype = 'yt';
                        $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
                        while ($row = mysqli_fetch_array($query)) {

                        ?>
              <a target="_blank" href="<?php echo htmlentities($row['Description']) ?>"><span class="mai-logo-youtube"></span></a>
              <?php } ?>
              <?php
                        $pagetype = 'ig';
                        $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
                        while ($row = mysqli_fetch_array($query)) {

                        ?>
              <a target="_blank" href="<?php echo htmlentities($row['Description']) ?>"><span class="mai-logo-instagram"></span></a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div> <!-- .container -->
    </div> <!-- .top-bar -->

    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
      <?php
                        $pagetype = 'logo';
                        $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
                        while ($row = mysqli_fetch_array($query)) {

                        ?>
        <a href="index" class="navbar-brand"><?php echo ($row['PageTitle']) ?></span></a>
<?php }?>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="navbar-collapse collapse" id="navbarContent">
          <ul class="navbar-nav ml-auto pt-3 pt-lg-0">
            <li class="nav-item <?php if ($page == 'home') {
                        echo 'active';
                      } ?>">
              <a href="index" class="nav-link">Home</a>
            </li>
            <li class="nav-item <?php if ($page == 'about') {
                        echo 'active';
                      } ?>">
              <a href="about" class="nav-link">About</a>
            </li>
            <li class="nav-item <?php if ($page == 'service') {
                        echo 'active';
                      } ?>">
              <a href="services" class="nav-link">Services</a>
            </li>
            <li class="nav-item <?php if ($page == 'blog') {
                        echo 'active';
                      } ?>">
              <a href="blog" class="nav-link">News</a>
            </li>
            <li class="nav-item <?php if ($page == 'contact') {
                        echo 'active';
                      } ?>">
              <a href="contact" class="nav-link">Contact</a>
            </li>
          </ul>
        </div>
      </div> <!-- .container -->
    </nav> <!-- .navbar -->

    <div class="page-banner home-banner mb-5">
      <div class="slider-wrapper">
        <div class="owl-carousel hero-carousel">
        <?php


$query=mysqli_query($con,"select * from slide where is_active=1 ");
while ($row=mysqli_fetch_array($query)) {
?>
          <div class="hero-carousel-item">
            <img src="../pages/admin/postimages/slide/<?php echo htmlentities($row['PostImage']);?>" alt="">
            <div class="img-caption">
              <div class="subhead"><?php echo htmlentities($row['PostDetails']);?></div>
              <h1 class="mb-4"><?php echo htmlentities($row['PostTitle']);?></h1>
              <a href="#services" class="btn btn-outline-light">Get Started</a>
            </div>
          </div>
          <?php } ?>
          
        </div>
      </div> <!-- .slider-wrapper -->
    </div> <!-- .page-banner -->
  </header>
  <script type="text/javascript">
    window.onload = function() { jam(); }
   
    function jam() {
     var e = document.getElementById('jam'),
     d = new Date(), h, m, s;
     h = d.getHours();
     m = set(d.getMinutes());
     s = set(d.getSeconds());
   
     e.innerHTML = h +':'+ m +':'+ s;
   
     setTimeout('jam()', 1000);
    }
   
    function set(e) {
     e = e < 10 ? '0'+ e : e;
     return e;
    }
   </script>