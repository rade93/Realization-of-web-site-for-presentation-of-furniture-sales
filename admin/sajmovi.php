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
	if(isset($_POST['sajam'])){
		$upit = "INSERT INTO sajmovi (naslov_sajmovi, opis_sajmovi, slika_sajmovi) VALUES ('$_POST[naslov]', '$_POST[opis]', 'slike/$_POST[slika]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/sajmovi.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';;
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE sajmovi SET naslov_sajmovi = '$_POST[naslov]', opis_sajmovi = '$_POST[opis]', slika_sajmovi = 'slike/$_POST[slika]' WHERE id_sajmovi = '$_POST[saj_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/sajmovi.php');
		}else{
			$result = '<div class="alert alert-danger col-sm-3"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}

	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM sajmovi WHERE id_sajmovi = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				header('Location: ../admin/sajmovi.php');
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';
			}
		}
	}
	$per_page = 3;
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
        <title>Admin | Sajmovi</title>
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
			<div class="page-header"><h1>Sajmovi <a href="sajmovi.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<div class="container-fluid">
			
				<?php
				if(isset($_GET['dodaj'])){
				echo '
				<p style="color: red;">NAPOMENA: Polja označena zvjezdicom (*) su obavezna</p>
				<form class="form-horizontal col-lg-5" action="sajmovi.php" method="post" encryption="multipart/form-data">	

					<div class="form-group">
						<label for="naslov">Naslov *</label>
						<input id="naslov" type="text" name="naslov" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="opis">Opis *</label>
						<textarea id="opis" name="opis"></textarea>
					</div>
					
					<div class="form-group">
						<label for="cijena">Slika *</label>
						<input id="btn" type="file" name="slika" class="form-control">
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="sajam" class="btn btn-danger btn-block" value="Dodaj">
					</div>
				</form>
				';}?>
				<?php
					if(isset($_GET['edit_id'])){
					$sql = "SELECT * FROM sajmovi WHERE id_sajmovi = '$_GET[edit_id]'";
					$run = mysqli_query($conn,$sql);
					while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-lg-5" action="sajmovi.php" method="post" encryption="multipart/form-data">	

					<div class="form-group">
						<label for="saj_id">ID *</label>
						<input id="btn" type="text" name="saj_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>" required>
					</div>
					<div class="form-group">
						<label for="naslov">Naslov *</label>
						<input id="btn" type="text" name="naslov" class="form-control" value="<?php echo $rows['naslov_sajmovi']; ?>" required>
					</div>
					<div class="form-group">
						<label for="opis">Opis *</label>
						<textarea id="opis" name="opis"><?php echo $rows['opis_sajmovi']; ?></textarea>
					</div>
					
					<div class="form-group">
						<img src="<?php echo $rows['slika_sajmovi']; ?>" style="width: 220px; height: 170px;" alt="Katalog namjestaja" style="border: solid 1px black; margin-left: 20px; ">
						<label for="cijena">Slika *</label>
						<input id="btn" type="file" name="slika" class="form-control">
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-warning btn-block" value="Uredi">
					</div>
				</form>
			<?php } 
					}
				?>
			</div><!-- container-fluid -->
		</div><!-- col-lg-10 -->
<!-- REZULTATI --><hr>
<div style="margin:auto;">
	<div class="container" style="margin-left: 250px;"><br>
		<h3 style="margin-top: 50px;">Pregled rezultata</h3><br>
		<?php
			$sel_sql = "SELECT * FROM sajmovi ORDER BY id_sajmovi DESC";
			$run_sql = mysqli_query($conn,$sel_sql);
			while($rows = mysqli_fetch_assoc($run_sql)){
				echo '
					<h3>'.$rows['naslov_sajmovi'].'</h3>
					<div class="row col-sm-9">
						<p class="pull-left" style="width: 100%; margin-right: 20px; margin-top: 30px; text-align: justify">'.$rows['opis_sajmovi'].'</p>
					</div>
						<img src="'.$rows['slika_sajmovi'].'" alt="sajmovi" class="pull-right" style="width: 300px; height: 250px; border-radius: 10px;">
					<div class="row">
						<a href="sajmovi.php?del_id='.$rows['id_sajmovi'].'" class="btn btn-danger pull-right" onclick="return confirm()"; style="margin: 10px;">Ukloni</a>
						<a href="sajmovi.php?edit_id='.$rows['id_sajmovi'].'" class="btn btn-warning pull-right" style="margin: 10px;">Uredi</a>
					</div>
					';
			}
		?>
	</div><!-- container -->
</div><!-- margin-auto -->
<div style="height: 100px;"></div>
<!-- PAGINATION ------------------------------------------------------------------------------------------->
<nav aria-label="Page navigation" style="text-align: center; margin-bottom: 50px;">
	<ul class="pagination">
		<?php
			$pagination_sql = "SELECT * FROM sajmovi";
			$run_pagination = mysqli_query($conn,$pagination_sql);
			$count = mysqli_num_rows($run_pagination);
			$total_pages = ceil($count/$per_page);
			for($i=1;$i<=$total_pages;$i++){
				echo'<li><a href="sajmovi.php?page='.$i.'">'.$i.'</a></li>';
			}
		?>
	</ul>
</nav>
<!-- FOOTER --------------------------------------------------------------------------------->
<?php echo include '../includes/footer.php'; ?>
    </body>
</html>