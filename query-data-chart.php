<?php 
    include "koneksi.php";

    $current_year=date("Y");
    $current_month=date("M");

    // Pie Chart Twitter
    $pie_data_netral = $koneksi->query("SELECT * FROM twitter_analisa WHERE polarity=0");
    $count_pie_data_netral = $pie_data_netral->num_rows;


    $pie_data_negatif = $koneksi->query("SELECT * FROM twitter_analisa WHERE polarity=-1");
    $count_pie_data_negatif = $pie_data_negatif->num_rows;


    $pie_data_positif = $koneksi->query("SELECT * FROM twitter_analisa WHERE polarity=1");
    $count_pie_data_positif = $pie_data_positif->num_rows;
?>