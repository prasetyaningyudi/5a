<div class="w3-container">
<h1 class="w3-center w3-text-green">Data Pelamar</h1>
<table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
<tbody>
<tr class="w3-green">
  <th>NO</th>
  <th>NAMA</th>
  <th>TELEPON</th>
  <th>JENIS KELAMIN</th>
  <th>STATUS</th>
  <th>POSISI</th>
  <th>DATE ADDED</th>
  <th>LINK CV</th>
  <th>LINK PHOTO</th>
  <th>DETAIL</th>
</tr>
</tbody><tbody>
<?php $i = 1; foreach ($result as $item):?>
<tr>
  <td><?php echo $i++;?></td>
  <td><?php echo $item->NAMA;?></td>
  <td><?php echo $item->TELEPON;?></td>
  <td><?php echo $item->JENIS_KELAMIN;?></td>
  <td><?php echo $item->STATUS_PERNIKAHAN;?></td>
  <td><?php echo $item->POSISI_LOWONGAN;?></td>
  <td><?php $time = strtotime($item->CREATE_DATE);
									echo date('d M Y H:i:s',$time); ?></td>
  <td><a target="_blank" href="<?php echo $item->LINK_CV;?>">CV</a></td>
  <td><a target="_blank" href="<?php echo $item->LINK_PHOTO;?>">PHOTO</a></td>
  <td><a target="_blank" href="<?php echo base_url().'/job/applicant/'.$item->ID;?>">DETAIL</a></td>
<?php endforeach;?>  
</tr>
</tbody>
</table>
	
</div>