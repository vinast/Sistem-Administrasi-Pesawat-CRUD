<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = []; // Variabel untuk menyimpan pesan kesalahan

    // Memeriksa apakah input nama bandara kosong
    if (empty($_POST["namabandara"])) {
        $errors[] = "Nama Bandara harus diisi.";
    }

    // Memeriksa apakah input daerah kosong
    if (empty($_POST["lokasi"])) {
        $errors[] = "Daerah harus diisi.";
    }

    // Jika terdapat pesan kesalahan, tampilkan pesan-pesan tersebut
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    } else {
        $nama_bandara = $_POST["namabandara"];
        $daerah = $_POST["lokasi"];
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="bootcatch sidebar is simple single page template with sidebar based on bootstrap, it's starter template for admin template - thanks :)">
    <meta name="author" content="">

    <title>adminView</title>

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

        /* Ganti warna latar belakang tabel menjadi putih */
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
            <!-- navbar ends -->
            <div class="container">
                <h2 class="mt-4 text-center text-white">Tambah Data Bandara</h2>
                <form action="createbandara.php" method="post" name="form2">
                    <div class="form-group">
                        <label for="idbandara" class="text-white">id Bandara:</label>
                        <!-- <input type="number" class="form-control" id="id_amil" name="id_amil" required> -->
                        <input type="text" class="form-control" name="idbandara" value="auto" id="idkeberangkatan" required>
                    </div>

                    <div class="form-group">
                        <label for="namabandara" class="text-white">Nama Bandara:</label>
                        <input type="text" class="form-control" id="namabandara" name="namabandara" required>
                    </div>

                    <div class="form-group">
                        <label for="lokasi" class="text-white">Daerah:</label>
                        <input type="text" class="form-control" id="lokasi" name="lokasi" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100" name="Submit"><strong>Simpan Data</strong></button>
                    <br>

                    <br>
                    <button class="btn btn-success w-100">
                        <a href="lihatdatabandara.php" style="text-decoration: none; color: white; font-weight: bold;">
                            Lihat Data
                        </a>
                    </button>
                </form>
            </div>
        </div>
        <!-- /#main-content -->

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

<?php
// Memanggil file koneksi.php
include_once("../koneksi.php");

// Perkondisian untuk mengecek apakah tombol submit sudah ditekan.
if (isset($_POST['Submit'])) {
    $idberangkat = isset($_POST['idbandara']) && !empty($_POST['idbandara']) && $_POST['idbandara'] != 'auto' ? $_POST['idbandara'] : NULL;
    $namabandara = $_POST['namabandara'];
    $lokasi = $_POST['lokasi'];

    // Check if the name already exists
    $check_query = mysqli_query($con, "SELECT * FROM bandara WHERE namabandara='$namabandara'");
    if (mysqli_num_rows($check_query) > 0) {
        // Menampilkan pesan jika nama bandara sudah ada
        echo '<br><br><div class="container">';
        echo '<div class="alert alert-danger text-center">';
        echo "<strong>Nama Bandara sudah ada, data tidak dapat ditambahkan</strong>";
        echo '</div>';
        echo '</div>';
    } else {
        // Jika nama bandara belum ada, tambahkan data
        $result = mysqli_query($con, "INSERT INTO bandara(idbandara, namabandara, lokasi ) VALUES('$idberangkat','$namabandara','$lokasi')");

        // Menampilkan pesan jika data berhasil disimpan.
        echo '<br><br><div class="container">';
        echo '<div class="alert alert-success text-center">';
        echo "<strong>Data berhasil disimpan</strong>";
        echo '</div>';
        echo '</div>';
    }
}
$result = mysqli_query($con, "SELECT * FROM bandara");
?>