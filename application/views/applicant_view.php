<div class="w3-container">
	<h1 class="w3-center w3-text-green">Detail Pelamar</h1>
	<div class="w3-row">
		<?php foreach ($result as $item):?>
			<div class="w3-col" style="width:40%;margin-right:5%">
				<div class="w3-card">
				<img src="<?php echo $item->LINK_PHOTO;?>" alt="Pelamar" style="width:100%">
				<div class="w3-container">
					<div class="w3-row">
						<div class="w3-col" style="width:33%">
						<h4><b><a target="_blank" href="<?php echo $item->LINK_CV;?>" title="CV">Link CV</a></b></h4>
						</div>
						<div class="w3-col" style="width:33%;text-align:center">
						<h4><b><a target="_blank" href="<?php echo $item->LINK_IJAZAH;?>" title="Ijazah">Ijazah</a></b></h4>
						</div>
						<div class="w3-col" style="width:33%;text-align:right">
						<h4><b><a target="_blank" href="<?php echo $item->LINK_TRANSKRIP;?>" title="Transkrip">Transkrip</a></b></h4>
						</div>						
					</div>
				</div>
				</div>
				<br>
				<div class="w3-container w3-display-container w3-green w3-block">
					<h3 class="w3-green">Posisi Lowongan</h3>
				</div>	<br>			
				<div class="w3-row" style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						Nama Posisi
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->POSISI_LOWONGAN;?>
					</div>
				</div><br>				
				<div class="w3-container w3-display-container w3-green w3-block">
					<h3 class="w3-green">Lokasi Tes</h3>
				</div>	<br>
					<div class="w3-row" style="margin-bottom:10px">
						<div class="w3-col" style="width:30%;margin-right:2%">
							Nama Lokasi
						</div>
						<div class="w3-col" style="width:3%">
							:
						</div>					
						<div class="w3-col" style="width:65%">
							<?php echo $item->NAMA_LOKASI;?>
						</div>
					</div>					
			</div>
			<div class="w3-col" style="width:55%">		
			<div class="w3-container w3-display-container w3-green w3-block">
				<h3 class="w3-green">Data Pelamar</h3>
			</div><br>
				<div class="w3-row" style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						Nama Lengkap
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->NAMA;?>
					</div>
				</div>
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						No. Telepon
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->TELEPON;?>
					</div>
				</div>
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						Email
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->EMAIL;?>
					</div>
				</div>				
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						Alamat
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->ALAMAT;?>
					</div>
				</div>
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Jenis Kelamin
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->JENIS_KELAMIN;?>
					</div>
				</div>					
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Tempat, Tanggal Lahir 
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php 
							echo $item->TEMPAT_LAHIR.', '; 
							$time = strtotime($item->TANGGAL_LAHIR);
							echo date('d M Y',$time); 
						?>
					</div>
				</div>					
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Status Pernikahan : 
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->STATUS_PERNIKAHAN;?>
					</div>
				</div>

			<div class="w3-container w3-display-container w3-green w3-block">
				<h3 class="w3-green">Pengalaman Kerja Terakhir</h3>
			</div><br>
				<?php if ($item->NAMA_PERUSAHAAN != '' or $item->NAMA_PERUSAHAAN != null): ?>
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Perusahaan
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->NAMA_PERUSAHAAN;?>
					</div>
				</div>	
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Posisi
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->POSISI;?>
					</div>
				</div>
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Periode
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php 
							if($item->AWAL_KERJA != '0000-00-00'){
								$time = strtotime($item->AWAL_KERJA);
								echo date('d M Y',$time); 
								echo " s.d. ";
								if($item->AKHIR_KERJA != '0000-00-00'){
									$time = strtotime($item->AKHIR_KERJA);
									echo date('d M Y',$time); 
								}
							}
						?>
					</div>
				</div>	
				<?php endif; ?>
			<div class="w3-container w3-display-container w3-green w3-block">
				<h3 class="w3-green">Pendidikan Terakhir</h3>
			</div><br>
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Tingkat Pendidikan
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->TINGKAT;?>
					</div>
				</div>	
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Universitas
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->UNIVERSITAS;?>
					</div>
				</div>			
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Fakultas
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->FAKULTAS;?>
					</div>
				</div>					
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Jurusan
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->JURUSAN;?>
					</div>
				</div>
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 IPK
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php echo $item->IPK;?>
					</div>
				</div>					
				<div class="w3-row"  style="margin-bottom:10px">
					<div class="w3-col" style="width:30%;margin-right:2%">
						 Periode
					</div>
					<div class="w3-col" style="width:3%">
						:
					</div>					
					<div class="w3-col" style="width:65%">
						<?php 
							$time = strtotime($item->AWAL_PENDIDIKAN);
							echo date('d M Y',$time); 
							echo " s.d. ";
							$time = strtotime($item->AKHIR_PENDIDIKAN);
							echo date('d M Y',$time); 							
						?>
					</div>
				</div>				
			</div>
	</div>
	<div class="w3-row">
		<div class="w3-container w3-display-container w3-green w3-block">
			<h3 class="w3-green">Ceklist</h3>
		</div><br>
			<div class="w3-row"  style="margin-bottom:10px">
				<div class="w3-col" style="width:45%;margin-right:2%">
					 Bersedia untuk ditempatkan dimana saja
				</div>
				<div class="w3-col" style="width:3%">
					:
				</div>					
				<div class="w3-col" style="width:50%">
					<?php if($item->CEK_1 == 'on'): ?>
						<i class="fa fa-check fa-lg"></i>
					<?php else: ?>
						<i class="fa fa-times fa-lg"></i>
					<?php endif; ?>
				</div>
			</div>	
			<div class="w3-row"  style="margin-bottom:10px">
				<div class="w3-col" style="width:45%;margin-right:2%">
					 Memiliki keluarga/kerabat yang bekerja di AAL
				</div>
				<div class="w3-col" style="width:3%">
					:
				</div>					
				<div class="w3-col" style="width:50%">
					<?php if($item->CEK_2 == 'on'): ?>
						<i class="fa fa-check fa-lg"></i>
					<?php else: ?>
						<i class="fa fa-times fa-lg"></i>
					<?php endif; ?>
				</div>
			</div>
			<div class="w3-row"  style="margin-bottom:10px">
				<div class="w3-col" style="width:45%;margin-right:2%">
					 Memiliki riwayat penyakit kronis/pengalaman kecelakaan
				</div>
				<div class="w3-col" style="width:3%">
					:
				</div>					
				<div class="w3-col" style="width:50%">
					<?php if($item->CEK_3 == 'on'): ?>
						<i class="fa fa-check fa-lg"></i>
					<?php else: ?>
						<i class="fa fa-times fa-lg"></i>
					<?php endif; ?>
				</div>
			</div>	
	</div>
<?php endforeach;?>	
</div>