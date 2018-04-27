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
	if(isset($_POST['odgovori'])){
		$upit = "INSERT INTO faq (pitanje_faq, opis_faq) VALUES ('$_POST[naslov]', '$_POST[opis]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/faq.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';;
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE faq SET pitanje_faq = '$_POST[naslov]', opis_faq = '$_POST[opis]' WHERE id_faq = '$_POST[pit_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/faq.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	if(isset($_GET['del_id_p'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM faq WHERE id_faq = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				header('Location: ../admin/faq.php');
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 50px;" margin-left: 100px;>Nesto nije u redu</div>';
			}
		}
	}
	if(isset($_GET['obrisi'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM pitanja WHERE id_pitanja = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				header('Location: ../admin/faq.php');
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 50px;" margin-left: 100px;>Nesto nije u redu</div>';
			}
		}
	}
	$per_page = 4;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$start_from = ($page-1) * $per_page;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | FAQ</title>
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
		<div class="col-lg-9">			
			<div class="page-header"><h1>FAQ | Odgovori na pitanja <a href="faq.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<div class="container-fluid">
				<?php
				if(isset($_GET['dodaj'])){
				echo '
				<form class="form-horizontal col-lg-8" action="faq.php" method="post" encryption="multipart/form-data">
					<div class="form-group">
						<label for="pitanje">Pitanje: </label>
							<input id="naslov" type="text" name="naslov" class="form-control">
					</div>				
					<div class="form-group">
						<label for="odgovor">Odgovor</label>
						<div class="col-sm-12">
								<textarea class="form-control" rows="10" style="resize:none;" name="opis"></textarea>
						</div>
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="odgovori" class="btn btn-danger btn-block" value="Dodaj">
					</div>
				</form>
				';}?>
				<?php
					if(isset($_GET['edit_id'])){
					$sql = "SELECT * FROM faq WHERE id_faq = '$_GET[edit_id]'";
					$run = mysqli_query($conn,$sql);
					while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-lg-8" action="faq.php" method="post" encryption="multipart/form-data">
					<div class="form-group">
						<label for="pit_id">ID </label>
						<input id="btn" type="text" name="pit_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>">
					</div>
					<div class="form-group">
						<label for="pitanje">Pitanje: </label>
						<input id="btn" type="text" name="naslov" class="form-control" value="<?php echo $rows['pitanje_faq']; ?>">
					</div>				
					<div class="form-group">
						<label for="odgovor">Odgovor</label>
						<div class="col-sm-12">
							<textarea class="form-control" rows="10" style="resize:none;" name="opis"><?php echo $rows['opis_faq']; ?></textarea>
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
			<hr>
		</div>
<!-- PREGLED REZULTATA ---------------------------------------------------------------------------->
			<div style="margin:auto;">
		<?php echo $result; ?>
			<div class="container">
			<h3 style="margin-top: 90px; margin-left: 50px;">Pitanja</h3><br>
			<?php
				$sel_sql = "SELECT * FROM pitanja ORDER BY id_pitanja DESC LIMIT $start_from,$per_page";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
					
						<div class="col-md-4" style="text-align: justify;">
							<div class="panel panel-warning">
								<div class="panel-heading">
										<h5 align="center"><b>Ime:</b> '.$rows['ime_korisnika'].'<p><br><b>E-mail:</b> '.$rows['email_korisnika'].'</p></h5>
								</div><!-- panel-heading -->	
								<div class="panel-body" style="text-align: center;">
										<p>'.$rows['pitanje'].'</p>
								</div><!-- panel-body -->
								<div class="panel-footer">
									<div class="row" style="margin-left: 5px;">
									<a href="faq.php?del_id_p='.$rows['id_pitanja'].'" class="btn btn-danger" onclick="return confirm()";>Ukloni</a>
								</div>
								</div>	
																
							</div><!-- panel-primary -->
						</div><!-- col-md-3 -->
					
					';
				}
			?>
			</div><!-- container -->
			<hr>
		</div><!-- margin-auto -->
<!-- PREGLED REZULTATA 2---------------------------------------------------------------------------->
			<div style="margin:auto;">
		<?php echo $result; ?>
			<div class="container">
			<h3 style="margin-top: 10px; margin-left: 50px;">Admin odgovara</h3><br>
			<?php
				$sel_sql = "SELECT * FROM faq ORDER BY id_faq DESC LIMIT $start_from,$per_page";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
					
						<div class="col-md-4" style="text-align: justify;">
							<div class="panel panel-warning">
								<div class="panel-heading">
										<h5 align="center">'.$rows['pitanje_faq'].'</h5>
								</div><!-- panel-heading -->	
								<div class="panel-body" style="text-align: center;">
										<p>'.$rows['opis_faq'].'</p>
								</div><!-- panel-body -->
								<div class="panel-footer">
									<div class="row" style="margin-left: 5px;">
									<a href="faq.php?edit_id='.$rows['id_faq'].'" class="btn btn-warning">Uredi</a>
									<a href="faq.php?del_id='.$rows['id_faq'].'" class="btn btn-danger" onclick="return confirm()";>Ukloni</a>
								</div>
								</div>	
																
							</div><!-- panel-primary -->
						</div><!-- col-md-3 -->
					
					';
				}
			?>
			</div><!-- container -->
		</div><!-- margin-auto -->
		<!-- PAGINATION ------------------------------------------------------------------------------------------->
<nav aria-label="Page navigation" style="text-align: center; margin-bottom: 50px;">
	<ul class="pagination">
		<?php
			$pagination_sql = "SELECT * FROM pitanja";
			$run_pagination = mysqli_query($conn,$pagination_sql);
			$count = mysqli_num_rows($run_pagination);
			$total_pages = ceil($count/$per_page);
			for($i=1;$i<=$total_pages;$i++){
				echo'<li><a href="faq.php?page='.$i.'">'.$i.'</a></li>';
			}
		?>
	</ul>
</nav>
<!-- FOOTER ------------------------------------------------------------------------------->
<div style="height: 100px;"></div>
<?php include '../includes/footer.php'; ?>
    </body>
</html>