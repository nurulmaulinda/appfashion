<?php
class product{
	//member1 variabel
	private $koneksi;
	//member2 konstruktor
	public function __construct(){
		global $konek; //memanggil instance koneksidb
		$this->koneksi = $konek;
}
	//member3 fungsi2 CRUD (CREATE) READ UPDATE DELETE)
	public function tampilkan(){
	//$sql ="SELECT * FROM produk";
		$sql = "SELECT p.*,t.name AS category FROM  product p INNER JOIN type t ON t.id  = p.idtype ORDER BY p.name ASC";
	//prepare statement PDO 
	$ps =$this->koneksi->prepare($sql);
	$ps ->execute();
	$rs = $ps->fetchAll(); //resultset
	return $rs;
	}
	public function menyimpan($data){
		$sql = "INSERT INTO product (code_product,name,stock,price,idtype,photo) VALUES (?,?,?,?,?,?)"; //query menyimpan itu insert
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute($data);
	}

	public function mengubah($data){
		$sql = "UPDATE product SET code_product=?,name=?,stock=?,price=?,idtype=?,photo=? WHERE id=?";
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute($data);
	}

	public function menghapus($id){
		$sql = "DELETE  FROM product WHERE id=?";
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute([$id]);
	}
	public function temukan($id){
		$sql = "SELECT * FROM product WHERE id=?";
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
	}
	public function filter($id){
		//$sql = "SELECT * FROM produk WHERE idjenis=?";
		$sql ="SELECT p.*,t.name AS category FROM  product p INNER JOIN type t ON t.id  = p.idtype WHERE p.idtype=? ORDER BY p.name ASC";
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute([$id]);
		$rs = $ps->fetchAll();
		return $rs;
	}
	public function search($keyword){
		//$sql = "SELECT * FROM produk WHERE idjenis=?";
		$sql ="SELECT p.*,t.name AS category FROM  product p INNER JOIN type t ON t.id  = p.idtype WHERE p.name LIKE '%$keyword%' ORDER BY p.name ASC";
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute([$keyword]);
		$rs = $ps->fetchAll();
		return $rs;
	}
}