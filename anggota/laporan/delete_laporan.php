<?php 
include "../conn/conn.php";
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM laporan_kegiatan WHERE id_laporan='$id'");
mysqli_query($conn,"DELETE FROM foto_kegiatan WHERE id_laporan='$id'");
mysqli_query($conn,"DELETE FROM video_kegiatan WHERE id_laporan='$id'");
echo "<script>window.location.href='index.php?page=riwayat_laporan';</script>'";
exit;
?>