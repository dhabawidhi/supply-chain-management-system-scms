<!DOCTYPE html>
<?php 
include "connect.php";
session_start();
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}


if(isset($_POST['login'])){
  $username=$_POST['username'];
  $password=$_POST['password'];
  $query="SELECT jabatan FROM user WHERE username='$username' and password ='$password'";
  $ok=mysql_query($query);
  $i =0;
  while($okk=mysql_fetch_array($ok)){
  	$i=$i+1;
  	$jabatan=$okk['jabatan'];
  }
  $jabatan=strtolower($jabatan);
  echo $jabatan;
  if($i==1){
  	$_SESSION["username"]="$username";
  }
  //echo $_SESSION["username"];
  $alamat="index/".$jabatan.".php";
  if ($jabatan!="")Redirect(''.$jabatan.'/index.php', false);
  else Redirect('login/login.php');
}
?>
<html lang="en">
<head>

  <meta charset="utf-8">
  <title>SCMS Login</title>
  <meta name="description" content="">
  <meta name="author" content="Padmanaban, Mine Web Design">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="RespopnsiveLogin/css/normalize.css">
  <link rel="stylesheet" href="ResponsiveLogin/css/style.css">

</head>
<body>
<div class="row">
	<div class="container">
		<h2 class="title">SCMS Rocky Mountain Outfitters</h2>
		<form class="form-signin" action="#" method="post">
			<h4 class="section-heading"><span>WEB - SIGN IN</span></h4>
			<div class="row">
				<div class="column">
					<label>USERNAME </label>
					<input id="username" class="full-width" type="text" name="username" placeholder="">
				</div>
			</div>
			<div class="row">
				<div class="column">
					<label>PASSWORD </label>
					<input id="password" class="full-width" type="password" name="password" placeholder="">
				</div>
			</div>
			<br/>
			<input class="button-submit" name="login" value="login" type="submit">
			<div class="row">
				<a href="#" class="forgot">Forgot your password? contact your administrator(dhabawidhikari@gmail.com)</a>
			</div>
		</form>
	</div>
</div>
<!-- Copyrights by Mine Web Design-->
</body>
</html>