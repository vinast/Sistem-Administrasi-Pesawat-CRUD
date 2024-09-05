<?php
// Memanggil file koneksi.php
include_once("../koneksi.php");

// Syntax untuk mengambil semua data dari table keberangkatan
$result = mysqli_query($con, "SELECT * FROM keberangkatan ");
?>

<head>
    <title>UserBooking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/myjs.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/mycss.css">

    <script>
        function showLogoutNotification() {
            alert("Anda berhasil logout");
        }
    </script>
</head>

<body>


    <nav style="border-radius:0px !important; margin:0;border: 0">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="homeUser.php">V-Airline</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="booking.php">Booking</a></li>
                    <li><a href="caripenerbangan.php">Cari Penerbangan</a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php" onclick="showLogoutNotification()"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>

            </div>

    </nav>

    <div class="container mt-4">

    <form action="" method="GET" style="margin-top: 1em" class="form form-bordered w-100 text-center">
        <input style="padding:1em 2em; width:48%;" type="text" name="cari_asal" placeholder="Cari Berdasarkan Kota Asal">
        <input style="padding:1em 2em; width:48%;" type="text" name="cari_tujuan" placeholder="Cari Berdasarkan Kota Tujuan">
        <br><br>
        <button type="submit"  class="btn btn-success w-100">Cari</button>
    </form>

    <?php if (isset($_GET['cari_asal']) || isset($_GET['cari_tujuan'])) : ?>

        <?php
        $cari_asal = $_GET['cari_asal'] ?? '';
        $cari_tujuan = $_GET['cari_tujuan'] ?? '';

        $query = "SELECT * FROM keberangkatan WHERE kota_asal LIKE '%$cari_asal%' AND kota_tujuan LIKE '%$cari_tujuan%'";

        $result = mysqli_query($con, $query);
        ?>

        <?php if ($result->num_rows > 0) : ?>
            <table class="table table-bordered w-100 text-center">
                <tr class="bg-dark text-white">
                    <th>ID Keberangkatan</th>
                    <th>Kota Asal</th>
                    <th>Kota Tujuan</th>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                    <th>Jadwal</th>
                    <th>Tanggal</th>
                    <th>Booking</th>
                </tr>
                <?php
                while ($data = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>" . $data['idkeberangkatan'] . "</td>";
                    echo "<td>" . $data['kota_asal'] . "</td>";
                    echo "<td>" . $data['kota_tujuan'] . "</td>";
                    // Tambahkan kolom lainnya sesuai kebutuhan
                    echo "<td>" . $data['jam'] . "</td>";
                    echo "<td>" . $data['tanggal'] . "</td>";
                    echo "<td><a href='booking.php?id_keberangkatan=$data[idkeberangkatan]'>Booking</a></td></tr>";
                }
                ?>
            </table>
        <?php else : ?>
            <table class="table table-bordered w-100 text-center">
                <tr class="bg-dark text-white">
                    <th>ID Keberangkatan</th>
                    <th>Kota Asal</th>
                    <th>Kota Tujuan</th>
                    <!-- Tambahkan kolom lainnya sesuai kebutuhan -->
                    <th>Jadwal</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
                <tr class="bg-dark text-white">
                    <td colspan="6" align="center">Data tidak ditemukan!</td>
                </tr>
            </table>

    </div>
        <?php endif; ?>

    <?php endif; ?>
</body>

</html>