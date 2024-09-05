<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "responsiwd";

// Lakukan koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir jika ada
    $id_tiket = $_POST['id_tiket'];
    $nama_penumpang = $_POST['nama_penumpang'];
    $nomor_ktp = $_POST['nomor_ktp'];
    $nomor_telepon = $_POST['nomor_telepon'];
    $id_bandara = $_POST['id_bandara'];
    $id_pesawat = $_POST['id_pesawat'];
    $kota_asal = $_POST['kota_asal'];
    $kota_tujuan = $_POST['kota_tujuan'];

    // Buat query untuk menyimpan data ke dalam tabel booking_tiket
    $sql = "INSERT INTO booking_tiket (id_tiket, nama_penumpang, nomor_ktp, nomor_telepon, id_bandara, id_pesawat, kota_asal, kota_tujuan) 
            VALUES ('$id_tiket', '$nama_penumpang', '$nomor_ktp', '$nomor_telepon', '$id_bandara', '$id_pesawat', '$kota_asal', '$kota_tujuan')";

    if ($conn->query($sql) === TRUE) {
        echo "Data tiket berhasil disimpan";

        // Retrieve the last inserted ID to redirect
        $last_id = $conn->insert_id;

        // Redirect to lihattiket.php with the last inserted ID
        header('Location: lihattiket.php?id_tiket=' . $last_id);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
