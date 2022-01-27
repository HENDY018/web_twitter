<?php
    include "koneksi.php";
    include "query-data-chart.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title Page-->
    <title>Analisis Sentimen Twitter</title>

    <script src="assets/vendor/chartjs/Chart.js"></script>

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
                    </li>
                        <li class="active">
                            <a href="data-grafik.php">
                                <i class="fas fa-chart-bar"></i>Data Grafik</a>
                        </li>
                        <li>
                            <a href="data-table.php">
                                <i class="fas fa-home"></i>Data Tabel</a>
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
                        <li>
                            <a href="data-table.php">
                                <i class="fas fa-home"></i>Data Tabel</a>
                        </li>
                        <li class="active">
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
                    <div class="row justify-content-center">
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-5">Bar chart</h3>
                                        <p class="m-b-40" style="font-size:14px">Grafik Batang data twitter masyarakat mengenai 
                                            isu yang mendukung, menolak, maupun mengabaikan KPK setiap 3 bulan.</p>
                                        <canvas id="barChart"></canvas>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="au-card m-b-30">
                                    <div class="au-card-inner">
                                        <h3 class="title-2 m-b-5">Pie Chart</h3>
                                        <p class="m-b-40" style="font-size:14px">Grafik Pie data twitter masyarakat mengenai 
                                            isu yang mendukung, menolak, maupun mengabaikan KPK selama 3 bulan terakhir.</p>
                                        <canvas id="pieChart"></canvas>
                                    </div>
                                </div>
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

    <script>
        //bar chart
        var ctx = document.getElementById("barChart");
        if (ctx) {
          ctx.height = 200;
          var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
              datasets: [
                  {
                label: "Netral",
                data: [
                    <?php echo $count_pie_data_netral ?>
                    ],
                backgroundColor: [
                    '#483D8B',
                ],
                hoverBackgroundColor: [
                    "rgba(255, 123, 0, 0.9)",
                ]
              },
              {
                label: "Negatif",
                data: [
                    <?php echo $count_pie_data_negatif ?>
                    ],
                backgroundColor: [
                    '#228B32',
                ],
                hoverBackgroundColor: [
                  "rgba(0, 123, 255, 0.9)",
                ]
    
              },
              {
                label: "Positif",
                data: [
                    <?php echo $count_pie_data_positif ?>
                    ],
                backgroundColor: [
                    '#FF4500',
                ],
                hoverBackgroundColor: [
                  "rgba(0, 255, 123, 0.9)",
                ]
    
              },
              ],
              labels: [
                "Sentimen",
              ]
            },
            options: {
              legend: {
                position: 'top',
                labels: {
                  fontFamily: 'Poppins'
                }
    
              },
              responsive: true
            }
          });
        }


          //pie chart
        var ctx = document.getElementById("pieChart");
        if (ctx) {
          ctx.height = 200;
          var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
              datasets: [{
                data: [
                    <?php 
                        $pembulatan = $persen_netral;
                        echo round($pembulatan,2);  
                    ?>,
                    <?php 
                        $pembulatan = $persen_negatif;
                        echo round($pembulatan,2); 
                    ?>, 
                    <?php 
                        $pembulatan = $persen_positif;
                        echo round($pembulatan,2); 
                    ?>
                    ],
                backgroundColor: [
                    '#483D8B',
                    '#228B32',
                    '#FF4500',
                ],
                hoverBackgroundColor: [
                  "rgba(255, 123, 0, 0.9)",
                  "rgba(0, 123, 255, 0.9)",
                  "rgba(0, 255, 123, 0.9)",
                ]
    
              }],
              labels: [
                "Netral",
                "Negatif",
                "Positif",
              ]
            },
            options: {
              legend: {
                position: 'top',
                labels: {
                  fontFamily: 'Poppins'
                }
    
              },
              responsive: true
            }
          });
        }
        
        
    </script>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="assets/vendor/animsition/animsition.min.js"></script>
    <script src="assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    </script>
    <script src="assets/vendor/circle-progress/circle-progress.min.js"></script>
    </script>

    <!-- Main JS-->
    <script src="assets/js/main.js"></script>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/c5a4bf0b57.js" crossorigin="anonymous"></script>

</body>
</html>