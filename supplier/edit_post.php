<!DOCTYPE <!DOCTYPE html>
<?php
include "..\connect.php";
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

$jumlah_brg=$_GET['jumlah'];
$jumlah_brg_sebelum=$_GET['sebelum'];
$jumlah_barangkei =$_SESSION["jumlah_barangi"];


//echo $id_brg;
//echo $id_manufaktur;
?>
<html lang="en">
<head>
	<title><?php echo $nama;?> Retailer - SCMS RMO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../font-awesome-4.6.3/font-awesome.min.css">
	<link rel="stylesheet" href="../font-awesome-4.6.3/font-awesome.css">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
</head>
<body class="no-sidebar">
	<div id="header-wrapper">
		<div class="container">

		<!-- Header -->
			<header id="header">
				<div class="inner">

					<!-- Logo -->
				<h1><a href="index.html" id="logo">Retail Store - SCMS RMO</a></h1>

			<!-- Nav -->
				<nav id="nav">					
					<ul>
						<li class="current_page_item"><a href="index.php">Daftar Barang</a></li>
						<li><a href="left-sidebar.html">Pesan</a></li>
						<li>
							<a href="#"><?php echo "$nama"; ?>
							<span class="caret"></span></a>
							<ul>
								<li><a href="#">Settings</a></li>
								<li><a href="logout.php" name="logout" value="logout">Log out</a></li>
							</ul>
						</li>
					</ul>
				</nav>


				</div>
			</header>
		</div>	
	</div>
	
	<div id="main-wrapper">
		<div class="wrapper style">
			<div class="container">
			<?php
				$query2="UPDATE retailer_asal_barangnya SET $jumlah_barangkei='$jumlah_brg' WHERE id_retailer='$id' and $jumlah_barangkei='$jumlah_brg_sebelum'";
				$ok=mysql_query($query2);
				echo $query2;
				if($ok==TRUE)
					echo '<div class="alert alert-success"><strong>Sukses mengupdate database, cek <a href="index.php">index</a></strong> .</div>';
			?>
			</div>
		</div>
	</div>

	<!-- Scripts -->

	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/jquery.dropotron.min.js"></script>
	<script src="../assets/js/skel.min.js"></script>
	<script src="../assets/js/skel-viewport.min.js"></script>
	<script src="../assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="../assets/js/main.js"></script>
</body>
</html>