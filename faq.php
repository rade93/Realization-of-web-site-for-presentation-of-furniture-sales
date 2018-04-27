<?php include 'includes/db.php'; 
	$result = '';
	if(isset($_POST['pitaj'])){
		$upit = "INSERT INTO pitanja (ime_korisnika, email_korisnika, pitanje) VALUES ('$_POST[ime]', '$_POST[email]', '$_POST[pitanje]')";
		if(mysqli_query($conn,$upit)){
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Podaci su uspješno upisani!</div>';
			header('Location: faq.php');
			
		}else{
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Nesto nije u redu</div>';;
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>FAQ</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      	<link rel="stylesheet" href="css/custom.css">
       	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
</head>

<body style="background-color: sienna; background-size: cover; background-repeat: no-repeat;">
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
            <li class="active"><a href="faq.php">FAQ</a></li>
            <li><a href="vauceri.php">Vaučeri</a></li>
            <li><a href="penzioneri.php">Penzioneri</a></li>
            <li><a href="sindikalna_prodaja.php">Sindikalna prodaja</a></li>
            <li><a href="weding_lista.php">Weding lista</a></li>
            <li><a href="kartica.php">Kartica</a></li>
        </ul>
    </div>
</header>

<div style="width: 50px;height: 100px;"></div>
	<?php
			$sel_sql = "SELECT * FROM faq";
			$run_sql = mysqli_query($conn,$sel_sql);
			while($rows = mysqli_fetch_assoc($run_sql)){
				echo '
					<div class="container" style="margin-top: 5px;;">   	
							<div class="panel panel-warning">
								<div class="panel-heading">
									<h4 class="panel-title">'.$rows['pitanje_faq'].'</h4>
								</div>
								<div class="panel-body">    			
									<p>'.$rows['opis_faq'].'</p>  			
								</div>
							</div><!-- panel-default -->    	
					</div><!-- container -->

				';}
	?>
      
<section class="col-lg-6 text-center" style="color: white; text-align: center; margin-left: 330px;">                    
	<p style="color: white; font-size: 12pt;">NAPOMENA: Polja označena zvjezdicom (*) su obavezna!</p>
	<h2>Postavi pitanje</h2>                    
		<form class="form-horizontal" action="faq.php" method="post" role="form">
			<div class="form-group">
				<label for="name" class="col-sm-3 control-label">Ime *</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="name" name="ime" placeholder="Vaše ime" required>
				</div>
			</div>
			<div class="form-group">
				<label for="email" class="col-sm-3 control-label">Email *</label>
				<div class="col-sm-8">
					<input type="email" class="form-control" id="email" name="email" placeholder="Vaša Email adresa" required>
				</div>
			</div>
			<div class="form-group">
				<label for="comments" class="col-sm-3 control-label">Pitanje *</label>
				<div class="col-sm-8">
					<textarea class="form-control" rows="10" name="pitanje" style="resize:none;" placeholder="Ovdje upišite pitanje"></textarea>
				</div>
			</div>
			<div class="form-group">
				<label class="col-sm-3 control-label"></label>
				<div class="col-sm-8">
					<input type="submit" class="btn btn-block btn-primary" name="pitaj" style="margin-bottom: 50px;" value="Pošalji pitanje">
				</div>
			</div>
			<div style="height: 100px;"></div>
		</form> 
<!-- FOOTER ------------------------------------------------------------------------>
<?php include 'includes/footer.php'; ?>
</body>
</html>




