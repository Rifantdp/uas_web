<?php
include "../connect.php";
$urut = $_GET['hapus'];
$sql = "DELETE FROM `informasi_akademik`.`data_kelas` WHERE urut_kelas = '$urut'";
if ($conn->query($sql)==TRUE) {
  echo '<script>alert("Data terhapus")</script>';
  echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/kelas/kelas.php'>";
} else {
  echo '<script>alert("Data gagal terhapus")</script>';
  }  
$conn->close();
?>