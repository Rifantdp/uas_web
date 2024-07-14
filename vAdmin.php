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
          <div id="siswa" class="m_ikon"><img src="students.png" ><b class="m_text">DATA SISWA</b></div>
          <div id="guru" class="m_ikon"><img src="teacher.png" ><b class="m_text">DATA GURU</b></div>
          <div id="kelas" class="m_ikon"><img src="classroom.png"><b class="m_text">LIST KELAS</b></div>
          <div id="mapel" class="m_ikon"><img src="mapel.png" ><b class="m_text">LIST MAPEL</b></div>
          <div id="jadwal" class="m_ikon"><img src="schedule.png" ><b class="m_text">LIST JADWAL</b></div>
          <div id="waktu" class="m_ikon"><img src="clock.png" ><b class="m_text">LIST MAPEL</b></div>
          <div id="nilai" class="m_ikon"><img src="score.png" ><b class="m_text">LIST MAPEL</b></div>
          
        </div>
      </div>
      <article>
        <header>
          <h2>INFORMASI AKADEMIK</h2>
        </header>
        <div class="isi">
        <iframe style=" width: 100%; height: 100%; border: none;" src="http://localhost:3000/siswa/siswa.php"></iframe>
        </div>
        <div class="isi">
        <iframe style=" width: 100%; height: 100%; border: none;" src="http://localhost:3000/guru/guru.php"></iframe>
          </div>
        <div class="isi">
        <iframe style=" width: 100%; height: 100%; border: none;" src="http://localhost:3000/kelas/kelas.php"></iframe>
          </div>
        <div class="isi">
        <iframe style=" width: 100%; height: 100%; border: none;" src="http://localhost:3000/mapel/mapel.php"></iframe>
        </div>
        <div class="isi">
        <iframe style=" width: 100%; height: 100%; border: none;" src="http://localhost:3000/schedule/schedule.php"></iframe>
          </div>
        <div class="isi">
        <iframe style=" width: 100%; height: 100%; border: none;" src="http://localhost:3000/waktu/waktu.php"></iframe>
          </div>
        <div class="isi">
        <iframe style=" width: 100%; height: 100%; border: none;" src="http://localhost:3000/nilai/nilai.php"></iframe>
          </div>
      </article>
    </div>
    <script src="main.js" ></script>
  </body>
</html>
 