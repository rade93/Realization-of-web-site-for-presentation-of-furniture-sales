<?php include 'includes/db.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Veleprodaja | Kontakti</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
       	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
</head>

<body style="background-image: url('slike/wood2.jpg'); background-size: cover; background-repeat: no-repeat;">
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
				<li class="active"><a href="vel_kontakti.php">Kontakti</a></li>				
			  </ul>
			</li>
           	<li><a href="aktuelno.php">Aktuelno</a></li>
           	<li><a href="sajmovi.php">Sajmovi</a></li>
            <li><a href="contact.php">Kontakt</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="vauceri.php">Vaučeri</a></li>
            <li><a href="penzioneri.php">Penzioneri</a></li>
            <li><a href="sindikalna_prodaja.php">Sindikalna prodaja</a></li>
            <li><a href="weding_lista.php">Weding lista</a></li>
            <li><a href="kartica.php">Kartica</a></li>
        </ul>
    </div>
</header>

<div style="width: 50px;height: 100px;"></div>
	<div style="margin:auto;">
		<div class="container" style=" font-size: 16px;">
		<div style="margin-left: 100px; margin-right: 100px; color: floralwhite;">
			
				<div class="table-responsive">
					<table style="width: 100%; border-bottom: 1px solid #eee" class="easy-table easy-table-default">
						<thead>
								<tr style="border-bottom: 2px solid white;">
									<th style="text-align: center;">KANCELARIJA</th>
									<th style="text-align: center;">TELEFON</th>
									<th style="text-align: center;">FAX</th>
									<th style="text-align: center;">EMAIL</th>
								</tr>
						</thead>
						<?php
				$sel_sql = "SELECT * FROM vel_kontakti";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
							
						
						<tbody style=" border-bottom: 1px solid white;">
							<tr>
								<td style="text-align: center;"><b>'.$rows['kancelarija_vel_kontakti'].'</b></td>
								<td style="text-align: center;">'.$rows['telefon_vel_kontakti'].'</td>
								<td style="text-align: center;">'.$rows['fax_vel_kontakti'].'</td>
								<td style="text-align: center;">'.$rows['email_vel_kontakti'].'</td>
							</tr>
							';}?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<div style="height: 100px;"></div>
<!-- FOOTER ------------------------------------------------------------------------>
<?php include 'includes/footer.php'; ?>
</body>
</html>
