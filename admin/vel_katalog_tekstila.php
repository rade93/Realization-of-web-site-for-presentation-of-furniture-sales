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
	if(isset($_POST['vel_katalog_tekstila'])){
		$upit = "INSERT INTO vel_katalog_tekstila (slika_vel_katalog_tekstila) VALUES ('slike/$_POST[slika]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/vel_katalog_tekstila.php');
			$result = '<div class="alert alert-success col-sm-3" style="margin-top: 10px;">Uspješno ste dodali sliku!</div>';
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Desila se greška prilikom čuvanja slike!</div>';
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE vel_katalog_tekstila SET slika_vel_katalog_tekstila = 'slike/$_POST[slika]' WHERE id_vel_katalog_tekstila = '$_POST[id_v_tekstil]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/vel_katalog_tekstila.php');
		}else{
			$result = '<div class="alert alert-danger"> Desila se greška prilikom azuriranja podataka</div>';
		}
	}
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM vel_katalog_tekstila WHERE id_vel_katalog_tekstila = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Upravo ste obrisali stavku pod ID '.$del_id.' </div>';
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';
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
        <title>Veleprodaja | Katalog tekstila</title>
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
<?php echo $result; ?>		
			<div class="page-header"><h1>Veleprodaja | Katalog tekstila <a href="vel_katalog_tekstila.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<div class="container-fluid">
			<?php 
			if(isset($_GET['dodaj'])){
				echo '
				<form class="form-horizontal col-lg-5" action="vel_katalog_tekstila.php" method="post" encryption="multipart/form-data">
					<div class="form-group">
						<label for="slika">Slika artikla *</label>
						<input id="btn" type="file" name="slika" class="form-control" required>
					</div>
					<div class="form-group">
						<input id="btn" type="submit" name="vel_katalog_tekstila" class="btn btn-danger btn-block">
					</div>
				</form>
			';}?>
				<?php
			if(isset($_GET['edit_id'])){
			$sql = "SELECT * FROM vel_katalog_tekstila WHERE id_vel_katalog_tekstila = '$_GET[edit_id]'";
			$run = mysqli_query($conn,$sql);
			while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-lg-5" action="vel_katalog_tekstila.php" method="post" encryption="multipart/form-data">
					<div class="form-group">
						<label for="id_v_tekstil">ID *</label>
						<input id="btn" type="text" name="id_v_tekstil" class="form-control" value="<?php echo $_GET['edit_id']; ?>" required>
					</div>
					<div class="form-group">
						<img src="<?php echo $rows['slika_vel_katalog_tekstila']; ?>" style="width: 220px; height: 170px;" alt="Katalog namjestaja" style="border: solid 1px black; margin-left: 20px; ">
						<label for="slika">Slika artikla *</label>
						<input id="btn" type="file" name="slika" class="form-control" required>
					</div>
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-danger btn-block" value="Uredi">
					</div>
				</form>
				<?php } 
					}
				?>
				
			</div><!-- container-fluid -->
			<hr>
		</div><!-- col-lg-10 -->
<!-- REZULTATI -->
		
<div style="margin:auto;">
	<div class="container" style="margin-left: 250px;"><br>
	<h3 style="margin-top: 50px;">Pregled rezultata</h3><br>
		<?php 
			$sel_sql = "SELECT * FROM vel_katalog_tekstila ORDER BY id_vel_katalog_tekstila DESC LIMIT $start_from,$per_page";
			$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<div class="col-sm-6">
							<img src="'.$rows['slika_vel_katalog_tekstila'].'" style="width: 500px; height: 330px; margin: 10px;">
							<a href="vel_katalog_tekstila.php?edit_id='.$rows['id_vel_katalog_tekstila'].'" class="btn btn-warning pull-left" style="margin-left: 200px;"><b>Uredi</b></a>
							<a href="vel_katalog_tekstila.php?del_id='.$rows['id_vel_katalog_tekstila'].'" class="btn btn-danger pull-right"  onclick="return confirm()"; style="margin-right: 200px;"><b>Ukloni</b></a>
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
			$pagination_sql = "SELECT * FROM vel_katalog_tekstila";
			$run_pagination = mysqli_query($conn,$pagination_sql);
			$count = mysqli_num_rows($run_pagination);
			$total_pages = ceil($count/$per_page);
			for($i=1;$i<=$total_pages;$i++){
				echo'<li><a href="vel_katalog_tekstila.php?page='.$i.'">'.$i.'</a></li>';
			}
		?>
	</ul>
</nav>
<!-- FOOTER -------------------------------------------------------------------------->
<footer class="navbar navbar-default navbar-fixed-bottom" style="text-align: center;">
	<h5>Copyright &copy; 2016 Salon Namještaja</h5>
</footer>
    </body>
</html>