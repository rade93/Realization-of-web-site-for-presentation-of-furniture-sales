<?php include 'includes/db.php'; ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Kontakt</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
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
            <li class="active"><a href="contact.php">Kontakt</a></li>
            <li><a href="faq.php">FAQ</a></li>
            <li><a href="vauceri.php">Vaučeri</a></li>
            <li><a href="penzioneri.php">Penzioneri</a></li>
            <li><a href="sindikalna_prodaja.php">Sindikalna prodaja</a></li>
            <li><a href="weding_lista.php">Weding lista</a></li>
            <li><a href="kartica.php">Kartica</a></li>
        </ul>
    </div>
</header>

<div style="width: 50px;height: 50px;"></div>
	
	<div>        
            <article class="row text-center" style="margin-top: 50px; color: white; margin-left: 200px">            
                <section class="col-lg-6">                    
                        <h2 >Kontakt Forma</h2>                    
                    <form class="form-horizontal" action="contact.php" method="post" role="form">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="name" placeholder="Name">
						</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-8">
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
						</div>
						<div class="form-group">
							<label for="subject" class="col-sm-2 control-label">Subject</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="subject" placeholder="Subject">
						</div>
						</div>
						<div class="form-group">
							<label for="comments" class="col-sm-2 control-label">Comment</label>
						<div class="col-sm-8">
							<textarea class="form-control" rows="10" style="resize:none;"></textarea>
						</div>
						</div>
						<div class="form-group">
							<label class="col-sm-2 control-label"></label>
						<div class="col-sm-8">
							<input type="submit" class="btn btn-block btn-primary">
						</div>
						</div>
					</form>                
                </section><!-- section -->   
                <article>
                   	<div class="col-lg-3" style="color: white; margin-right: 80px; margin-top: 20px; border-left: 3px solid white; height: 500px;">
                   	<?php
						$sel_sql = "SELECT * FROM kontakt";
						$run_sql = mysqli_query($conn,$sel_sql);
						while($rows = mysqli_fetch_assoc($run_sql)){
							echo '
								<h3><u>'.$rows['kancelarija_kontakt'].'</u></h3>
								<p style="font-size: 14pt;">'.$rows['email_kontakt'].'</p>
								<p style="font-size: 14pt;">'.$rows['broj_kontakt'].'</p>
					';}?>
                   		
                   	</div>
                   </article>         
            </article><!-- article -->  
                   
        </div><!-- container -->
        
        

<!-- FOOTER ------------------------------------------------------------------------>
<?php include 'includes/footer.php'; ?>
</body>
</html>




