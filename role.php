
<?php 
//$sql = "SELECT * FROM produk";
//panggil fungsi query PDO
//untuk eksekusi query dan ambil datanya
//$ar_produk = $konek->query($sql);
if(isset($_SESSION['MEMBER'])){
$ar_roles = ['no','id','Name','Action'];
}else{
      $ar_roles = ['no','id','Name'];
  }
//ambil data produk dari model produk.php
$obj = new role(); //buat obj dari class produk
$ar_role = $obj->tampilkan(); //tampilkan fungsi tampilkan data
 ?>

 <h3>List Role</h3> 
 <br/>
 <?php
if(isset($_SESSION['MEMBER'])){


?>
 <a class="btn btn-primary" href="index.php?page=form_role" role="button">Add Role</a>
 <br/><br/>
 <?php } ?>
 <table class="table table-striped">
  <thead>
    <tr>
      <?php
      foreach ($ar_roles as $roles) {
      ?>
       <th scope="col"><?= $roles; ?></th>
      <?php
      }
       ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($ar_role as $role){

    
    ?>
    <tr>

      <td><?= $no ?></td>
      <td><?= $role['id']; ?></td>
      <td><?= $role['nama']; ?></td>
        <?php
      if(isset($_SESSION['MEMBER'])){
        ?>
      <td>
        <a class="btn btn-danger" href="index.php?page=form_role&idedit=<?= $role['id']; ?>" role="button">Edit Role</a>

      </td>
        <?php } ?>
    </tr>
    <?php
    $no++;
  }
  ?>
  </tbody>
</table>

