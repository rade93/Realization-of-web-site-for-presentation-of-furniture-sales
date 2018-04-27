<?php session_start();
	include '../includes/db.php';
	if(isset($_SESSION['user']) && isset ($_SESSION['password']) == true){
		$sel_sql="SELECT * FROM users WHERE a_email = '$_SESSION[user]' AND a_pass = '$_SESSION[password]'";
		if($run_sql = mysqli_query($conn,$sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				$ime = $rows['a_name'].' '.$rows['a_prezime'];
				$zanimanje = $rows['a_zanimanje'];
				$adress = $rows['a_adresa'].' '.$rows['a_grad'];
				$phone = $rows['a_telefon'];
				$gender = $rows['a_pol'];
				$site = $rows['a_web_sajt'];
				$about = $rows['a_o_adminu'];
				if (mysqli_num_rows($run_sql) == 1){
					
				}else{
					header('Location: ../index.php?postoji_vise_redova_sa_istim_podacima');
				}
			}
		}else {
			header('Location: ../index.php?upit_nije_prosao');
		}
	}else{
		header('Location: ../index.php?morate_se_ulogovati');
	}
	$result = '';
	if(isset($_POST['profil'])){
		if($_POST['password'] == $_POST['con_password']){
			$upit = "INSERT INTO users (a_name, a_prezime, a_zanimanje, a_adresa, a_grad, a_telefon, a_email, a_pass, a_pol, a_web_sajt, a_o_adminu) VALUES ('$_POST[ime]', '$_POST[prezime]', '$_POST[zanimanje]', '$_POST[adresa]', '$_POST[grad]', '$_POST[telefon]', '$_POST[mejl]', '$_POST[password]', '$_POST[pol]', '$_POST[stranica]', '$_POST[o_adminu]')";
			if(mysqli_query($conn,$upit)){
				$result = '<div class="alert alert-success col-sm-5" style="margin-top: 10px;">Uspjesno ste dodali novog administratora!</div>';
			}else{
				$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Upit ne radi!</div>';
			}
		}else{
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Sifre se ne podudaraju!</div>';
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
        
		<meta charset utf-8>
    </head>
    <body>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10">

			<!-- PROFIL KORISNIKA -->
			<div class="col-lg-10">
				
				<div class="panel panel-primary">
					<div class="panel-heading">
						<div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size: 13em"></i></div>	
						<div class="col-md-3">
							<h3><u><?php echo $ime; ?></u></h3>
							<p><i class="glyphicon glyphicon-heart"></i> <?php echo $zanimanje; ?></p>
							<p><i class="glyphicon glyphicon-road"></i> <?php echo $adress; ?></p>
							<p><i class="glyphicon glyphicon-phone"></i> <?php echo $phone; ?></p>
							<p><i class="glyphicon glyphicon-envelope"></i> <?php echo $_SESSION['user']; ?></p>
						</div>
						<div class="clearfix"></div>	
					</div>									
				</div><!-- panel-primary -->
			</div>	
			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-heading">
						<table class="table table-condensed">
							<tbody>
								<tr>
									<th>Pol</th>
									<td><?php echo ucfirst($gender); ?></td>
								</tr>
								<tr>
									<th>Web sajt</th>
									<td><?php echo $site; ?></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h4>O meni</h4>
						<p><?php echo $about; ?></p>
					</div>
				</div>
			</div>
					
			<div class="col-lg-10">				
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="page-header"><h1>Dodaj novog administratora</h1></div>
						<div class="container-fluid">
							<form class="form-horizontal col-lg-5" action="profile.php" method="post" encryption="multipart/form-data">
								<div class="form-group">
								<p style="color: red;">Napomena: polja označena zvjezdicom (*) su obavezna.<p>
									<label for="ime">Ime *</label>
									<input id="ime" type="text" name="ime" class="form-control" placeholder="Marko" required>
								</div>	
								<div class="form-group">
									<label for="prezime">Prezime *</label>
									<input id="prezime" type="text" name="prezime" class="form-control" placeholder="Markovic" required>
								</div>
								<div class="form-group">
									<label for="zanimanje">Zanimanje *</label>
									<input id="zanimanje" type="text" name="zanimanje" class="form-control" placeholder="Frontend developer" required>
								</div>
								<div class="form-group">
									<label for="adresa">Adresa *</label>
									<input id="adresa" type="text" name="adresa" class="form-control" placeholder="Ul. Petra Kocica" required>
								</div>
								<div class="form-group">
									<label for="grad">Grad *</label>
									<input id="grad" type="text" name="grad" class="form-control" placeholder="Banja Luka" required>
								</div>
								<div class="form-group">
									<label for="telefon">Telefon *</label>
									<input id="telefon" type="text" name="telefon" class="form-control" placeholder="065123456" required>
								</div>
								<div class="form-group">
									<label for="mejl">E-mail *</label>
									<input id="mejl" type="text" name="mejl" class="form-control" placeholder="marko@gmail.com" required>
								</div>
								<div class="form-group">
									<label for="password">Sifra *</label>
									<input id="password" type="password" name="password" class="form-control" placeholder="********" required>
								</div>
								<div class="form-group">
									<label for="con_password">Potvrdi sifru *</label>
									<input id="con_password" type="password" name="con_password" class="form-control" placeholder="********" required>
								</div>
								<div class="form-group">
									<label for="pol">Pol *</label>
									<select class="form-control" name="pol" id="pol" required>
										<option value="musko">Musko</option>
										<option value="zensko">Zensko</option>
									</select> 
								</div>
								<div class="form-group">
									<label for="stranica">Web Sajt</label>
									<input id="stranica" type="text" name="stranica" class="form-control" placeholder="www.naziv.com">
								</div>
								<div class="form-group">
									<label for="o_adminu">O administratoru</label>									
										<textarea class="form-control" rows="5" style="resize:none;" name="o_adminu"></textarea>					
								</div>					
								<div class="form-group">
									<input id="btn" type="submit" name="profil" class="btn btn-danger btn-block">
								</div>
							</form>			
						</div>
						
					</div>									
				</div><!-- panel-warning -->
				<div style="height: 100px;"></div>
			</div>
		</div>
        <?php include '../includes/footer.php'; ?>
    </body>
</html>