<footer class="page-footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-3 py-3">
        <?php
                        $pagetype = 'logo';
                        $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
                        while ($row = mysqli_fetch_array($query)) {

                        ?>
          <h3><?php echo ($row['PageTitle']) ?></span></h3>
          <?php }?>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Contact Information</h5>
          <?php 
$pagetype='contactus';
$query=mysqli_query($con,"select PageTitle,Description from tblpages where PageName='$pagetype'");
while($row=mysqli_fetch_array($query))
{

?>
          <p><?php echo $row['Description'];?></p>
        </div>
        <?php }?>
        <div class="col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">Career</a></li>
            <li><a href="#">Resources</a></li>
            <li><a href="#">News & Feed</a></li>
          </ul>
        </div>
        <div class="col-lg-3 py-3">
          <h5>Newsletter</h5>
          <form action="#">
            <input type="text" class="form-control" placeholder="Enter your email">
            <button type="submit" class="btn btn-primary btn-sm mt-2">Submit</button>
          </form>
        </div>
      </div>

      <hr>

      <div class="row mt-4">
        <div class="col-md-6">
          <p>Copyright 2020. This template designed by <a href="https://macodeid.com">MACode ID</a></p>
        </div>
        <div class="col-md-6 text-right">
          <div class="sosmed-button">
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
    </div>
  </footer>