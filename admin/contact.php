<?php session_start();
	include '../includes/db.php';
	if(isset($_SESSION['user']) && isset ($_SESSION['password']) == true){
		$sel_sql="SELECT * FROM users WHERE a_email = '$_SESSION[user]' AND a_pass = '$_SESSION[password]'";
		if($run_sql = mysqli_query($conn,$sel_sql)){
				if (mysqli_num_rows($run_sql) == 1){
					
				}else{
					header('Location: ../index.php?postoji_vise_redova_sa_istim_podacima');
				}
		}else {
			header('Location: ../index.php?upit_nije_prosao');
		}
	}else{
		header('Location: ../index.php?morate_se_ulogovati');
	}
	$poruka = '';
	if(isset($_POST['kontakti'])){
		$upit = "INSERT INTO kontakt (kancelarija_kontakt, email_kontakt, broj_kontakt) VALUES ('$_POST[naslov]', 'slike/$_POST[slika]', '$_POST[cijena]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/mal_trenutno_u_ponudi.php');
		}else{
			$poruka = '<div class="alert alert-danger"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
?>
<!DOCTYPE html>
<html>

    <head>
    
        <title>Kontakt</title>
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.js"></script>
    </head>
    
    <body>
    <?php include 'includes/header.php' ?>
        <div class="container">
        
            <article class="row">
            
                <section class="col-lg-8">
                    <div class="jumbotron">
                        <h2>Kontakt Forma</h2>
                    </div>
                    <form class="form-horizontal" action="contact.php" method="post" role="form">
						<div class="form-group">
							<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" id="name" name="ime" placeholder="Name">
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
							<input id="btn" type="submit" name="kontakti" class="btn btn-block btn-primary">
						</div>
						</div>
					</form>
                
                </section><!-- section -->
            
            </article><!-- article -->
            
        </div><!-- container -->
    
    </body>
    
</html>