<?php
session_start();
include('../../assets/connection.php');
error_reporting(0);
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {

    if($_GET['action']='del')
        {
        $id=intval($_GET['pid']);
        $query=mysqli_query($con,"update slide set Is_Active=0 where id='$id'");
        if($query)
        {
        $msg="Post deleted ";
        }
        else{
        $error="Something went wrong . Please try again.";    
        } }
    // For adding post  
    if (isset($_POST['submit'])) {
        $posttitle = $_POST['posttitle'];
        $postdetails = $_POST['postdescription'];
        $arr = explode(" ", $posttitle);
        $url = implode("-", $arr);
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
            move_uploaded_file($_FILES["postimage"]["tmp_name"], "postimages/slide/" . $imgnewfile);

            $status = 1;
            $query = mysqli_query($con, "insert into slide(PostTitle,PostDetails,Is_Active,PostImage) values('$posttitle','$postdetails','$status','$imgnewfile')");
            if ($query) {
                $msg = "Post successfully added ";
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
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addpost" method="post" enctype="multipart/form-data">
                                            <div class="form-group m-b-20">
                                                <label for="exampleInputEmail1">Slide Title</label>
                                                <input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
                                            </div>





                                            <br>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card-box">
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Slide Details</b></h4>
                                                        <textarea class="form-control" maxlength="40" cols="155" rows="10" name="postdescription" required></textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row mt-2">
                                                <div class="col-sm-12">
                                                    <div class="card-box">
                                                        <h4 class="m-b-30 m-t-0 header-title"><b>Slide Image</b></h4>
                                                        <input type="file" class="form-control" id="postimage" name="postimage" required>
                                                    </div>
                                                </div>
                                            </div>


                                            <button type="submit" name="submit" class="btn btn-success waves-effect waves-light mt-5">Save and Post</button>
                                            <button type="button" class="btn btn-danger waves-effect waves-light mt-5">Discard</button>
                                        </form>
                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-colored table-centered table-inverse m-0">
                                <thead>
                                    <tr>

                                        <th>Title</th>
                                        <th>Details</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $query = mysqli_query($con, "SELECT slide.id as id,slide.PostTitle as title,slide.PostDetails as PostDetails,slide.PostImage as PostImage from slide where slide.Is_Active=1 ");
                                    $rowcount = mysqli_num_rows($query);
                                    if ($rowcount == 0) {
                                    ?>
                                        <tr>

                                            <td colspan="4" align="center">
                                                <h3 style="color:red">No record found</h3>
                                            </td>
                                        <tr>
                                            <?php
                                        } else {
                                            while ($row = mysqli_fetch_array($query)) {
                                            ?>
                                        <tr>
                                            <td><b><?php echo htmlentities($row['title']); ?></b></td>
                                            <td><?php echo htmlentities($row['PostDetails']) ?></td>
                                            <td><img width="120px" src="postimages/slide/<?php echo htmlentities($row['PostImage']) ?>" alt=""></td>

                                            <td><a href="slide.php?pid=<?php echo htmlentities($row['id']); ?>&&action=del" onclick="return confirm('Do you reaaly want to delete ?')"> <i class="fa fa-trash-o" style="color: #f05050"></i></a></td>
                                        </tr>
                                <?php }
                                        } ?>

                                </tbody>
                            </table>
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
        <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.css" rel="stylesheet">
        <script src="https://kit.fontawesome.com/6f2ba42180.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-bs4.js"></script>


    </body>

    </html><?php } ?>