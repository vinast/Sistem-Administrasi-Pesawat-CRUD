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

        </div>

    </div>
    <!-- /#wrapper -->
    <div class="container">
        <h2 class="mt-4 text-center text-white">Update Data Bandara</h2>

        <?php
        include_once("../koneksi.php");

        if (isset($_GET['id'])) {
            $idbandara = $_GET['id'];

            // Fetch data based on ID
            $result = mysqli_query($con, "SELECT * FROM bandara WHERE idbandara=$idbandara");
            $user_data = mysqli_fetch_array($result);
        ?>
            <form action="uptBandara.php" method="post" name="form2">
                <input type="hidden" name="idbandara" value="<?php echo $user_data['idbandara']; ?>">

                <div class="form-group">
                    <label for="namabandara" class="text-white">Nama Bandara:</label>
                    <input type="text" class="form-control" id="namabandara" name="namabandara" value="<?php echo $user_data['namabandara']; ?>" required>
                </div>

                <div class="form-group">
                    <label for="lokasi" class="text-white">Daerah:</label>
                    <input type="text" class="form-control" id="lokasi" name="lokasi" value="<?php echo $user_data['lokasi']; ?>" required>
                </div>

                <button type="submit" class="btn btn-success w-100" name="Update"><strong>Update Data</strong></button>
                <br><br>
                <a href="lihatdatabandara.php" class="btn btn-success w-100"><strong>Back</strong></a>
                <br>
            </form>
        <?php
        }

        // Perkondisian untuk mengecek apakah tombol update sudah ditekan.
        if (isset($_POST['Update'])) {
            $idbandara = $_POST['idbandara'];
            $namabandara = $_POST['namabandara'];
            $lokasi = $_POST['lokasi'];

            // Update data berdasarkan ID
            $result = mysqli_query($con, "UPDATE bandara SET namabandara='$namabandara', lokasi='$lokasi' WHERE idbandara=$idbandara");

            // Menampilkan pesan jika data berhasil diupdate.
            if ($result) {
                echo '<br><br><div class="container">';
                echo '<div class="alert alert-success text-center">';
                echo "<strong>Data berhasil diupdate</strong>";
                echo '</div>';
                echo '<br>';
                echo "<td><a href='lihatdatabandara.php' class='btn btn-success w-100'>Kembali</a></td></tr>";
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

</body>

</html>

