<?php
session_start();
include('../../assets/connection.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {

        $imgfile = $_FILES["postimage"]["name"];
        // get the image extension
        $extension = substr($imgfile, strlen($imgfile) - 4, strlen($imgfile));
        // allowed extensions
        $allowed_extensions = array(".jpg", "jpeg", ".png", ".gif");
        // Validation for allowed extensions .in_array() function searches an array for a specific value.
        if (!in_array($extension, $allowed_extensions)) {
            echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
        } else {
            //rename the image file
            $imgnewfile = md5($imgfile) . $extension;
            // Code for move image into directory
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/" . $imgnewfile);



            $postid = intval($_GET['pid']);
            $query = mysqli_query($con, "update tblposts set PostImage='$imgnewfile' where id='$postid'");
            if ($query) {
                $msg = "Post Feature Image updated ";
            } else {
                $error = "Something went wrong . Please try again.";
            }
        }
    }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link href="" rel="stylesheet" />
        <link rel="stylesheet" href="../../assets/css/sb-admin-2.css">
        <link rel="stylesheet" href="../../assets/css/sb-admin-2.min.css">
        <link href="../../assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="../../assets/css/bootstrap.css">
        <title></title>
    </head>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php include('components/sidebar.php'); ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php include('components/nav.php'); ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Add Slide</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="p-6">
                                <form name="addpost" method="post" enctype="multipart/form-data">
                                    <?php
                                    $postid = intval($_GET['pid']);
                                    $query = mysqli_query($con, "select PostImage,PostTitle from tblposts where id='$postid' and Is_Active=1 ");
                                    while ($row = mysqli_fetch_array($query)) {
                                    ?>
                                        <div class="row">
                                            <div class="col-md-10 col-md-offset-1">
                                                <div class="p-6">
                                                        <form name="addpost" method="post">
                                                            <div class="form-group m-b-20">
                                                                <label for="exampleInputEmail1">Post Title</label>
                                                                <input type="text" class="form-control" id="posttitle" value="<?php echo htmlentities($row['PostTitle']); ?>" name="posttitle" readonly>
                                                            </div>



                                                            <div class="row">
                                                                <div class="col-sm-12">
                                                                    <div class="card-box">
                                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Current Post Image</b></h4>
                                                                        <img src="postimages/<?php echo htmlentities($row['PostImage']); ?>" width="300" />
                                                                        <br />

                                                                    </div>
                                                                </div>
                                                            </div>

                                                        <?php } ?>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-box">
                                                                    <h4 class="m-b-30 m-t-0 header-title"><b>New Feature Image</b></h4>
                                                                    <input type="file" class="form-control" id="postimage" name="postimage" required>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- /.container-fluid -->

                            </div>
                            <!-- End of Main Content -->

                            <!-- Footer -->
                            <footer class="sticky-footer bg-white">
                                <div class="container my-auto">
                                    <div class="copyright text-center my-auto">
                                        <span>Copyright &copy; Your Website 2021</span>
                                    </div>
                                </div>
                            </footer>
                            <!-- End of Footer -->

                        </div>
                        <!-- End of Content Wrapper -->

                    </div>
                    <!-- End of Page Wrapper -->

                    <!-- Scroll to Top Button-->
                    <a class="scroll-to-top rounded" href="#page-top">
                        <i class="fas fa-angle-up"></i>
                    </a>

                    <!-- Logout Modal-->
                    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                </div>
                                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                                <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <a class="btn btn-primary" href="login.html">Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bootstrap core JavaScript-->
                    <script src="../../assets/vendor/jquery/jquery.min.js"></script>
                    <script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                    <!-- Core plugin JavaScript-->
                    <script src="../../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

                    <!-- Custom scripts for all pages-->
                    <script src="../../assets/js/sb-admin-2.min.js"></script>

                    <!-- Page level plugins -->
                    <script src="../../assets/vendor/chart.js/Chart.min.js"></script>

                    <!-- Page level custom scripts -->
                    <script src="../../assets/js/demo/chart-area-demo.js"></script>
                    <script src="../../assets/js/demo/chart-pie-demo.js"></script>

                    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
                    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"></script>
                    <script src="https://kit.fontawesome.com/6f2ba42180.js" crossorigin="anonymous"></script>
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


    </body>
<?php } ?>