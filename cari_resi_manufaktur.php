		<?php
			$queryM="SELECT id_supplier, id_manufaktur FROM resi_pesanan_bahan WHERE nomor_resi_angka='$no_resi'";
			$ok4=mysql_query($queryM);
			while($okk4=mysql_fetch_array($ok4)){
				$id_supplier=$okk4['id_supplier'];
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
					<div class="col-sm-4"><label for="text">:<?php echo " ".$id_manufaktur; ?></label></div>
				</div>
				<div class="row">
					<div class="col-sm-2"><label for="text">ID Pengirim</label></div>
					<div class="col-sm-4"><label for="text">:<?php echo " ".$id_supplier; ?></label></div>
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
						$jam=$okk2['jam'];
						$jam=substr($jam,11,5);
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
								echo '<td>' .$status[$i].'</td>';
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
			if($tanggal=="") false;
			else	echo '<p><var>Last Update <strong>'.$tanggal.' '.$jam.'</strong></var></p>';
			}
			?>