<div class="w3-container">
	<h1 class="w3-center w3-text-green">Drop Your CV</h1>
</div>
<div class="w3-card-2">
<form action="" method="post" enctype="multipart/form-data">
	<div class="w3-container w3-display-container w3-green w3-block">
		<div class="w3-padding w3-display-right"><i class="fa fa-angle-down fa-lg"></i></div>
		<h3 class="w3-green">Posisi Lowongan</h3>
	</div>
	<div class="w3-container w3-show">
		
		<p>

		<select class="w3-select" name="posisi_lowongan">
			<option value="0" disabled selected>Pilih posisi yang diinginkan</option>
			<?php foreach ($result as $item):?>
			<option value="<?php echo $item->ID;?>"><?php echo $item->POSISI_LOWONGAN;?></option>
			<?php endforeach; ?>
		</select>
		</p>
	</div>
	<div class="w3-container w3-display-container w3-green w3-block" onclick="myFunction('content_1')">
		<div class="w3-padding w3-display-right"><i class="fa fa-angle-down fa-lg"></i></div>
		<h3 class="w3-green">Data Pelamar</h3>
	</div>
	<div class="w3-container w3-show" id="content_1">
		<p>
		<label>Nama Lengkap</label>
		<input class="w3-input w3-border" type="text" name="nama" placeholder="Nama Lengkap" required>
		</p>
		
		<p>
		<label>No. Telepon</label>
		<input class="w3-input w3-border" type="text" name="telepon" placeholder="No. Telepon" required>
		</p>

		<p>
		<label>Alamat</label>
		<textarea class="w3-input w3-border" name="alamat"  style="resize:none" placeholder="Alamat" required></textarea>
		</p>
		
		<p>
		<label>Jenis Kelamin</label><br>
		<input class="w3-radio" type="radio" name="jenis_kelamin" value="Pria" checked="">
		<label>Pria</label>			
		<input class="w3-radio" type="radio" name="jenis_kelamin" value="Wanita">
		<label>Wanita</label>
		</p>
		
		<p>
		<label>Tempat dan Tanggal Lahir</label>
		<div class="w3-row">
		<input class="w3-input w3-border w3-col type="text" name="tempat_lahir" placeholder="Tempat" required style="width:30%;margin-right:5%">
		<input class="w3-border w3-input w3-col" type="date" name="tanggal_lahir" required style="width:65%">
		</div>
		</p>
		
		<p>
		<label>Status Pernikahan</label><br>
		<input class="w3-radio" type="radio" name="status" value="Belum Kawin" checked="">
		<label>Belum Kawin</label>			
		<input class="w3-radio" type="radio" name="status" value="Kawin">
		<label>Kawin</label>
		</p>		
	</div>
	<br>

	<div class="w3-container w3-display-container w3-green  w3-block" onclick="myFunction('content_2')">
		<div class="w3-padding w3-display-right"><i class="fa fa-angle-down fa-lg"></i></div>
		<h3 class="w3-green">CV/Resume dan Photo</h3>
	</div>	
	<div class="w3-container w3-show" id="content_2">
		<p>
		<label>Pilih file CV/Resume untuk diunggah</label>
		<input class="w3-input w3-border" type="file" accept=".pdf,.doc,.docx,.xml,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" name="cv" required>
		</p>
		
		<p>
		<label>Pilih photo untuk diunggah</label>
		<input class="w3-input w3-border" type="file" accept="image/*" name="photo" required>
		</p>		
	</div>
	<br>
	

	<div class="w3-container w3-display-container w3-green  w3-block" onclick="myFunction('content_3')">
		<div class="w3-padding w3-display-right"><i class="fa fa-angle-down fa-lg"></i></div>
		<h3 class="w3-green">Pengalaman Kerja Terakhir</h3>
	</div>	
	<div class="w3-container w3-show" id="content_3">
		<p>
		<label>Perusahaan</label>
		<input class="w3-input w3-border" type="text" name="perusahaan" placeholder="Perusahaan">
		</p>
		
		<p>
		<label>Posisi</label>
		<input class="w3-input w3-border" type="text" name="posisi" placeholder="Posisi">
		</p>	

		<p>
		<label>Periode</label>
		<div class="w3-row">
		<input class="w3-border w3-input w3-col" type="date" name="awal_kerja" style="width:40%">
		<label class="w3-col w3-center" style="width:20%">sampai</label>
		<input class="w3-border w3-input w3-col" type="date" name="akhir_kerja" style="width:40%">
		</div>
		</p>			
	</div>

	<br>
	<div class="w3-container w3-display-container w3-green  w3-block" onclick="myFunction('content_4')">
		<div class="w3-padding w3-display-right"><i class="fa fa-angle-down fa-lg"></i></div>
		<h3 class="w3-green">Pendidikan Terakhir</h3>
	</div>	
	<div class="w3-container w3-show" id="content_4">
		<p>
		<label>Tingkat Pendidikan</label>
		<input class="w3-input w3-border" type="text" name="tingkat" placeholder="Tingkat Pendidikan" required>
		</p>
		
		<p>
		<label>Jurusan</label>
		<input class="w3-input w3-border" type="text" name="jurusan" placeholder="Jurusan" required>
		</p>	

		<p>
		<label>Periode</label>
		<div class="w3-row">
		<input class="w3-border w3-input w3-col" type="date" name="awal_pendidikan" required style="width:40%">
		<label class="w3-col w3-center" style="width:20%">sampai</label>
		<input class="w3-border w3-input w3-col" type="date" name="akhir_pendidikan" required style="width:40%">
		</div>
		</p>			
	</div>	

	<br>
	<div class="w3-container w3-display-container w3-green  w3-block" onclick="myFunction('content_5')">
		<div class="w3-padding w3-display-right"><i class="fa fa-angle-down fa-lg"></i></div>
		<h3 class="w3-green">Ceklist</h3>
	</div>	

	<div class="w3-container w3-show" id="content_5">
		<p>
		<input name="cek_1" id="cek_1" class="w3-check" type="checkbox">
		<label>Saya bersedia untuk ditempatkan dimana saja</label>
		</p>
		<p>
		<input name="cek_2" id="cek_2" class="w3-check" type="checkbox">
		<label>Saya memiliki keluarga/kerabat yang bekerja di AAL</label>
		</p>	
		<p>
		<input name="cek_3" id="cek_3" class="w3-check" type="checkbox">
		<label>Saya memiliki riwayat penyakit kronis/pengalaman kecelakaan</label>
		</p>	
		<p>
		<input name="cek_4" id="cek_1" class="w3-check" type="checkbox" required>
		<label>Dengan memberi tanda ceklist di kotak ini, Dengan ini saya menyatakan bahwa semua informasi diisi dengan sesungguhnya. Apabila di kemudian hari ditemukan hal-hal yang bertentangan, maka saya bersedia dituntut sesuai dengan hukum yang berlaku dan lamaran ini dapat dibatalkan.</label>
		</p>

		<p>
		<input type="submit" name="submit" class="w3-btn w3-teal" style="width:120px" value="Kirim"></p>
		</p>
	</div>	
</form>
<br>
<br>
</div>

<script>
function myFunction(id) {
    var x = document.getElementById(id);
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", " w3-hide");
    }
}
</script>