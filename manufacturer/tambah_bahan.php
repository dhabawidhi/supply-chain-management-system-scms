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
	<title><?php echo $nama;?> Manufacturer - SCMS RMO</title>
		<meta charset="utf-8">
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

		<h1><p class="text-center">Tambah bahan</p></h1>
			<?php
			
			if(isset($_POST['tambah'])){
					$idbahan=$_POST["idbahan"];
					$idbahan=strtoupper($idbahan);
					$jumlah=$_POST["jumlah"];
					$idsupplier=$_POST["idsupplier"];
					$idsupplier=strtoupper($idsupplier);
					$query2="SELECT * FROM manufaktur_asal_bahannya where id_manufaktur='$id'";
					//echo $query2;
					$ok2=mysql_query($query2);
					while($okk2=mysql_fetch_array($ok2)){
						for($i=1;$i<=20;$i++){
							$id_bahan=$okk2['id_bahan'.$i.''];
							$jumlah_bahan=$okk2['jumlah_bahan'.$i.''];
							$id_asal_supplier=$okk2['asal_supplier'.$i.''];
							if($idbahan==$id_bahan){
								//echo $jumlah_bahan;
								//echo $jumlah;
								$jumlah2=$jumlah_bahan+$jumlah;
								//echo $jumlah2;
								$query3="UPDATE manufaktur_asal_bahannya SET jumlah_bahan$i='$jumlah2' WHERE id_manufaktur='$id'";
								//echo $query3;
								$okk3=mysql_query($query3);
								break;
							}
							else if($id_bahan=="") {
								//$query4="INSERT INTO retailer_asal_bahannya(id_bahan$i,jumlah_bahan$i,id_asal_manufaktur$i) VALUES('$idbahan','$jumlah','$idmanufaktur') WHERE id_retailer='$id'";
								$query4="UPDATE manufaktur_asal_bahannya SET id_bahan$i='$idbahan',jumlah_bahan$i='$jumlah',asal_supplier$i='$idsupplier' WHERE id_manufaktur='$id'";
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
				//if(isset($_POST["tambah"])){echo "Hello World";}	
			?>

			 <form class="form-horizontal" role="form" method="post">
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">ID Bahan:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="idbahan" placeholder="ID bahan">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">Jumlah bahan:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="jumlah" placeholder="Jumlah bahan">
			    </div>
			  </div>
			  <div class="form-group">
			    <label class="control-label col-sm-2" for="email">ID Supplier:</label>
			    <div class="col-sm-10">
			      <input type="text" class="form-control" name="idsupplier" placeholder="Asal Supplier">
			    </div>
			  </div>
			  <div class="form-group">
			    <div class="col-sm-offset-2 col-sm-10">
			      <button type="submit" name="tambah" value="tambah" class="btn btn-primary">Tambah</button>
			    </div>
			  </div>
			 </form>
			    <div class="alert alert-info fade in">
			        <a href="#" class="close" data-dismiss="alert">&times;</a>
			        <strong>Catatan</strong> Pastikan kembali kode bahan yang anda masukkan benar, cek resi pemesanan bahan anda atau cek daftar bahan supplier <a href="supplier/index.php">di sini</a>.
			    </div>
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
	

    <script type="text/javascript">

    $(document).ready(function(){

        $(".close").click(function(){

            $("#myAlert").alert();

        });

    });  

    </script>


</body>
</html>