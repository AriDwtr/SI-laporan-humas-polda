<?php 
include "../conn/conn.php";
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM jenis_laporan WHERE id_jenis_laporan='$id'");
echo "<script>window.location.href='index.php?page=add_jenislaporan';</script>'";
exit;
?>