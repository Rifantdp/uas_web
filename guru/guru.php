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
        echo '<div id="inout">
        <div style="width: 100%;display:flex;justify-content: center;padding-top: 100px;">
            <form class="boxi" method="POST">
              <div style="display:flex; align-itemss:center;">
                <div style="width:75%;">
                  <input type="text" style="width: 90%;" placeholder="NIP(10 digit)" name="nip" >
                  <input type="text" style="width: 90%;" placeholder="Nama" name="nama" >
                  <input type="text" style="width: 90%;" placeholder="Gelar" name="glrGru" >
                  <input type="radio" value="P" name="gndGru"><label>P</label>
                  <input type="radio" value="L" name="gndGru"><label>L</label>
                  <input type="text" style="width: 90%;" placeholder="GeJabatannder" name="jbtGru" >         
                  <input type="number" style="width: 90%;" placeholder="Hp" name="hp" >
                  <textarea placeholder="Alamat Lengkap" name="alamat" ></textarea>
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
                <img style="width: 70%;" src="teacher.png" >
              </div>
            </div>
            <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>Tambah</h3></button>
            </form>
          </div>';
          if(isset($_POST['simpan'])){
            $nip = $_POST['nip'];
            $nmGru = $_POST['nama'];
            $glrGru = $_POST['glrGru'];
            $gender = $_POST['gndGru'];
            $hp = $_POST['hp'];
            $alamat = $_POST['alamat'];
            $jabatan = $_POST['jbtGru'];
            $sql = "INSERT INTO `informasi_akademik`.`data_guru`(`nip`, `nama_guru`, `gelar_guru`, `gender_guru`, `hp_guru`, `alamat_guru`, `jabatan`) VALUES ('$nip', '$nmGru', '$glrGru', '$gender', '$hp', '$alamat','$jabatan')";
            if ($conn->query($sql)) {
              echo '<script>alert("New record created successfully")</script>';
            } else {
              echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
            }  
          }

        //output
        $sql = "SELECT * from data_guru";
        $result = $conn->query($sql);        
        while($row = $result->fetch_assoc()) {
        echo '<div style="width: 100%;display:flex;align-items:center;justify-content: center;padding-top: 100px;">
    <div class="boxi" style="width:80%;">
      <div style="display: flex;">
        <div style="width: 30%;align-items: center;margin-left:5px;">
          <img style="width: 70%;" src="user.png">
        </div>
        <div style="width: 70%;">
          <table style="width: 100%;">
            <tr><td style="width: 30%;">NIS</td><td style="width: 70%;">'.$row['nip']."</td>
            <tr><td>Nama Lengkap</td><td>".$row['nama_guru']." ".$row['gelar_guru']."</td>
            <tr><td>Jenis Kelamin</td><td>".$row['gender_guru']."</td>
            <tr><td>No Hp</td><td>".$row['hp_guru']."</td>
            <tr><td>Alamat</td><td>".$row['alamat_guru']."</td>
            <tr><td>Jabatan</td><td>".$row['jabatan'].'</td>
          </table>
        </div>
        <div>
        </div>
      </div>
      <form action="delete.php" method="GET"><button type="submit" name="hapus" value="'.$row['urut_guru'].'" style="width:5%; float:right; background-color:transparent; border:none;"><img src="delete.png" style="width: 70%;"></button></form>
      <form action="edit.php" method="GET"><button type="submit" name="edit" value="'.$row['urut_guru'].'" style="width:5%; float:right; background-color:transparent; border:none;"><img src="pen.png" style="width: 70%;"></button></form>
    </div>
  </div>';
        }?>
        <script>
          
        </script>
    </body>
</html>
   
