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
			<br>

		<h1><p class="text-center">Tambah Barang</p></h1>
			<?php
		if(isset($_POST['tambah'])){
					$idbarang=$_POST["idbarang"];
					$jumlah=$_POST["jumlah"];
					$idmanufaktur=$_POST["idmanufaktur"];
					$query2="SELECT * FROM retailer_asal_barangnya where id_retailer='$id'";
					//echo $query2;
					$ok2=mysql_query($query2);
					while($okk2=mysql_fetch_array($ok2)){
						for($i=1;$i<=20;$i++){
							$id_barang=$okk2['id_barang'.$i.''];
							$jumlah_barang=$okk2['jumlah_barang'.$i.''];
							$id_asal_manufaktur=$okk2['id_asal_manufaktur'.$i.''];
							if($idbarang==$id_barang){
								//echo $jumlah_barang;
								//echo $jumlah;
								$jumlah2=$jumlah_barang+$jumlah;
								//echo $jumlah2;
								$query3="UPDATE retailer_asal_barangnya SET jumlah_barang$i='$jumlah2' WHERE id_retailer='$id'";
								//echo $query3;
								$okk3=mysql_query($query3);
								break;
							}
							else if($id_barang=="") {
								//$query4="INSERT INTO retailer_asal_barangnya(id_barang$i,jumlah_barang$i,id_asal_manufaktur$i) VALUES('$idbarang','$jumlah','$idmanufaktur') WHERE id_retailer='$id'";
								$query4="UPDATE retailer_asal_barangnya SET id_barang$i='$idbarang',jumlah_barang$i='$jumlah',id_asal_manufaktur$i='$idmanufaktur' WHERE id_retailer='$id'";
								//echo $query4;
								$okk4=mysql_query($query4);
								break;
								//echo $query4;
							}
						}
						echo '<div class="alert alert-success">
				  						<strong>Sukses menambahkan barang!</strong> silahkan cek barang <a href="index.php">disini</a>
											</div>';
					}
				}	
			?>

			 <form class="form-horizontal" role="form" method="post">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">ID Barang:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="idbarang" placeholder="ID Barang">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Jumlah Barang:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="jumlah" placeholder="Jumlah Barang">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">ID Manufaktur:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="idmanufaktur" placeholder="Asal Manufaktur">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="tambah" value="tambah" class="btn btn-primary">Submit</button>
			    </div>
			  </div>
			  	<div class="alert alert-info fade in">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Catatan</strong> Pastikan kembali kode barang yang anda masukkan benar, cek resi pemesanan barang anda.
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