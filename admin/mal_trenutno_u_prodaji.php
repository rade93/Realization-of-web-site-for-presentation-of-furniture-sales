<?php include '../includes/db.php' ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
	 	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	  	<script>tinymce.init({ selector:'textarea' });</script>
        
		<meta charset utf-8>
    </head>
    <body>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10">			
			<div class="page-header"><h1>Maloprodaja | Trenutno u prodaji</h1></div>
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="new_category.php" method="post" enctype="multipart/form-data">	

					<div class="form-group">
						<label for="naslov">Naslov artikla</label>
						<input id="naslov" type="text" name="naslov" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="slika">Slika artikla</label>
						<input id="btn" type="file" name="slika" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="cijena">Cijena artikla</label>
						<input id="price" type="text" name="cijena" class="form-control">
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="submit_category" class="btn btn-danger btn-block">
					</div>
				</form>
			</div>			
		</div>       
        <footer></footer>
    </body>
</html>