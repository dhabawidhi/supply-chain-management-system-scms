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
$id_supplier=$_GET['id'];
//echo $id_manufaktur;
?>
<html lang="en">
<head>
	<title><?php echo $nama;?> Manufacturer - SCMS RMO</title>
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
			<?php include "pencarian_resi.php";?>
			<?php
			$queryM="SELECT * FROM user WHERE id='$id_supplier'";
			$ok4=mysql_query($queryM);
			while($okk4=mysql_fetch_array($ok4)){
				$nama=$okk4['nama'];
				$jabatan=$okk4['jabatan'];
				$lokasi=$okk4['lokasi'];
			}

			?>

			<h1>
			<div class="row">
				<div class="col-sm-1"><label for="text">ID</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$id_supplier; ?></label></div>
			</div>
			<div class="row">
				<div class="col-sm-1"><label for="text">Nama</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$nama; ?></label></div>
			</div>
			<div class="row">
				<div class="col-sm-1"><label for="text">Lokasi</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$lokasi; ?></label></div>
			</div>
			<div class="row">
				<div class="col-sm-1"><label for="text">Status</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$jabatan; ?></label></div>
			</div>
			</h1>
			<?php
				if(isset($_POST['pesan'])){
					Redirect('pesan_bahan.php?id='.$id_supplier.'',false);
				}
			?>
			<form method="post">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>ID Barang</th>
						<th>Nama Barang</th>
						<th>Jenis</th>
						<th>Harga</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$query1="SELECT * FROM supplier WHERE id_supplier='$id_supplier'";
			$ok2=mysql_query($query1);
			while($okk2=mysql_fetch_array($ok2)){
				
				for($i=1;$i<=20;$i++){
					$id_bahan[$i]=$okk2['id_bahan'.$i.''];
					$harga[$i]=$okk2['harga'.$i.''];
					if($id_bahan[$i]!=""){
						$query2="SELECT * FROM bahan WHERE id_bahan='$id_bahan[$i]'";
						$ok3=mysql_query($query2);
						while($okk3=mysql_fetch_array($ok3)){
							$nama_bahan=$okk3['nama_bahan'];
							$jenis=$okk3['jenis_bahan'];
							$hitung_per=$okk3['hitung_per'];
						}
						echo '<tr>';
						echo '<td>' .$id_bahan[$i].'</td>';
						echo '<td>' .$nama_bahan.'</td>';
						echo '<td>' .$jenis.'</td>';
						echo '<td>'.'Rp' .$harga[$i].'/'.$hitung_per.'</td>';
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

				<div class="form-group">        
			      <div class="col-sm-offset-10 col-sm-10">
			        <button type="submit" class="btn btn-primary" value="pesan" name="pesan">Pesan</button>
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