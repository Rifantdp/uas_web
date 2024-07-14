<?php 
include "../connect.php";
$urut = $_GET['edit'];
$sql = "SELECT * FROM data_guru WHERE urut_guru = '$urut'";
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
                  <input type="number" style="width: 90%;" placeholder="NIP" name="nip" value="<?php echo $row['nip']; ?>">
                  <input type="text" style="width: 90%;" placeholder="Nama Lengkap" name="nama" value="<?php echo $row['nama_guru']; ?>">
                  <input type="text" style="width: 90%;" placeholder="Gelar" name="glrGru" value="<?php echo $row['gelar_guru']; ?>">
                  <div style="margin-left:10px;">
                    <h6>Jenis Kelamin</h6>
                    <input type="radio" value="P" name="gender"><label>P</label>
                    <input type="radio" value="L" name="gender"><label>L</label>
                   </div>
                  <input type="number" style="width: 90%;" placeholder="No Hp" name="hp" value="<?php echo $row['hp_guru']; ?>">
                  <div style="margin-left:10px;">
                  <textarea placeholder="Alamat Lengkap" name="alamat" value="<?php echo $row['alamat_guru']; ?>"></textarea><br>           
                  </div>       
                  <input type="text" style="width: 90%;" placeholder="No Hp" name="jbtGru" value="<?php echo $row['jabatan']; ?>">
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
                <img style="width: 70%;" src="user.png" >
              </div>
            </div>
            <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>UBAH</h3></button>
            <a href="guru.php" style= "float: right; margin: 5PX; border: none; background-color: red; color: white; border-radius: 15px; height:50px; text-decoration:none;"><img src="arrow.png" style="width:50px"></a>
          </form>
          </div>
        </div>
        <script>

        </script>
  </body>
</html>
<?php
if(isset($_POST['simpan'])){
$nip = $_POST['nip'];
$nmGru = $_POST['nama'];
$glrGru = $_POST['glrGru'];
$gender = $_POST['gender'];
$hp = $_POST['hp'];
$alamat = $_POST['alamat'];
$jabatan = $_POST['jbtGru'];
$sql = "UPDATE `informasi_akademik`.`data_guru` SET `nip` = '$nip', `nama_guru` = '$nmGru', `gelar_guru` = '$glrGru', `gender_guru` = '$gender', `hp_guru` = '$hp', `alamat_guru` = '$alamat', `jabatan` = '$jabatan' WHERE `urut_guru` = '$urut'";
if ($conn->query($sql)==TRUE) {
  echo '<script>alert("Data Tersimpan")</script>';
  echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/guru/guru.php'>";
} else {
  echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
}
}
$conn->close();
?>