<div class="w3-container">
<h1 class="w3-center w3-text-green">Data Lokasi Tes</h1>
<table class="w3-table w3-bordered w3-striped w3-border test">
<tbody>
<tr class="w3-green">
  <th>NO</th>
  <th>Nama Lokasi</th>
  <th>Status</th>
  <th>DATE ADDED</th>
  <th>Ubah Status</th>
</tr>
</tbody><tbody>
<?php $i = 1; foreach ($result as $item):?>
<tr>
  <td><?php echo $i++;?></td>
  <td><?php echo $item->NAMA_LOKASI;?></td>
  <td>
  <?php 
	if( $item->STATUS_LOKASI == '1'){
		echo 'Aktif';
	}else{
		echo 'Tidak Aktif';
	}
  ?>
  
  </td>
  <td><?php $time = strtotime($item->CREATE_DATE);
		echo date('d M Y H:i:s',$time); ?></td>
		
  <td>
  <?php 
	if( $item->STATUS_LOKASI == '1'){
		echo '<a class="w3-button w3-red" href="'.base_url().'/lokasi/update_status/'.$item->ID.'">Non Aktifkan</a>';
	}else{
		echo '<a class="w3-button w3-red" href="'.base_url().'/lokasi/update_status/'.$item->ID.'">Aktifkan</a>';
	}
  ?>
  </td>		
<?php endforeach;?>  
</tr>
</tbody>
</table>
	
</div>