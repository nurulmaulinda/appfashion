
<?php 
//$sql = "SELECT * FROM produk";
//panggil fungsi query PDO
//untuk eksekusi query dan ambil datanya
//$ar_produk = $konek->query($sql);
if(isset($_SESSION['MEMBER'])){
$ar_typeproduct = ['no','id','Name','Action'];
}else{
      $ar_typeproduct = ['no','id','Name'];
  }
//ambil data produk dari model produk.php
$obj = new type(); //buat obj dari class produk
$ar_type = $obj->tampilkan(); //tampilkan fungsi tampilkan data
 ?>

 <h3>List Type Product</h3> 
 <br/>
 <?php
if(isset($_SESSION['MEMBER'])){


?>
 <a class="btn btn-primary" href="index.php?page=form_type" role="button">Add Type Product</a>
 <br/><br/>
 <?php } ?>
 <table class="table table-striped">
  <thead>
    <tr>
      <?php
      foreach ($ar_typeproduct as $tpproduct) {
      ?>
       <th scope="col"><?= $tpproduct; ?></th>
      <?php
      }
       ?>
    </tr>
  </thead>
  <tbody>
    <?php
    $no = 1;
    foreach ($ar_type as $tpproduct){

    
    ?>
    <tr>

      <td><?= $no ?></td>
      <td><?= $tpproduct['id']; ?></td>
      <td><?= $tpproduct['name']; ?></td>
        <?php
      if(isset($_SESSION['MEMBER'])){
        ?>
      <td>
        <a class="btn btn-danger" href="index.php?page=form_type&idedit=<?= $tpproduct['id']; ?>" role="button">Edit Type Product</a>

      </td>
        <?php } ?>
    </tr>
    <?php
    $no++;
  }
  ?>
  </tbody>
</table>

