<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Kartica</title>
	
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="custom.css">
       	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
		
</head>

<body id="tijelo">
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
            <li><a href="penzioneri.php">Penzioneri</a></li>
            <li><a href="sindikalna_prodaja.php">Sindikalna prodaja</a></li>
            <li><a href="weding_lista.php">Weding lista</a></li>
            <li class="active"><a href="kartica.php">Kartica</a></li>
        </ul>
    </div>
</header>
<div style="height: 100px"></div>
<div class="container">
    <div class="row" style="margin-left: 200px;">
        <div class="col-sm-8">
			<div id="naslov">
				<h2 id="checkout_title">Unesite podatke sa Vaše kreditne kartice </h2>
			</div>
           	<div class="form-group">
           		<label for="card_number">Broj Kartice</label>
           		<input autocomplete="cc-number" data-cc-number="true"  class="form-control cc-number" data-stripe="number" id="cc_field" name="cc_number" placeholder="XXXX-XXXX-XXXX-XXXX" type="tel" maxlength="16">
				<div class="card-logos hidden-xs pull-right" style="vertical-align: middle;margin-top: -30px; margin-right: 10px;">
					<img height="25px" src="https://d2oz8i5n9se8ej.cloudfront.net/assets/visa-f35525a55ad99c786e3db49e022fab98c4b384ac4714d392156e037fdc045898.png" alt="Visa" />
					<img height="25px" src="https://d2oz8i5n9se8ej.cloudfront.net/assets/amex-b40f95acbab5e4fa0d746e053fa6aec5984a1368d545473c62dfd7eb3e14a29d.png" alt="Amex" />
					<img height="25px" src="https://d2oz8i5n9se8ej.cloudfront.net/assets/mastercard-cdc1a1b1ada3b1cc2eeeadbea065e7c5316271a5fa17863255f4429ef7d5a117.png" alt="Mastercard" />
				</div>
           	</div>
            <div class="row form-group">
				<div class="col-sm-6 item">
					<label class="control-default" for="cc-exp">
					  Datum Isteka
					</label>
					<input autocomplete="cc-exp" class="form-control cc-exp" data-cc-exp="true" data-numeric="true" data-stripe="exp" id="cc-exp" name="cc_exp" placeholder="MM/YYYY" type="tel">
				</div>
				<div class="col-sm-6 item">
					<label class="control-default" for="cc_cvc">
					  CVC Kod | Tajni kod
					</label>
					<input class="cc-cvc form-control" data-cc-csvc="true" data-stripe="cvc" id="cc_cvc" maxlength="3" name="cvc" placeholder="XXX" type="tel">
				</div>
  				<div class="col-sm-12">  				
   				<label for="card_name">Ime i Prezime</label>
           		<input class="form-control cc-text" data-stripe="text" name="cc_name" placeholder="Ime i Prezime" type="text">
           		</div>
    		</div>
           	<div class="row">
			  	<div class="col-sm-12">
					<div class="hidden"><img height="17px" class="hidden-loader" src="https://d2oz8i5n9se8ej.cloudfront.net/assets/loader-cef74d923a609f0a4ec365c358fbe74fae1e19d64011b21630f986b0e487b646.svg" alt="Loader" /></div>
					<button class="btn btn-secondary btn-hg btn-block verify-card" data-loading-text="Verifying your payment information" form="payment-form" data-original-text="Add Card" data-success-text="Verified." type="submit" id="verify_cc_btn" style="border-radius: 15px;">
				  	Add Card
					</button>
			  </div>
    		</div>
            
        </div>
    </div>
</div>

<div style="height: 30px;"></div>

<!-- FOOTER ------------------------------------------------------------------------>
<?php include 'includes/footer.php'; ?>
</body>
</html>
