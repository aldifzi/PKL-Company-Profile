<?php
session_start();
include('../assets/connection.php');
$page = 'blog';
if (empty($_SESSION['token'])) {
  $_SESSION['token'] = bin2hex(random_bytes(32));
  $page = 'detailberita';
}

if (isset($_POST['submit'])) {
  //Verifying CSRF Token
  if (!empty($_POST['csrftoken'])) {
    if (hash_equals($_SESSION['token'], $_POST['csrftoken'])) {
      $name = $_POST['name'];
      $email = $_POST['email'];
      $comment = $_POST['comment'];
      $postid = intval($_GET['nid']);
      $st1 = '0';
      $query = mysqli_query($con, "insert into tblcomments(postId,name,email,comment,status) values('$postid','$name','$email','$comment','$st1')");
      if ($query) :
        echo "<script>alert('comment successfully submit. Comment will be display after admin review ');</script>";
        unset($_SESSION['token']);
      else :
        echo "<script>alert('Something went wrong. Please try again.');</script>";

      endif;
    }
  }
}
$postid = intval($_GET['nid']);

$sql = "SELECT viewCounter FROM tblposts WHERE id = '$postid'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $visits = $row["viewCounter"];
    $sql = "UPDATE tblposts SET viewCounter = $visits+1 WHERE id ='$postid'";
    $con->query($sql);
  }
} else {
  echo "no results";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">
  <?php
  $pid = intval($_GET['nid']);
  $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
  $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
  while ($row = mysqli_fetch_array($query)) {
  ?>
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

  <?php include('../components/navbar.php'); ?>

  <main>
    <div class="page-section pt-4">
      <div class="container">
        <nav aria-label="Breadcrumb">
          <ol class="breadcrumb bg-transparent mb-4">
            <li class="breadcrumb-item"><a href="index">Home</a></li>
            <li class="breadcrumb-item"><a href="blog">Blog</a></li>
            <?php
            $pid = intval($_GET['nid']);
            $currenturl = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];;
            $query = mysqli_query($con, "select tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url,tblposts.postedBy,tblposts.lastUpdatedBy,tblposts.UpdationDate from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
            while ($row = mysqli_fetch_array($query)) {
            ?>
              <li class="breadcrumb-item active" aria-current="page"><?php echo htmlentities($row['posttitle']); ?></li>
          </ol>
        </nav>
        <div class="row">
          <div class="col-lg-8">
            <div class="blog-single-wrap">
              <div class="post-thumbnail">
                <img src="admin/postimages/<?php echo htmlentities($row['PostImage']); ?>" alt="">
              </div>
              <h1 class="post-title"><?php echo htmlentities($row['posttitle']); ?></h1>
              <div class="post-meta">
                <div class="post-author">
                  <span class="text-grey">By</span><?php echo htmlentities($row['postedBy']); ?>
                </div>
                <span class="gap">|</span>
                <div class="post-date">22 Jan, 2018
                </div>
              </div>
              <div class="post-content">
                <p><?php
                    $pt = $row['postdetails'];
                    echo (substr($pt, 0)); ?></p>
              </div>
            </div> <!-- .blog-single-wrap -->
          <?php } ?>
          <div class="comment-form-wrap pt-5">
            <h3 class="mb-5">Leave a comment</h3>
            <form action="#" class="">
              <div class="form-row form-group">
                <div class="col-md-6">
                  <label for="name">Name *</label>
                  <input type="hidden" name="csrftoken" value="<?php echo htmlentities($_SESSION['token']); ?>" />
                  <input type="text" class="form-control" name="name">
                </div>
                <div class="col-md-6">
                  <label for="email">Email *</label>
                  <input type="email" class="form-control" name="email">
                </div>
              </div>

              <div class="form-group">
                <label for="message">Message</label>
                <textarea name="msg" name="comment" cols="30" rows="8" class="form-control"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Post Comment" class="btn btn-primary">
              </div>

            </form>
          </div> <!-- .comment-form-wrap -->
          </div>

          <div class="col-lg-4">
            <div class="widget">
              <div class="widget-box">
                <h3 class="widget-title">Search</h3>
                <div class="divider"></div>
                <form action="#" class="search-form">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Type a keyword and hit enter">
                    <button type="submit" class="btn"><span class="icon mai-search"></span></button>
                  </div>
                </form>
              </div>
            </div>

            <div class="widget-box">
              <h3 class="widget-title">Recent Blog</h3>
              <div class="divider"></div>
              <?php 
     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;


        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($con,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($con,"select tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.name,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
              <div class="blog-item">
                <div class="content">
                  <h6 class="post-title"><a href="#"><?php echo htmlentities($row['posttitle']);?></a></h6>
                  <div class="meta">
                    <a href="#"><span class="mai-calendar"></span><?php echo htmlentities($row['postingdate']);?></a>
                    <a href="#"><span class="mai-person"></span> <?php echo htmlentities($row['name']);?></a>
                  </div>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
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

</body>

</html><?php } ?>