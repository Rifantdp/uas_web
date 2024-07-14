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
                  echo '<select name="schedule">';
                    $sql = "SELECT id_schedule,day_schedule,start_time,judul_mapel,sup_kelas,sub_kelas from data_schedule,data_time,data_mapel,data_kelas WHERE data_schedule.id_time=data_time.id_time AND data_schedule.no_mapel = data_mapel.no_mapel AND data_schedule.id_kelas=data_kelas.id_kelas";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['id_schedule'].">";
                      switch($row["day_schedule"]){
                        case 1:
                            echo "SENEN";
                            break;
                        case 2:
                            echo"SELASA";
                            break;
                        case 3:
                            echo "RABU";
                            break;
                        case 4:
                            echo "KAMIS";
                            break;
                        case 5:
                            echo "JUMAT";
                            break;
                        case 6:
                            echo "SABTU";
                            break;
                        case 7:
                            echo "MINGGU";
                            break;
                      }
                      echo "-".$row["start_time"]."-".$row["judul_mapel"]."-".$row["sup_kelas"]."-".$row["sub_kelas"]."</option>";
                    }
                  echo '</select>
                  <select name="siswa">';
                    $sql = "SELECT * FROM data_siswa";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['nis'].">".$row['nis']."-".$row['nama_siswa']."</option>";
                    }
                    echo '</select>
                    <select name="siswa">';
                      $sql = "SELECT * FROM data_guru";
                      $result = $conn->query($sql);        
                      while($row = $result->fetch_assoc()){
                        echo "<option value=".$row['nip'].">".$row['nama_guru']."-".$row['gelar_guru']."</option>";
                      }
                    echo '</select>
                  <input type="number" style="width: 90%;" placeholder="Nilai PTS" name="pts">
                  <input type="number" style="width: 90%;" placeholder="Nilai UAS" name="uas">'; ?>
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
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $gender = $_POST['gender'];
  $hp = $_POST['hp'];
  $alamat = $_POST['alamat'];
  $kelas = $_POST['kelas'];
  $urut = $_GET['edit'];
  $sql = "UPDATE `informasi_akademik`.`data_nilai` SET `nis` = '103', `id_schedule` = '124', `nip` = '123', `pts` = '90', `uas` = '100' WHERE id_nilai` = '$urut'";
  if ($conn->query($sql)==TRUE) {
    echo '<script>alert("Data Tersimpan")</script>';
    echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/siswa/siswa.php'>";
  } else {
    echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
  }  
}
$conn->close();
?>