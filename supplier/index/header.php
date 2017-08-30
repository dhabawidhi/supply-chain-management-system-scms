

<header id="header">
				<div class="inner">

					<!-- Logo -->
				<h1><a href="../index.php" id="logo">Supplier - SCMS RMO</a></h1>

			<!-- Nav -->
				<nav id="nav">					
					<ul>
						<li class="current_page_item"><a href="index.php">Isi Gudang</a></li>
						<li><a href="../supplier/index.php">Supplier</a></li>
						<li>
							<a href="#"><?php if($pemberitahuan!=0) echo '('.$pemberitahuan.')'."$nama"; else echo $nama; ?>
							<span class="caret"></span></a>
							<ul>
								<li><a href="#">Settings</a></li>
								<?php
									if($pemberitahuan!=0){
										echo '<li><a href="../pesanan.php" name="">'.'('.$pemberitahuan.') '.' Pesanan Baru</a></li>';
									}
									else echo '<li><a href="../pesanan.php" name="">Pesanan</a></li>';
								?>
								<li><a href="../logout.php" name="logout" value="logout">Log out</a></li>
							</ul>
						</li>
					</ul>
				</nav>


				</div>
			</header>