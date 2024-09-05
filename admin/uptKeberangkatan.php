<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="bootcatch sidebar is simple single page template with sidebar based on bootstrap, it's starter template for admin template - thanks :)">
    <meta name="author" content="">

    <title>adminUpdate</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- material icons cdn -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- Custom styles for this template -->
    <link href="css/simple-sidebar.css" rel="stylesheet">

    <!-- common css -->
    <link rel="stylesheet" type="text/css" href="css/common.css">

    <style>
        body {
            /* Tambahkan background image */
            background-image: url('../assets/plane2.jpg'); /* Ganti 'url_ke_gambar.jpg' dengan path ke gambar yang ingin digunakan */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .form {
            background-color: #fff;
        }
    </style>
</head>

<body>

    <div id="main-wrapper">
        <!-- Sidebar -->
        <div id="sidebar">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a class="d-flex align-items-center">
                        <a href="homeAdmin.php">Home Admin</a>
                    </a>
                </li>
                <li>
                    <a href="createpesawat.php">Add Data Pesawat</a>
                </li>
                <li>
                    <a href="createbandara.php">Kelola Data Bandara</a>
                </li>
                <li>
                    <a href="createkeberangkatan.php">Kerangkatan Time</a>
                </li>
                <li>
                <a href="lihatdatatiket.php">Lihat List Tiket</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar -->

        <!-- Page Content -->
        <div id="main-content">
            <!-- navbar start -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <!-- <a class="navbar-brand" href="#">Sidebar</a> -->
                <!-- sidebar collapse button ## mobile view -->
                <ul class="navbar-nav  d-flex align-items-center ">
                    <li class="nav-item active mobile-view">
                        <a class="nav-link d-flex align-items-center" href="#menu-toggle" id="menu-toggle">
                            <i class="material-icons">menu</i>
                            <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
                <!-- end sidebar collapse button ## mobile view -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse ml-auto" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button class="btn btn-outline-light" onclick="logout()">Logout</button>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="container">
                <h2 class="mt-4 text-center text-white">Update Jadwal Keberangkatan</h2>

                <?php
                include_once("../koneksi.php");

                if (isset($_GET['id'])) {
                    $idkeberangkatan = $_GET['id'];

                    // Fetch data based on ID
                    $result = mysqli_query($con, "SELECT * FROM keberangkatan WHERE idkeberangkatan=$idkeberangkatan");
                    $user_data = mysqli_fetch_array($result);
                ?>
                    <form action="uptKeberangkatan.php" method="post" name="form2">
                        <input type="hidden" name="idkeberangkatan" value="<?php echo $user_data['idkeberangkatan']; ?>">

                        <div class="form-group">
                            <label for="jamkeberangkatan" class="text-white">Jam Keberangkatan:</label>
                            <input type="time" class="form-control" id="jamkeberangkatan" name="jamkeberangkatan" value="<?php echo $user_data['jam']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="tanggal" class="text-white">Hari & Tanggal:</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" value="<?php echo $user_data['tanggal']; ?>" required>
                        </div>
                        <div class="form-group">
                            <label for="kota_asal" class="text-white">Kota Asal:</label>
                            <input type="text" class="form-control" id="kota_asal" name="kota_asal" value="<?php echo $user_data['kota_asal']; ?>" required>
                        </div>

                        <div class="form-group">
                            <label for="kota_tujuan" class="text-white">Kota Tujuan:</label>
                            <input type="text" class="form-control" id="kota_tujuan" name="kota_tujuan" value="<?php echo $user_data['kota_tujuan']; ?>" required>
                        </div>


                        <button type="submit" class="btn btn-success w-100" name="Update"><strong>Update Data</strong></button>
                        <br><br>
                        <a href="lihatdatakeberangkatan.php" class="btn btn-success w-100"><strong>Back</strong></a>
                        <br>
                    </form>
                <?php
                }

                // Perkondisian untuk mengecek apakah tombol update sudah ditekan.
                if (isset($_POST['Update'])) {
                    $idkeberangkatan = $_POST['idkeberangkatan'];
                    $jam = $_POST['jamkeberangkatan'];
                    $tanggal = $_POST['tanggal'];
                    $kota_asal = $_POST['kota_asal'];
                    $kota_tujuan = $_POST['kota_tujuan'];
                    

                    // Update data berdasarkan ID
                    $result = mysqli_query($con, "UPDATE keberangkatan SET jam='$jam', tanggal='$tanggal', kota_asal='$kota_asal', kota_tujuan='$kota_tujuan' WHERE idkeberangkatan=$idkeberangkatan");

                    // Menampilkan pesan jika data berhasil diupdate.
                    if ($result) {
                        echo '<br><br><div class="container">';
                        echo '<div class="alert alert-success text-center">';
                        echo "<strong>Data berhasil diupdate</strong>";
                        echo '</div>';
                        echo '<a href="lihatdatakeberangkatan.php" class="btn btn-success w-100">Back</a>';
                        echo '</div>';
                    } else {
                        echo '<br><br><div class="container">';
                        echo '<div class="alert alert-danger text-center">';
                        echo "<strong>Gagal update data</strong>";
                        echo '</div>';
                        echo '</div>';
                    }
                }
                ?>

            </div>
        </div>
        <!-- /#wrapper -->

        <!-- Bootstrap core JavaScript -->
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>

        <!-- Menu Toggle Script -->
        <script>
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#main-wrapper").toggleClass("toggled");
            })

            function logout() {
                // Redirect ke index.php setelah logout
                window.location.href = '../index.php';
            };
        </script>
    </div>

</body>

</html>