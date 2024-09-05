<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "responsiwd";


// Membuat koneksi
$koneksi = mysqli_connect($servername, $username, $password, $database);

// Periksa koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Lakukan koneksi ke database
include_once("../koneksi.php");

// Periksa koneksi
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// Lakukan query ke database untuk mendapatkan data
$query = "SELECT * FROM bandara";
$result = mysqli_query($koneksi, $query);

// Periksa apakah query berhasil
if (!$result) {
    die("Query error: " . mysqli_error($koneksi));
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

        .table {
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

            <!-- Isi HTML -->

            <div class="container mt-4">
                <br><br>
                <table class="table table-bordered w-100 text-center">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>Id Bandara</th>
                            <th>Nama Bandara</th>
                            <th>Lokasi</th>
                            <th>Kelola Data</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $row_number = 0; // Initialize row number variable
                        while ($user_data = mysqli_fetch_array($result)) {
                            // Alternate row colors
                            $row_class = ($row_number % 2 == 0) ? 'even-row' : 'odd-row';
                            echo "<tr class='$row_class'>";
                            echo "<td>" . $user_data['idbandara'] . "</td>";
                            echo "<td>" . $user_data['namabandara'] . "</td>";
                            echo "<td>" . $user_data['lokasi'] . "</td>";
                            echo "<td><a href='uptBandara.php?id=$user_data[idbandara]' class='btn btn-outline-dark'>Update</a> <a href='deletebandara.php?id=$user_data[idbandara]' class='btn btn-outline-primary'>Delete</a></td></tr>";
                            $row_number++; // Increment row number
                        }
                        ?>
                    </tbody>
                </table>
                <a href="homeAdmin.php" class="btn btn-danger w-100 "><strong>Kembali Home</strong></a>
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

<?php
// Bebaskan hasil query setelah penggunaan selesai
mysqli_free_result($result);
// Tutup koneksi setelah selesai
mysqli_close($koneksi);
?>