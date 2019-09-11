<div class="col-md-9">
	<?php
	$page = $_GET['page'];
	if (!empty($page)){
		include_once $page.'.php';

	}else{
		include_once 'home.php';
	}
	?>
	
</div>
</div>