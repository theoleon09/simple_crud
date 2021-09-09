<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
	<h2>Simple CRUD</h2>
	
	<p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
	
	<h3>Edit Data Siswa</h3>
	
	<?php
	//proses mengambil data ke database untuk ditampilkan di form edit berdasarkan siswa_id yg didapatkan dari GET id -> edit.php?id=siswa_id
	
	//include atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $id yg nilainya adalah dari URL GET id -> edit.php?id=siswa_id
	$nik = $_GET['nik'];
	
	//melakukan query ke database dg SELECT table siswa dengan kondisi WHERE siswa_id = '$id'
	$show = mysqli_query($mysqli,"SELECT * FROM karyawan WHERE nik='$nik'");
	
	//cek apakah data dari hasil query ada atau tidak
	if(mysqli_num_rows($show) == 0){
		
		//jika tidak ada data yg sesuai maka akan langsung di arahkan ke halaman depan atau beranda -> index.php
		echo '<script>window.history.back()</script>';
		
	}else{
	
		//jika data ditemukan, maka membuat variabel $data
		$data = mysqli_fetch_assoc($show);	//mengambil data ke database yang nantinya akan ditampilkan di form edit di bawah
	
	}
	?>
	
	<form action="edit-proses.php" method="post">
		<input type="hidden" name="nik" value="<?php echo $nik; ?>">	<!-- membuat inputan hidden dan nilainya adalah siswa_id -->
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td><input type="text" name="nik" value="<?php echo $data['nik']; ?>" required></td>	<!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="nama" size="30" value="<?php echo $data['nama']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input type="text" name="tanggal_lahir" size="30" value="<?php echo $data['tanggal_lahir']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
					<tr>
				<td>No HP</td>
				<td>:</td>
				<td><input type="text" name="no_hp" size="30" value="<?php echo $data['no_hp']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Jam</td>
				<td>:</td>
				<td><input type="text" name="jam" size="30" value="<?php echo $data['jam']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>Menit</td>
				<td>:</td>
				<td><input type="text" name="menit" size="30" value="<?php echo $data['menit']; ?>" required></td> <!-- value diambil dari hasil query -->
			</tr>
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="simpan" value="Simpan"></td>
			</tr>
		</table>
	</form>
</body>
</html>