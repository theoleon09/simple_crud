<?php
//memulai proses hapus data

//cek dahulu, apakah benar URL sudah ada GET nik -> hapus.php?nik=nik
if(isset($_GET['nik'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//membuat variabel $nik yg bernilai dari URL GET nik -> hapus.php?nik=nik
	$nik = $_GET['nik'];
	
	//cek ke database apakah ada data karyawan dengan nik='$nik'
	$cek = mysqli_query($mysqli, "SELECT * FROM karyawan WHERE nik='$nik'") or die(mysqli_error());
	
	//jika data siswa tidak ada
	if(mysqli_num_rows($cek) == 0){
		
		//jika data tidak ada, maka redirect atau dikembalikan ke halaman beranda
		echo '<script>window.history.back()</script>';
	
	}else{
		
		//jika data ada di database, maka melakukan query DELETE table karyawan dengan kondisi WHERE nik='$nik'
		$del = mysqli_query($mysqli,"DELETE FROM karyawan WHERE nik='$nik'");
		
		//jika query DELETE berhasil
		if($del){
			
			echo 'Data karyawan berhasil di hapus! ';		//Pesan jika proses hapus berhasil
			echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
			
		}else{
			
			echo 'Gagal menghapus data! ';		//Pesan jika proses hapus gagal
			echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman beranda
		
		}
		
	}
	
}else{
	
	//redirect atau dikembalikan ke halaman beranda
	echo '<script>window.history.back()</script>';
	
}
?>
