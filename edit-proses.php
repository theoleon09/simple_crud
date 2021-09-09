<?php
//mulai proses edit data

//cek dahulu, jika tombol simpan di klik
if(isset($_POST['simpan'])){
	
	//inlcude atau memasukkan file koneksi ke database
	include('koneksi.php');
	
	//jika tombol tambah benar di klik maka lanjut prosesnya
	$nik			= $_POST['nik'];	//membuat variabel $id dan datanya dari inputan hidden id
	$nama			= $_POST['nama'];	//membuat variabel $nis dan datanya dari inputan NIS
	$tanggal_lahir	= $_POST['tanggal_lahir'];	//membuat variabel $nama dan datanya dari inputan Nama Lengkap
	$no_hp			= $_POST['no_hp'];	//membuat variabel $kelas dan datanya dari inputan dropdown Kelas
	$jam			= $_POST['jam'];	//membuat variabel $jurusan dan datanya dari inputan dropdown Jurusan
	$menit			= $_POST['menit'];
	
	//melakukan query dengan perintah UPDATE untuk update data ke database dengan kondisi WHERE siswa_id='$id' <- diambil dari inputan hidden id
	$update = mysqli_query($mysqli, "UPDATE karyawan SET nama='$nama', tanggal_lahir='$tanggal_lahir', no_hp='$no_hp', jam=$jam, menit=$menit WHERE nik='$nik'") or die(mysqli_error());
	
	//jika query update sukses
	if($update){
		
		echo 'Data berhasil di simpan! ';		//Pesan jika proses simpan sukses
		echo '<a href="index.php">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}else{
		
		echo 'Gagal menyimpan data! ';		//Pesan jika proses simpan gagal
		echo '<a href="edit.php?nik='.$nik.'">Kembali</a>';	//membuat Link untuk kembali ke halaman edit
		
	}

}else{	//jika tidak terdeteksi tombol simpan di klik

	//redirect atau dikembalikan ke halaman edit
	echo '<script>window.history.back()</script>';

}
?>