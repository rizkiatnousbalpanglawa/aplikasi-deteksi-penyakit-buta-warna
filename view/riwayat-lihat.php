<?php
session_start();
$id_hasil_pemeriksaan = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- Custom Fonts -->
    <link href="../assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/custom.css" rel="stylesheet" type="text/css">
    <?php include "../config/koneksi.php" ?>
</head>

<body class="bg-putih">

    <div class="preloader">
        <div class="loading">
            <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>

    <nav class="navbar sticky-top text-dark bg-biru shadow">
        <a href="index.php?page=riwayat" class="text-dark float-left" style="font-size: 25px"><i class="fa fa-arrow-left fa-x2"></i></a>
        <span class="navbar-brand mx-auto" href="#">Hasil Analisa</a>
    </nav><br>

    <?php
    $get = $koneksi->query("SELECT * FROM hasil_pemeriksaan JOIN hasil_test ON hasil_pemeriksaan.kode_test = hasil_test.kode_test WHERE hasil_pemeriksaan.kode_test = '$id_hasil_pemeriksaan'");
    $no = 1;
    while ($set = $get->fetch_assoc()) {
        ${'hasil' . $no} = $set['presentase_hasil'];
        $no++;
    }
    ?>

    <div class="container">
        <div class="text-center">
            <i class="fa fa-bullseye fa-5x"></i>
        </div>
        <h2 class="text-center">Hasil Test Anda</h2>
        <hr>
        <h5 class="text-center"><?= $hasil1 ?> %</h5>
        <?php $ambil = $koneksi->query("SELECT * FROM penyakit WHERE id_penyakit = '1'") ?>
        <?php $pecah = $ambil->fetch_assoc() ?>
        <div class="text-center">Penyakit <?= $pecah['nama_penyakit'] ?> </div>
        <hr>
        <h5 class="text-center"><?= $hasil2 ?> %</h5>
        <?php $ambil = $koneksi->query("SELECT * FROM penyakit WHERE id_penyakit = '2'") ?>
        <?php $pecah = $ambil->fetch_assoc() ?>
        <div class="text-center">Penyakit <?= $pecah['nama_penyakit'] ?></div>
        <hr>

        <div class="card">
            <div class="card-body">
                <div class="text-center">
                    Bila Anda Ingin Perawatan Lebih Lanjut, Silahkan Hubungi Klinik Amanah Inayah
                </div>
            </div>
        </div>
    </div>


    <!-- bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(window).load(function() {
            $(".preloader").fadeOut();
        })
    </script>
</body>

</html>