<?php
require '../../db.php';



// tangkap id_Tanggapan
$id_tanggapan = $_POST['verify'];



//ambil tgl tangapan,tanggapan
	$tanggapan = "SELECT * FROM tanggapan WHERE id_tanggapan='$id_tanggapan'";
		$getDataTanggapan = mysqli_fetch_All( mysqli_query($conn,$tanggapan),MYSQLI_ASSOC);
		//tgl tanggapan
		$tanggalTanggapan = $getDataTanggapan[0]['tgl_tanggapan'];
		//isi tanggapan
		$tanggapan = $getDataTanggapan[0]['tanggapan'];
		//id petugas
		$idPetugas = $getDataTanggapan[0]['id_petugas'];
		//id pengaduan
		$idPengaduan = $getDataTanggapan[0]['id_pengaduan'];
// ambil tgl pengaduan,isi pengaduan
	$pengaduan = "SELECT * FROM pengaduan WHERE id_pengaduan='$idPengaduan'";
		$getDataPengaduan = mysqli_fetch_All( mysqli_query($conn,$pengaduan),MYSQLI_ASSOC);
		//tgl pengaduan
		$tanggalPengaduan = $getDataPengaduan[0]['tgl_pengaduan'];
		//isi pengaduan
		$pengaduan = $getDataPengaduan[0]['isi_laporan'];
		// foto
		$foto= $getDataPengaduan[0]['foto'];
		//nik 
		$nik = $getDataPengaduan[0]['nik'];
		
//ambil nama petugas

	$petugas = "SELECT * FROM petugas WHERE id_petugas = '$idPetugas'";
		$getDataPetugas = mysqli_fetch_All( mysqli_query($conn,$petugas),MYSQLI_ASSOC);
		// nama petugas
		$namaPetugas = $getDataPetugas[0]['nama_petugas'];
		
//ambil nama pengadu,
	$masyarakat = "SELECT * FROM masyarakat WHERE nik = '$nik'";
		$getDataMasyarakat = mysqli_fetch_All( mysqli_query($conn,$masyarakat),MYSQLI_ASSOC);
		//nama masyarakat
		$namaMasyarakat = $getDataMasyarakat[0]['nama'];
		
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="../../assets/dist/css/bootstrap.min.css" rel="stylesheet">
 	<link href="../../assets/dist/css/dashboard.css" rel="stylesheet">
</head>
<body>
	<div class="jumbotron">
		<u><h1 class="text-center">Laporan Pengaduan Masyarakat</h1></u>

	<div class="row mb-5">
		<div class="col-md-5">
			<p>Nama masyarakat : <?php echo $namaMasyarakat ;?></p>
			<p>Nama Petugas : <?php echo $namaPetugas ; ?></p>
			<p>Tanggal Pengaduan : <?php echo $tanggalPengaduan ; ?></p>
			<p>Tanggal Tanggapan : <?php echo $tanggalTanggapan ; ?></p>
		</div>
	</div>
	<div class="container">

			<h3 class="text-left text-danger">Isi Pengaduan</h3>
			<p class="mb-3"><?php echo $pengaduan ;?></p>
		
			<h3 class="text-left text-primary">Tanggapan</h3>
			<p> <?php echo $tanggapan;?></p>
			
			<h3 class="text-secondary">Bukti</h3>
			<img src="../../img/<?php echo $foto ;?>" width="100px" alt="">
	</div>
	</div>
	
<script>
	window.print();
	
</script>
</body>
</html>
