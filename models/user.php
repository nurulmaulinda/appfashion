<?php
class User{
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
		// $sql = "SELECT u.*,r.nama AS kategori FROM  user u INNER JOIN role r ON r.id  = u.idrole ORDER BY u.fullname ASC";
	$sql = "SELECT u.*, r.nama AS role FROM  user u INNER JOIN role r ON r.id  = u.idrole ORDER BY u.fullname ASC";
	//prepare statement PDO 
	$ps =$this->koneksi->prepare($sql);
	$ps ->execute();
	$rs = $ps->fetchAll(); //resultset
	return $rs;
	}
	public function menyimpan($data){
		$sql = "INSERT INTO user (fullname,username,password,email,idrole,foto) VALUES (?,?,?,?,?,?)"; //query menyimpan itu insert
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute($data);
	}

	public function mengubah($data){
		//$sql = "UPDATE produk SET kode=?,nama=?,harga=?,stok=?,idjenis=?,f0to=? WHERE id=?";
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute($data);
	}

	public function menghapus($id){
		//$sql = "DELETE  FROM produk WHERE ID=?";
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute([$id]);
	}
	public function temukan($id){
		//$sql = "SELECT * FROM produk WHERE id=?";
		$ps =$this->koneksi->prepare($sql);
		$ps ->execute([$id]);
		$rs = $ps->fetch();
		return $rs;
	}
	public function cek($data){
		//$sql = "SELECT * FROM produk WHERE idjenis=?";
	  	$sql ="SELECT u.*,r.nama FROM  user u INNER JOIN role r ON r.id  = u.idrole WHERE u.username=? AND u.password= SHA1(?)";
		$ps =$this->koneksi->prepare($sql);
		$ps->execute($data);
		$rs = $ps->fetch();
		return $rs;
	}
	//public function search($keyword){
		//$sql = "SELECT * FROM produk WHERE idjenis=?";
		//$sql ="SELECT p.*,j.nama AS kategori FROM  produk p INNER JOIN jenis j ON j.id  = p.idjenis WHERE P.nama LIKE '%$keyword%' ORDER BY p.nama ASC";
		//$ps =$this->koneksi->prepare($sql);
		//$ps ->execute([$keyword]);
		//$rs = $ps->fetchAll();
		//return $rs;
	//}
}