
<?php
require_once 'dbconnect.php';
require_once 'models/role.php';
//1.tangkap request dari element2 form
$nama =$_POST['role'];

//2.himpun semua variabel diatas dalam satu array
$data = [$nama];

//3.prpses menciptakan object dari model produk
$obj = new role();
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
	header('location:index.php?page=role'); break;
}
//4.landing page
header('location:index.php?page=role');
