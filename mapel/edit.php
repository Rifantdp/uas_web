<?php 
include "../connect.php";
$urut = $_GET['edit'];
$sql="SELECT * FROM data_mapel WHERE no_mapel = '$urut'";
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
                  <input type="text" style="width: 90%;" placeholder="Title" name="title" value="<?php echo $row["judul_mapel"]; ?>">
                </div>
            </div>
            <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>UBAH</h3></button>
            <a href="mapel.php" style= "float: right; margin: 5PX; border: none; background-color: red; color: white; border-radius: 15px; height:50px; text-decoration:none;"><img src="arrow.png" style="width:50px"></a>
          </form>
          </div>
        </div>
        <script>

        </script>
  </body>
</html>
<?php
if(isset($_POST['simpan'])){
  $title = $_POST['title'];
  $sql = "UPDATE `informasi_akademik`.`data_mapel` SET `judul_mapel` = '$title' WHERE (`no_mapel` = '$urut')";
  if ($conn->query($sql)==TRUE) {
    echo '<script>alert("Data Tersimpan")</script>';
    echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/mapel/mapel.php'>";
  } else {
    echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
  }  
}

$conn->close();
?>