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
        <a href="index.php" class="text-dark float-left" style="font-size: 25px"><i class="fa fa-arrow-left fa-x2"></i></a>
        <span class="navbar-brand mx-auto" href="#">Hasil Analisa</a>
    </nav><br>

    <?php
    session_start();
    $id_user = $_SESSION['id'];
    include "../config/koneksi.php";

    $kodetest = date("dMYHis");

    if (isset($_POST['simpan'])) {

        $tanggaltest = date("Y-m-d");

        $get = $koneksi->query("SELECT * FROM pertanyaan");
        while ($set = $get->fetch_assoc()) {
            $id = $set['id_pertanyaan'];

            ${'id_' . $id} = $_POST['id_' . $id];
            ${'jawaban_' . $id} = $_POST['jawaban_' . $id];

            $koneksi->query("INSERT INTO sementara (id_user,id_pertanyaan,jawaban_user) VALUES ('$id_user','${'id_' .$id}','${'jawaban_' .$id}')");
        }

        $getcocokan = $koneksi->query("SELECT * FROM pertanyaan");
        while ($setcocokan = $getcocokan->fetch_assoc()) {
            $ids = $setcocokan['id_pertanyaan'];

            // $cari = $koneksi->query("SELECT * FROM pertanyaan WHERE id_pertanyaan = '${'id_'.$ids}' AND jawaban = '${'jawaban_'.$ids}'");
            $cari = $koneksi->query("SELECT pertanyaan.id_penyakit FROM pertanyaan JOIN penyakit ON pertanyaan.id_penyakit=penyakit.id_penyakit WHERE pertanyaan.id_pertanyaan = '${'id_' .$ids}' AND pertanyaan.jawaban = '${'jawaban_' .$ids}'");
            $ambil = $cari->fetch_assoc();

            if (mysqli_num_rows($cari) === 1) {

                ${'jawaban_benar_' . $ids} = $ambil['id_penyakit'];

                $koneksi->query("INSERT INTO hasil_sementara (id_user,id_penyakit,jawaban) VALUES ('$id_user','${'jawaban_benar_' .$ids}','0')");
            } else {
                $jenis_penyakit = $koneksi->query("SELECT * FROM pertanyaan WHERE id_pertanyaan = '${'id_' .$ids}'");
                $getjenis = $jenis_penyakit->fetch_assoc();
                ${'id_jenis' . $ids} = $getjenis['id_penyakit'];
                $koneksi->query("INSERT INTO hasil_sementara (id_user,id_penyakit,jawaban) VALUES ('$id_user','${'id_jenis' .$ids}','1')");
            }
        }

        /* hitung jumlah factor untuk penyakit pertama*/
        $cek1 = $koneksi->query("SELECT COUNT(id_penyakit) AS jumlah FROM pertanyaan WHERE id_penyakit='1'");
        $ambildarisql1 = $cek1->fetch_assoc();
        $jfaktor1 = $ambildarisql1['jumlah'];

        /* menghitung syarat cf */
        $aturancf_1 = 1 / $jfaktor1;


        /* hitung untuk penyakit pertama */
        $hitung1 = $koneksi->query("SELECT * FROM hasil_sementara WHERE id_user = '$id_user' AND id_penyakit = '1'");

        $i1 = 1;
        while ($perhitungan1 = $hitung1->fetch_assoc()) {
            ${'cfuser1_' . $i1} = $perhitungan1['jawaban'] * $aturancf_1;
            $i1++;
        }

        /* menghitung cfold */
        $cfold_1 = $cfuser1_1 + ($cfuser1_2 * (1 - $cfuser1_1));

        /* menghitung cf combine */
        for ($a = 3; $a <= $jfaktor1; $a++) {
            $cfold_1 = $cfold_1 + ${'cfuser1_' . $a} * (1 - $cfold_1);
        }

        (float) $hasil1 = $cfold_1 * 100;
        $koneksi->query("INSERT INTO hasil_test (id_user,id_penyakit,kode_test,presentase_hasil) VALUES ('$id_user','1','$kodetest','$hasil1')");

        // =====================================================================================================================================//
        /* hitung jumlah factor untuk penyakit Kedua*/
        $cek2 = $koneksi->query("SELECT COUNT(id_penyakit) AS jumlah FROM pertanyaan WHERE id_penyakit='2'");
        $ambildarisql2 = $cek2->fetch_assoc();
        $jfaktor2 = $ambildarisql2['jumlah'];

        /* menghitung syarat cf */
        $aturancf_2 = 1 / $jfaktor2;


        /* hitung untuk penyakit pertama */
        $hitung2 = $koneksi->query("SELECT * FROM hasil_sementara WHERE id_user = '$id_user' AND id_penyakit = '2'");

        $i2 = 1;
        while ($perhitungan2 = $hitung2->fetch_assoc()) {
            ${'cfuser2_' . $i2} = $perhitungan2['jawaban'] * $aturancf_2;
            $i2++;
        }

        /* menghitung cfold */
        $cfold_2 = $cfuser2_1 + ($cfuser2_2 * (1 - $cfuser2_1));

        /* menghitung cf combine */
        for ($a = 3; $a <= $jfaktor2; $a++) {
            $cfold_2 = $cfold_2 + ${'cfuser2_' . $a} * (1 - $cfold_2);
        }

        (float) $hasil2 = $cfold_2 * 100;
        $koneksi->query("INSERT INTO hasil_test (id_user,id_penyakit,kode_test,presentase_hasil) VALUES ('$id_user','1','$kodetest','$hasil2')");

        $koneksi->query("DELETE FROM sementara WHERE id_user = '$id_user'");
        $koneksi->query("DELETE FROM hasil_sementara WHERE id_user = '$id_user'");

        $koneksi->query("INSERT INTO hasil_pemeriksaan (id_user,tanggal_test,kode_test) VALUES ('$id_user','$tanggaltest','$kodetest')");
    } ?>

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
    <script src="../assets/js/bootstrap-show-password.min.js"></script>

    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(window).load(function() {
            $(".preloader").fadeOut();
        })
    </script>
</body>

</html>