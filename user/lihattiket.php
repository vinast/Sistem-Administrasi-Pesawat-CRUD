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

// Check if id_tiket is set in the URL
if (isset($_GET['id_tiket'])) {
    $id_tiket = $_GET['id_tiket'];

    // Buat query untuk mengambil data tiket berdasarkan id_tiket
    $query = "SELECT * FROM booking_tiket WHERE id_tiket = '$id_tiket'";
    $result = mysqli_query($koneksi, $query);

    // Periksa apakah query berhasil
    if ($result && mysqli_num_rows($result) > 0) {
?>

        <!DOCTYPE html>
        <html lang="en">

        <head>

            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="bootcatch sidebar is simple single page template with sidebar based on bootstrap, it's starter template for admin template - thanks :)">
            <meta name="author" content="">

            <title>Simple Sidebar - Bootcatch Template</title>

            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">
            <!-- material icons cdn -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

            <!-- Custom styles for this template -->
            <link href="css/simple-sidebar.css" rel="stylesheet">

            <!-- common css -->
            <link rel="stylesheet" type="text/css" href="css/common.css">
        </head>

        <body>

            <div class="container mt-4">
                <!-- <a href="caridata.php" class="btn btn-success ">Cari Data</a> -->
                <br><br>
                <div class="table-responsive">
                    <h2 class="mt-4 text-center">Detail Tiket Anda</h2>
                    <br><br>
                    <table class="table table-bordered mx-auto text-center">
                        <thead>
                            <tr class="bg-dark text-white">
                                <th>ID Tiket</th>
                                <th>Nama Penumpang</th>
                                <th>Nomor KTP</th>
                                <th>Nomor Telepon</th>
                                <th>ID Bandara</th>
                                <th>ID Pesawat</th>
                                <th>Kota Asal</th>
                                <th>Kota Tujuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['id_tiket'] . "</td>";
                                echo "<td>" . $row['nama_penumpang'] . "</td>";
                                echo "<td>" . $row['nomor_ktp'] . "</td>";
                                echo "<td>" . $row['nomor_telepon'] . "</td>";
                                echo "<td>" . $row['id_bandara'] . "</td>";
                                echo "<td>" . $row['id_pesawat'] . "</td>";
                                echo "<td>" . $row['kota_asal'] . "</td>";
                                echo "<td>" . $row['kota_tujuan'] . "</td>";
                                echo "</tr>";
                            }
                            ?>


                        </tbody>
                    </table>
                </div>
                <a href="cetak_tiket.php?id_tiket=<?php echo $_GET['id_tiket']; ?>" class="btn btn-success w-100 mt-3"><strong>Cetak Tiket</strong></a>
                <br><br>
                <a href="homeUser.php" class="btn btn-danger w-100 mt-3"><strong>Kembali Home</strong></a>
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
    } else {
        echo "Data tiket tidak ditemukan";
    }
} else {
    echo "ID Tiket tidak ditemukan dalam URL";
}
?>