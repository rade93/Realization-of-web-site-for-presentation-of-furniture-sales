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
		$query = "INSERT INTO weding (naslov3weding, tekst3weding, slika3weding) VALUES ('$_POST[naslov]', '$_POST[tekst]', 'slike/$_POST[slika]')";
		if(mysqli_query($conn,$query)){
			header('Location: ../admin/wedding_lista.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE weding SET naslov3weding = '$_POST[naslov]', tekst3weding = '$_POST[tekst]', slika3weding = 'slike/$_POST[slika]' WHERE id_weding = '$_POST[wed_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/wedding_lista.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';
		}
	}
		
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM weding WHERE id_weding = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				header('Location: ../admin/wedding_lista.php');
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 50px;" margin-left: 100px;>Nesto nije u redu</div>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Wedding lista</title>
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
		<div style="width:50px;height:50px;"></div>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10">			
			<div class="page-header"><h1>Wedding lista <a href="wedding_lista.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<div class="container-fluid">
				<?php
			if(isset($_GET['dodaj'])){
				echo '
				<form class="form-horizontal col-lg-5" action="wedding_lista.php" method="post" encryption="multipart/form-data">	
					<div class="form-group">
						<label for="naslov_wedding">Naslov</label>
						<input id="naslov_wedding" type="text" name="naslov" class="form-control" placeholder="(npr. Lista stvari za doček vjenčanja)">
					</div>
					<div class="form-group">
						<label for="zadaci">Tekst</label>
						<div class="col-sm-12">
							<textarea class="form-control" rows="10" style="resize:none;" name="tekst"></textarea>
						</div>
					</div>
					<div class="form-group">
						<label for="slika_zadaci">Dodaj sliku kao opis zadataka</label>
						<input id="btn" type="file" name="slika" class="form-control">
					</div>
					<div class="form-group">
						<input id="btn" type="submit" name="posalji" class="btn btn-danger btn-block" value="Dodaj">
					</div>
				</form>
			';}?>
			<?php
			if(isset($_GET['edit_id'])){
			$sql = "SELECT * FROM weding WHERE id_weding = '$_GET[edit_id]'";
			$run = mysqli_query($conn,$sql);
			while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-lg-5" action="wedding_lista.php" method="post" encryption="multipart/form-data">	
					<div class="form-group">
						<label for="wed_id">ID *</label>
						<input id="btn" type="text" name="wed_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>" required>
					</div>
					<div class="form-group">
						<label for="naslov_wedding">Naslov *</label>
						<input id="btn" type="text" name="naslov" class="form-control" value="<?php echo $rows['naslov3weding']; ?>" required>
					</div>
					<div class="form-group">
						<label for="zadaci">Tekst *</label>
						<div class="col-sm-12">
							<textarea class="form-control" rows="10" style="resize:none;" name="tekst"><?php echo $rows['tekst3weding']; ?></textarea>
						</div>
					</div>
					<div class="form-group">
						<img src="<?php echo $rows['slika3weding']; ?>" style="width: 220px; height: 170px;" alt="Katalog namjestaja" style="border: solid 1px black; margin-left: 20px; ">
						<label for="slika_zadaci">Slika *</label>
						<input id="btn" type="file" name="slika" class="form-control" required>
					</div>
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-danger btn-block" value="Uredi">
					</div>
				</form>
				<?php } 
			}
		?>
			</div>		
			<div style="margin-bottom: 100px;"></div>
		</div>
<!-- PRIKAZ PODATAKA -->
<div style="margin:auto;">
	<div class="container" style="margin-left: 250px;"><br>
		<h3 style="margin-top: 50px;">Pregled rezultata</h3><br>
		<?php
			$sel_sql = "SELECT * FROM weding ORDER BY id_weding DESC";
			$run_sql = mysqli_query($conn,$sel_sql);
			while($rows = mysqli_fetch_assoc($run_sql)){
				echo '
					<h3>'.$rows['naslov3weding'].'</h3>
					<div class="row col-sm-9">
						<p class="pull-left" style="width: 100%; margin-right: 20px; margin-top: 30px; text-align: justify">'.$rows['tekst3weding'].'</p>
					</div>
						<img src="'.$rows['slika3weding'].'" alt="sajmovi" class="pull-right" style="width: 300px; height: 250px; border-radius: 10px;">
					<div class="row">
						<a href="wedding_lista.php?del_id='.$rows['id_weding'].'" class="btn btn-danger pull-right" onClick="return confirm()"; style="margin: 10px;">Ukloni</a>
						<a href="wedding_lista.php?edit_id='.$rows['id_weding'].'" class="btn btn-warning pull-right" style="margin: 10px;">Uredi</a>
					</div>
					';
			}
		?>
	</div><!-- container -->
</div><!-- margin-auto -->
<div style="height: 50px;"></div>
<?php echo include '../includes/footer.php'; ?>
    </body>
</html>