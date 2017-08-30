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
if(isset($_POST['logout']))
{
	session_unset();
	session_destroy();
	Redirect('../../index.php',false);
}
//$id_manufaktur=$_GET['id'];
//echo "Today is " . date('Y'.'m'.'d');
$no_resi=$_GET['id'];
$query3="SELECT nomor_resi FROM resi_pesanan_bahan where nomor_resi_angka='$no_resi'";
$ok5=mysql_query($query3);
while($okk5=mysql_fetch_array($ok5)){
	$resi=($okk5['nomor_resi']);
}
if($no_resi<10) $no_resi_string= '00'.$no_resi;
else if($no_resi<100==0) $no_resi_string= '0'.$no_resi;
else $no_resi_string=$no_resi;
$resi_asli= $resi.''.$no_resi_string;
//echo $id_manufaktur;
//echo $resi_asli;

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
	<link rel="stylesheet" href="../../css/main.css">
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
			<?php
			include "pencarian_resi.php";
			$queryM="SELECT id_supplier, id_manufaktur FROM resi_pesanan_bahan WHERE nomor_resi_angka='$no_resi'";
			$ok4=mysql_query($queryM);
			while($okk4=mysql_fetch_array($ok4)){
				$id_supplier=$okk4['id_supplier'];
				$id_manufaktur=$okk4['id_manufaktur'];
			}

			?>
			<?php
				//$status1="";
				if(isset($_POST['update'])){
					error_reporting(0);
					$for=$_POST["for"];
					$for=substr($for,3);
					$for2=$for-1;
					$j=$for2;
					//echo $for;
					for($j=1;$j<=20;$j++)
					{
						$statuss[$j]=$_POST['status'.$j.''];
						$statuskej= 'status'.$j;
						$query4="UPDATE resi_pesanan_bahan SET $statuskej='$statuss[$j]' WHERE nomor_resi_angka='$no_resi'";
						$okk5=mysql_query($query4);
					}
					$today = date("d M Y");
					//echo $today;
					$query4="UPDATE resi_pesanan_bahan SET tanggal='$today', jam=now() WHERE nomor_resi_angka='$no_resi'";
					//echo $query4;
					$okk5=mysql_query($query4);
				//$jumlah_bahan_update=$_POST['jumlah_update'];
				//Redirect('edit_post.php?jumlah='.$jumlah_bahan_update.'&sebelum='.$jumlah_brg.'',false);
					echo '<div class="alert alert-success">
  						<strong>Sukses mengupdate status pesanan</strong> <a href="supplier/pesanan.php">Kembali ke daftar pesanan</a>
							</div>';
				}
			?>

			<h1>
			<div class="row">
				<div class="col-sm-2"><label for="text">ID Pemesan</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$id_manufaktur; ?></label></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><label for="text">ID Pengirim</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$id_supplier; ?></label></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><label for="text">Resi</label></div>
				<div class="col-sm-8"><label for="text">:<?php echo " ".$resi_asli; ?></label></div>
			</div>
			</h1>
			<form method="post">
			<table class="table table-striped">
					<thead>
						<tr>
							<th>ID bahan</th>
							<th>Nama bahan</th>
							<th>Jenis</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
				<?php
				$query4="SELECT * FROM supplier WHERE id_supplier='$id_supplier'";
				$ok4=mysql_query($query4);
				while($okk4=mysql_fetch_array($ok4)){
					for($i=1;$i<=20;$i++){
						$harga[$i]=$okk4['harga'.$i.''];
						$id_bhn[$i]=$okk4['id_bahan'.$i.''];
						if($id_bhn[$i]=="") break;
					}
				}
				$query1="SELECT * FROM resi_pesanan_bahan WHERE nomor_resi_angka='$no_resi'";
				$ok2=mysql_query($query1);
				$total=0;

				while($okk2=mysql_fetch_array($ok2)){
					$nomor_resi=$okk2['nomor_resi'];
					if($nomor_resi!="")
						$tanggal=$okk2['tanggal'];
						for($i=1;$i<=20;$i++){
							$id_bahan[$i]=$okk2['id_bahan'.$i.''];
							$jumlah[$i]=$okk2['jumlah'.$i.''];
							$status[$i]=$okk2['status'.$i.''];
							if($id_bahan[$i]!=""){
								$query2="SELECT * FROM bahan WHERE id_bahan='$id_bahan[$i]'";
								$ok3=mysql_query($query2);
								while($okk3=mysql_fetch_array($ok3)){
									$nama_bahan=$okk3['nama_bahan'];
									$jenis=$okk3['jenis_bahan'];
									$harga_per=$okk3['hitung_per'];
								}
								echo '<tr>';
								echo '<td>' .$id_bahan[$i].'</td>';
								echo '<td>' .$nama_bahan.'</td>';
								echo '<td>' .$jenis.'</td>';
								echo '<td>' .$jumlah[$i].' '.$harga_per.'</td>';
								echo '<td>Rp' .$jumlah[$i]*$harga[$i].'</td>';
								echo '<td>' .'<input type="text" list="status" value="'.$status[$i].'"" placeholder="'.$status[$i].'" name="status'.$i.'">'.'</td>';
								echo '<datalist id="status">';
									echo '<option value="">';
									echo '<option value="Siap dikirim">';
									echo '<option value="Siap dikirim dalam 2 hari">';
									echo '<option value="Siap dikirim dalam 3 hari">';
									echo '<option value="Sedang dikirim">';
									echo '<option value="Sudah diterima">';
								echo '</datalist>';
								echo '</tr>';
								echo '<input type="hidden" name="id_brg'.$i.'" value="'.$id_bahan[$i].'">';
								$total=$total+($jumlah[$i]*$harga[$i]);
							}
							
							/*if($id_bahan.$i!=""){
								echo '<td>'.$id_bahan.$i.'</td';
								echo '<td>' .$jumlah_bahan.$i.'</td>';
								echo '<td>' .$id_asal_manufaktur.$i.'</td>';
							}*/
						}
					}	
			echo '<tr>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td></td>';
			echo '<td>Total Harga:</td>';
			echo '<td>Rp'.$total.'</td>';
			echo '<td></td>';
			echo '</tr>'; 
			echo '</tbody>';
			echo '</thead>';
			echo '</table>';
			?>

				<div class="form-group">        
			      <div class="col-sm-offset-10 col-sm-10">
			        <button type="submit" class="btn btn-primary" value="update" name="update">Update Pesanan</button>
			      </div>
			    </div>
			</form>
				
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