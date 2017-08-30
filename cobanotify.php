<!DOCTYPE <!DOCTYPE html>
<?php 
	include "connect.php";
	function Redirect($url, $permanent = false)
	{
	    if (headers_sent() === false)
	    {
	    	header('Location: ' . $url, true, ($permanent === true) ? 301 : 302);
	    }

	    exit();
	}
	session_start();
	$_SESSION["username"]="";
	if($_SESSION["username"]!=""){
		//echo $username;
		$query="SELECT jabatan FROM user where username='$username'";
		$ok=mysql_query($query);
		while($okk=mysql_fetch_array($ok))
			$jabatan=$okk['jabatan'];
		if ($jabatan!="")Redirect(''.$jabatan.'/index.php', false);
	}
	//else Redirect(''.$jabatan.'/index.php', false);
?>

<html lang="en">
<head>
	<title>Supplier Kain - Konfirmasi Pesanan RMO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="bootstrap-3.3.6\dist\css\bootstrap.min.css">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<script src="bootstrap-3.3.6\dist\js\bootstrap.min.js"></script>
</head>
<body class="no-sidebar">
	<div id="header-wrapper">
		<div class="container">

		<!-- Header -->
			<header id="header">
				<div class="inner">

					<!-- Logo -->
				<h1><a href="index.html" id="logo">Supply Chain Management RMO</a></h1>

			<!-- Nav -->
				<nav id="nav">					
					<ul>
						<li class="current_page_item"><a href="index.html">Daftar Pesanan</a></li>
						<li><a href="left-sidebar.html">Daftar Bahan</a></li>
						<li><a href="login.php">Login</a></li>
					</ul>
				</nav>


				</div>
			</header>
		</div>	
	</div>
	
	<div id="main-wrapper">
		<div class="wrapper style">
			<div class="container">
			</div>
		</div>
	</div>

	<!-- Scripts -->

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.dropotron.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/skel-viewport.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>
</body>
</html>