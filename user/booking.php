<!DOCTYPE HTML>
<html>

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


            <!--carousal-->


    </nav>
    <div class="container">
        <h2 class="mt-4 text-center">Tambah Data Tiket</h2>
        <form action="createdatabooking.php" method="post" name="form2" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="id">Id Tiket:</label>
                <input type="text" class="form-control" name="id_tiket" value="auto" id="id" required>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="namapenumpang">Nama Penumpang:</label>
                <input type="text" class="form-control" id="namapenumpang" name="nama_penumpang" required>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="noktp">No KTP:</label>
                <input type="text" class="form-control" id="noktp" name="nomor_ktp" required>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="noktp">No Telepon:</label>
                <input type="text" class="form-control" id="notelepon" name="nomor_telepon" required>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="idbandara">Id Bandara:</label>
                <select class="form-control" id="jenis" name="jenis" required onchange="updateKotaAsal()">
                    <option>Bandara Tersedia</option>
                    <option value="1000">1000 - Soekarno Hatta International Airport</option>
                    <option value="1001">1001 - Ngurah Rai International Airport</option>
                    <option value="1002">1002 - Bandar Udara Internasional Sultan Hasanuddin</option>
                    <option value="1003">1003 - Halim Perdanakusuma Airport</option>
                    <option value="1004">1004 - Yogyakarta International Airport</option>
                    <option value="1005">1005 - Kualanamu International Airport</option>
                    <option value="1006">1006 - Sultan Syarif Kasim II International Airport</option>
                    <option value="1007">1007 - Sultan Thaha Airport</option>
                </select>
                <input type="text" class="form-control" id="idbandara" name="id_bandara" required>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="idpesawat">Id Pesawat:</label>
                <select class="form-control" id="jenisPesawat" name="jenisPesawat" required>
                    <option disabled selected>Pilih Pesawat</option>
                    <option value="1100">1100 - Garuda Indonesia</option>
                    <option value="1102">1102 - Lion Air</option>
                    <option value="1103">1103 - Citilink</option>
                    <option value="1104">1104 - Batik Air</option>
                    <option value="1105">1105 - Indonesia AirAsia</option>
                    <option value="1106">1106 - Super Air Jett</option>
                    <option value="1107">1107 - Pelita Air</option>
                    <option value="1108">1108 - Wings Air</option>
                    <option value="1109">1109 - TransNusa</option>
                    <option value="1110">1110 - Nam Air</option>
                </select>
                <input type="text" class="form-control" id="idpesawat" name="id_pesawat" required>
                <span class="text-danger"></span>
            </div>

            <div class="form-group">
                <label for="kotaasal">Kota Asal:</label>
                <input type="text" class="form-control" id="kotaasal" name="kota_asal" required>
            </div>

            <div class="form-group">
                <label for="tujuan">Tujuan:</label>
                <select class="form-control" id="tujuanSelect" name="kota_tujuan" required>
                    <option disabled selected>Pilih Tujuan</option>
                    <option value="Taman Rimbo(Jambi)">Taman Rimbo(Jambi)</option>
                    <option value="DKI Jakarta(Jakarta)">DKI Jakarta(Jakarta)</option>
                    <option value="Banten(Tangerang)">Banten(Tangerang)</option>
                    <option value="Riau(Pekanbaru)">Riau(Pekanbaru)</option>
                    <option value="Yogyakarta(Kulon Progo)">Yogyakarta(Kulon Progo)</option>
                    <option value="Banten(Tangerang)">Banten(Tangerang)</option>
                </select>
                <input type="text" class="form-control" id="tujuanInput" name="kota_tujuan_input" required>
                <span class="text-danger"></span>
            </div>
            <button type="submit" class="btn btn-success w-100" name="Submit"><strong>Simpan Data</strong></button>
            <br>
        </form>
        <br><br>
    </div>

    <!-- Footer -->
    <footer id="footer">
        <div class="container-fluid">
            <ul class="icons">
                <li><a href="https://twitter.com/vinastt" class="fa fa-twitter" style="color: grey"></a></li>
                <li><a href="https://www.facebook.com/profile.php?id=100026730090913&locale=id_ID" class="fa fa-facebook" style="color: grey"></a></li>
                <li><a href="https://instagram.com/vinastt_" class="fa fa-instagram" style="color: grey"></a></li>
                <li><a href="mailto:dvvinas@gmail.com" class="fa fa-envelope" style="color: grey"></a></li>
            </ul>
        </div>
        <div class="copyright">
            &copy; V-Airline. All rights reserved.
        </div>
    </footer>

    <script>
        $(document).ready(function() {
            $('#jenis').change(function() {
                var selectedValue = $(this).val();
                var selectedText = $(this).children("option:selected").text();
                $('#idbandara').val(selectedValue); // Mengisi input dengan value dari opsi yang dipilih
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#jenisPesawat').change(function() {
                var selectedValue = $(this).val();
                var selectedText = $(this).children("option:selected").text();
                $('#idpesawat').val(selectedValue); // Mengisi input dengan value dari opsi yang dipilih
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#tujuanSelect').change(function() {
                var selectedText = $(this).children("option:selected").text();
                $('#tujuanInput').val(selectedText); // Mengisi input teks dengan teks dari opsi yang dipilih
            });
        });
    </script>

    <script>
        function updateKotaAsal() {
            var select = document.getElementById("jenis");
            var kotaAsalInput = document.getElementById("kotaasal");

            if (select.value === "1000") {
                kotaAsalInput.value = "Banten (Tangerang)";
            } else if (select.value === "1001") {
                kotaAsalInput.value = "Denpasar (Bali)";
            } else if (select.value === "1002") {
                kotaAsalInput.value = "Sulawesi Selatan(Makasar)";
            } else if (select.value === "1003") {
                kotaAsalInput.value = "DKI Jakarta(Jakarta)";
            } else if (select.value === "1004") {
                kotaAsalInput.value = "Yogyakarta(Kulon Progo)";
            } else if (select.value === "1005") {
                kotaAsalInput.value = "Medan(Sumatra Utara)";
            } else if (select.value === "1006") {
                kotaAsalInput.value = "Riau(Pekanbaru)";
            } else if (select.value === "1007") {
                kotaAsalInput.value = "Taman Rimbo(Jambi)";
            } else {
                kotaAsalInput.value = ""; // Reset to empty if not 1000 or 1001
            }
        }
    </script>
    
<script>
  function validateForm() {
    var isValid = true;

    // Validasi nama tidak boleh angka
    var namaInput = document.forms["form2"]["nama_penumpang"];
    var nama = namaInput.value;
    if (!/^[a-zA-Z\s]+$/.test(nama)) {
      namaInput.classList.add("is-invalid");
      namaInput.nextElementSibling.textContent = "Nama hanya boleh berisi huruf dan spasi";
      isValid = false;
    } else {
      namaInput.classList.remove("is-invalid");
      namaInput.nextElementSibling.textContent = "";
    }

    // Validasi nomor KTP tidak kurang dari 15 karakter
    var noKTPInput = document.forms["form2"]["nomor_ktp"];
    var noKTP = noKTPInput.value;
    if (noKTP.length !== 15) {
      noKTPInput.classList.add("is-invalid");
      noKTPInput.nextElementSibling.textContent = "Nomor KTP harus terdiri dari 15 karakter";
      isValid = false;
    } else {
      noKTPInput.classList.remove("is-invalid");
      noKTPInput.nextElementSibling.textContent = "";
    }

    // Validasi nomor telepon harus 12 angka
    var noTeleponInput = document.forms["form2"]["nomor_telepon"];
    var noTelepon = noTeleponInput.value;
    if (noTelepon.length < 12 || isNaN(noTelepon)) {
      noTeleponInput.classList.add("is-invalid");
      noTeleponInput.nextElementSibling.textContent = "Nomor telepon harus terdiri dari minimal 12 angka";
      isValid = false;
    } else {
      noTeleponInput.classList.remove("is-invalid");
      noTeleponInput.nextElementSibling.textContent = "";
    }

    // Validasi ID Bandara
    var idBandaraInput = document.forms["form2"]["id_bandara"];
    var idBandara = idBandaraInput.value;
    if (idBandara.length !== 4 || isNaN(idBandara)) {
      idBandaraInput.classList.add("is-invalid");
      idBandaraInput.nextElementSibling.textContent = "Pilih ID Bandara yang tersedia";
      isValid = false;
    } else {
      idBandaraInput.classList.remove("is-invalid");
      idBandaraInput.nextElementSibling.textContent = "";
    }

    // Validasi ID Pesawat
    var idPesawatInput = document.forms["form2"]["jenisPesawat"];  // Ganti "id_pesawat" dengan "jenisPesawat"
    var idPesawat = idPesawatInput.value;
    if (idPesawat === "Pilih Pesawat") {
        idPesawatInput.classList.add("is-invalid");
        idPesawatInput.nextElementSibling.textContent = "Pilih jenis pesawat dari opsi yang tersedia";
        isValid = false;
    } else {
        idPesawatInput.classList.remove("is-invalid");
        idPesawatInput.nextElementSibling.textContent = "";
    }

    // Validasi Kota Tujuan
    var kotaTujuanInput = document.forms["form2"]["kota_tujuan"];
    var kotaTujuan = kotaTujuanInput.value;
    if (kotaTujuan === "Pilih Tujuan") {
      kotaTujuanInput.classList.add("is-invalid");
      kotaTujuanInput.nextElementSibling.textContent = "Pilih kota tujuan dari opsi yang tersedia";
      isValid = false;
    } else {
      kotaTujuanInput.classList.remove("is-invalid");
      kotaTujuanInput.nextElementSibling.textContent = "";
    }

    return isValid; // Mengirim data jika lolos semua validasi
  }
</script>



</body>

</html>