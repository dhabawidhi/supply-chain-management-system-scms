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
$id_brg=$_GET['id'];
$jumlah_brg=$_GET['jumlah'];
$index=$_GET['index'];
$id_brg_index= 'id_brg'.$index;
$jumlah_brg_index='jumlah_barang'.$index;
$_SESSION["jumlah_barangi"]=$jumlah_brg_index;

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
			$query3="SELECT * FROM barang where id_barang='$id_brg'";
			$ok4=mysql_query($query3);
			while($okk4=mysql_fetch_array($ok4)){
				$nama_bg=$okk4["nama_barang"];
				$hitung_per=$okk4["hitung_per"];
				$ukuran=$okk4["ukuran"];
			}
			?>
			<?php
				if(isset($_POST['update'])){
				$jumlah_barang_update=$_POST['jumlah_update'];
				Redirect('edit_post.php?jumlah='.$jumlah_barang_update.'&sebelum='.$jumlah_brg.'',false);
				}
			?>
			<form method="post">
			  <div class="form-group row">
			    <label class="col-sm-2 form-control-label">ID Barang</label>
			    <div class="col-sm-10">
			      <p class="form-control-static">:<?php echo $id_brg;?></p>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label class="col-sm-2 form-control-label">Nama</label>
			    <div class="col-sm-10">
			      <p class="form-control-static">:<?php echo $nama_bg;?></p>
			    </div>
			  </div>
			  <div class="form-group row">
			    <label class="col-sm-2 form-control-label">Jumlah</label>
			    <div class="col-sm-3">
			      <input type="text" class="form-control" name="jumlah_update" id="text" value="<?php echo $jumlah_brg ?>" placeholder="Jumlah Baru">
			    </div>
			    <div class="col-sm-3">
			    	<label class = "control-label col-sm-2" for="text"><?php echo $hitung_per;?></label>
			    </div>
			  </div>
			  <div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
			        <button type="submit" class="btn btn-primary" value="update" name="update">Update</button>
			      </div>
			    </div>
			</form>
			
			<!--
			<form class="form-horizontal" role="form" method="post">
				<div class="form-group">
			      <label class="control-label col-sm-2" for="text">ID Barang:</label>
			      <div class="col-sm-8">
			      	<label for="control-label col-sm-2"><?php echo $id_brg;?></label>
			      </div>
			    </div>
				<div class="row">
					<div class="col-sm-1">
			    	<label class="control-label col-sm-2" for="integer">Nama:</label>
			    	</div>
			      	<div class="col-sm-8">
			      	<label for="text">: <?php echo $nama_bg;?></label>
			      	</div>
			    </div>
			    <div class="row">
			    	<div class="col-sm-1"></div>
			    	<div class="col-sm-2">
			    	<label class="control-label col-sm-2" for="text">Jumlah:</label>
			    	</div>
			    	<div class="col-sm-3">
			      	<input type="text" class="form-control" name="jumlah" id="text" placeholder="<?php echo $jumlah_brg ?>">
			      	</div>
			      	<div class="col-sm-3">
			      	<label class = "control-label col-sm-2" for="text"><?php echo $hitung_per;?></label>
			      	</div>
			      </div>
			      <div class="col-sm">
			    </div>
				<div class="form-group">        
			      <div class="col-sm-offset-2 col-sm-10">
			        <button type="submit" class="btn btn-primary" value="update" name="update">Update</button>
			      </div>
			    </div>
		    </form>
			-->
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