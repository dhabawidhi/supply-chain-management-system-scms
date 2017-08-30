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
$query3="SELECT count(lihat) FROM resi_pesanan_barang WHERE id_manufaktur='$id' and lihat='0'";
$ok4=mysql_query($query3);
while($okk4=mysql_fetch_array($ok4)){
	$pemberitahuan=$okk4['count(lihat)'];
}
//echo $pemberitahuan;
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	Redirect('../index.php',false);
}

?>
<html lang="en">
<head>
	<title><?php if($pemberitahuan!=0) echo '('.$pemberitahuan.') '."$nama"; else echo $nama; ?> Manufacturer - SCMS RMO</title>
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
			<?php
				include "pencarian_resi.php";
				if(isset($_POST['daftarbarang']))
					{
						Redirect('index/daftarbarang.php',false);
					}
			?>
			</form>
			

				<h3>
					<form id="form" action="" method="post">
					    <div class="col-sm-offset-1 col-sm-3">
					    	<input onChange="this.form.submit();" type="radio" name="daftarbahan" value="1" checked="checked"> <a href="">Daftar Bahan</a>
					    </div>
					    <div class="col-sm-offset-1 col-sm-3">
					    	<input onChange="this.form.submit();" type="radio" name="daftarbarang" value="0"> <a href="index/daftarbarang.php">Daftar Barang</a>
					    </div>
					</form> 
				</h3>

				<?php
					include "daftarbahan.php"; 
					
					if(isset($_POST['tambah'])){
						Redirect('tambah_bahan.php', false);
					}
				?>
				<form action="tambah_bahan.php" method="post">	
					<div class="form-group">      
				      <div class="col-sm-offset-9 col-sm-3">
				        <button type="submit" href="#" class="btn btn-primary" value="tambah" name="">Tambah Bahan</button>
				      </div>
				    </div>
				</form>
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