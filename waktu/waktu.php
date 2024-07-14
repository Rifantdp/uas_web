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
                  <input type="time" style="width: 90%;" placeholder="Start" name="start">
                  <input type="time" style="width: 90%;" placeholder="End" name="end">
                </div>
              <div style="width: 25%;align-items: center; margin-left:5px;">
                <img style="width: 70%;" src="teacher.png" >
              </div>
            </div>
            <button  type="submit" style= "float: right; margin: 5PX; border: none; background-color: #04AA6D; color: white; border-radius: 15px;" name="simpan"><h3>Tambah</h3></button>
            </form>
          </div>';
          if(isset($_POST['simpan'])){
            $start = $_POST['start'];
            $end = $_POST['end'];
            $sql ="INSERT INTO `informasi_akademik`.`data_time` (`start_time`, `end_time`) VALUES ('$start', '$end')";
            if ($conn->query($sql)==TRUE) {
              echo '<script>alert("Data Tersimpan")</script>';
              echo "<meta http-equiv='refresh' content='1;url=http://localhost:3000/waktu/waktu.php'>";
            } else {
              echo '<script>alert("Data gagal tersimpan, harap periksa kembali")</script>';
            }  
          }
        //output
        echo '<table width="100%">
        <tr>
          <th width="35%">Start</th>
          <th width="35%">End</th>
          <th width="30%"></th>
        </tr>';
        $sql = "SELECT * FROM data_time";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>" . $row["start_time"]."</td><td>". $row["end_time"].'</td><td style="display:flex;">
          <form action="edit.php" method="GET"><button type="submit" name="edit" value="'.$row['id_time'].'" style=" background-color:transparent; border:none;"><img src="pen.png" style="width: 70%;"></button></form>
          <form action="delete.php" method="GET"><button type="submit" name="hapus" value="'.$row['id_time'].'" style="background-color:transparent; border:none;"><img src="delete.png" style="width: 70%;"></button></form>
          </td></tr>';
        }?>
    </body>
</html>