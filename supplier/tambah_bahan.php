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
$query3="SELECT count(lihat) FROM resi_pesanan_bahan WHERE id_supplier='$id' and lihat='0'";
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

		<h1><p class="text-center">Tambah bahan</p></h1>
			<?php
			
			if(isset($_POST['tambah'])){
					$idbahan=$_POST["id_bahan"];

					$idbahan=strtoupper($idbahan);
					$jumlah=$_POST["jumlah"];
					$nama_bahan=$_POST["nama_bahan"];
					$jenis_bahan=$_POST["jenis_bahan"];
					//$cara_pembuatan=$_POST["cara_pembuatan"];
					$hitung_per=$_POST["hitung_per"];
					//$ukuran=$_POST["ukuran"];
					$harga=$_POST["harga"];
					if($idbahan=="") echo '<div class="alert alert-warning">
				  						<strong>Mohon masukkan IDbahan</strong></a>
											</div>';
					else if($idbahan!=""&&$nama_bahan!=""&&$jenis_bahan!=""&&$hitung_per!=""){
						$query5="INSERT INTO `bahan`(`id_bahan`, `nama_bahan`, `jenis_bahan`,`hitung_per`) VALUES ('$idbahan','$nama_bahan','$jenis_bahan','$hitung_per')";
					//echo $query5;
					$okk5=mysql_query($query5);
					$query2="SELECT * FROM supplier where id_supplier='$id'";
							//echo $query2;
							//echo $query2;
							$ok2=mysql_query($query2);
							while($okk2=mysql_fetch_array($ok2)){
								for($i=1;$i<=20;$i++){
									$id_bahan=$okk2['id_bahan'.$i.''];
									//echo $id_bahan;
									$harga2=$okk2['harga'.$i.''];
									$jumlah_bahan=$okk2['jumlah'.$i.''];
									if($idbahan==$id_bahan){
										//echo $jumlah_bahan;
										//echo $jumlah;
										$jumlah2=$jumlah_bahan+$jumlah;

										//echo $jumlah2;
										$query3="UPDATE supplier SET jumlah$i='$jumlah2', harga$i='$harga' WHERE id_manufaktur='$id'";
										//echo $query3;
										$okk3=mysql_query($query3);
										break;
									}
									else if($id_bahan=="") {
										//$query4="INSERT INTO retailer_asal_bahannya(id_bahan$i,jumlah_bahan$i,id_asal_manufaktur$i) VALUES('$idbahan','$jumlah','$idmanufaktur') WHERE id_retailer='$id'";
										$query4="UPDATE supplier SET id_bahan$i='$idbahan',jumlah$i='$jumlah',harga$i='$harga' WHERE id_supplier='$id'";
										
										//echo $query4;
										//echo $query4;
										$okk4=mysql_query($query4);
										break;
										//echo $query4;
									}
								}
								echo '<div class="alert alert-success">
						  						<strong>Sukses menambahkan bahan!</strong> silahkan cek bahan <a href="index.php">disini</a>
													</div>';
							}
					}
					else{
							$query2="SELECT * FROM supplier where id_supplier='$id'";
							//echo $query2;
							//echo $query2;
							$ok2=mysql_query($query2);
							while($okk2=mysql_fetch_array($ok2)){
								for($i=1;$i<=20;$i++){
									$id_bahan=$okk2['id_bahan'.$i.''];

									$jumlah_bahan=$okk2['jumlah'.$i.''];
									if($idbahan==$id_bahan){
										//echo $jumlah_bahan;
										//echo $jumlah;
										$jumlah2=$jumlah_bahan+$jumlah;
										//echo $jumlah2;
										$query3="UPDATE supplier SET jumlasupplierah2' WHERE id_manufaktur='$id'";
										//echo $query3;
										$okk3=mysql_query($query3);
										break;
									}
									else if($id_bahan=="") {
										//$query4="INSERT INTO retailer_asal_bahannya(id_bahan$i,jumlah_bahan$i,id_asal_manufaktur$i) VALUES('$idbahan','$jumlah','$idmanufaktur') WHERE id_retailer='$id'";
										$query4="UPDATE supplier SET id_basupplierbahan',jumlah$i='$jumlah' WHERE id_manufaktur='$id'";
										//echo $query4;
										//echo $query4;
										$okk4=mysql_query($query4);
										break;
										//echo $query4;
									}
								}
								echo '<div class="alert alert-success">
						  						<strong>Sukses menambahkan bahan!</strong> silahkan cek bahan <a href="index/daftarbahan.php">disini</a>
													</div>';
							}
						}
					}
				//if(isset($_POST["tambah"])){echo "Hello World";}	
			?>

			 <form class="form-horizontal" role="form" method="post">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">ID bahan:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" maxlength="5" name="id_bahan" placeholder="ID bahan">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Nama bahan:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="nama_bahan" placeholder="Nama bahan">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Jumlah:</label>
			    <div class="col-sm-10">
			      <input type="number" class="form-control" min="0" max="9999" name="jumlah" placeholder="Jumlah">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Jenis bahan:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="jenis_bahan" placeholder="Jenis bahan">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Harga:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="harga" placeholder="Harga">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Hitung per:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="hitung_per" placeholder="Hitung per">
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