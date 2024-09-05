<?php
include_once("../koneksi.php");

if (isset($_POST['update'])) {
    $id = $_POST['idpesawat'];
    $nama = $_POST['namapesawat'];
    $jumlah = $_POST['jenis'];
    $jalur = $_POST['kapasitas'];

    $result = mysqli_query($con, "UPDATE pesawat SET namapesawat = '$nama', jenis='$jumlah', kapasitas='$jalur' WHERE idpesawat ='$id'");

    if ($result) {
        echo '<br><br><div class="container">';
        echo '<div class="alert alert-success text-center">';
        echo "<a><strong>Data berhasil disimpan ke dalam Database</strong></a>";
        echo '</div>';
        echo '</div>';
    } else {
        echo '<br><br><div class="container">';
        echo '<div class="alert alert-danger text-center">';
        echo "<a><strong>Error:</strong> Gagal menyimpan data. " . mysqli_error($con) . "</a>";
        echo '</div>';
        echo '</div>';
    }
}

// Pengambilan data dari database untuk form update
$id = 0;
$nama = "";
$jumlah = "";
$jalur = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = mysqli_query($con, "SELECT * FROM pesawat WHERE idpesawat='$id'");
    if ($result && mysqli_num_rows($result) > 0) {
        $user_data = mysqli_fetch_array($result);
        $nama = $user_data['namapesawat'];
        $jumlah = $user_data['jenis'];
        $jalur = $user_data['kapasitas'];
    } else {
        echo "Data tidak ditemukan.";
        exit(); // Keluar dari skrip jika data tidak ditemukan
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>adminUpdate</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
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
    <div class="container mt-4">
        <h2 class="text-center text-white">Update Data Pesawat</h2>
        <form action="uptPesawat.php" method="post">
            <input type="hidden" name="idpesawat" value="<?php echo $id; ?>">
            <div class="form-group">
                <label for="namapesawat">Nama Pesawat:</label>
                <input type="text" class="form-control" id="namapesawat" name="namapesawat" value="<?php echo $nama; ?>" required>
            </div>
            <div class="form-group">
                <label for="jenis" class="text-white">Jenis Pesawat:</label>
                <select class="form-control" id="jenis" name="jenis" required>
                    <option value="Penumpang" <?php if ($jumlah === 'Penumpang') echo 'selected'; ?>>Penumpang</option>
                    <option value="cargo" <?php if ($jumlah === 'cargo') echo 'selected'; ?>>Cargo</option>
                </select>
            </div>
            <div class="form-group" class="text-white">
                <label for="kapasitas">Kapasitas:</label>
                <input type="number" class="form-control" id="kapasitas" name="kapasitas" value="<?php echo $jalur; ?>" required>
            </div>
            <button type="submit" class="btn btn-success w-100" name="update"><strong>Update Data</strong></button>
            <br><br>
            <a href="lihatdatapesawat.php" class="btn btn-success w-100"><strong>Back</strong></a>
            <br>
        </form>
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


</body>

</html>

