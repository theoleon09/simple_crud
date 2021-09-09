<!DOCTYPE html>
<html>
<head>
	<title>Simple CRUD</title>
</head>
<body>
	<h2>Simple CRUD</h2>
	
	<p><a href="index.php">Beranda</a> / <a href="tambah.php">Tambah Data</a></p>
	
	<h3>Data Karyawan</h3>
	
	<table cellpadding="5" cellspacing="0" border="1">
		<tr bgcolor="#CCCCCC">
			<th>No.</th>
			<th>NIK</th>
			<th>Nama Lengkap</th>
			<th>Tanggal Lahir</th>
			<th>No HP</th>
			<th>Jam</th>
			<th>Menit</th>
			<th>Opsi</th>
		</tr>
		
		<?php
		//iclude file koneksi ke database
		include('koneksi.php');
		
		//query ke database dg SELECT table karyawan diurutkan berdasarkan NIK paling besar
		$query = mysqli_query($mysqli,"SELECT * FROM karyawan ORDER BY tanggal_lahir ASC") or die(mysqli_error());
		
		//cek, apakakah hasil query di atas mendapatkan hasil atau tidak (data kosong atau tidak)
		if(mysqli_num_rows($query) == 0){	//ini artinya jika data hasil query di atas kosong
			
			//jika data kosong, maka akan menampilkan row kosong
			echo '<tr><td colspan="6">Tidak ada data!</td></tr>';
			
		}else{	//else ini artinya jika data hasil query ada (data diu database tidak kosong)
			
			//jika data tidak kosong, maka akan melakukan perulangan while
			$no = 1;	//membuat variabel $no untuk membuat nomor urut
			while($data = mysqli_fetch_assoc($query)){	//perulangan while dg membuat variabel $data yang akan mengambil data di database
				
				//menampilkan row dengan data di database
				echo '<tr>';
					echo '<td>'.$no.'</td>';	//menampilkan nomor urut
					echo '<td>'.$data['nik'].'</td>';	//menampilkan data nik dari database
					echo '<td>'.$data['nama'].'</td>';	//menampilkan data nama lengkap dari database
					echo '<td>'.$data['tanggal_lahir'].'</td>';	//menampilkan data tanggal lahir dari database
					echo '<td>'.$data['no_hp'].'</td>';	//menampilkan data no hp dari database
					echo '<td>'.$data['jam'].'</td>';	//menampilkan data jam dari database
					echo '<td>'.$data['menit'].'</td>';	//menampilkan data menit dari database					
					echo '<td><a href="edit.php?nik='.$data['nik'].'">Edit</a> / <a href="hapus.php?nik='.$data['nik'].'" onclick="return confirm(\'Yakin?\')">Hapus</a></td>';	//menampilkan link edit dan hapus dimana tiap link terdapat GET id -> ?id=siswa_id
				echo '</tr>';
				
				$no++;	//menambah jumlah nomor urut setiap row
				
			}
			
		}
		?>
	</table>
</body>
</html>
