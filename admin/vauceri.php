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
	if(isset($_POST['vaucer'])){
		$upit = "INSERT INTO vauceri (slika_vauceri, naslov_vauceri, tekst_vauceri) VALUES ('slike/$_POST[slika]', '$_POST[naslov]', '$_POST[opis]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/vauceri.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Nesto nije u redu</div>';;
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE vauceri SET slika_vauceri = 'slike/$_POST[slika]', naslov_vauceri = '$_POST[naslov]', tekst_vauceri = '$_POST[opis]' WHERE id_vauceri = '$_POST[vaucer_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/vauceri.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM vauceri WHERE id_vauceri = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				header('Location: ../admin/vauceri.php');
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 50px;" margin-left: 100px;>Nesto nije u redu</div>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Vaučeri</title>
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
		<div class="col-lg-10">			
			<div class="page-header"><h1>Vaučeri <a href="vauceri.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<div class="container-fluid">
				<?php
				if(isset($_GET['dodaj'])){
				echo '
				<form class="form-horizontal col-lg-5" action="vauceri.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="naslov_ponude">Naslov ponude *</label>
						<input id="naslov_ponude" type="text" name="naslov" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="slika">Fotografija ponude</label>
						<input id="btn" type="file" name="slika" class="form-control">
					</div>
					<div class="form-group">
						<label for="opis_ponude">Opis ponude *</label>
						<div class="col-sm-12">
								<textarea class="form-control" rows="10" style="resize:none;" name="opis"></textarea>
						</div>
					</div>				
					<div class="form-group">
						<input id="btn" type="submit" name="vaucer" class="btn btn-danger btn-block" value="Dodaj">
					</div>
				</form>
				';}?>
				<?php
					if(isset($_GET['edit_id'])){
					$sql = "SELECT * FROM vauceri WHERE id_vauceri = '$_GET[edit_id]'";
					$run = mysqli_query($conn,$sql);
					while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-lg-5" action="vauceri.php" method="post" enctype="multipart/form-data">
					<div class="form-group">
						<label for="vaucer_id">Naslov ponude *</label>
						<input id="btn" type="text" name="vaucer_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>" required>
					</div>
					<div class="form-group">
						<label for="naslov_ponude">Naslov ponude *</label>
						<input id="btn" type="text" name="naslov" class="form-control" value="<?php echo $rows['naslov_vauceri']; ?>" required>
					</div>
					<div class="form-group">
						<img src="<?php echo $rows['slika_vauceri']; ?>" style="width: 220px; height: 170px;" alt="Katalog namjestaja" style="border: solid 1px black; margin-left: 20px; ">
						<label for="slika">Fotografija ponude</label>
						<input id="btn" type="file" name="slika" class="form-control">
					</div>
					<div class="form-group">
						<label for="opis_ponude">Opis ponude *</label>
						<div class="col-sm-12">
						<textarea class="form-control" rows="10" style="resize:none;" name="opis"><?php echo $rows['tekst_vauceri']; ?></textarea>
						</div>
					</div>				
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-danger btn-block" value="Uredi">
					</div>
				</form>
				<?php } 
					}
				?>
			</div>		
			<div style="margin-bottom: 50px;"></div>
			<hr>
		</div>
<!-- REZULTATI ----------------------------------------------------------------------->
	<div style="margin:auto;">
		<div class="container">
		<h3>Pregled rezultata</h3>
			<?php
				$sel_sql = "SELECT * FROM vauceri ORDER BY id_vauceri DESC";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<div class="col-md-4" style="align-content: center;">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<div class="row">
										<h4 align="center">'.$rows['naslov_vauceri'].'</h4>
									</div><!-- row -->									
								</div><!-- panel-heading -->	
								<div class="panel-body">
									<img src="'.$rows['slika_vauceri'].'" style="width: 318px; height: 200px;" alt="Vauceri">										
								</div><!-- panel-body -->
								<div class="panel-footer">
									<p style="text-align: center; margin-top: 10px; font-family: serif; font-size: 12pt;">'.$rows['tekst_vauceri'].'</p>
									<div class="row" style="margin-left: 90px;">
										<a href="vauceri.php?edit_id='.$rows['id_vauceri'].'" class="btn btn-warning">Uredi</a>
										<a href="vauceri.php?del_id='.$rows['id_vauceri'].'" class="btn btn-danger" onclick="return confirm()";>Ukloni</a>
									</div>
								</div><!-- panel-footer -->						
							</div><!-- panel-warning -->
						</div><!-- col-md-3 -->
					';
				}
			?>
			
		</div><!-- container -->
		<div style="height: 100px;"></div>
	</div>
<!-- FOOTER -------------------------------------------------------------------------->
<?php echo include '../includes/footer.php'; ?>
    </body>
</html>