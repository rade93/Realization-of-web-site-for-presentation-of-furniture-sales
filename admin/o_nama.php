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

	$poruka = '';
	if(isset($_POST['about'])){
		$upit = "INSERT INTO o_nama (o_nama_naslov, o_nama_tekst) VALUES ('$_POST[title]', '$_POST[opis]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/o_nama.php');
		}else{
			$poruka = '<div class="alert alert-danger col-sm-3"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE o_nama SET o_nama_naslov = '$_POST[title]', o_nama_tekst = '$_POST[opis]' WHERE o_nama_id = '$_POST[id_o_nama]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/o_nama.php');
		}else{
			$poruka = '<div class="alert alert-danger col-sm-3"> Desila se greška prilikom azuriranja podataka</div>';
		}
	}
	$result='';
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM o_nama WHERE o_nama_id = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Upravo ste obrisali stavku pod ID '.$del_id.' </div>';
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';
			}
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
	 	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	  	<script>tinymce.init({ selector:'textarea' });</script>
        
		<meta charset utf-8>
    </head>
    <body>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10 col-sm-3 col-sm6">			
		
			<div class="page-header"><h1>O nama <a href="o_nama.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<?php
			if(isset($_GET['dodaj'])){
				echo '
					<div class="container-fluid">
						<form class="form-horizontal" action="o_nama.php" method="post" enctype="multipart/form-data">				
						<div class="form-group">
							<label for="title">Naslov</label>
							<input id="title" type="text" name="title" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="about">O nama</label>
							<div class="form-group">
								<textarea class="form-control" rows="10" style="resize:none;" name="opis"></textarea>
							</div>
						</div>
						<div class="form-group">
							<label for="btn"></label>
							<input id="btn" type="submit" name="about" class="btn btn-success" value="Posalji">
						</div>
					</form>
					</div>
		
					';}
				?>		
		<?php
			if(isset($_GET['edit_id'])){
			$sql = "SELECT * FROM o_nama WHERE o_nama_id = '$_GET[edit_id]'";
			$run = mysqli_query($conn,$sql);
			while($rows = mysqli_fetch_assoc($run)){?>
			<div class="container-fluid">
			<div class="page-header"><h1>O nama</h1></div>
			
				<form class="form-horizontal" action="o_nama.php" method="post" enctype="multipart/form-data">				
				<div class="form-group">
					<label for="id_o_nama">ID *</label>
					<input id="id_o_nama" type="text" name="id_o_nama" class="form-control" value="<?php echo $_GET['edit_id']; ?>" required>
					<label for="title">Naslov *</label>
					<input id="title" type="text" name="title" class="form-control" value="<?php echo $rows['o_nama_naslov']; ?>" required>
				</div>
				<div class="form-group">
					<label for="about">O nama *</label>
					<div class="form-group">						
						<textarea class="form-control" rows="10" style="resize:none;" name="opis"><?php echo $rows['o_nama_tekst']; ?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label for="btn"></label>
					<input id="btn" type="submit" name="uredi" class="btn btn-warning" value="Uredi">
				</div>
			</form>
			</div>
		<?php } 
					}
				?>
		</div>
<div class="container">

	<?php
	$sel_sql = "SELECT * FROM o_nama";
	$run_sql = mysqli_query($conn,$sel_sql);
		while($rows = mysqli_fetch_assoc($run_sql)){
		echo '
		<div class="col-lg-10">
			<h3>'.$rows['o_nama_naslov'].'</h3>
			<p>'.$rows['o_nama_tekst'].'</p><br>
			<a href="o_nama.php?edit_id='.$rows['o_nama_id'].'" class="btn btn-warning">Uredi</a>
			<a href="o_nama.php?del_id='.$rows['o_nama_id'].'" class="btn btn-danger" onclick="return confirm()";>Ukloni</a>
			<div style="height: 100px;"></div>
		</div>
		
		';
	}
	?>
	
</div>
<!-- FOOTER -->
<?php echo include '../includes/footer.php'; ?>
    </body>
</html>