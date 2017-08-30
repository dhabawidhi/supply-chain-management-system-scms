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
$id_manufaktur=$_GET['id'];
//echo "Today is " . date('Y'.'m'.'d');
$resi= $id.''.$id_manufaktur.''.date('Y'.'m'.'d');
//$_SESSION("resi")="$resi";
$query3="SELECT * FROM manufaktur_barang WHERE id_manufaktur='$id_manufaktur'";
$ok4=mysql_query($query3);
while($okk5=mysql_fetch_array($ok4)){

}

	//Redirect('../resi.php?id='.$resi_asli.'',false);

//echo $id_manufaktur;
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
			<?php include"header.php";?>
		</div>	
	</div>
	
	<div id="main-wrapper">
		<div class="wrapper style">
			<div class="container">
			<?php include "pencarian_resi.php";?>
			<?php
			$queryM="SELECT * FROM user WHERE id='$id_manufaktur'";
			$ok4=mysql_query($queryM);
			while($okk4=mysql_fetch_array($ok4)){
				$nama=$okk4['nama'];
				$jabatan=$okk4['jabatan'];
				$lokasi=$okk4['lokasi'];
			}

			?>
			<br>
			<br>
			<br>
			
			<?php
			if(isset($_POST['pesan'])){
				$for=$_POST["for"];
				//echo $for;
				$for=substr($for,3,4);
				//echo $for;
				$for=$for%20;
				$for2=$for;
				//echo $for;
				$queryresi="INSERT INTO resi_pesanan_barang(nomor_resi,id_retailer,id_manufaktur) VALUES('$resi','$id','$id_manufaktur')";
				//echo $queryresi;
				$ok7=mysql_query($queryresi);
				$queryangka="SELECT nomor_resi_angka FROM resi_pesanan_barang WHERE nomor_resi='$resi'";
				$ok6=mysql_query($queryangka);
				while($okk6=mysql_fetch_array($ok6)){
					$no_resi=$okk6['nomor_resi_angka'];
				}
				$c=0;
				//echo $nomor_resi_angka;
				for(;$for>0;$for--){
					//$jumlah_pesan_barang[$i]=$_POST["jumlah$i"];
					//$id_brg2[$i]=$_POST["id_brg$i"];
					//echo $id_brg2[$i];
					if($_POST["jumlah$for"]!=false && $_POST["id_brg$for"]!=false) {
						{
							$jumlahbrg=$_POST["jumlah$for"];
							$idbrg=$_POST["id_brg$for"];
							$queryfor="UPDATE resi_pesanan_barang SET id_barang$for='$idbrg', jumlah$for='$jumlahbrg' WHERE nomor_resi_angka='$no_resi'";
							$ok8=mysql_query($queryfor);
							$c++;
							//echo $queryfor;
							//echo $queryfor;

						}
						
					}
					//else echo $id_brg2[$i];
					//else echo $i;
					
				}
				$c=$for2-$c;
				if($c==$for2) echo '
								<div class="alert alert-warning">
								  <strong>Mohon masukkan minimal satu pemesanan barang</strong>
								</div>';
				
				if($c!=$for2){	
					if($no_resi<10) $no_resi_string= '00'.$no_resi;
					else if($no_resi<100) $no_resi_string= '0'.$no_resi;
					else $no_resi_string=$no_resi;
					$resi_asli= $resi.''.$no_resi_string;
					//echo $no_resi_string;
					Redirect('../resi.php?id='.$resi_asli.'',false);
					}
				}
			?>
			<h1>
			<div class="row">
				<div class="col-sm-2"><label for="text">ID Pemesan</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$id; ?></label></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><label for="text">ID Pengirim</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$id_manufaktur; ?></label></div>
			</div>
			<div class="row">
				<div class="col-sm-2"><label for="text">Lokasi</label></div>
				<div class="col-sm-4"><label for="text">:<?php echo " ".$lokasi; ?></label></div>
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
						<th>Pesan Per</th>
					</tr>
				</thead>
				<tbody>
			<?php
			$query1="SELECT * FROM manufaktur_barang WHERE id_manufaktur='$id_manufaktur'";
			$ok2=mysql_query($query1);
			while($okk2=mysql_fetch_array($ok2)){
				
				for($i=1;$i<=20;$i++){
					$id_barang[$i]=$okk2['id_barang'.$i.''];
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
						echo '<td><input type="text" name=jumlah'.$i.' placeholder="jumlah"></td>';
						echo '<td>' .$harga_per.'</td>';
						echo '</tr>';
						echo '<input type="hidden" name="id_brg'.$i.'" value="'.$id_barang[$i].'">';
						echo '<input type="hidden" name="for" value="for'.$i.'">';
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

	<script src="../../assets/js/jquery.min.js"></script>
	<script src="../../assets/js/jquery.dropotron.min.js"></script>
	<script src="../../assets/js/skel.min.js"></script>
	<script src="../../assets/js/skel-viewport.min.js"></script>
	<script src="../../assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="../../assets/js/main.js"></script>
</body>
</html>