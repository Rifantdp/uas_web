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
        </style>
    </head>
    <body style="width:100%; height:100%;">
        <?php
        include "../connect.php";
        //input
        echo '<div style="width: 100%;display:flex;justify-content: center;padding-top: 100px;">
            <form class="boxi" method="POST">
              <div style="display:flex; align-itemss:center;">
                <div style="width:75%;">';
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
                  <input type="number" style="width: 90%;" placeholder="Nilai UAS" name="uas">
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
                <img style="width: 70%;" src="teacher.png" >
              </div>
            </div>
            <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>Tambah</h3></button>
            </form>
          </div>';
          if(isset($_POST['simpan'])){
            $kode = $_POST['kode'];
            $title = $_POST['title'];
            $sql="INSERT INTO `informasi_akademik`.`data_mapel` (`kode_mapel`, `judul_mapel`) VALUES ('$kode', '$title')";
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
          <th width="30%">JADWAL</th>
          <th width="15%">NAMA SISWA</th>
          <th width="15%">NAMA GURU</th>
          <th width="15%">PTS</th>
          <th width="15%">UAS</th>
          <th width="10%"></th>
        </tr>';
        $sql = "SELECT id_nilai,day_schedule,start_time,judul_mapel,sup_kelas,sub_kelas,pts,uas,nama_siswa,nama_guru,gelar_guru from data_nilai,data_schedule,data_time,data_mapel,data_kelas,data_siswa,data_guru WHERE data_nilai.id_schedule=data_schedule.id_schedule AND data_schedule.id_time=data_time.id_time AND data_schedule.no_mapel = data_mapel.no_mapel AND data_schedule.id_kelas=data_kelas.id_kelas AND data_nilai.nis=data_siswa.nis AND data_nilai.nip=data_guru.nip;";
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
          echo "-" . $row["start_time"]."-".$row["judul_mapel"]."-".$row["sup_kelas"]."-".$row["sub_kelas"]."</td><td>".$row["nama_siswa"]."</td><td>".$row["nama_guru"].".".$row["gelar_guru"]."</td><td>".$row["uas"]."</td><td>".$row["pts"].'</td><td style="display:flex;">
          <form action="edit.php" method="GET"><button type="submit" name="edit" value="'.$row['id_nilai'].'" style=" background-color:transparent; border:none;"><img src="pen.png" style="width: 70%;"></button></form>
          <form action="delete.php" method="GET"><button type="submit" name="hapus" value="'.$row['id_nilai'].'" style="background-color:transparent; border:none;"><img src="delete.png" style="width: 70%;"></button></form>
          </td></tr>';
        }?>
    </body>
</html>