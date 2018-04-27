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
        <?php include 'includes/header.php'; ?>
		<div style="width:50px;height:50px;"></div>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10">			
			<div class="page-header"><h1>Novi Post</h1></div>
			<div class="container-fluid">
				<form class="form-horizontal" action="new_post.php" method="post" enctype="multipart/form-data">	
				<div class="form-group">
					<label for="category">Kategorija: </label>
					<select id="category" name="category" class="form-group-sm">
						<option value="">Izaberi</option>
						<option>O nama</option>
						<option>-----------------</option>
						<option>M.P.Trenutno u ponudi</option>
						<option>M.P.Novo u ponudi</option>
						<option>M.P.Katalog namještaja</option>
						<option>M.P.Katalog tekstila</option>
						<option>-----------------</option>
						<option>V.P.Trenutno u prodaji</option>
						<option>V.P.Katalog tekstila</option>
						<option>V.P.Ugostiteljstvo</option>
						<option>V.P.Kontakti</option>
						<option>-----------------</option>
						<option>Aktuelno</option>
						<option>Sajmovi</option>
						<option>Kontakt</option>
						<option>FAQ</option>
						<option>Vaučeri</option>
						<option>Penzioneri</option>
						<option>Sindikalna prodaja</option>
						<option>Weding lista</option>
						<option>Kartica</option>
					</select>
				</div>				
				<div class="form-group">
					<label for="status">Status</label>
					<select id="status" name="status" class="form-control">
						<option value="publish">Objavi</option>
						<option value="draft">Planiraj</option>
					</select>
				</div>
				<div class="form-group">
					<label for="title">Naslov</label>
					<input id="title" type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label for="picture">Slika</label>
					<input id="picture" type="file" name="image" class="btn btn-primary">
				</div>
				<div class="form-group">
					<label for="about">O nama</label>
					<textarea id="about" name="about"></textarea>
				</div>
				<div class="form-group">
					<label for="btn"></label>
					<input id="btn" type="submit" name="submit_post" class="btn btn-danger btn-block">
				</div>
			</form>
			</div>		
			
		</div>
       
        <footer></footer>
    </body>
</html>