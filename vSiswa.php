<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="content">
      <div class="aside">
        <div class="menu_a">
          <div id="menu_c" class="m_ikon">
            <b class="m_text">MENU</b>
            <img src="menu.png" onclick="rside()" id="logo_a">
            <img src="menuc.png" style="margin-left:60px" onclick="lside()" id="logo_b">
          </div>
          <div class="m_ikon"><img src="students.png" ><b class="m_text">DATA SISWA</b></div>
          <div class="m_ikon"><img src="score.png" ><b class="m_text">LIST NILAI</b></div>
        </div>
      </div>
      <article>
        <header>
          <h2>INFORMASI AKADEMIK</h2>
        </header>
        <div class="isi">
          <h1>INFORMASI SISWA</h1>
          <?php
          require("connect.php");
          $sql = "SELECT urut_siswa,nis,nama_siswa,gender_siswa,hp_siswa,alamat_siswa,sup_kelas, sub_kelas, wali_kelas FROM data_siswa, data_kelas WHERE data_siswa.id_kelas = data_kelas.id_kelas";
          $result = $conn->query($sql);        
         $row = $result->fetch_assoc();
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
    echo '<div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 10px;"><div class="boxi"><table width="100%">
    <tr>
      <th width="25%">Jadwal</th>
      <th width="10%">Kelas</th>
      <th width="25%">Mapel</th>
      <th width="30%">Pengajar</th>
    </tr>';
    $sql="SELECT urut_schedule,day_schedule,start_time,end_time,sup_kelas,sub_kelas,judul_mapel,nama_guru,gelar_guru from data_schedule,data_time,data_kelas,data_mapel,data_guru WHERE data_schedule.id_time=data_time.id_time AND data_schedule.id_kelas=71 AND data_schedule.id_kelas=data_kelas.id_kelas AND data_schedule.no_mapel=data_mapel.no_mapel AND data_schedule.nip=data_guru.nip
";
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
      echo " - ".$row["start_time"]." - ".$row["end_time"]."</td><td>". $row["sup_kelas"]." - ".$row["sub_kelas"]."</td><td>".$row["judul_mapel"]."</td><td>".$row["nama_guru"].".".$row["gelar_guru"].'</td><td style="display:flex;">
      </tr>';
    }echo "</table></div></div>"
    ?>
        </div>
        <div class="isi">
          <h1>INFORMASI NILAI</h1>
          <div style="width:100% display:flex; float:right;"><a href="whatsapp://send?text=Halo apalabar" action="share/whatsapp/share"  
        target="_blank">Whatsapp</a><button>PRINT</button></div>
          <table>
            <tr>
              <th colspan="2">NAMA : </th>
              <th colspan="2">NIS :</th>
            </tr>
            <tr>
              <th>JADWAL</th>
              <th>PTS</th>
              <th>UAS</th>
              <th>GURU</th>
              <th></th>
            </tr>
            <table width="100%">
        <tr>
          <th width="30%">JADWAL</th>
          <th width="15%">NAMA SISWA</th>
          <th width="15%">NAMA GURU</th>
          <th width="15%">PTS</th>
          <th width="15%">UAS</th>
        </tr>
        <?php $sql = "SELECT id_nilai,day_schedule,start_time,judul_mapel,sup_kelas,sub_kelas,pts,uas,nama_siswa,nama_guru,gelar_guru from data_nilai,data_schedule,data_time,data_mapel,data_kelas,data_siswa,data_guru WHERE data_nilai.id_schedule=data_schedule.id_schedule AND data_schedule.id_time=data_time.id_time AND data_schedule.no_mapel = data_mapel.no_mapel AND data_schedule.id_kelas=data_kelas.id_kelas AND data_nilai.nis=101 AND data_nilai.nis=data_siswa.nis AND data_nilai.nip=data_guru.nip;";
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
          echo "-" . $row["start_time"]."-".$row["judul_mapel"]."-".$row["sup_kelas"]."-".$row["sub_kelas"]."</td><td>".$row["nama_siswa"]."</td><td>".$row["nama_guru"].".".$row["gelar_guru"]."</td><td>".$row["uas"]."</td><td>".$row["pts"]."</td></tr>";
        }?>
          </table>
          
        </div>
      </article>
    </div>
    <script>
      let side=document.querySelector(".aside");
let txt=document.querySelectorAll(".m_text");
let a=document.querySelector("#logo_a");
let b=document.querySelector("#logo_b");
lside();
function rside(){
  side.style.width="180px";
  for(let i=0;i<=2;i++){
    txt[i].style.display="block";
  }
  a.style.display="none";
  b.style.display="block";
}
function lside(){
  side.style.width="46px";
  for(let i=0;i<=2;i++){
    txt[i].style.display="none";
  }
  b.style.display="none";
  a.style.display="block";
}
let m_ikon=document.querySelectorAll(".m_ikon");
let isi=document.querySelectorAll(".isi");
function bg(){
  for(let i=0;i<=2;i++){
    m_ikon[i].style.backgroundColor="black";}
    for(let i=0;i<2;i++){
    isi[i].style.display="none";}
}
bg();
m_ikon[1].addEventListener("click", function(){
  bg();
  m_ikon[1].style.backgroundColor="gray";
  isi[0].style.display="block";
});
m_ikon[2].addEventListener("click", function(){
  bg();
  m_ikon[2].style.backgroundColor="gray";
  isi[1].style.display="block";
});
m_ikon[3].addEventListener("click", function(){
  bg();
  m_ikon[3].style.backgroundColor="gray";
  isi[2].style.display="block";
});
    </script>
  </body>
</html>