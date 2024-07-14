<?php 
include "../connect.php";
$urut = $_GET['edit'];
$sql = "SELECT urut_siswa, nis,nama_siswa,gender_siswa,hp_siswa,alamat_siswa,nilai_siswa,sikap_siswa,sup_kelas, sub_kelas, wali_kelas FROM data_siswa, data_kelas WHERE data_siswa.urut_siswa = '$urut' AND data_siswa.id_kelas = data_kelas.id_kelas";
$result = $conn->query($sql);
$row = $result->fetch_assoc(); ?>
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
                  <input type="number" style="width: 90%;" placeholder="NIS" name="nis" value="<?php echo $row['nis']; ?>">
                  <input type="text" style="width: 90%;" placeholder="Nama Lengkap" name="nama" value="<?php echo $row['nama_siswa']; ?>">
                  <div style="margin-left:10px;">
                    <h6>Jenis Kelamin</h6>
                    <input type="radio" value="P" name="gender"><label>P</label>
                    <input type="radio" value="L" name="gender"><label>L</label>
                   </div>
                  <input type="number" style="width: 90%;" placeholder="No Hp" name="hp" value="<?php echo $row['hp_siswa']; ?>">
                  <div style="margin-left:10px;">
                  <textarea placeholder="Alamat Lengkap" name="alamat" value="<?php echo $row['alamat_siswa']; ?>"></textarea><br>
                  <label for="kelas">Kelas</label>
                  <select name="kelas">
                    <?php 
                    $sql="SELECT * FROM data_kelas";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['id_kelas'].">".$row['sup_kelas']."-".$row['sub_kelas']."</option>";
                    }?>
                  </select>
                  </div>       
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
  $sql ="UPDATE `informasi_akademik`.`data_siswa` SET `nis` = '$nis', `nama_siswa` = '$nama', `gender_siswa` = '$gender', `hp_siswa` = '$hp', `alamat_siswa` = '$alamat' WHERE urut_siswa = '$urut'";
  if ($conn->query($sql)==TRUE) {
    echo '<script>alert("Data Tersimpan")</script>';
    echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/siswa/siswa.php'>";
  } else {
    echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
  }  
}
$conn->close();
?>