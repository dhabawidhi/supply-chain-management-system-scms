		<br>
		<br>
		<h3>Daftar Bahan di Gudang</h3>
		<table class="table table-striped">
			<thead>
					<tr>
						<th>ID Bahan</th>
						<th>Nama Bahan</th>
						<th>Jenis Bahan</th>
						<th>Jumlah</th>
						<th>Edit Jumlah</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$query1="SELECT * FROM supplier R WHERE R.id_supplier='$id'";
				$ok2=mysql_query($query1);
				while($okk2=mysql_fetch_array($ok2)){
					
					for($i=1;$i<=20;$i++){
						$id_bahan[$i]=$okk2['id_bahan'.$i.''];
						$jumlah[$i]=$okk2['jumlah'.$i.''];
						if($id_bahan[$i]!=""){
							$query2="SELECT * FROM bahan WHERE id_bahan='$id_bahan[$i]'";
							$ok3=mysql_query($query2);
							while($okk3=mysql_fetch_array($ok3)){
								$nama_bahan=$okk3['nama_bahan'];
								$jenis_bahan=$okk3['jenis_bahan'];
							}
							echo '<tr>';
							echo '<td>' .$id_bahan[$i].'</td>';
							echo '<td>' .$nama_bahan.'</td>';
							echo '<td>' .$jenis_bahan.'</td>';
							echo '<td>' .$jumlah[$i].'</td>';
							echo '<td>' .'<a href=edit.php?id='.$id_bahan[$i].'&jumlah='.$jumlah[$i].'&index='.$i.'><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'.'</td>';
							echo '</tr>';
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
			