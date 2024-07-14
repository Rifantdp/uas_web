<?php include "../connect.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <style>
            head,body{
                width:100%;
                height:100%;
            }
            tr:nth-child(even){
                background-color: #D6EEEE;
            }
            .boxi{
                width: 50%;
                box-sizing: border-box;
                border-radius: 15px;
                box-shadow: 0px 0px 10px rgba(0,0, 0, 1);
                justify-content: center;
                padding: 5px;
                margin-bottom:;
            }
            form input{
              border: none;
              border-bottom: 2px solid silver;
              margin: 15px;
              height: 20px;
            }
            #edit{
                position: relative;
            }
            #submit{
              background-color:transparent;
              border:none;
            }
        </style>
    </head>
    <body style="width:100%; height:100%;">
      <?php
      //input
      echo '<div style="width: 100%;display:flex;justify-content: center;padding-top: 100px;">
            <form class="boxi" method="POST">
              <div style="display:flex; align-itemss:center;">
                <div style="width:75%;">
                  <input type="number" style="width: 90%;" placeholder="NIS" name="nis">
                  <input type="text" style="width: 90%;" placeholder="Nama Lengkap" name="nama">
                  <div style="margin-left:10px;">
                    <h6>Jenis Kelamin</h6>
                    <input type="radio" value="P" name="gender"><label>P</label>
                    <input type="radio" value="L" name="gender"><label>L</label>
                   </div>
                  <input type="number" style="width: 90%;" placeholder="No Hp" name="hp">
                  <div style="margin-left:10px;">
                  <textarea placeholder="Alamat Lengkap" name="alamat"></textarea><br>
                  <label for="kelas">Kelas</label>
                  <select name="kelas">';
                    $sql="SELECT * FROM data_kelas";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['id_kelas'].">".$row['sup_kelas']."-".$row['sub_kelas']."</option>";
                    }
                  echo '</select>
                  </div>       
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
                <img style="width: 70%;" src="students.png" >
              </div>
            </div>
            <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>Tambah</h3></button>
            </form>
          </div>';
          if(isset($_POST['simpan'])){
            $nis = $_POST['nis'];
            $nama = $_POST['nama'];
            $gender = $_POST['gender'];
            $hp = $_POST['hp'];
            $alamat = $_POST['alamat'];
            $kelas = $_POST['kelas'];
            $sql = "INSERT INTO `informasi_akademik`.`data_siswa` (`nis`, `nama_siswa`, `gender_siswa`, `hp_siswa`, `alamat_siswa`, `id_kelas`) VALUES ('$nis', '$nama', '$gender', '$hp', '$alamat', '$kelas')";
            if ($conn->query($sql)) {
              echo '<script>alert("New record created successfully")</script>';
            } else {
              echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
            }  
          }
          //output
          $sql = "SELECT urut_siswa,nis,nama_siswa,gender_siswa,hp_siswa,alamat_siswa,sup_kelas, sub_kelas, wali_kelas FROM data_siswa, data_kelas WHERE data_siswa.id_kelas = data_kelas.id_kelas";
          $result = $conn->query($sql);        
          while($row = $result->fetch_assoc()) {
          echo '<div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 10px;">
      <div class="boxi" style="width:80%;">
        <div style="display: flex;">
          <div style="width: 30%;align-items: center;margin-left:5px;">
            <img style="width: 70%;" src="user.png">
          </div>
          <div style="width: 70%;">
            <table style="width: 100%;">
              <tr><td style="width: 30%;">NIS</td><td style="width: 70%;">'.$row['nis']."</td>
              <tr><td>Nama Lengkap</td><td>".$row['nama_siswa']."</td>
              <tr><td>Jenis Kelamin</td><td>".$row['gender_siswa']."</td>
              <tr><td>No Hp</td><td>".$row['hp_siswa']."</td>
              <tr><td>Kelas</td><td>".$row['sup_kelas']." - ".$row['sub_kelas']."</td>
              <tr><td>Wali Kelas</td><td>".$row['wali_kelas']."</td>
              <tr><td>Alamat</td><td>".$row['alamat_siswa'].'</td>
            </table>
          </div>
          <div>
          </div>
        </div>
        <form action="delete.php" method="GET"><button type="submit" name="hapus" value="'.$row['urut_siswa'].'" style="width:5%; float:right; background-color:transparent; border:none;"><img src="delete.png" style="width: 70%;"></button></form>
        <form action="edit.php" method="GET"><button type="submit" name="edit" value="'.$row['urut_siswa'].'" style="width:5%; float:right; background-color:transparent; border:none;"><img src="pen.png" style="width: 70%;"></button></form>
      </div>
    </div>';
          }?>
   
    </body>
</html>
   
