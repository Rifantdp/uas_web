<?php
include "../connect.php";
$urut = $_GET['hapus'];
$sql = "DELETE FROM `informasi_akademik`.`data_mapel` WHERE no_mapel = '$urut'";
if ($conn->query($sql)==TRUE) {
  echo '<script>alert("Data terhapus")</script>';
  echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/mapel/mapel.php'>";
} else {
  echo '<script>alert("Data gagal terhapus")</script>';
  }  
$conn->close();
?>