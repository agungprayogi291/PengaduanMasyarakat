<?php
require '../../db.php';



$query = "SELECT m.nama as nama,p.tgl_pengaduan as tgl_pengaduan , p.foto  as foto, p.isi_laporan as isi_laporan ,p.status as status FROM pengaduan p JOIN masyarakat m WHERE p.nik = m.nik";


$executQuery = mysqli_query($conn,$query);
$getData = mysqli_fetch_All($executQuery,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>cetak</title>
	<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<div class="container">
	
	<table class="table  table-hover table-striped table-responsive">
		<thead class="bg-dark text-white ">
			<tr>
				<th>No.</th>
				<th>Nama Pengadu</th>
				<th>tanggal pengaduan</th>
				<th>bukti</th>
				<th>isi pengaduan</th>
				<th>status pengadu</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$nomor = 1;
			foreach($getData as $data){
			?>
			<tr>
				<td><?php echo $nomor++."." ;?></td>
				<td><?php echo $data['nama'] ;?></td>
				<td><?php echo $data['tgl_pengaduan'] ;?></td>
				<td><img src="../../img/<?php echo $data['foto'] ;?>" alt="" width="80px"></td>
				<td><?php echo $data['isi_laporan'];?></td>
				<td><?php echo $data['status'] ;?></td>
			</tr>
			<?php
			 }
			 ?>
		</tbody>
	</table>
	

	</div>

	<script>
		window.print();
	</script>
	
</body>
</html>