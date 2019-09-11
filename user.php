<div class="container">
<?php 
//$sql = "SELECT * FROM produk";
//panggil fungsi query PDO
//untuk eksekusi query dan ambil datanya
//$ar_produk = $konek->query($sql);
$ar_judul = ['No','Fullname','Username','Email','Role','Last Login','Foto','Action'];
//ambil data produk dari model produk.php
$obj = new User(); //buat obj dari class produk
$ar_user = $obj->tampilkan(); //tampilkan fungsi tampilkan data
//--------------proses filter data dari sidebar-----------------
/*
$kat = $_REQUEST['kat'];
if(!empty($kat)){
  $rs = $obj->filter($kat);
}
//--------proses cari produk-----------
$keyword = $_REQUEST['keyword'];
if(!empty($keyword)){
  $hasil = $obj->search($keyword);
}
*/
if($sesi['nama'] == 'Administrator'){
  ?>

 <h3>User</h3> 
 <br/>

<?php if(isset($_SESSION['MEMBER'])){
        ?>
      

 <a class="btn btn-primary" href="index.php?page=form_user" role="button">Add User</a>
 <br/><br/>
<?php
}?>


 <table class="table table-striped">
  <thead>
    <tr>
      <?php
      foreach ($ar_judul as $jdl) {
      ?>
       <th scope="col"><?= $jdl; ?></th>
      <?php
      }
       ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    /*
    //filter atau data atau tidak sama seklai (tampilkan semua data)
    //$ar_data = (!empty($kat)) ? $rs : $ar_produk;
    if(!empty($kat)) $ar_data = $rs;
    else if(!empty($keyword)) $ar_data = $hasil;
    else $ar_data = $ar_barang;
    */
    foreach ($ar_user as $user){

    
    ?>
    <tr>

      <td width="10%"><?= $no ?></td>
      <td width="10%"><?= $user['fullname'] ?></td>
      <td width="10%"><?= $user['username'] ?></td>
      <td width="10%"><?= $user['email'] ?></td>
      <td width="10%"><?= $user['role'] ?></td>
      <td width="10%"><?= $user['last_login'] ?></td>
      <td width="20%"><img src="img/<?= $user['foto'] ?>" width="60%" /></td>    
      <td>


        <a class="btn btn-danger" href="index.php?page=form_user&idedit=<?= $user['id']; ?>" role="button">Edit User</a>
      </td>
    </tr>
    <?php
    $no++;
  }
  ?>
  </tbody>
</table>

<?php
}else{
  include_once 'terlarang2.php';
}
?>
</div> 