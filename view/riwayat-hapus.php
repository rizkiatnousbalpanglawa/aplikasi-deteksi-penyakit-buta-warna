<?php

include "../config/koneksi.php";
$id = $_GET['id'];

$koneksi->query("DELETE FROM hasil_pemeriksaan WHERE kode_test = '$id'");
$koneksi->query("DELETE FROM hasil_test WHERE kode_test = '$id'");

echo "<script>location='index.php?page=riwayat'</script>";