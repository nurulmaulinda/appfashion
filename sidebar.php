<div class="row-fluid">
		<div class="col-md-3">
			<div class="list-group">
							
				 <a href="#" class="list-group-item list-group-item-action active">Product Type</a>

				 <?php
				 $obj = new type();
				 $rs = $obj->tampilkan();
				 foreach ($rs as $row) {

				 ?></a>

				<div class="list-group-item "> 
				<a class="dropdown-item" href="index.php?page=product&kat=<?= $row['id']; ?>">
					<?= $row['name']; ?>
				</a>

			</div>


				<?php  } ?>
		</div>
			 <a href="#" class="list-group-item list-group-item-action active">Lifestle</a>
			 
	</div>