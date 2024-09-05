<?php
// Pastikan session dimulai sebelum menggunakan session
session_start();
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Responsi</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/myjs.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">
    <link rel="stylesheet" href="assets/mycss.css">
</head>

<body>
    <nav style="border-radius:0px !important; margin:0;border: 0">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">V-Airline</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="#myModal" data-toggle="modal" data-target="#myModal">Booking</a></li>
                    <li><a href="mailto:dvvinas@gmail.com">Contact Us</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#myModal" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                </ul>

                <!-- <form class="navbar-form navbar-right">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Cari Tiket">
                        <div class="input-group-btn">
                            <button class="btn btn-default" type="submit">
                                <i class="glyphicon glyphicon-search"></i>
                            </button>
                        </div>
                    </div>
                </form> -->
            </div>
        </div>


        <!--carousal-->

        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner img-responsive" style="max-height: 620px">
                <div class="item active">
                    <img src="assets/pesawat1.jpg">
                    <div class="carousel-caption">
                        <p>Welcome To</p>
                        <hr style="width:40%">
                        <h2>V-Airline</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="assets/pesawat2.jpg">
                    <div class="carousel-caption">
                        <p>Mari Terbang Bersama Kami!</p>
                        <hr style="width:40%">
                        <h2>Booking Penerbanganmu</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="assets/pesawat3.jpg">
                    <div class="carousel-caption">
                        <p>Kenapa Pilih Kami?</p>
                        <hr style="width:40%">
                        <h2>Aman dan Nyaman</h2>
                    </div>
                </div>

                <div class="item">
                    <img src="assets/pesawat4.jpg">
                    <div class="carousel-caption">
                        <p>Ada Keluhan?</p>
                        <hr style="width:40%">
                        <h2>Hubungi Kami</h2>
                    </div>
                </div>
            </div>
        </div>
    </nav>



    <!--3tabs-->

    <div class="row" style="padding: 5rem ;margin: 0; text-align: center;">
        <div class="col-sm-4">
            <div class="thumbnail" href="booking.html">
                <img src="assets/g1.jpg" style="width:100%">
            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail" href="contactus.html">
                <img src="assets/g2.jpg" style="width:100%">

            </div>
        </div>
        <div class="col-md-4">
            <div class="thumbnail" href="aboutus.html">
                <img src="assets/g4.jpg" style="width:100%">

            </div>
        </div>
    </div>


    <!--background slide image-->
    <div class="background-wrapper" style="background-image: url(images/airline/b.jpg);">
        <div style="text-align: center; padding: 10rem; color:white">
            <h3>Mari terbang melampaui batas atmosfir dunia, nikmati kenyamanan dan keamanan bersama kami</h3>
            <hr width="30%" align="center">
            <h1>Dijamin Anda Nyaman Dengan Pelayanan Kami</h1>
        </div>
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








    <!-- Modal -->
    <form id="myUniqueID" action="ceklogin.php" method="post">

        <div class="modal fade" id="myModal" role="dialog" style="padding: 10rem">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content trans-input-area">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title" style="text-align:center;">Log In</h4>
                    </div>

                    <div class="modal-body form-group trans-input-area">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username">
                        <br>
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password">
                        <br>
                        <!-- Displaying Captcha -->
                        <!-- <label for="captcha" class="form-label">Captcha : </label>
                        <img src="captcha_image.php" alt="Captcha Image">
                        <br><br>
                        <input type="text" class="form-control" id="captcha" name="captcha" placeholder="Masukkan kode captcha"> -->

                        <br>
                        <button class="btn btn-block form-control" type="submit" style="background-color: grey; color: white" name="submit"><b>Login</b></button>
                        <br>
                        <!-- <button class="btn btn-block form-control" style="background-color: grey; color: white">
                            <a href="buataccound.php" style="text-decoration: none; color: inherit;"><b>Daftar Akun</b></a>
                        </button> -->
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-block" data-dismiss="modal" style="background-color: grey;"><b>Cancel</b></button>
                    </div>
                </div>

            </div>
        </div>
    </form>
    <form id="myUniqueID" action="buataccound.php" method="post">
        <div class="modal fade" id="myModal" role="dialog" style="padding: 10rem">
            <div class="modal-dialog">
                <div class="modal-content trans-input-area">
                    <button class="btn btn-block form-control" style="background-color: grey; color: white">
                        <a href="buataccound.php" style="text-decoration: none; color: inherit;"><b>Daftar Akun</b></a>
                    </button>
                </div>
            </div>
        </div>

    </form>

    <script>
        var myElement = document.getElementById('myUniqueID');
    </script>

</body>

</html>