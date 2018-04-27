<?php include 'includes/db.php' ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sindikalna prodaja</title>	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="custom.css">
       	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>		
</head>
<body style="background-color:sienna; background-size: cover; background-repeat: no-repeat;">
<!-- header -->
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
            <li><a href="penzioneri.php">Penzioneri</a></li>
            <li class="active"><a href="sindikalna_prodaja.php">Sindikalna prodaja</a></li>
            <li><a href="weding_lista.php">Weding lista</a></li>
            <li><a href="kartica.php">Kartica</a></li>
        </ul>
    </div>
</header>
<div style="color: white">
<div class="col-lg-12">
	<div style="margin-top: 70px;"></div>
        
	<div class="container" style="text-align: center;">                        
		<h3><u>Sindikali koji posluju sa nama</u></h3>            
			<?php
				$sel_sql = "SELECT lista_naslov4 FROM `sindikalna_prodaja` WHERE lista_naslov4 IS NOT NULL";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<div>'.$rows['lista_naslov4'].'<br><br></div>
					';
				}
			?>
		<div style="margin-bottom: 50px;">
			<h4><i>Ako Vaš sindikat nije na ovom spisku, a želite da i članovi Vašeg sindikata kupuju
			kod nas preko administrativne zabrane i želite da sa nama sklopite ugovor o sindikalnoj
			prodaji javite se.</i></h4>
		</div>
		<br>   
	</div><!-- pull-right col-sm-5 -->
        <br>
</div><!-- col-lg-12 -->
<div style="margin-bottom: 30px;"></div>
<!-- FOOTER -->
<?php include 'includes/footer.php'; ?>
</body>
</html>
