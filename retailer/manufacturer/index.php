<!DOCTYPE <!DOCTYPE html>
<?php
include "..\..\connect.php";
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
if($_SESSION["username"]==false) Redirect('../../login.php', false);
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
	Redirect('../../index.php',false);
}
//echo $id_manufaktur;
?>
<html lang="en">
<head>
	<title><?php echo $nama;?> Retailer - SCMS RMO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../font-awesome-4.6.3/font-awesome.min.css">
	<link rel="stylesheet" href="../../font-awesome-4.6.3/font-awesome.css">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../../assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<script src="../../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
</head>
<body class="no-sidebar">
	<div id="header-wrapper">
		<div class="container">


		<!-- Header -->
			<?php include"header.php";?>
		</div>	
	</div>
	
	<div id="main-wrapper">
		<div class="wrapper style">
			<div class="container">
			<?php include "pencarian_resi.php";?>
			<br><br>
			<h1><p class="text-center">Daftar Manufaktur RMO</p></h1>
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID Manufaktur</th>
						<th>Nama Manufaktur</th>
						<th>Lokasi</th>
					</tr>
				</thead>
				<tbody>
			<?php
				$query1="SELECT * FROM user WHERE jabatan='Manufacturer'";
				$ok2=mysql_query($query1);
				while($okk2=mysql_fetch_array($ok2)){
					$id_manufaktur=$okk2['id'];
					$nama=$okk2['nama'];
					$lokasi=$okk2['lokasi'];
					echo '<tr>';
					echo '<td><strong><a href="../lihat_manufaktur.php?id='.$id_manufaktur.'">' .$id_manufaktur.'</a></strong></td>';
					echo '<td>' .$nama.'</td>';
					echo '<td>' .$lokasi.'</td>';
					//echo '<td><button type="submit" href="#" class="btn btn-primary" value="pesan" name="pesan">Pesan</button></td>';
					echo '</tr>';
				} 
				echo '</tbody>';
				echo '</thead>';
				echo '</table>';
			?>
			</div>
		</div>
	</div>

	<!-- Scripts -->

	<script src="../../assets/js/jquery.min.js"></script>
	<script src="../../assets/js/jquery.dropotron.min.js"></script>
	<script src="../../assets/js/skel.min.js"></script>
	<script src="../../assets/js/skel-viewport.min.js"></script>
	<script src="../../assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="../../assets/js/main.js"></script>
</body>
</html>