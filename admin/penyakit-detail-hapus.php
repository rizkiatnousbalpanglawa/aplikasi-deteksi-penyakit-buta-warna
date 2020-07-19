<?php

include "../config/koneksi.php";

$id = $_GET['id'];
$idp = $_GET['idp'];

$koneksi->query("DELETE FROM pertanyaan WHERE id_pertanyaan = '$id'");

echo "<script>location='index.php?page=penyakit-detail&id=$idp'</script>";