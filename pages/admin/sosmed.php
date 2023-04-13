<?php
session_start();
include('../../assets/connection.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
    if (isset($_POST['update'])) {
        $pagetype = 'ig';
        $pagetitle = $_POST['pagetitle'];
        $pagedetails = $_POST['pagedescription'];

        $query = mysqli_query($con, "update tblpages set PageTitle='$pagetitle',Description='$pagedetails' where PageName='$pagetype' ");
        if ($query) {
            $msg = "Social Media link  page successfully updated ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }
    if (isset($_POST['apdet'])) {
        $pagetype = 'yt';
        $pagetitle = $_POST['pagetitle'];
        $pagedetails = $_POST['pagedescription'];

        $query = mysqli_query($con, "update tblpages set PageTitle='$pagetitle',Description='$pagedetails' where PageName='$pagetype' ");
        if ($query) {
            $msg = "Social Media link  page successfully updated ";
        } else {
            $error = "Something went wrong . Please try again.";
        }
    }
    if (isset($_POST['update2'])) {
        $pagetype = 'fb';
        $pagetitle = $_POST['pagetitle'];
        $pagedetails = $_POST['pagedescription'];

        $query = mysqli_query($con, "update tblpages set PageTitle='$pagetitle',Description='$pagedetails' where PageName='$pagetype' ");
        if ($query) {
            $msg = "Social Media link  page successfully updated ";
        } else {
            $error = "Something went wrong . Please try again.";
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
                            <h1 class="h3 mb-0 text-gray-800">Social Media Link</h1>
                        </div>

                        <!-- Content Row -->
                        <div class="row">
                            <div class="col-sm-6">
                                <!---Success Message--->
                                <?php if ($msg) { ?>
                                    <div class="alert alert-success" role="alert">
                                        <strong>Well done!</strong> <?php echo htmlentities($msg); ?>
                                    </div>
                                <?php } ?>

                                <!---Error Message--->
                                <?php if ($error) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <strong>Oh snap!</strong> <?php echo htmlentities($error); ?>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                        <?php
                        $pagetype = 'ig';
                        $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
                        while ($row = mysqli_fetch_array($query)) {

                        ?>

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="p-6">
                                        <div class="">
                                            <form name="aboutus" method="post">
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="card-box">
                                                            <h4 class="m-b-30 m-t-0 header-title"><b>Instagram</b></h4>
                                                            <input type="text" name="pagedescription" class="form-control" value="<?php echo htmlentities($row['Description']) ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                            <button type="submit" name="update" class="btn btn-success waves-effect my-3 waves-light">Update</button>

                                            </form>
                                        </div>
                                    </div> <!-- end p-20 -->
                                </div> <!-- end col -->
                            </div>

                            <?php
                            $pagetype = 'yt';
                            $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
                            while ($row = mysqli_fetch_array($query)) {

                            ?>

                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                        <div class="p-6">
                                            <div class="">
                                                <form name="aboutus" method="post">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="card-box">
                                                                <h4 class="m-b-30 m-t-0 header-title"><b>Youtube</b></h4><input type="text" name="pagedescription" class="form-control" value="<?php echo htmlentities($row['Description']) ?>" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>

                                                <button type="submit" name="apdet" class="btn btn-success waves-effect my-3 waves-light">Update</button>

                                                </form>
                                            </div>
                                        </div> <!-- end p-20 -->
                                    </div> <!-- end col -->
                                </div>

                                <?php
                                $pagetype = 'fb';
                                $query = mysqli_query($con, "select PageTitle,Description from tblpages where PageName='$pagetype'");
                                while ($row = mysqli_fetch_array($query)) {

                                ?>

                                    <div class="row">
                                        <div class="col-md-10 col-md-offset-1">
                                            <div class="p-6">
                                                <div class="">
                                                    <form name="aboutus" method="post">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="card-box">
                                                                    <h4 class="m-b-30 m-t-0 header-title"><b>Facebook</b></h4><input type="text" name="pagedescription" class="form-control" value="<?php echo htmlentities($row['Description']) ?>" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                    <button type="submit" name="update2" class="btn btn-success waves-effect my-3 waves-light">Update</button>

                                                    </form>
                                                </div>
                                            </div> <!-- end p-20 -->
                                        </div> <!-- end col -->
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


                    <!-- End of Content Wrapper -->


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
                    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


    </body>

    </html><?php } ?>