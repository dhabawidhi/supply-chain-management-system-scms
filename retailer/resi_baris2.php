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

	$resi=$_GET["id"];
	//echo substr($resi,18,21);
	$no_resi=substr($resi,19,21);
	//echo $resi;
	//else Redirect(''.$jabatan.'/index.php', false);
	if(isset($_POST['cariresi']))
	{
		$resi=$_POST["resi"];
		Redirect('resi.php?id='.$resi.'',false);
	}
?>

<html lang="en">

	<title>Supplier Kain - Konfirmasi Pesanan RMO</title>
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
			$queryM="SELECT id_retailer, id_manufaktur FROM resi_pesanan_barang WHERE nomor_resi_angka='$no_resi'";
			$ok4=mysql_query($queryM);
			while($okk4=mysql_fetch_array($ok4)){
				$id_retailer=$okk4['id_retailer'];
				$id_manufaktur=$okk4['id_manufaktur'];
			}
			
			?>
			<?php
				if($no_resi=="") echo '
					<br>
					<br>
						<div class="alert alert-warning">
  							<strong>Tidak ditemukan,</strong> Maaf resi anda tidak ditemukan, mohon cek kembali resi anda. 
						</div>
					';
				else{
			?>
			<h1>

				<div class="row">
					<div class="col-sm-2"><label for="text">ID Pemesan</label></div>
					<div class="col-sm-4"><label for="text">:<?php echo " ".$id_retailer; ?></label></div>
				</div>
				<div class="row">
					<div class="col-sm-2"><label for="text">ID Pengirim</label></div>
					<div class="col-sm-4"><label for="text">:<?php echo " ".$id_manufaktur; ?></label></div>
				</div>
				<div class="row">
					<div class="col-sm-2"><label for="text">Resi</label></div>
					<div class="col-sm-8"><label for="text">:<?php echo " ".$resi; ?></label></div>
				</div>
				</h1>
				<form method="post">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>ID Barang</th>
							<th>Nama Barang</th>
							<th>Ukuran</th>
							<th>Jenis</th>
							<th>Jumlah</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
				<?php
				$query1="SELECT * FROM resi_pesanan_barang WHERE nomor_resi_angka='$no_resi'";
				$ok2=mysql_query($query1);
				
				while($okk2=mysql_fetch_array($ok2)){
					$nomor_resi=$okk2['nomor_resi'];
					if($nomor_resi!="")
						
						$tanggal=$okk2['tanggal'];
						for($i=1;$i<=20;$i++){
							$id_barang[$i]=$okk2['id_barang'.$i.''];
							$jumlah[$i]=$okk2['jumlah'.$i.''];
							$status[$i]=$okk2['status'.$i.''];
							if($id_barang[$i]!=""){
								$query2="SELECT * FROM barang WHERE id_barang='$id_barang[$i]'";
								$ok3=mysql_query($query2);
								while($okk3=mysql_fetch_array($ok3)){
									$nama_barang=$okk3['nama_barang'];
									$jenis=$okk3['jenis_barang'];
									$ukuran=$okk3['ukuran'];
									$harga_per=$okk3['hitung_per'];
								}
								echo '<tr>';
								echo '<td>' .$id_barang[$i].'</td>';
								echo '<td>' .$nama_barang.'</td>';
								echo '<td>' .$ukuran.'</td>';
								echo '<td>' .$jenis.'</td>';
								echo '<td>' .$jumlah[$i].' '.$harga_per.'</td>';
								echo '<td>' .$status[$i].'</td>';
								echo '</tr>';
								echo '<input type="hidden" name="id_brg'.$i.'" value="'.$id_barang[$i].'">';
							}
							else if($id_barang[$i]=="") break;
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
			if($tanggal=="") false;
			else	echo '<p><var>Last Update <strong>'.$tanggal.'</strong></var></p>';
			}
			?>
				
			</form>
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