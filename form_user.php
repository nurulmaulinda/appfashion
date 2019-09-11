<?php
//ciptakan object jenis
  $obj = new  role();
  $obj_prod = new user();
  //------------------Proses edit data produk------------------------------------------------
  //tangkap request idedit
  $idedit = $_REQUEST['idedit'];
  if(!empty($idedit)){ //-------------modes edit data lama-------------------
   $row = $obj_prod->tampilkan($idedit);

  }else{ //-------------modes entry data baru-------------------
    $row = [];

  }

  //------------------Lookuo data untuk select option element form jenis-------------------------
  //ambil data jenis produk untuk select option element form jenis

 $rs = $obj-> tampilkan();
 	//print_r($row); exit;
  ?>

<h3>Form User</h3>
<form method="POST" action="userController.php">
  <div class="form-group">
    <label>fullname</label>
    <input type="text" name="fullname" value="<?= $row['fullname']; ?>"
    class="form-control" placeholder="Input fullname"/>
  </div>

   <div class="form-group">
    <label>username</label>
    <input type="text" name="username" value="<?= $row['username']; ?>"
    class="form-control" placeholder="Input username"/>
  </div>

  <div class="form-group">
    <label>password</label>
    <input type="password" name="password" value="<?= $row['password']; ?>"
    class="form-control" placeholder="Input password"/>
  </div>

  <div class="form-group">
    <label>email</label>
    <input type="email" name="email" value="<?= $row['email']; ?>"
    class="form-control" placeholder="Input email"/>
  </div>


  <div class="form-group">
    <label>Role</label>
    <select name="idrole" class="form-control">
    	<option value="">-- choose role --</option>
    	<?php
    	foreach ($rs as $u) {
        //------edit jenis produk-----------
        $selected = ($row['idrole'] == $u['id']) ? 'selected' : '';
    	?>
    	<option value="<?=$u['id']; ?>"<?= $selected; ?>> <?=$u['nama']; ?></option>
    <?php 
		} 
    ?>
    </select>
  </div>

  <div class="form-group">
    <label>Photo</label>
    <input type="text" name="foto" value="<?= $row['foto']; ?>"
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