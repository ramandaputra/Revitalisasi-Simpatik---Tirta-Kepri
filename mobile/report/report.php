<?php

include "/fungsi/koneksi.php";
include "/fungsi/fungsi_tanggal.php";
include "/fungsi/format_number.php";

$selectedPeriode = $_POST['periode'];
list($periode, $drd) = explode('|', $selectedPeriode);
$selectedName = $_POST['name'];
list($name, $zona) = explode('|', $selectedName);

//QUERY
$link1 = mysql_connect($server1, $username, $password) or die("Koneksi gagal ke $database1");
mysql_select_db($database1, $link1) or die("Database $database1 tidak bisa dibuka");
$query_tekanan = mysql_query("SELECT name, ROUND(AVG(pressure), 2) AS pressure FROM $periode WHERE NAME = '$name'");
$tekanan = mysql_fetch_array($query_tekanan);

$query_distribusi = mysql_query("SELECT ROUND(SUM(flow), 2) AS flow FROM $periode WHERE NAME = '$name'");
$distribusi = mysql_fetch_array($query_distribusi);

$link2 = mysql_connect($server2, $username, $password, true) or die("Koneksi gagal ke $database2");
mysql_select_db($database2, $link2) or die("Database $database2 tidak bisa dibuka");
$query_pemakaian = mysql_query("SELECT ROUND(SUM(pakai), 2) AS pemakaian FROM $drd WHERE kodeblok = '$zona'");
$pemakaian = mysql_fetch_array($query_pemakaian);

$kehilangan = round(($distribusi['flow'] - $pemakaian['pemakaian']) / $distribusi['flow'] * 100, 2);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="apple-touch-icon" href="../images/apple-touch-icon.png" />
    <link rel="apple-touch-startup-image" href="../images/apple-touch-startup-image-640x920.png">
    <title>Kepegawaian</title>
    <link rel="stylesheet" href="../css/framework7.css">
    <link rel="stylesheet" href="../style.css">
    <link type="text/css" rel="stylesheet" href="../css/swipebox.css" />
    <link type="text/css" rel="stylesheet" href="../css/animations.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,900" rel="stylesheet">
</head>

<body id="mobile_wrap">


    <div class="pages">
        <div data-page="form" class="page no-toolbar no-navbar">
            <div class="page-content">

                <div class="navbarpages navbarpagesbg">
                    <div class="navbar_left">
                        <div class="logo_text"><a href="./index.php">REPORT</a></div>
                    </div>
                    <div class="navbar_right navbar_right_menu">
                        <a href="#" data-panel="left" class="open-panel"><img src="images/icons/white/menu.png" alt="" title="" /></a>
                    </div>
                </div>

                <div id="pages_maincontent">

                    <div class="page_single layout_fullwidth_padding">

                        <h3>
                            <?php
                            switch ($name) {
                                case 'sensor_reservoar':
                                    echo 'SENSOR RESERVOAR';
                                    break;
                                case 'sensor_gesek':
                                    echo 'SENSOR GESEK';
                                    break;
                                case 'sensor_hdpe':
                                    echo 'SENSOR HDPE';
                                    break;
                                case 'sensor_pcm':
                                    echo 'SENSOR PCM';
                                    break;
                            }

                            echo '<br>';
                            ?></h3>
                        <?php
                        switch ($periode) {
                            case 'sensor0123':
                                echo 'JANUARI 2023';
                                break;
                            case 'sensor0223':
                                echo 'FEBRUARI 2023';
                                break;
                            case 'sensor0323':
                                echo 'MARET 2023';
                                break;
                            case 'sensor0423':
                                echo 'APRIL 2023';
                                break;
                            case 'sensor0523':
                                echo 'MEI 2023';
                                break;
                            case 'sensor0623':
                                echo 'JUNI 2023';
                                break;
                            case 'sensor0723':
                                echo 'JULI 2023';
                                break;
                            case 'sensor0823':
                                echo 'AGUSTUS 2023';
                                break;
                            case 'sensor0923':
                                echo 'SEPTEMBER 2023';
                                break;
                            case 'sensor1023':
                                echo 'OKTOBER 2023';
                                break;
                            case 'sensor1123':
                                echo 'NOVEMBER 2023';
                                break;
                            case 'sensor1223':
                                echo 'DESEMBER 2023';
                                break;
                        }

                        echo '<br>';
                        ?>

                        <ul class="responsive_table">
                            <li class="table_row">
                                <div class="table_section">Tekanan Rata - Rata</div>
                                <div align='right' width="70px"><strong><?php echo $tekanan['pressure'] ?> bar</strong></div>
                            </li>
                        </ul>

                        <ul class="responsive_table">
                            <li class="table_row">
                                <div class="table_section">Distribusi</div>
                                <div align='right' width="70px"><strong><?php echo $distribusi['flow'] ?> m³</strong></div>
                            </li>
                        </ul>

                        <ul class="responsive_table">
                            <li class="table_row">
                                <div class="table_section">Pemakaian</div>
                                <div align='right' width="70px"><strong><?php echo $pemakaian['pemakaian'] ?> m³</strong></div>
                            </li>
                        </ul>

                        <ul class="responsive_table">
                            <li class="table_row">
                                <div class="table_section">Kehilangan</div>
                                <div align='right' width="70px"><strong><?php echo "" . $kehilangan . "%" ?></strong></div>
                            </li>
                        </ul>

                    </div>

                </div>


            </div>
        </div>
    </div>

    <script src="../js/jquery-1.10.1.min.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/framework7.js"></script>
    <script src="../js/jquery.swipebox.js"></script>
    <script src="../js/jquery.fitvids.js"></script>
    <script src="../js/email.js"></script>
    <script src="../js/audio.min.js"></script>
    <script src="../js/my-app.js"></script>
</body>

</html>