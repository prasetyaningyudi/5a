<div class="w3-container">

<div class="row">
	<div class="w3-col" style="width:60%;margin-right:5%">
		<h1 class="w3-left w3-text-green">Data Pelamar</h1>
	</div>
	<div class="w3-col w3-right" style="width:35px;padding-top:17px">
		<a class="w3-right w3-btn w3-teal" href="<?php echo base_url().'job/download/null/'.$offset;?>">IMPORT EXCEL</a>
	</div>
</div>
<table class="w3-table w3-bordered w3-striped w3-border test w3-hoverable">
<tbody>
<tr class="w3-green">
  <th>NO</th>
  <th>NAMA</th>
  <th>TELEPON</th>
  <th>JENIS KELAMIN</th>
  <th>POSISI</th>
  <th>LOKASI</th>
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
  <td><?php echo $item->POSISI_LOWONGAN;?></td>
  <td><?php echo $item->NAMA_LOKASI;?></td>
  <td><?php $time = strtotime($item->CREATE_DATE);
									echo date('d M Y H:i:s',$time); ?></td>
  <td><a target="_blank" href="<?php echo $item->LINK_CV;?>">CV</a></td>
  <td><a target="_blank" href="<?php echo $item->LINK_PHOTO;?>">PHOTO</a></td>
  <td><a target="_blank" href="<?php echo base_url().'job/applicant/'.$item->ID;?>">DETAIL</a></td>
<?php endforeach;?>  
</tr>
</tbody>
</table>
<?php if($offset == '0'){
	$link_prev = '#';
	$link_next = base_url().'job/applicant/null/'.($offset+1);
}else{
	$link_prev = base_url().'job/applicant/null/'.($offset-1);
	$link_next = base_url().'job/applicant/null/'.($offset+1);	
}
?>
<div class="w3-bar w3-border w3-round">
  <a href="<?php echo $link_prev; ?>" class="w3-button">&#10094; Previous</a>
  <a href="<?php echo $link_next; ?>" class="w3-button w3-right">Next &#10095;</a>
</div>
</div>