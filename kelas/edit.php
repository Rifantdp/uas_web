<?php 
include "../connect.php";
$urut = $_GET['edit'];
$sql = "SELECT * FROM data_kelas";
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
                  <input type="number" style="width: 90%;" placeholder="SUP kelas" name="sup" value="<?php echo $row['sup_kelas']; ?>">
                  <input type="number" style="width: 90%;" placeholder="SUB Kelas" name="sub" value="<?php echo $row['sub_kelas']; ?>">
                  <select name="guru">';
                    <?php $sql="SELECT nama_guru,gelar_guru FROM data_guru";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['nama_guru']."-".$row['gelar_guru'].">".$row['nama_guru']."-".$row['gelar_guru']."</option>";
                    } ?>
                  </select>
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
                <img style="width: 70%;" src="teacher.png" >
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
  $sup = $_POST['sup'];
  $sub = $_POST['sub'];
  $id = $sup*10 + $sub;
  $guru = $_POST['guru'];
  $sql ="UPDATE `informasi_akademik`.`data_kelas` SET `id_kelas` = '$id', `sup_kelas` = '$sup', `sub_kelas` = '$sub', `wali_kelas` = '$guru' WHERE `urut_kelas` = '$urut'";
  if ($conn->query($sql)==TRUE) {
    echo '<script>alert("Data Tersimpan")</script>';
    echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/kelas/kelas.php'>";
  } else {
    echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
  }  
}
$conn->close();
?>