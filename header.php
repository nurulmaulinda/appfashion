<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Fashion</title>
    <link rel="shortcut icon" type="text/css" href="img/logo2.jpg">
    <meta name="description" content="Source code generated using layoutit.com">
    <meta name="author" content="LayoutIt!">

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet"> 

    <style type="text/css">
    	html,body{
    		background:;
    		margin: 0;
    		padding: 0;
    		overflow-x: hidden;

    	}
    </style>

  </head>
  <body>

    <div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light navbar-dark bg-dark">
				 
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="navbar-toggler-icon"></span>
				</button> 
				<!-- <a class="navbar-brand" href="index.php?page=home">MY FASHION STYLE</a> -->
        <a href="index.php?page=home"><img src="img/logo2.jpg"  style="height: 50px; padding-left: 0px; "></a>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="navbar-nav">
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?page=product">Wonder Women <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							 <a class="nav-link" href="index.php?page=type">Super Hero</a>
						</li>
					
				<!-- <li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown">Katalog Product</a>S
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								 <a class="dropdown-item" href="index.php?page=type">Type Produk</a> 
								 <a class="dropdown-item" href="index.php?page=product">List Product</a> 
								 
							</div>
						</li> -->
				</ul>
					<form class="form-inline">
						<input class="form-control mr-sm-2" type="text" name="keyword" value=""/> 
						<button class="btn btn-primary my-2 my-sm-0" type="submit">
							Search Product
						</button>
						<input type="hidden" name="page" value="product" />
					</form>
					<ul class="navbar-nav ml-md-auto" style="text-align:right;">
						<?php
						if(!isset($sesi)){ //belum atau gagal login
						?>
						<li class="nav-item active">
							 <a class="nav-link" href="index.php?page=login">Login <span class="sr-only">(current)</span></a>
						</li>
					<?php
					}else{ //sudah berhasil login
					?>
						<li class="nav-item dropdown">
							 <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown">
							 	<img src="img/<?=$sesi['photo']; ?>" width="10%" />
							 	&nbsp;&nbsp;<?= $sesi['fullname']; ?>
							 	
							 </a>
							<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
								<?php
								if($sesi['nama']=='Administrator'){

								?>
								 <a class="dropdown-item" href="index.php?page=user">Kelola User</a>
								  <a class="dropdown-item" href="index.php?page=role">Kelola Role</a>
								  <?php } ?>
								   <a class="dropdown-item" href="index.php?page=profile">My Profile</a>
								<div class="dropdown-divider">
								</div> <a class="dropdown-item" href="logout.php">Logout</a>
							</div>
						</li>
					<!-- <?php } ?> -->
					</ul>
				</div>
			</nav>
		</div>
	</div