<?php
// Memanggil file koneksi.php
include_once("../koneksi.php");

// Perkondisian untuk mengecek apakah tombol submit sudah ditekan.
if (isset($_POST['Submit'])) {
    $idpesawat = isset($_POST['idpesawat']) && !empty($_POST['idpesawat']) && $_POST['idpesawat'] != 'auto' ? $_POST['idpesawat'] : NULL;
    $namapesawat = $_POST['namapesawat'];
    $jenispesawat = $_POST['jenispesawat'];
    $kapasitas = $_POST['kapasitas'];

    // Check if the name already exists
    $checkQuery = "SELECT * FROM pesawat WHERE namapesawat = '$namapesawat'";
    $checkResult = mysqli_query($con, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        // Name already exists, show an error message
        echo '<br><br><div class="container">';
        echo '<div class="alert alert-danger text-center">';
        echo "<a><strong>Error:</strong> Nama Pesawat sudah ada dalam database.</a>";
        echo '</div>';
        echo '</div>';
    } else {
        // Name is unique, proceed with insertion
        $result1 = mysqli_query($con, "INSERT INTO pesawat(idpesawat, namapesawat, jenis, kapasitas) VALUES('$idpesawat', '$namapesawat', '$jenispesawat', '$kapasitas')");

        // Check if the insertion was successful
        if ($result1) {
            echo '<br><br><div class="container">';
            echo '<div class="alert alert-success text-center">';
            echo "<a><strong>Data berhasil disimpan ke dalam Database</strong></a>";
            echo '</div>';
            echo '</div>';
        } else {
            echo '<br><br><div class="container">';
            echo '<div class="alert alert-danger text-center">';
            echo "<a><strong>Error:</strong> Gagal menyimpan data.</a>";
            echo '</div>';
            echo '</div>';
        }
    }
}

$result = mysqli_query($con, "SELECT * FROM pesawat");
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
                <!-- <div class="collapse navbar-collapse" id="navbarNav">
			    <ul class="navbar-nav d-flex align-items-center">
			      <li class="nav-item active">
			        <a class="nav-link d-flex align-items-center" href="#menu-toggle"  id="menu-toggle">
			        	Home
			        	<span class="sr-only">(current)</span></a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Features</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="#">Pricing</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
			      </li>
			    </ul>
			  </div> -->

              <div class="collapse navbar-collapse ml-auto" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <button class="btn btn-outline-light" onclick="logout()">Logout</button>
                        </li>
                    </ul>
                </div>
            </nav>

<!-- Isi HTML -->

<!-- navbar -->
    <div class="container mt-4">
        <!-- <a href="caridata.php" class="btn btn-success ">Cari Data</a> -->
        <br><br>
        <table class="table table-bordered w-100 text-center">
            <thead>
                <tr class="bg-dark text-white">
                    <th>Id Pesawat</th>
                    <th>Nama Pesawat</th>
                    <th>Jenis Pesawat</th>
                    <th>kapasitas</th>
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
                    echo "<td>" . $user_data['idpesawat'] . "</td>";
                    echo "<td>" . $user_data['namapesawat'] . "</td>";
                    echo "<td>" . $user_data['jenis'] . "</td>";
                    echo "<td>" . $user_data['kapasitas'] . "</td>";
                    echo "<td><a href='uptPesawat.php?id=$user_data[idpesawat]' class='btn btn-outline-dark'>Update</a> <a href='deletepesawat.php?id=$user_data[idpesawat]' class='btn btn-outline-primary'>Delete</a></td></tr>";
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
