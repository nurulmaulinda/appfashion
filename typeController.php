
<?php
require_once 'dbconnect.php';
require_once 'models/type.php';
//1.tangkap request dari element2 form
$nama =$_POST['type'];

//2.himpun semua variabel diatas dalam satu array
$data = [$nama];

//3.prpses menciptakan object dari model produk
$obj = new type();
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
	header('location:index.php?page=type'); break;
}
//4.landing page
header('location:index.php?page=type');
