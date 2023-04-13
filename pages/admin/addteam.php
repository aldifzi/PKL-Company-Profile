<?php
session_start();
$active = 'master';
require_once '../../assets/connection.php';
if (strlen($_SESSION['login']) == 0) {
	header('location:index.php');
} else {

	if (isset($_POST['Submit'])) {
		$detail = mysqli_real_escape_string($con, $_POST['detail']);
		$nama = mysqli_real_escape_string($con, $_POST['nama']);
		$link_ig = mysqli_real_escape_string($con, $_POST['link_ig']);
		$filename = $_FILES['gambar']['name'];

		// CEK DATA TIDAK BOLEH KOSONG
		// JIKA SEMUANYA TIDAK KOSONG
		$filetmpname = $_FILES['gambar']['tmp_name'];

		// FOLDER DIMANA GAMBAR AKAN DI SIMPAN
		$folder = '../../assets/img/teams/';
		// GAMBAR DI SIMPAN KE DALAM FOLDER
		move_uploaded_file($filetmpname, $folder . $filename);

		// MEMASUKAN DATA DATA + NAMA GAMBAR KE DALAM DATABASE
		$result = mysqli_query($con, "INSERT INTO team(detail,nama,link_ig,gambar) VALUES('$detail','$nama', '$link_ig', '$filename')");

		if ($result) {
			echo "
    <script>
        alert('Berhasil Tambah Data Guru');
        document.location='team';    
    </script>";
		} else {
			echo "
    <script>
        alert('GagalTambah Data Guru');
        document.location='team';    
    </script>";
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
                        <h1 class="h3 mb-0 text-gray-800">Add Team</h1>
                    </div>
                </div>
                <div class="card-body">
											<form method="post" name="form1" enctype="multipart/form-data">
												<div class="form-group">
													<label for="nama">Nama</label>
													<input type="text" class="form-control" id="nama" placeholder="Nama lengkap" autocomplete="off" required="required" name="nama">
												</div>
												<div class="col">
													<div class="form-group">
														<label for="detail">Detail</label>
														<input type="text" class="form-control" id="detail" placeholder="Mengajar Pelajaran" autocomplete="off" required="required" name="detail">
													</div>
												</div>v>
												</div>
												<div class="row">
													<div class="col">
														<div class="form-group">
															<label for="foto">Foto</label>
															<input type="file" class="form-control-file" id="gambar" autocomplete="off" required="required" name="gambar">
														</div>
													</div>
												</div>
												<div class="form-group">
													<label for="link_ig">Link IG</label>
													<textarea name="link_ig" id="link_ig" cols="30" rows="3" required="required" class="form-control"></textarea>
												</div>
												<div class="form-group">
													<button type="submit" class="btn btn-sm btn-primary" name="Submit" value="Add">Tambah</button>
													<button type="reset" class="btn btn-sm btn-danger" onclick="return confirm('apakah anda yakin?')">Batal</button>
													<a href="team" class="btn btn-sm btn-secondary">Kembali</a>
												</div>
											</form>
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