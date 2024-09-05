<?php
require('fpdf/fpdf.php');

// Koneksi ke database (gunakan file koneksi.php atau sesuaikan dengan cara koneksi Anda)
$koneksi = mysqli_connect("localhost", "root", "", "responsiwd");

$pdf = new FPDF('l', 'mm', 'A4');
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 7, 'Detail Tiket Anda', 0, 1, 'C');
$pdf->Cell(10, 7, '', 0, 1);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25, 10, 'ID Tiket', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nama Penumpang', 1, 0, 'C');
$pdf->Cell(40, 10, 'Nomor KTP', 1, 0, 'C');
$pdf->Cell(30, 10, 'Nomor Telepon', 1, 0, 'C');
$pdf->Cell(50, 10, 'Kota Asal', 1, 0, 'C');
$pdf->Cell(50, 10, 'Kota Tujuan', 1, 1, 'C');

$pdf->SetFont('Arial', '', 10);

include_once '../koneksi.php';

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

if (isset($_GET['id_tiket'])) {
    $id_tiket = $_GET['id_tiket'];

    $query = "SELECT * FROM booking_tiket WHERE id_tiket = '$id_tiket'";
    $result = mysqli_query($koneksi, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $pdf->Cell(25, 10, $row['id_tiket'], 1, 0, 'C');
            $pdf->Cell(40, 10, $row['nama_penumpang'], 1, 0);
            $pdf->Cell(40, 10, $row['nomor_ktp'], 1, 0);
            $pdf->Cell(30, 10, $row['nomor_telepon'], 1, 0);
            $pdf->Cell(50, 10, $row['kota_asal'], 1, 0);
            $pdf->Cell(50, 10, $row['kota_tujuan'], 1, 1);
        }
    } else {
        $pdf->Cell(190, 10, 'Data tiket tidak ditemukan', 1, 1, 'C');
    }
} else {
    $pdf->Cell(190, 10, 'ID Tiket tidak ditemukan dalam URL', 1, 1, 'C');
}

$pdf->SetY(100);
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(0, 10, 'Page '.$pdf->PageNo(), 0, 0, 'C');

$pdf->Output();
// $pdf->Output('D', 'Tiket.pdf'); //langsung download
?>
