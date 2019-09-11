<?php 
require_once 'dbconnect.php';
require_once 'models/user.php';

//1.tangkap request dari elemet2 form
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$idrole = $_POST['idrole'];
$foto = $_POST['foto'];

//2.himpun semua variabel diatas dalam satu array
$data = [
	$fullname,
	$username,
	$password,
	$email,
	$idrole,
	$foto];

//3.proses dengan menciptakan object dari model produk
$obj = new user();
$tombol = $_POST['proses'];
switch ($tombol) {
	case 'simpan': 
	$obj->menyimpan($data); break;
	case 'ubah': 
	$data[] = $_POST['idx'];
	$obj->mengubah($data); break;

	case 'hapus': 
	$obj->menghapus( $_POST['idx']); break;
	default: // tombol batal
	header('location:index.php?page=user'); break;
}

//4.landing page
header('location:index.php?page=user');

 ?>