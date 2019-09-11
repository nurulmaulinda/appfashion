<?php
if(isset($_SESSION['MEMBER'])){
$ar_title = ['No','Code_product','Product','Stock','Price','Type','Photo','Action'];
 }else{
  $ar_title = ['No','Code_product','Product','Stock','Price','Type','Photo'];
}
$obj = new product();
$ar_product = $obj->tampilkan();

$kat = $_REQUEST['kat'];
if(!empty($kat)){
  $rs = $obj->filter($kat);
}

$keyword = $_REQUEST['keyword'];
if(!empty($keyword)){
  $result = $obj->search($keyword);
}
?>

 <h3>Product List</h3> 
 <br/>
 <?php
 if(isset($_SESSION['MEMBER'])){
  ?>
 <a class="btn btn-primary" href="index.php?page=form_product" role="button">Add Product</a>
 <br/><br/>
<?php } ?>
 <table class="table table-striped">
  <thead>
    <tr>
    	<?php
    	foreach ($ar_title as $ttl) {
    	?>
     	 <th scope="col"><?= $ttl; ?></th>
     	<?php
     	}
    	 ?>
    </tr>
  </thead>
  <tbody>
  	<?php
  	$no = 1;
    //filter atau data atau tidak sama seklai (tampilkan semua data)
    //$ar_data = (!empty($kat)) ? $rs : $ar_produk;
    if(!empty($kat)) $ar_data = $rs;
    else if(!empty($keyword)) $ar_data = $result;
    else $ar_data = $ar_product;

  	foreach ($ar_data as $prod){

  	
  	?>
    <tr>

      <td width="10%"><?= $no ?></td>
      <td width="10%"><?= $prod['code_product'] ?></td>
      <td width="10%"><?= $prod['name'] ?></td>
      <td width="10%"><?= $prod['stock'] ?></td>
      <td width="10%"><?= $prod['price'] ?></td>
      <td width="10%"><?= $prod['category'] ?></td>
      <td width="20%"><img src="img/<?= $prod['photo'] ?>" width="60%" /></td>
      <td>
<?php
 if(isset($_SESSION['MEMBER'])){
  ?>
        <a class="btn btn-danger" href="index.php?page=form_product&idedit=<?= $prod['id']; ?>" role="button">Edit Product</a>
<?php } ?>
      </td>

<td>
  <a class="btn btn-danger" href="index.php?page=form_product&idedit=<?= $prod['id']; ?>" role="button">Pesan</a>
</td>
    </tr>
    <?php
    $no++;
  }
    ?>
	
  </tbody>
</table>
