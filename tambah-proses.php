<?php
//mulai proses tambah data

//cek dahulu, jika tombol tambah di klik
if(isset($_POST['tambah'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$nik				= $_POST['nik'];	//membuat variabel $nis dan datanya dari inputan NIS
	$nama				= $_POST['nama'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$tanggal_lahir		= $_POST['tanggal_lahir'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$no_hp				= $_POST['no_hp'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$jam				= $_POST['jam'];
	$menit				= $_POST['menit'];
	
	//melakukan query dengan perintah INSERT INTO untuk memasukkan data ke database
	$input = mysqli_query($mysqli, "INSERT INTO karyawan VALUES('$nik', '$nama', '$tanggal_lahir', '$no_hp', '$jam', $menit)") or die(mysql_error());
	
	//jika query input sukses
	if($input){
		
		echo 'Data berhasil di tambahkan! ';		//Pesan jika proses tambah sukses
		echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}else{
		
		echo 'Gagal menambahkan data! ';		//Pesan jika proses tambah gagal
		echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman tambah
		
	}

}else{	//jika tidak terdeteksi tombol tambah di klik

	//redirect atau dikembalikan ke halaman tambah
	echo '<script>window.history.back()</script>';

}
?>