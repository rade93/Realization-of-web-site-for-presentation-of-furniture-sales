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
	if(isset($_POST['posalji'])){
		$upit = "INSERT INTO penzioneri (naslov3_penzioneri, tekst3_penzioneri, slika3_penzioneri) VALUES ('$_POST[naslov3]', '$_POST[opis3]', 'slike/$_POST[slika3]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/penzioneri.php');
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Podaci su uspješno upisani!</div>';
		}else{
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Nesto nije u redu</div>';
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE penzioneri SET naslov3_penzioneri = '$_POST[naslov3]', tekst3_penzioneri = '$_POST[opis3]', slika3_penzioneri = 'slike/$_POST[slika3]' WHERE id_penzioneri = '$_POST[penz_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/penzioneri.php');
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Podaci su uspješno upisani!</div>';
		}else{
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Nesto nije u redu</div>';
		}
	}
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM penzioneri WHERE id_penzioneri = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				header('Location: ../admin/penzioneri.php');
			}else{
				$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 50px;" margin-left: 100px;>Nesto nije u redu</div>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Penzioneri</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../custom.css">
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
	 	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	  	<script>tinymce.init({ selector:'textarea' });</script>
        
		<meta charset utf-8>
    </head>
    <body>
        <?php include 'includes/header.php'; ?>
		<div style="height:30px;"></div>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10">			
			<div class="page-header"><h1>Penzioneri <a href="penzioneri.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<?php
			if(isset($_GET['dodaj'])){
				echo '
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="penzioneri.php" method="post" encryption="multipart/form-data">	
				<div class="form-group">
					<label for="naslov3">Naslov</label>
					<input id="naslov_penz3" type="text" name="naslov3" class="form-control">
				</div>
				<div class="form-group">
					<label for="opis3">Opis</label>
					<div class="col-sm-12">
							<textarea class="form-control" rows="10" style="resize:none;" name="opis3"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="slika3">Slika artikla</label>
					<input id="btn" type="file" name="slika3" class="form-control">
				</div>
				<div class="form-group">
					<input id="btn" type="submit" name="posalji" class="btn btn-danger" value="Posalji">
				</div>
			</form>
			</div>
			
			';}
		?>
			<?php
			if(isset($_GET['edit_id'])){
			$sql = "SELECT * FROM penzioneri WHERE id_penzioneri = '$_GET[edit_id]'";
			$run = mysqli_query($conn,$sql);
			while($rows = mysqli_fetch_assoc($run)){?>
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="penzioneri.php" method="post" encryption="multipart/form-data">	
				<div class="form-group">
					<input id="penz_id" type="text" name="penz_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>">
					<label for="naslov3">Naslov</label>
					<input id="naslov_penz3" type="text" name="naslov3" class="form-control" value="<?php echo $rows['naslov3_penzioneri']; ?>">
				</div>
				<div class="form-group">
					<label for="opis3">Opis</label>
					<div class="col-sm-12">
							<textarea class="form-control" rows="10" style="resize:none;" name="opis3"><?php echo $rows['tekst3_penzioneri']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<img src="<?php echo $rows['slika3_penzioneri']; ?>" style="width: 220px; height: 170px;">
					<label for="slika3">Slika artikla</label>
					<input id="btn" type="file" name="slika3" class="form-control">
				</div>
				<div class="form-group">
					<input id="btn" type="submit" name="uredi" class="btn btn-warning" value="Uredi">
				</div>
			</form>
			</div>
			<?php } 
			}
		?>
		</div>
			<hr>
			<!-- REZULTATI --------------------------------------------------------------------------------------->
<div style="margin:auto;">
	<div class="container" style="margin-left: 250px;"><br>
		<h3 style="margin-top: 50px;">Pregled rezultata</h3><br>
		<?php
			$sel_sql = "SELECT * FROM penzioneri ORDER BY id_penzioneri DESC";
			$run_sql = mysqli_query($conn,$sel_sql);
			while($rows = mysqli_fetch_assoc($run_sql)){
				echo '
					<h3>'.$rows['naslov3_penzioneri'].'</h3>
					<div class="row col-sm-9">
						<p class="pull-left" style="width: 100%; margin-right: 20px; margin-top: 30px; text-align: justify">'.$rows['tekst3_penzioneri'].'</p>
					</div>
						<img src="'.$rows['slika3_penzioneri'].'" alt="sajmovi" class="pull-right" style="width: 300px; height: 250px; border-radius: 10px;">
					<div class="row">
						<a href="penzioneri.php?del_id='.$rows['id_penzioneri'].'" class="btn btn-danger pull-right" onclick="return confirm()"; style="margin: 10px 10px;">Ukloni</a>
						<a href="penzioneri.php?edit_id='.$rows['id_penzioneri'].'" class="btn btn-warning pull-right" style="margin: 10px 10px;">Uredi</a>
					</div>
					';
			}
		?>
	</div><!-- container -->
</div><!-- margin-auto -->
<div style="height: 100px;"></div>
<!-- FOOTER ------------------------------------------------------------------------>
<?php include '../includes/footer.php'; ?>
    </body>
</html>