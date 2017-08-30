<!DOCTYPE html>
<?php
include "..\connect.php";
if(isset($_POST['tambah'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $nama=$_POST['nama'];
  $lokasi=$_POST['lokasi'];
  $id=$_POST['id'];
  $jabatan=$_POST['jabatan'];
  $query="INSERT INTO user(username, password, nama, lokasi, id, jabatan) VALUES ('$username','$password','$nama','$lokasi','$id','$jabatan')";
  echo $query;
  $ok=mysql_query("INSERT INTO user(username, password, nama, lokasi, id, jabatan) VALUES ('$username','$password','$nama','$lokasi','$id','$jabatan')");
  if($ok==TRUE)
    echo "berhasil";
  else echo "error";
  echo $username;
}
?>
<html lang="en">
<head>
  <title>Input Username</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>


<div class="container">
<?php
    echo "username;";
?>
  <h2>Input User</h2>
  <div class="container">
  <form class="form-horizontal" role="form" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="text">Username:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="username" id="text" placeholder="username">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="pwd">Password:</label>
      <div class="col-sm-10">          
        <input type="password" class="form-control" name="password" id="pwd" placeholder="Enter password">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="text">Nama:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="nama" id="text" placeholder="nama">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="text">Lokasi:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="lokasi" id="text" placeholder="lokasi">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="text">id:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="id" id="text" placeholder="id">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="text">jabatan:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" name="jabatan" id="text" placeholder="jabatan">
      </div>
    </div>
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default" value="tambah" name="tambah">Submit</button>
      </div>
    </div>
  </form>
  </div>
</div>

</body>
</html>
