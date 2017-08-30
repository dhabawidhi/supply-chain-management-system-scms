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
//$id_manufaktur=$_GET['id'];
//echo "Today is " . date('Y'.'m'.'d');
$no_resi=$_GET['id'];
$query3="SELECT nomor_resi FROM resi_pesanan_barang where nomor_resi_angka='$no_resi'";
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
						<li><a href="index.php">Daftar Barang</a></li>
						<li class="current_page_item"><a href="left-sidebar.html">Pesan</a></li>
						<li>
							<a href="#"><?php echo "$nama"; ?>
							<span class="caret"></span></a>
							<ul>
								<li><a href="#">Settings</a></li>
								<li><a href="../logout.php" name="logout" value="logout">Log out</a></li>
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
			$queryM="SELECT id_retailer, id_manufaktur FROM resi_pesanan_barang WHERE nomor_resi_angka='$no_resi'";
			$ok4=mysql_query($queryM);
			while($okk4=mysql_fetch_array($ok4)){
				$id_retailer=$okk4['id_retailer'];
				$id_manufaktur=$okk4['id_manufaktur'];
			}

			?>
			<?php
				//$status1="";
				if(isset($_POST['update'])){
					$for=$_POST["for"];
					$for=substr($for,3);
					$for2=$for-1;
					$j=$for2;
					//echo $for;
					for(;$j>0;$j--)
					{
						$statuss[$j]=$_POST['status'.$j.''];
						$statuskej= 'status'.$j;
						$query4="UPDATE resi_pesanan_barang SET $statuskej='$statuss[$j]' WHERE nomor_resi_angka='$no_resi'";
						$okk5=mysql_query($query4);
					}
					$today = date("d M Y H:i");
					//echo $today;
					$query4="UPDATE resi_pesanan_barang SET tanggal='$today' WHERE nomor_resi_angka='$no_resi'";
					//echo $query4;
					$okk5=mysql_query($query4);
				//$jumlah_barang_update=$_POST['jumlah_update'];
				//Redirect('edit_post.php?jumlah='.$jumlah_barang_update.'&sebelum='.$jumlah_brg.'',false);
					echo '<div class="alert alert-success">
  						<strong>Sukses mengupdate status pesanan</strong> <a href="pesanan.php">Kembali ke daftar pesanan</a>
							</div>';
				}
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
				<div class="col-sm-8"><label for="text">:<?php echo " ".$resi_asli; ?></label></div>
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
			echo '<input type="hidden" name="for" value="for'.$i.'">';
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