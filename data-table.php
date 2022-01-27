<?php
    include "koneksi.php";

    $day=date("l");
    switch($day){
        case'Monday':$day="Senin";break;
        case'Tuesday':$day="Selasa";break;
        case'Wednesday':$day="Rabu";break;
        case'Thrusday':$day="Kamis";break;
        case'Friday':$day="Jum'at";break;
        case'Saturday':$day="Sabtu";break;
        case'Sunday':$day="Minggu";break;
    }
    
    $date=date("d-m-Y");
    $month=date("M");

    date_default_timezone_set("Asia/Jakarta");  
    $time=date("H:i");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Page-->
    <title>Analisis Sentimen Twitter</title>

    <!-- Fontfaces CSS-->
    <link href="assets/css/font-face.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Routing CSS-->
    <link href="assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">

    <!-- Progress Bar CSS-->
    <link href="assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link rel="stylesheet" href="assets/css/theme.css" media="all">
    <!-- <link rel="stylesheet" href="assets/css/util.css"> -->

</head>


<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="assets/images/logo-dashboard.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="active">
                            <a href="data-table.php">
                                <i class="fas fa-home"></i>Data Tabel</a>
                        </li>
                        <li>
                            <a href="data-grafik.php">
                                <i class="fas fa-chart-bar"></i>Data Grafik</a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="assets/images/logo-dashboard.png" style="padding:10px" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li class="active">
                            <a href="data-table.php">
                                <i class="fas fa-home"></i>Data Tabel</a>
                        </li>
                        <li>
                            <a href="data-grafik.php">
                                <i class="fas fa-chart-bar"></i>Data Grafik</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h2 class="title-4">Selamat Datang,</h3>
                                <h1 class="title-2 m-b-45"><strong><?php echo"Admin" ?></strong></h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">

                                        <div class="rs-select2--light rs-select2--xsm">
                                            <button class="au-btn-filter"><i class="zmdi zmdi-filter-list"></i>
                                                <?php echo "$day"; ?></button>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                            
                                        <div class="rs-select2--light rs-select2--xsm">
                                            <button class="au-btn-filter"><i class="zmdi zmdi-filter-list"></i>
                                                <?php echo"$date"; ?></button>
                                        </div>
                                        <div class="rs-select2--light rs-select2--xsm">
                                            <button class="au-btn-filter"><i class="zmdi zmdi-filter-list"></i>
                                                <?php echo"$time"; ?></button>
                                        </div>

                                    </div>
                                </div>

                                <!-- SEARCHING -->            
                                <form action="index.php" method="get">
                                    <label>Cari :</label>
                                    <input type="text" name="keyword" size="30" 
                                    placeholder="  ketik yang mau dicari.." autocomplete="off">
                                    <button type="submit" name="cari">Cari!</button>
                                </form>
                                <br>

                                <?php 
                                if(isset($_GET['cari'])){
                                    $data = cari($_GET['keyword']);
                                }
                                ?>

                                <table border="1">
                                    <?php 
                                    if(isset($_GET['cari'])){
                                        $cari = $_GET['cari'];
                                        $data = mysqli_query($koneksi, "SELECT * FROM twitter_analisa WHERE user LIKE '%$cari%'");				
                                    }
                                    else{
                                        $data = mysqli_query($koneksi, "SELECT * from twitter_analisa");		
                                    }
                                    $no = 1;
                                    while($connect = mysqli_fetch_array($data)){
                                    ?>
                                    <?php } ?>
                                </table>
   
                                <!-- TABEL DATA -->
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>User</th>
                                                <th style="padding-left:0">Tanggal</th>
                                                <th>Isi</th>
                                                <th>Label</th>
                                                <th>Polarity</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                <?php

                                // <!-- PAGINATION --!>

                                    $halaman = 75;
                                    $page = isset($_GET['halaman'])?(int)$_GET['halaman'] : 1;
                                    $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

                                    $previous = $halaman - 1;
                                    $next = $halaman + 1;

                                    $sql = mysqli_query($koneksi,"SELECT user, created_at, stop_removal, label, polarity FROM twitter_analisa");
                                    $total = mysqli_num_rows($sql);
                                    $pages = ceil($total / $halaman);
                                    $query = mysqli_query($koneksi,"SELECT user, created_at, stop_removal, label, polarity FROM twitter_analisa LIMIT $mulai, $halaman") or die(mysqli_error);
                                    $no = $mulai+1;

                                    while($row = mysqli_fetch_array($query)) {
                                ?>
                                    <tbody>
                                        <tr class="tr-shadow">
                                            <td><?php echo $no++; ?></td>
                                            <td><?php echo $row['user']; ?></td>
                                            <td style="padding:0 0 0 4px" class="desc"><?php echo $row['created_at']; ?></td>
                                            <td><?php echo $row['stop_removal']; ?></td>
                                            <td><?php echo $row['label']; ?></td>
                                            <td><?php echo $row['polarity']; ?></td>
                                        </tr>
                                        <tr class="spacer"></tr>
                                    </tbody>
                                <?php 
                                
                                }  
                                
                                ?>
                                    </table>
                                    <div class="">
                                        <?php for ($i=1; $i<=$pages ; $i++){ ?>
                                        <a href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
                                        
                                        <?php } ?>
                                        
                                    </div>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright © 2022 <strong>Hendy S</strong>. All rights reserved.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END MAIN CONTENT-->
            
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <!-- <script src="assets/vendor/slick/slick.min.js"> -->
    </script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-validate.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c5a4bf0b57.js" crossorigin="anonymous"></script>

</body>
</html>