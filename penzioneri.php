<?php include 'includes/db.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Penzioneri</title>
	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="custom.css">
       	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
</head>

<body style="background-color:sienna; background-size: cover; background-repeat: no-repeat;">
<!-- header ----------------------------------------------------------->
<header class="navbar navbar-default navbar-fixed-top">
    <div class="">
        <a href="index.php" class="navbar-brand" style="margin-left: 100px;">SN</a>
        <ul class="nav navbar-nav navbar-right" style="margin-right: auto;">
           	<li><a href="index.php">O nama</a></li>
           	<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Maloprodaja <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="mal_tren_u_ponudi.php">Trenutno u ponudi</a></li>
				<li><a href="mal_novo_u_ponudi.php">Novo u ponudi</a></li>
				<li><a href="katalog_namjestaja.php">Katalog namještaja</a></li>
				<li><a href="katalog_tekstila.php">Katalog tekstila</a></li>				
			  </ul>
			</li>
           	<li class="dropdown">
			  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Veleprodaja <span class="caret"></span></a>
			  <ul class="dropdown-menu">
				<li><a href="vel_trenutno_u_prodaji.ph">Trenutno u prodaji</a></li>
				<li><a href="vel_katalog_tekstila.php">Katalog tekstila</a></li>
				<li><a href="vel_ugostiteljstvo.php">Ugostiteljstvo</a></li>
				<li><a href="vel_kontakti.php">Kontakti</a></li>				
			  </ul>
			</li>
           	<li><a href="aktuelno.php">Aktuelno</a></li>
           	<li><a href="sajmovi.php">Sajmovi</a></li>
            <li><a href="contact.php">Kontakt</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="vauceri.php">Vaučeri</a></li>
            <li class="active"><a href="penzioneri.php">Penzioneri</a></li>
            <li><a href="sindikalna_prodaja.php">Sindikalna prodaja</a></li>
            <li><a href="weding_lista.php">Weding lista</a></li>
            <li><a href="kartica.php">Kartica</a></li>
        </ul>
    </div>
</header>

<div style="margin:auto;">
	<div class="container" style="margin-left: 250px;"><br>
		<?php
			$sel_sql = "SELECT * FROM penzioneri ORDER BY id_penzioneri DESC";
			$run_sql = mysqli_query($conn,$sel_sql);
			while($rows = mysqli_fetch_assoc($run_sql)){
				echo '
					<h3>'.$rows['naslov3_penzioneri'].'</h3>
					<div class="row col-sm-9">
						<p class="pull-left" style="width: 100%; margin-right: 20px; margin-top: 30px; text-align: justify">'.$rows['tekst3_penzioneri'].'</p>
					</div>
					<div class="row">
						<img src="'.$rows['slika3_penzioneri'].'" alt="sajmovi" class="pull-right" style="width: 300px; height: 250px; border-radius: 10px;">
					</div>
					';
			}
		?>
	</div><!-- container -->
</div><!-- margin-auto -->
<div style="height: 100px;"></div>
<!-- FOOTER ------------------------------------------------------------------------>
<?php include 'includes/footer.php'; ?>
</body>
</html>
