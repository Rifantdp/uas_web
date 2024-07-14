<?php 
require("connect.php");?>
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
          <div class="m_ikon"><img src="teacher.png" ><b class="m_text">DATA SISWA</b></div>
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
          $sql = "SELECT * FROM data_guru WHERE nip=100674830";
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
              <tr><td style="width: 30%;">NIP</td><td style="width: 70%;">'.$row['nip']."</td>
              <tr><td>Nama Lengkap</td><td>".$row['nama_guru']."</td>
              <tr><td>Jenis Kelamin</td><td>".$row['gender_guru'].".".$row['gelar_guru']."</td>
              <tr><td>No Hp</td><td>".$row['hp_guru']."</td>
              <tr><td>Jabatan</td><td>".$row['jabatan']."</td>
              <tr><td>Alamat</td><td>".$row['alamat_guru'].'</td>
            </table>
          </div>
          <div>
          </div>
        </div>
      </div>
    </div>';
    echo '<div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 10px;"><div class="boxi"><table width="100%">
    <tr>
      <th width="40%">Jadwal</th>
      <th width="30%%">Kelas</th>
      <th width="30%">Mapel</th>
    </tr>';
    $sql="SELECT urut_schedule,day_schedule,start_time,end_time,sup_kelas,sub_kelas,judul_mapel,nama_guru,gelar_guru from data_schedule,data_time,data_kelas,data_mapel,data_guru WHERE data_schedule.id_time=data_time.id_time AND data_schedule.id_kelas=data_kelas.id_kelas AND data_schedule.no_mapel=data_mapel.no_mapel AND data_schedule.nip=100674830 AND data_schedule.nip=data_guru.nip
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
          <div style="width:100% display:flex; float:right;">
          <a href='whatsapp://send?text=   hai'		data-action="share/whatsapp/share"
		target="_blank"> Share to WhatsApp </a>
		<button onclick="window.print();">PRINT</button></div>
    <form method="POST"><select name="jadwal">
    <?php $sql="SELECT id_schedule,day_schedule,start_time,end_time,sup_kelas,sub_kelas,judul_mapel from data_schedule,data_time,data_kelas,data_mapel WHERE data_schedule.id_time=data_time.id_time AND data_schedule.id_kelas=data_kelas.id_kelas AND data_schedule.no_mapel=data_mapel.no_mapel";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
          echo '<option value="'.$row["id_schedule"].'">'; 
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
          echo " - " . $row["start_time"]." Class : ". $row["sup_kelas"]." - ".$row["sub_kelas"]." Mapel : ".$row["judul_mapel"];}?>
    </select><button name="cek">CEK</button></form>
    <?php 
    if(isset($_POST['cek'])){
      $jadwal = $_POST['jadwal'];
      $sql = "SELECT day_schedule,start_time,judul_mapel,sup_kelas,sub_kelas,pts,uas,nama_siswa,nama_guru,gelar_guru from data_nilai,data_schedule,data_time,data_mapel,data_kelas,data_siswa,data_guru WHERE data_schedule.id_schedule='$jadwal' AND data_nilai.id_schedule=data_schedule.id_schedule AND data_schedule.id_time=data_time.id_time AND data_schedule.no_mapel = data_mapel.no_mapel AND data_schedule.id_kelas=data_kelas.id_kelas AND data_nilai.nis=data_siswa.nis AND data_nilai.nip=data_guru.nip";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
    ?>
    <table>
            <tr>
              <th>NAMA : <?php echo$row["nama_guru"].".".$row["gelar_guru"];?></th>
              <th colspan="2">Jadwal : <?php 
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
                        echo " - " . $row["start_time"]." Class : ". $row["sup_kelas"]." - ".$row["sub_kelas"]." Mapel : ".$row["judul_mapel"];
              ?></th>
            </tr>
            <tr>
              <th>SISWA</th>
              <th>PTS</th>
              <th>UAS</th>
            </tr>
            <?php 
            $result = $conn->query($sql);
            while($row = $result->fetch_assoc()) {
           echo"</td><td>".$row["nama_siswa"].'</td><td><input type="number" name="pts" value="'.$row["pts"].'"></td><td><input type="number" name="uas" value="'.$row["uas"].'"></td><td></tr>';
              }
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
lside();
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
    </script>
  </body>
</html>
 