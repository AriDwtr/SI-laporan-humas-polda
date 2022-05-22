<?php 
include "../conn/conn.php";
$id = $_GET['id'];
mysqli_query($conn,"DELETE FROM staff WHERE id_staff='$id'");
echo "<script>window.location.href='index.php?page=list_anggota';</script>'";
exit;
?>