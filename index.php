<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {font-family: Arial, Helvetica, sans-serif;
background-image:url("https://png.pngtree.com/thumb_back/fw800/background/20200907/pngtree-green-hand-drawn-blackboard-education-school-supplies-background-image_397994.jpg");
}
form {border: 3px solid #f1f1f1;}
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.boxi{
  width: 40%;
  box-sizing: border-box;
  border-radius: 15px;
  box-shadow: 0px 0px 10px rgba(0,0, 0, 1);
  padding: 5px;
  margin-bottom:;
  float:right;
  color:white;
  margin-top:120px;
  margin-right:70px;
}
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}
button:hover {
  opacity: 0.8;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}
/* Change styles for span and cancel button on extra small screens */

</style>
</head>
<body>

<form class="boxi" method="POST">
  <div class="imgcontainer">
    <h3>INFORMASI AKADEMIK</h3>
  </div>

  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="text" placeholder="Enter Password" name="psw" required>
        
    <button type="submit" name="cek">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

  <div>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</body>
</html>
<?php 
require("connect.php");
if(isset($_POST['cek'])){
  $uname = $_POST["uname"];
  $psw = $_POST['psw'];
  $sql="SELECT * FROM akun WHERE username = '$uname'";
  $result = $conn->query($sql);  
  $cek = mysqli_num_rows($result);
  if($cek > 0){
    $data = $result->fetch_assoc();
    if($psw==$data["password"]){
      switch($data['posisi']){
        case 1:header("Location:vAdmin.php?id='$uname'");
        break;
        case 2:header("Location:vSiswa.php?id='$uname'");
        break;
        case 3:header("Location:vGuru.php?id='$uname'");
        break;
      }
    }else{
      echo '<script>alert("Password Username salah")</script>';
      header("Location:login.php");
    }
  }else{
    echo '<script>alert("Username tidak ditemukan")</script>';
  }
}
?>