<!DOCTYPE <!DOCTYPE html>
<?php 
include "../connect.php";
session_start();
function Redirect($url, $permanent = false)
{
    if (headers_sent() === false)
    {
    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
    }

    exit();
}
$username= $_SESSION["username"];
if($_SESSION["username"]==false) Redirect('../login.php', false);
$query="SELECT * FROM user WHERE username='$username'";
$ok=mysql_query($query);
while($okk=mysql_fetch_array($ok)){
	$nama=$okk['nama'];
	$id=$okk['id'];
}
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	Redirect('../index.php',false);
}

	$resi=$_GET["id"];
	//echo substr($resi,18,21);
	$no_resi=substr($resi,19,21);
	$pemesan=substr($resi,0,1);
	//echo $resi;
	//else Redirect(''.$jabatan.'/index.php', false);
	if(isset($_POST['cariresi']))
	{
		$resi=$_POST["resi"];
		Redirect('resi.php?id='.$resi.'',false);
	}
?>

<html lang="en">

	<title><?php echo $nama;?></title>
	<?php include "meta.php";?>
</head>
<body class="no-sidebar">
	<div id="header-wrapper">
		<div class="container">

		<!-- Header -->
			<?php include "header.php";?>
		</div>	
	</div>
	
	<div id="main-wrapper">
		<div class="wrapper style">
			<div class="container">
			<form method="post">
				<div class="form-group">
				  <div class="col-sm-offset-8 col-sm-3">
				  	<input type="text" name="resi" placeholder="resi">
				  </div>      
			      <div class="col-sm-1">
			        <button type="submit" class="btn btn-primary" value="cariresi" name="cariresi">Search</button>
			      </div>
			    </div>
			</form>
			
			<?php
				if($pemesan=="M")
					include "cari_resi_manufaktur.php";
				else include "cari_resi_retailer.php";
			?>
			
				
			</form>
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<?php include "script.php";?>
</body>
</html>