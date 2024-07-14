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
                margin-bottom: 10px;
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
        </style>
    </head>
    <body style="width:100%; height:100%;">
        <?php
        include "../connect.php";
        //input
        echo '<div style="width: 100%;display:flex;justify-content: center;padding-top: 100px;">
            <form class="boxi" method="POST">
              <div style="display:flex; align-itemss:center;">
                <div style="width:75%;">
                  select name="day">
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
                      echo "<option value=".$row['kode_mapel'].">".$row['judul_mapel']."</option>";
                    }
                  echo '</select>
                  <select name="guru">';
                    $sql = "SELECT nip, nama_guru, gelar_guru FROM data_guru";
                    $result = $conn->query($sql);        
                    while($row = $result->fetch_assoc()){
                      echo "<option value=".$row['nip'].">".$row['nama_guru']."-".$row['gelar_guru']."</option>";
                    }
                  echo '</select>
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
              <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>Tambah</h3></button>
              </div>
            </div>
            </form>
          </div>';
          if(isset($_POST['simpan'])){
            $day = $_POST["day"];
            $jadwal = $_POST['jadwal'];
            $kelas = $_POST['kelas'];
            $mapel = $_POST['mapel'];
            $guru = $_POST['guru'];
            $id = $kelas*10;
            $sql="INSERT INTO `informasi_akademik`.`data_schedule` (`id_schedule`, `id_time`, `id_kelas`, `kode_mapel`, `nip`) VALUES ('$id', '$jadwal', '$kelas', '$mapel', '$guru')";
            if ($conn->query($sql)==TRUE) {
              echo '<script>alert("Data Tersimpan")</script>';
              echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/kelas/kelas.php'>";
            } else {
              echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
            }  
          }
        //output
        echo '<table width="100%">
        <tr>
          <th width="25%">Jadwal</th>
          <th width="10%">Kelas</th>
          <th width="25%">Mapel</th>
          <th width="30%">Pengajar</th>
          <th width="10%"></th>
        </tr>';
        $sql="SELECT urut_schedule,day_schedule,start_time,end_time,sup_kelas,sub_kelas,judul_mapel,nama_guru,gelar_guru from data_schedule,data_time,data_kelas,data_mapel,data_guru WHERE data_schedule.id_time=data_time.id_time AND data_schedule.id_kelas=data_kelas.id_kelas AND data_schedule.no_mapel=data_mapel.no_mapel AND data_schedule.nip=data_guru.nip";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>"; 
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
          echo " - " . $row["start_time"]." - ".$row["end_time"]."</td><td>". $row["sup_kelas"]." - ".$row["sub_kelas"]."</td><td>".$row["judul_mapel"]."</td><td>".$row["nama_guru"].".".$row["gelar_guru"].'</td><td style="display:flex;">
          <form action="edit.php" method="GET"><button type="submit" name="edit" value="'.$row['urut_schedule'].'" style=" background-color:transparent; border:none;"><img src="pen.png" style="width: 70%;"></button></form>
          <form action="delete.php" method="GET"><button type="submit" name="hapus" value="'.$row['urut_schedule'].'" style="background-color:transparent; border:none;"><img src="delete.png" style="width: 70%;"></button></form>
          </td></tr>';
        }?>
    </body>
</html>