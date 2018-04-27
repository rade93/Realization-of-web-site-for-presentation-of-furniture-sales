<?php include '../includes/db.php'?>
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
        <?php include '../includes/header.php'; ?>
		<div style="width:50px;height:50px;"></div>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10">			
			<div class="page-header"><h1>Novi Post</h1></div>
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="new_category.php" method="post" enctype="multipart/form-data">	

				<div class="form-group">
					<label for="category">Naslov</label>
					<input id="category" type="text" name="category" class="form-control">
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