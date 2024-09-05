<?php
include "koneksi.php";

// Pastikan session dimulai sebelum menggunakan session
session_start();

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $enteredCaptcha = $_POST['captcha']; // Tambahkan variabel untuk nilai CAPTCHA yang dimasukkan pengguna

    // // Periksa apakah nilai CAPTCHA yang dimasukkan cocok dengan nilai CAPTCHA di session
    // if ($enteredCaptcha !== $_SESSION['captcha_code']) {
    //     echo "<center>Login gagal! Kode CAPTCHA salah.<br>";
    //     echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
    //     exit(); // Berhenti eksekusi jika CAPTCHA salah
    // }

    // // Gunakan md5 untuk hashing kata sandi yang dimasukkan
    // $password = md5($password);

    // Lakukan validasi username dan password yang telah di-hash menggunakan md5
    $sql = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $login = mysqli_query($con, $sql);
    $ketemu = mysqli_num_rows($login);
    $r = mysqli_fetch_array($login);

    if ($ketemu > 0) {
        $_SESSION['username'] = $r['username'];
        $_SESSION['password'] = $r['password'];
        $_SESSION['peran'] = $r['peran'];
    
        // Memeriksa peran pengguna
        if ($_SESSION['peran'] === 'Admin') {
            // Jika peran adalah admin, arahkan ke halaman admin
            header("Location: admin/homeAdmin.php");
            exit(); // Penting untuk menghentikan eksekusi setelah mengarahkan ke halaman yang sesuai
        } else if ($_SESSION['peran'] === 'User') {
            // Jika peran adalah user, arahkan ke halaman user
            header("Location: user/homeUser.php");
            exit(); // Penting untuk menghentikan eksekusi setelah mengarahkan ke halaman yang sesuai
        } else {
            // Peran tidak dikenali, mungkin perlu menangani kasus ini
            echo "<center>Login gagal! Peran tidak dikenali<br>";
            echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
        }
    } else {
        echo "<center>Login gagal! Username & password tidak benar<br>";
        echo "<a href=index.php><b>ULANGI LAGI</b></a></center>";
    }

    mysqli_close($con);
}
?>
