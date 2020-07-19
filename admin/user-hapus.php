<?php 

$id = $_GET['id'];
include "../config/koneksi.php";
$koneksi->query("DELETE FROM user WHERE id_user = '$id'");

echo "<script>location='index.php?page=user'</script>";