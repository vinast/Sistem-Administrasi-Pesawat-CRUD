<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="bootcatch sidebar is simple single page template with sidebar based on bootstrap, it's starter template for admin template - thanks :)">
    <meta name="author" content="">

    <title>Admin</title>

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
			        <a class="nav-link d-flex align-items-center" href="#menu-toggle"  id="menu-toggle">
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
			<!-- navbar ends -->
            <div class="container-fluid">
                <h1>Welcome Admin...</h1>
              	<p>Tentu! Seorang admin pengelola administrasi pesawat memiliki tanggung jawab mengatur dan mengelola berbagai aspek administratif terkait dengan operasional pesawat. Mereka bertanggung jawab untuk memastikan segala hal terkait administrasi, seperti pengelolaan logistik, koordinasi operasional, dan pengelolaan dokumen terkait penerbangan, berjalan dengan lancar. Peran ini mencakup tugas-tugas penting dalam menjaga kelancaran dan kepatuhan dalam operasi penerbangan serta menyelenggarakan proses administratif untuk mendukung aktivitas penerbangan.</p>
                <p>Didik Vinastu <code>2100018181</code>.</p>
            </div>
        </div>
        <!-- /#main-content -->

    </div>

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
    }
    ;
    </script>

</body>

</html>