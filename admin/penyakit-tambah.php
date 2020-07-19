<?php

include "../config/koneksi.php";
if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $defenisi = $_POST['defenisi'];

    $simpan = $koneksi->query("INSERT INTO penyakit (nama_penyakit,defenisi) VALUES ('$nama','$defenisi')");

    if ($simpan) {
        echo "<script>alert('Data Berhasil Ditambahkan');location='index.php?page=penyakit'</script>";
    }
}