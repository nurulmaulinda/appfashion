<?php
session_start(); //karna bukan bagian templete
require_once 'dbconnect.php';
require_once 'models/User.php'; //krna didalamnya ada fungsi cek yg mau dipanggil
$obj = new User(); //instan objek
//1.tangkaprequest form login
$uname = $_POST['uname'];
$pass = $_POST['pass'];
//2.himpunan semua variable diatas dalam satu array 
$data = [
		$uname, //1
		$pass //?2
];
//3.proses tombol
$rs = $obj->cek($data); //fungsi cek dari obj

//print_r($rs); exit;
//$jml = $obj->rowCount(); //hitung jml baris data hasil eksekusi di atas
if(!empty($rs)){ //------sukses login----------
$_SESSION['MEMBER'] = $rs;
header('location:index.php?page=product');
}else{ //--------- gagal login------------
 echo' <script>
 alert("Maaf User/Password sala!!!silahkan ulangi kembali");
 history.go(-1); //kembali ke hal sebelumnya
 </script>';
}