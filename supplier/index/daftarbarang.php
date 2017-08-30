<!DOCTYPE <!DOCTYPE html>
<?php
include "../../connect.php";
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
	Redirect('../../index.php',false);
}

?>
<html lang="en">
<head>
	<title><?php if($pemberitahuan!=0) echo '('.$pemberitahuan.') '."$nama"; else echo $nama; ?> Manufacturer - SCMS RMO</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="../../bootstrap-3.3.6/dist/css/bootstrap.min.css">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="../../assets/css/main.css" />
	<link rel="stylesheet" href="../../font-awesome-4.6.3/font-awesome.min.css">
	<link rel="stylesheet" href="../../font-awesome-4.6.3/font-awesome.css">
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<script type='text/javascript' src="../../src/jquery.min.js"></script>
	<script src="../../src/jquery202.min.js"></script>
	<script src="../../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
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
			
			?>
			</form>
				<h3>
					<form id="form" action="" method="post">
					    <div class="col-sm-offset-1 col-sm-3">
					    	<input onChange="this.form.submit();" type="radio" name="daftarbahan" value="0" > <a href="../index.php">Daftar Bahan</a>
					    </div>
					    <div class="col-sm-offset-1 col-sm-3">
					    	<input onChange="this.form.submit();" type="radio" name="daftarbarang" value="1" checked="checked"> <a href="">Daftar Barang</a>
					    </div>
					</form> 
				</h3>

				<?php 
					if(isset($_POST['daftarbahan']))
					{
						Redirect('../index.php',false);
					}
				?>
				<br>
				<br>
				<h3>Daftar Barang di Gudang</h3>
				<table class="table table-striped">
					<thead>
							<tr>
								<th>ID Barang</th>
								<th>Nama Barang</th>
								<th>Ukuran</th>
								<th>Jenis Barang</th>
								<th>Jumlah</th>
								<th>Cara Pembuatan
								<th>Edit Jumlah</th>
							</tr>
						</thead>
						<tbody>
						<?php
						$query1="SELECT * FROM manufaktur_barang WHERE id_manufaktur='$id'";
						$ok2=mysql_query($query1);
						while($okk2=mysql_fetch_array($ok2)){
							
							for($i=1;$i<=20;$i++){
								$id_barang[$i]=$okk2['id_barang'.$i.''];
								$jumlah_barang[$i]=$okk2['jumlah'.$i.''];
								if($id_barang[$i]!=""){
									$query2="SELECT * FROM barang WHERE id_barang='$id_barang[$i]'";
									$ok3=mysql_query($query2);
									while($okk3=mysql_fetch_array($ok3)){
										$nama_barang=$okk3['nama_barang'];
										$jenis_barang=$okk3['jenis_barang'];
										$cara_pembuatan=$okk3['cara_pembuatan'];
										$hitung_per=$okk3['hitung_per'];
										$ukuran=$okk3['ukuran'];
									}
									echo '<tr>';
									echo '<td>' .$id_barang[$i].'</td>';
									echo '<td>' .$nama_barang.'</td>';
									echo '<td>' .$ukuran.'</td>';
									echo '<td>' .$jenis_barang.'</td>';
									echo '<td>' .$jumlah_barang[$i].'</td>';
									echo '<td>'.$cara_pembuatan.'</td>';
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
				<form action="../tambah_barang.php" method="post">	
					<div class="form-group">      
				      <div class="col-sm-offset-9 col-sm-3">
				        <button type="submit" href="#" class="btn btn-primary" value="tambah" name="">Tambah Barang</button>
				      </div>
				    </div>
				</form>
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