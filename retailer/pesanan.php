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
$query3="SELECT count(lihat) FROM resi_pesanan_barang WHERE id_manufaktur='$id'";
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
	<title><?php echo $nama;?> Retailer - SCMS RMO</title>
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
			<?php
				include "pencarian_resi.php";
			?>
			<br>
			<form method="post">
			<?php
			
			?>
			</form>
			<table class="table table-striped">
				<h3>Daftar Pesanan</h3>
				<thead>
					<tr>
						<th>Nomor</th>
						<th>Resi</th>
						<th>Nama Manufaktur Tujuan</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$query1="SELECT nomor_resi, nomor_resi_angka, id_manufaktur FROM resi_pesanan_barang WHERE id_retailer='$id'";
			$ok2=mysql_query($query1);
			$j=1;
			while($okk2=mysql_fetch_array($ok2)){
				$id_manufaktur=$okk2['id_manufaktur'];
				$nomor_resi=$okk2['nomor_resi'];
				$no_resi=$okk2['nomor_resi_angka'];
				if($no_resi<10) $no_resi_string= '00'.$no_resi;
				else if($no_resi<100) $no_resi_string= '0'.$no_resi;
				else $no_resi_string=$no_resi;
				$resi_asli[$j]= $nomor_resi.''.$no_resi_string;
				$query5="SELECT nama FROM user where id='$id_manufaktur'";
				$ok6=mysql_query($query5);
				while($okk6=mysql_fetch_array($ok6))
				{
					$nama=$okk6['nama'];
					echo '<tr>';
					echo '<td>' .$j.'</td>';
					echo '<td>' .$resi_asli[$j].'</td>';
					echo '<td>' .$nama.'</td>';
					//echo '<td>' .'<a href="retailer/resi.php?id='.$no_resi.'"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'.'</td>';
					echo '</tr>';
				}	
				$j++;
			
			} 
			echo '</tbody>';
			echo '</thead>';
			echo '</table>';
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