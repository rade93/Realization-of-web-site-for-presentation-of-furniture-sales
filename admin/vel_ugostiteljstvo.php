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
	if(isset($_POST['ugostiteljstvo'])){
		$upit = "INSERT INTO vel_ugostiteljstvo (naslov_vel_ugostiteljstvo, slika_vel_ugostiteljstvo, cijena_vel_ugostiteljstvo) VALUES ('$_POST[naslov]', 'slike/$_POST[slika]', '$_POST[cijena],-KM')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/vel_ugostiteljstvo.php');
			$result = '<div class="alert alert-success col-sm-3" style="margin-top: 10px;">Podaci su uspješno upisani!</div>';
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';;
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE vel_ugostiteljstvo SET naslov_vel_ugostiteljstvo = '$_POST[naslov]', slika_vel_ugostiteljstvo = 'slike/$_POST[slika]', cijena_vel_ugostiteljstvo = '$_POST[cijena],-KM' WHERE id_vel_ugostiteljstvo = '$_POST[ug_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/vel_ugostiteljstvo.php');
		}else{
			$result = '<div class="alert alert-danger"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	if(isset($_GET['del_id'])){
		if(confirm == true){
		$del_id = $_GET['del_id'];
			$sql = "DELETE FROM vel_ugostiteljstvo WHERE id_vel_ugostiteljstvo = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Upravo ste obrisali stavku pod ID '.$del_id.' </div>';
			}else{
				$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 50px;" margin-left: 100px;>Nesto nije u redu</div>';
			}
		}
	}
	
	$per_page = 8;
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
        <title>Veleprodaja | Ugostiteljstvo</title>
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
		<div style="height: 50px;"></div>
			<div class="page-header"><h1>Veleprodaja | Ugostiteljstvo <a href="vel_ugostiteljstvo.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="vel_ugostiteljstvo.php" method="post" encryption="multipart/form-data">	
				<?php
				if(isset($_GET['dodaj'])){
				echo '
					<div class="form-group">
						<label for="naslov">Naslov artikla</label>
						<input id="naslov" type="text" name="naslov" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="slika">Slika artikla</label>
						<input id="btn" type="file" name="slika" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="cijena">Cijena artikla</label>
						<input id="price" type="text" name="cijena" class="form-control" required>
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="ugostiteljstvo" class="btn btn-danger btn-block" value="Dodaj">
					</div>
				</form>
				';}?>
				<?php
				if(isset($_GET['edit_id'])){
				$sql = "SELECT * FROM vel_ugostiteljstvo WHERE id_vel_ugostiteljstvo = '$_GET[edit_id]'";
				$run = mysqli_query($conn,$sql);
				while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-lg-5" action="vel_ugostiteljstvo.php" method="post" encryption="multipart/form-data">	

					<div class="form-group">
						<label for="ug_id">ID *</label>
						<input id="btn" type="text" name="ug_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>" required>
					</div>
					<div class="form-group">
						<label for="naslov">Naslov artikla *</label>
						<input id="btn" type="text" name="naslov" class="form-control" value="<?php echo $rows['naslov_vel_ugostiteljstvo']; ?>" required>
					</div>
					
					<div class="form-group">
						<img src="<?php echo $rows['slika_vel_ugostiteljstvo']; ?>" style="width: 220px; height: 170px;" alt="Katalog namjestaja" style="border: solid 1px black; margin-left: 20px; ">
						<label for="slika">Slika artikla *</label>
						<input id="btn" type="file" name="slika" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="cijena">Cijena artikla *</label>
						<input id="btn" type="text" name="cijena" class="form-control" value="<?php echo $rows['cijena_vel_ugostiteljstvo']; ?>" required>
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
			<div class="container" style="margin-left: 250px;">
			<h3 style="margin-top: 90px;">Pregled rezultata</h3><br>
			<?php
				$sel_sql = "SELECT * FROM vel_ugostiteljstvo ORDER BY id_vel_ugostiteljstvo DESC LIMIT $start_from,$per_page";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<div class="col-md-3" style="align-content: center;">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<div class="row">
										<h4 align="center">'.$rows['naslov_vel_ugostiteljstvo'].'</h4>
									</div><!-- row -->
									
								</div><!-- panel-heading -->	
								<div class="panel-body">
										<img src="'.$rows['slika_vel_ugostiteljstvo'].'" style="width: 220px; height: 170px;" alt="Ugostiteljstvo" style="border: solid 1px black; margin-left: 20px; ">
										<div class="row">
											<p style="text-align: center; margin-top: 10px;"><b>Cijena '.$rows['cijena_vel_ugostiteljstvo'].'</b></p>
										</div>
								</div><!-- panel-body -->
								<div class="panel-footer">
									<div class="row">
										<a href="vel_ugostiteljstvo.php?edit_id='.$rows['id_vel_ugostiteljstvo'].'" class="btn btn-warning pull-left" style="margin-left: 20px;">Uredi</a>
										<a href="vel_ugostiteljstvo.php?del_id='.$rows['id_vel_ugostiteljstvo'].'" class="btn btn-danger pull-right" onclick="return confirm()"; style="margin-right: 20px;">Ukloni</a>
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
			$pagination_sql = "SELECT * FROM vel_ugostiteljstvo";
			$run_pagination = mysqli_query($conn,$pagination_sql);
			$count = mysqli_num_rows($run_pagination);
			$total_pages = ceil($count/$per_page);
			for($i=1;$i<=$total_pages;$i++){
				echo'<li><a href="vel_ugostiteljstvo.php?page='.$i.'">'.$i.'</a></li>';
			}
		?>
	</ul>
</nav>
<!-- FOOTER ------------------------------------------------------------------------------>
<footer class="navbar navbar-default navbar-fixed-bottom" style="text-align: center;">
	<h5>Copyright &copy; 2016 Salon Namještaja</h5>
</footer>
    </body>
</html>