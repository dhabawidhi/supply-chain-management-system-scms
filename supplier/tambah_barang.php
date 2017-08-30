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
//for($i=1;$i>=0;$i--) Redirect('',false);

?>
<html lang="en">
<head>
	<title><?php echo $nama;?> Retailer - SCMS RMO</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="../bootstrap-3.3.6/dist/css/bootstrap.min.css">
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="../assets/css/main.css" />
		<link rel="stylesheet" href="../font-awesome-4.6.3/font-awesome.min.css">
		<link rel="stylesheet" href="../font-awesome-4.6.3/font-awesome.css">
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<script type='text/javascript' src="../src/jquery.min.js"></script>
		<script src="../src/jquery202.min.js"></script>
		<script src="../bootstrap-3.3.6/dist/js/bootstrap.min.js"></script>
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
			
			<br>
			<br>

		<h1><p class="text-center">Tambah barang</p></h1>
			<?php
			
			if(isset($_POST['tambah'])){
					$idbarang=$_POST["id_barang"];

					$idbarang=strtoupper($idbarang);
					$jumlah=$_POST["jumlah"];
					$nama_barang=$_POST["nama_barang"];
					$jenis_barang=$_POST["jenis_barang"];
					$cara_pembuatan=$_POST["cara_pembuatan"];
					$hitung_per=$_POST["hitung_per"];
					$ukuran=$_POST["ukuran"];
					$ukuran=strtoupper($ukuran);
					if($idbarang=="") echo '<div class="alert alert-warning">
				  						<strong>Mohon masukkan IDbarang</strong></a>
											</div>';
					else if($idbarang!=""&&$nama_barang!=""&&$jenis_barang!=""&&$cara_pembuatan!=""&&$hitung_per!=""){
						$query5="INSERT INTO `barang`(`id_barang`, `nama_barang`, `jenis_barang`, `cara_pembuatan`, `hitung_per`, `ukuran`) VALUES ('$idbarang','$nama_barang','$jenis_barang','$cara_pembuatan','$hitung_per','$ukuran')";
						$okk5=mysql_query($query5);
						$query2="SELECT * FROM manufaktur_barang where id_manufaktur='$id'";
						echo $query2;
							//echo $query2;
							//echo $query2;
							$ok2=mysql_query($query2);
							while($okk2=mysql_fetch_array($ok2)){
								for($i=1;$i<=20;$i++){
									$id_barang=$okk2['id_barang'.$i.''];
									//echo $id_bahan;
									//$harga=$okk2['harga'.$i.''];
									$jumlah_barang=$okk2['jumlah'.$i.''];
									if($idbarang==$id_barang){
										//echo $jumlah_bahan;
										//echo $jumlah;
										$jumlah2=$jumlah_barang+$jumlah;

										//echo $jumlah2;
										$query3="UPDATE manufaktur_barang SET jumlah$i='$jumlah2' WHERE id_manufaktur='$id'";
										//echo $query3;
										$okk3=mysql_query($query3);
										break;
									}
									else if($id_barang=="") {
										//$query4="INSERT INTO retailer_asal_bahannya(id_bahan$i,jumlah_bahan$i,id_asal_manufaktur$i) VALUES('$idbahan','$jumlah','$idmanufaktur') WHERE id_retailer='$id'";
										$query4="UPDATE supplier SET id_barang$i='$idbarang',jumlah$i='$jumlah2' WHERE id_manufaktur='$id'";
										echo $query4;
										//echo $query4;
										//echo $query4;
										$okk4=mysql_query($query4);
										break;
										//echo $query4;
									}
								}
								echo '<div class="alert alert-success">
						  						<strong>Sukses menambahkan barang!</strong> silahkan cek bahan <a href="index/daftarbarang.php">disini</a>
													</div>';
							}
					}
					else{
							$query2="SELECT * FROM manufaktur_barang where id_manufaktur='$id'";
							echo $query2;
							//echo $query2;
							//echo $query2;
							$ok2=mysql_query($query2);
							while($okk2=mysql_fetch_array($ok2)){
								for($i=1;$i<=20;$i++){
									$id_barang=$okk2['id_barang'.$i.''];

									$jumlah_barang=$okk2['jumlah'.$i.''];
									if($idbarang==$id_barang){
										//echo $jumlah_barang;
										//echo $jumlah;
										$jumlah2=$jumlah_barang+$jumlah;
										//echo $jumlah2;
										$query3="UPDATE manufaktur_barang SET jumlah$i='$jumlah2' WHERE id_manufaktur='$id'";
										//echo $query3;
										$okk3=mysql_query($query3);
										break;
									}
									else if($id_barang=="") {
										//$query4="INSERT INTO retailer_asal_barangnya(id_barang$i,jumlah_barang$i,id_asal_manufaktur$i) VALUES('$idbarang','$jumlah','$idmanufaktur') WHERE id_retailer='$id'";
										$query4="UPDATE manufaktur_barang SET id_barang$i='$idbarang',jumlah$i='$jumlah' WHERE id_manufaktur='$id'";
										echo $query4;
										//echo $query4;
										//echo $query4;
										$okk4=mysql_query($query4);
										break;
										//echo $query4;
									}
								}
								echo '<div class="alert alert-success">
						  						<strong>Sukses menambahkan barang!</strong> silahkan cek barang <a href="index/daftarbarang.php">disini</a>
													</div>';
							}
						}
					}
				//if(isset($_POST["tambah"])){echo "Hello World";}	
			?>

			 <form class="form-horizontal" role="form" method="post">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">ID barang:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" maxlength="5" name="id_barang" placeholder="ID barang">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Nama Barang:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="nama_barang" placeholder="Nama barang">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Jumlah:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="jumlah" placeholder="Jumlah">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Hitung per:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="hitung_per" placeholder="Hitung per">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Jenis barang:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="jenis_barang" placeholder="Jenis barang">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Cara pembuatan:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="cara_pembuatan" placeholder="Cara pembuatan">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Ukuran:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="ukuran" placeholder="Ukuran">
			    </div>
			  </div>

			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="tambah" value="tambah" class="btn btn-primary">Submit</button>
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