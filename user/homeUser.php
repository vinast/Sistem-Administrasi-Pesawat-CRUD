<!DOCTYPE HTML>
<html>

<head>
    <title>User</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="assets/myjs.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Poppins">
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
                <a class="navbar-brand" href="#">V-Airline</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="booking.php">Booking</a></li>
                    <li><a href="caripenerbangan.php">Cari Penerbangan</a></li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="../index.php" onclick="showLogoutNotification()"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                </ul>


                <!-- <form class="navbar-form navbar-right">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search">
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
                        <p>Welcome User</p>
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

</body>

</html>