<?php include 'includes/db.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Katalog tekstila</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/sminka.css">
       	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
</head>

<body>
<!-- header -->
<?php include 'includes/navbar.php'; ?>
	<div id="artikli"></div>
	<div>
		<div class="container">	
			<?php
				$sel_sql = "SELECT * FROM mal_katalog_tekstila";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
				echo '
				<div class="col-sm-6">
					<img id="slika" class="modal-content" src="'.$rows['slika_m_katalog_tekstila'].'" alt="Katalog tekstila"><br />
				</div>
			';}?>					
		</div>
	</div><!-- col-md-3 -->
<h3 >Katalog tekstila</h3>
<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>
</body>
</html>
