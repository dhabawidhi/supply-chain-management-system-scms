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
if(isset($_POST['tambah'])){
	Redirect('tambah_barang.php', false);
}
?>
<html lang="en">
<head>
	<title><?php echo $nama;?> Retailer - SCMS RMO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../font-awesome-4.6.3/font-awesome.min.css">
	<link rel="stylesheet" href="../font-awesome-4.6.3/font-awesome.css">
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
	<script src="../src/jquery.min.js"></script>
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
			?>
			<br>
			</form>
			<table class="table table-striped">
				<h3>Daftar Barang</h3>
				<thead>
					<tr>
						<th>ID Barang</th>
						<th>Nama Barang</th>
						<th>Ukuran</th>
						<th>Jumlah</th>
						<th>ID Asal Manufaktur</th>
						<th>Edit Jumlah</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$query1="SELECT * FROM retailer_asal_barangnya R WHERE R.id_retailer='$id'";
			$ok2=mysql_query($query1);
			while($okk2=mysql_fetch_array($ok2)){
				
				for($i=1;$i<=20;$i++){
					$id_barang[$i]=$okk2['id_barang'.$i.''];
					$jumlah_barang[$i]=$okk2['jumlah_barang'.$i.''];
					$id_asal_manufaktur[$i]=$okk2['id_asal_manufaktur'.$i.''];
					if($id_barang[$i]!=""){
						$query2="SELECT * FROM barang WHERE id_barang='$id_barang[$i]'";
						$ok3=mysql_query($query2);
						while($okk3=mysql_fetch_array($ok3)){
							$nama_barang=$okk3['nama_barang'];
							$hitung_per=$okk3['hitung_per'];
							$ukuran=$okk3['ukuran'];
						}
						echo '<tr>';
						echo '<td>' .$id_barang[$i].'</td>';
						echo '<td>' .$nama_barang.'</td>';
						echo '<td>' .$ukuran.'</td>';
						echo '<td>' .$jumlah_barang[$i].' '.$hitung_per.'</td>';
						echo '<td>'.'<a href=lihat_manufaktur.php?id='.$id_asal_manufaktur[$i].'>' .$id_asal_manufaktur[$i].'</a>'.'</td>';
						echo '<td>' .'<a href=edit.php?id='.$id_barang[$i].'&jumlah='.$jumlah_barang[$i].'&index='.$i.'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'.'</td>';
						echo '</tr>';
					}
					/*if($id_barang.$i!=""){
						echo '<td>'.$id_barang.$i.'</td';
						echo '<td>' .$jumlah_barang.$i.'</td>';
						echo '<td>' .$id_asal_manufaktur.$i.'</td>';
					}*/
				}
			} 
			echo '</tbody>';
			echo '</thead>';
			echo '</table>';
			?>
			<form method="post">	
				<div class="form-group">      
			      <div class="col-sm-offset-9 col-sm-3">
			        <button type="submit" href="#" class="btn btn-primary" value="tambah" name="tambah">Tambah Barang</button>
			      </div>
			    </div>
			</form>
			</div>
		</div>
	</div>

	<!-- Scripts -->

	<?php
		include "script.php";
	?>
</body>
</html>