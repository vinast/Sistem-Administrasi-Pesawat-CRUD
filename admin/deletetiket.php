<?php
// mengambil file koneksi.php
include_once("../koneksi.php");

// mengambil id dari url

    $id = $_GET['id'];

    // Syntax untuk menghapus data berdasarkan id
    $result = mysqli_query($con, "DELETE FROM booking_tiket where id_tiket ='$id'");

    // Setelah berhasil dihapus redirect ke index.php
    header("Location:lihatdatatiket.php");


?>