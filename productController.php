<?php 
require_once 'dbconnect.php';
require_once 'models/product.php';

//1.tangkap request dari elemet2 form
$code_product = $_POST['code_product'];
$product = $_POST['product'];
$stock = $_POST['stock'];
$price = $_POST['price'];
$type = $_POST['type'];
$photo = $_POST['photo'];


//2.himpun semua variable diatas dalam satu array
$data = [
	$code_product,
	$product,
	$stock,
	$price,
	$type,
	$photo];

//3.proses dengan menciptakan object dari model produk
$obj = new product();
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
	header('location:index.php?page=product'); break;
}

//4.landing page
header('location:index.php?page=product');

 ?>