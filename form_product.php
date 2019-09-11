<?php
//ciptakan object jenis
  $obj = new type();
  $obj_prod = new product();
  //------------------Proses edit data produk------------------------------------------------
  //tangkap request idedit
  $idedit = $_REQUEST['idedit'];
  if(!empty($idedit)){ //-------------modes edit data lama-------------------
   $row = $obj_prod->temukan($idedit);

  }else{ //-------------modes entry data baru-------------------
    $row = [];

  }

  //------------------Lookuo data untuk select option element form jenis-------------------------
  //ambil data jenis produk untuk select option element form jenis

 $rs = $obj-> tampilkan();
 	//print_r($row); exit;
  ?>

<h3>Form Product</h3>
<form method="POST" action="productController.php">
  <div class="form-group">
    <label>Code</label>
    <input type="text" name="code_product" value="<?= $row['code']; ?>"
    class="form-control" placeholder="Input code"/>
  </div>

   <div class="form-group">
    <label>Product</label>
    <input type="text" name="product" value="<?= $row['name']; ?>"
    class="form-control" placeholder="Input product"/>
  </div>

  <div class="form-group">
    <label>Stock</label>
    <input type="text" name="stock" value="<?= $row['stock']; ?>"
    class="form-control" placeholder="Input stock"/>
  </div>

  <div class="form-group">
    <label>Price</label>
    <input type="text" name="price" value="<?= $row['price']; ?>"
    class="form-control" placeholder="Input price"/>
  </div>


  <div class="form-group">
    <label>Type</label>
    <select name="type" class="form-control">
    	<option value="">-- choose Type Product --</option>
    	<?php
    	foreach ($rs as $t) {
        //------edit jenis produk-----------
        $selected = ($row['idtype'] == $t['id']) ? 'selected' : '';
    	?>
    	<option value="<?=$t['id']; ?>"<?= $selected; ?>> <?=$t['name']; ?></option>
    <?php 
		} 
    ?>
    </select>
  </div>

  <div class="form-group">
    <label>Photo</label>
    <input type="text" name="photo" value="<?= $row['photo']; ?>"
    class="form-control" placeholder="Input Nama File Foto"/>
  </div>
  <?php 

  if(empty($idedit)){

  ?>

   <button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>

<?php 
}
else{ 
?>

  <button type="submit" name="proses" value="ubah" class="btn btn-warning">Ubah</button>
  <button type="submit" name="proses" value="hapus" class="btn btn-danger" onclick="return confirm('Cius nih dihapus?')">Hapus</button>
  <input type="hidden" name="idx" value="<?= $idedit; ?>" />
<?php } ?>
  <button type="reset" name="unproses" value="batal" class="btn btn-primary">Batal</button>

</form>