<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
	<h2>Simple CRUD</h2>
	
	<p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
	
	<h3>Tambah Data Karyawan</h3>
	
	<form action="tambah-proses.php" method="post">
		<table cellpadding="3" cellspacing="0">
			<tr>
				<td>NIK</td>
				<td>:</td>
				<td><input type="text" name="nik" required></td>
			</tr>
			<tr>
				<td>Nama Lengkap</td>
				<td>:</td>
				<td><input type="text" name="nama" size="30" required></td>
			</tr>
			<tr>
				<td>Tanggal Lahir</td>
				<td>:</td>
				<td><input type="text" name="tanggal_lahir" size="30" required></td>
			</tr>
			<tr>
				<td>No HP</td>
				<td>:</td>
				<td><input type="text" name="no_hp" size="30" required></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td>:</td>
				<td><input type="text" name="jam" size="30" required></td>
			</tr>
			<tr>
				<td>Menit</td>
				<td>:</td>
				<td><input type="text" name="menit" size="30" required></td>
			</tr>			
			<tr>
				<td>&nbsp;</td>
				<td></td>
				<td><input type="submit" name="tambah" value="Tambah"></td>
			</tr>
		</table>
	</form>
</body>
</html>
