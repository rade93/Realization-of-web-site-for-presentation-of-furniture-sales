<?php session_start();
	include '../includes/db.php';
	if(isset($_SESSION['user']) && isset ($_SESSION['password']) == true){
		$sel_sql="SELECT * FROM users WHERE a_email = '$_SESSION[user]' AND a_pass = '$_SESSION[password]'";
		if($run_sql = mysqli_query($conn,$sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				$ime = $rows['a_name'].' '.$rows['a_prezime'];
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
	if(isset($_POST['kontakti'])){
		$upit = "INSERT INTO kontakt (kancelarija_kontakt, email_kontakt, broj_kontakt) VALUES ('$_POST[kancelarija]', '$_POST[email]', '$_POST[telefon]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/kontakt.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE kontakt SET kancelarija_kontakt = '$_POST[kancelarija]', email_kontakt = '$_POST[email]', broj_kontakt = '$_POST[telefon]' WHERE id_kontakt = '$_POST[kont_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/kontakt.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM kontakt WHERE id_kontakt = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				header('Location: ../admin/kontakt.php');
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Kontakt</title>
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
		<?php echo $result; ?>
		
		<div class="col-lg-10">			
			<div class="page-header"><h1>Kontakt <a href="kontakt.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="kontakt.php" method="post" enctype="multipart/form-data">	
			<?php
				if(isset($_GET['dodaj'])){
				echo '
					<div class="form-group">
						<label for="kancelarija">Kancelarija:</label>
						<input id="kancelarija" type="text" name="kancelarija" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" type="email" name="email" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="telefon">Telefon:</label>
						<input id="telefon" type="text" name="telefon" class="form-control">
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="kontakti" class="btn btn-danger btn-block">
					</div>
				</form>
				';}?>
				<?php
					if(isset($_GET['edit_id'])){
					$sql = "SELECT * FROM kontakt WHERE id_kontakt = '$_GET[edit_id]'";
					$run = mysqli_query($conn,$sql);
					while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-lg-5" action="kontakt.php" method="post" enctype="multipart/form-data">	

					<div class="form-group">
						<label for="kont_id">ID</label>
						<input id="btn" type="text" name="kont_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>">
					</div>
					<div class="form-group">
						<label for="kancelarija">Kancelarija:</label>
						<input id="btn" type="text" name="kancelarija" class="form-control" value="<?php echo $rows['kancelarija_kontakt']; ?>">
					</div>
					
					<div class="form-group">
						<label for="email">Email</label>
						<input id="btn" type="email" name="email" class="form-control" value="<?php echo $rows['email_kontakt']; ?>">
					</div>
					
					<div class="form-group">
						<label for="telefon">Telefon:</label>
						<input id="btn" type="text" name="telefon" class="form-control" value="<?php echo $rows['broj_kontakt']; ?>">
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-warning btn-block" value="Uredi">
					</div>
				</form>
				<?php } 
					}
				?>
				<article>
					<div class="col-lg-3" style="color: black; margin-right: 80px; margin-left: 50px; margin-top: 20px; border-left: 3px solid black; height: 500px;">
						<?php
						$sel_sql = "SELECT * FROM kontakt";
						$run_sql = mysqli_query($conn,$sel_sql);
						while($rows = mysqli_fetch_assoc($run_sql)){
							echo '
								<h3><u>'.$rows['kancelarija_kontakt'].'</u></h3>
								<p style="font-size: 14pt;">'.$rows['email_kontakt'].'</p>
								<p style="font-size: 14pt;">'.$rows['broj_kontakt'].'</p>
								<div>
								<a href="kontakt.php?edit_id='.$rows['id_kontakt'].'" class="btn btn-warning">Uredi</a>
								<a href="kontakt.php?del_id='.$rows['id_kontakt'].'" class="btn btn-danger" onclick="return confirm()";>Ukloni</a>
								<div>
						';}?>
					</div>
					<div style="height: 100px;"></div>
				</article> 
			</div><!-- container-fluid -->	
			
		</div>
       
<?php echo include '../includes/footer.php'; ?>
    </body>
</html>