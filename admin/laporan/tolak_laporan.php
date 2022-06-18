<?php 
include "../conn/conn.php";
$id_laporan = $_GET['id'];
mysqli_query($conn,"UPDATE laporan_kegiatan SET status='DITOLAK' WHERE id_laporan='$id_laporan'");
echo "<script>window.location.href='index.php?page=laporan_kegiatan';</script>'";
exit;
?>