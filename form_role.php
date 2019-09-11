<?php
//ciptakan object jenis
  $obj = new role();

  //------------------Proses edit data produk------------------------------------------------
  //tangkap request idedit
  $idedit = $_REQUEST['idedit'];
  if(!empty($idedit)){ //-------------modes edit data lama-------------------
    $col = $obj->tampilkan($idedit);

  }else{ //-------------modes entry data baru-------------------
    $col = [];

  }

  //------------------Lookuo data untuk select option element form jenis-------------------------
  //ambil data jenis produk untuk select option element form jenis

  //$rs = $obj->find();
  //print_r($row); exit;
  ?>

<h3>Form Role</h3>
<form method="POST" action="roleController.php">
  <div class="form-group">
    <label>Name</label>
    <input type="text" name="role" value="<?= $col['nama']; ?>"
    class="form-control" placeholder="Input New Role"/>
  </div>
  <?php 

  if(empty($idedit)){ //-------------modus entry data baru-------------

  ?>

   <button type="submit" name="proses" value="simpan" class="btn btn-primary">Simpan</button>

<?php 
}
else{  //-------------modes edit data lama-------------------
?>

  <button type="submit" name="proses" value="ubah" class="btn btn-warning">Ubah</button>
  <button type="submit" name="proses" value="hapus" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin Untuk Menghapus?')">Hapus</button>
<input type="hidden" name="idx" value="<?= $idedit; ?>" />
<?php } ?>

  <button type="reset" name="unproses" value="batal" class="btn btn-primary">Batal</button>
</form>
