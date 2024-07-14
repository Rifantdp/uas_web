<?php 
include "../connect.php";
$urut = $_GET['edit'];?>
<!DOCTYPE html>
<html>
  <head>

  </head>
  <body>
    <div id="edit">
      <div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 100px;">
        <form class="boxi" method="POST">
              <div style="display:flex; align-itemss:center;">
                <div style="width:75%;">
                  <?php 
                   echo '<select name="day">
                   <option value="1">SENEN</option>
                   <option value="2">SELASA</option>
                   <option value="3">RABU</option>
                   <option value="4">KAMIS</option>
                   <option value="5">JUMAT</option>
                   <option value="6">SABTU</option>
                   <option value="7">MINGGU</option>
                   </select>
                   <select name="jadwal">';
                   $sql = "SELECT * FROM data_time";
                   $result = $conn->query($sql);        
                   while($row = $result->fetch_assoc()){
                     echo "<option value=".$row['id_time'].">".$row['start_time']."-".$row['end_time']."</option>";
                   }
                  echo '</select>
                  <select name="kelas">';
                    $sql = "SELECT * FROM data_kelas";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['id_kelas'].">".$row['sup_kelas']."-".$row['sub_kelas']."</option>";
                    }
                  echo '</select>
                  <select name="mapel">';
                    $sql = "SELECT * FROM data_mapel";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['no_mapel'].">".$row['judul_mapel']."</option>";
                    }
                  echo '</select>
                  <select name="guru">';
                    $sql = "SELECT nip, nama_guru, gelar_guru FROM data_guru";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['nip'].">".$row['nama_guru']."-".$row['gelar_guru']."</option>";
                    }
                  echo"</select>"; ?>
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
                <img style="width: 70%;" src="user.png" >
              </div>
            </div>
            <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>UBAH</h3></button>
            <a href="siswa.php" style= "float: right; margin: 5PX; border: none; background-color: red; color: white; border-radius: 15px; height:50px; text-decoration:none;"><img src="arrow.png" style="width:50px"></a>
          </form>
          </div>
        </div>
        <script>

        </script>
  </body>
</html>
<?php
 if(isset($_POST['simpan'])){
  $day = $_POST['day'];
  $jam = $_POST['jam'];
  $kelas = $_POST['kelas'];
  $mapel = $_POST['mapel'];
  $guru = $_POST['guru'];
  $kelas = $_POST['kelas'];
  $urut = $_GET['edit'];
  $sql ="UPDATE `informasi_akademik`.`data_schedule` SET `id_schedule` = '679', `day_schedule` = '$day', `id_time` = '$jam', `id_kelas` = '$kelas', `no_mapel` = '$mapel', `nip` = '$guru' WHERE urut_schedule` = '$urut'";
  if ($conn->query($sql)==TRUE) {
    echo '<script>alert("Data Tersimpan")</script>';
    echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/sechedule/schedule.php'>";
  } else {
    echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
  }  
}
$conn->close();
?>