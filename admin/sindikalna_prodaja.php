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
	if(isset($_POST['sindikal'])){
		$upit = "INSERT INTO sindikalna_prodaja (lista_naslov4) VALUES ('$_POST[lista]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/sindikalna_prodaja.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';;
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE sindikalna_prodaja SET lista_naslov4 = '$_POST[lista]' WHERE id_sindikal = '$_POST[sind_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/sindikalna_prodaja.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';
		}
	}
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM sindikalna_prodaja WHERE id_sindikal = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				header('Location: ../admin/sindikalna_prodaja.php');
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 50px;" margin-left: 10px;>Nesto nije u redu</div>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Sindikalna prodaja</title>
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
		<div style="width:50px;height:30px;"></div>
        <?php include 'includes/sidebar.php'; ?>
			
		<div class="col-lg-6">	
	
			<div class="page-header"><h1>Sindikalna prodaja <a href="sindikalna_prodaja.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<?php echo $result; ?>
			<div class="container-fluid">
			<?php
				if(isset($_GET['dodaj'])){
				echo '
				<form class="form-horizontal col-sm-10" action="sindikalna_prodaja.php" method="post" enctype="multipart/form-data">				
					<div class="form-group">					
						<div class="form-group">
							<label for="lista">Dodaj novog sindikata:</label>
							<input id="lista" type="text" name="lista" class="form-control">
						</div>
					</div>				
					<div class="form-group">
						<input id="btn" type="submit" name="sindikal" class="btn btn-danger btn-block" value="Dodaj">
					</div>
					<div style="margin-bottom: 10px;"></div>
				</form>
				';}?>
				<?php
					if(isset($_GET['edit_id'])){
					$sql = "SELECT * FROM sindikalna_prodaja WHERE id_sindikal = '$_GET[edit_id]'";
					$run = mysqli_query($conn,$sql);
					while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-sm-10" action="sindikalna_prodaja.php" method="post" enctype="multipart/form-data">				
					<div class="form-group">					
						<div class="form-group">
							<label for="sind_id">Dodaj novog sindikata:</label>
							<input id="btn" type="text" name="sind_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>">
						</div>
						<div class="form-group">
							<label for="lista">Dodaj novog sindikata:</label>
							<input id="btn" type="text" name="lista" class="form-control" value="<?php echo $rows['lista_naslov4']; ?>">
						</div>
					</div>				
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-danger btn-block" value="Uredi">
					</div>
					<div style="margin-bottom: 10px;"></div>
				</form>
				<?php } 
					}
				?>
			</div>			
		</div>
<div class="container">

<div class="col-lg-12">
	<div style="margin-top: 70px;"></div>
        
	<div class="container" style="text-align: center;">                        
		<h3><u>Sindikali koji posluju sa nama</u></h3>            
			<?php
				$sel_sql = "SELECT * FROM sindikalna_prodaja ORDER BY id_sindikal DESC";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<div>'.$rows['lista_naslov4'].'
							<a href="sindikalna_prodaja.php?edit_id='.$rows['id_sindikal'].'" class="btn btn-warning">Uredi</a>
							<a href="sindikalna_prodaja.php?del_id='.$rows['id_sindikal'].'" class="btn btn-danger" onclick="return confirm()";>Ukloni</a><br><br>
						</div>
					';
				}
			?>
		<div style="margin-bottom: 50px;">
			<h4><i>Ako Vaš sindikat nije na ovom spisku, a želite da i članovi Vašeg sindikata kupuju
			kod nas preko administrativne zabrane i želite da sa nama sklopite ugovor o sindikalnoj
			prodaji javite se.</i></h4>
		</div>
		<br>   
	</div><!-- pull-right col-sm-5 -->
        <br>
</div><!-- col-lg-12 -->

</div>
<div style="height: 100px;"></div>
<!-- FOOTER ------------------------------------------------------------------------------>
<?php echo include '../includes/footer.php'; ?>
    </body>
</html>