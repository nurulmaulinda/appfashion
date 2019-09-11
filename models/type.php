<?php 
class type{
	//member1 variabel
	private $koneksi;
	//member2 konstruktor
	public function __construct(){
		global $konek; //panggil instance koneksidb
		$this->koneksi = $konek;
	}

	//member3 fungsi2 CRUD(CREATE READ UPDATE DELETE)
	public function tampilkan(){
		$sql = "SELECT * FROM type";
		//prepare(menyiapkan) statement PDO
		 $ps = $this->koneksi->prepare($sql); //ps(preparestatment)
		 $ps ->execute();
		 $rs = $ps->fetchAll(); //rs(resultset)
		 return $rs;
	}

	public function menyimpan($data){
		$sql = "INSERT INTO type (name) VALUES (?)";
		//prepare(menyiapkan) statement PDO
		 $ps = $this->koneksi->prepare($sql); //ps(preparestatment)
		 $ps ->execute($data);
	}

	public function mengubah($data){
		$sql = "UPDATE type SET name=? WHERE id=?";
		//prepare(menyiapkan) statement PDO
		 $ps = $this->koneksi->prepare($sql); //ps(preparestatment)
		 $ps ->execute($data);
	}

	public function menghapus($id){
		$sql = "DELETE FROM type WHERE id=?";
		//prepare(menyiapkan) statement PDO
		 $ps = $this->koneksi->prepare($sql); //ps(preparestatment)
		 $ps ->execute([$id]);
	}

	public function temukan($id){
		$sql = "SELECT * FROM type WHERE id=?";
		//prepare(menyiapkan) statement PDO
		 $ps = $this->koneksi->prepare($sql); //ps(preparestatment)
		 $ps ->execute([$id]);
		  $rs = $ps->fetch();
		 return $rs;
	}
}

 ?>