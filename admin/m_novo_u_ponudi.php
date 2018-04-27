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
	if(isset($_POST['novo_u_ponudi'])){
		$upit = "INSERT INTO mal_novo_u_ponudi (naslov_m_novo_u_ponudi, slika_m_novo_u_ponudi, cijena_m_novo_u_ponudi) VALUES ('$_POST[naslov]', 'slike/$_POST[slika]', '$_POST[cijena],-KM')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/m_novo_u_ponudi.php');
			$poruka = '<div class="alert alert-success col-sm-3" style="margin-top: 10px;">Uspješno ste dodali nove podatke u bazu podataka!</div>';
		}else{
			$poruka = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Desila se greška prilikom čuvanja podataka!</div>';
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE mal_novo_u_ponudi SET naslov_m_novo_u_ponudi = '$_POST[naslov1]', slika_m_novo_u_ponudi = 'slike/$_POST[slika1]', cijena_m_novo_u_ponudi = '$_POST[cijena1],-KM' WHERE id_m_novo_u_ponudi = '$_POST[m_novo_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/m_novo_u_ponudi.php');
		}else{
			$result = '<div class="alert alert-danger"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	$per_page = 8;
	if(isset($_GET['page'])){
		$page = $_GET['page'];
	}else{
		$page = 1;
	}
	$start_from = ($page-1) * $per_page;
	
	$result='';
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM mal_novo_u_ponudi WHERE id_m_novo_u_ponudi = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				$poruka = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Upravo ste obrisali stavku pod ID '.$del_id.' </div>';
			}else{
				$poruka = '<div class="alert alert-danger col-sm-3" style="margin-top: 50px;" margin-left: 100px;>Nesto nije u redu</div>';
			}
		}
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin | Maloprodaja | Novo u ponudi</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
	 	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	  	<script>tinymce.init({ selector:'textarea' });</script>
        
		<meta charset utf-8>
    </head>
    <body>
        <?php include 'includes/sidebar.php'; ?>
	<div class="col-lg-8"><br /><br />
			<div class="page-header"><h1>Maloprodaja | Novo u ponudi</h1></div><a href="m_novo_u_ponudi.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a>
		<?php if(isset($_GET['dodaj'])){
			echo '
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="m_novo_u_ponudi.php" method="post" encryption="multipart/form-data">	

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
						<input id="btn" type="submit" name="novo_u_ponudi" class="btn btn-danger btn-block" value="Dodaj">
					</div>
				</form>
			</div>
		';}?>			
			<hr>
	</div>
	<?php
			if(isset($_GET['edit_id'])){
			$sql = "SELECT * FROM mal_novo_u_ponudi WHERE id_m_novo_u_ponudi = '$_GET[edit_id]'";
			$run = mysqli_query($conn,$sql);
			while($rows = mysqli_fetch_assoc($run)){?>
			<div class="col-lg-10" style="margin-left: 270px;">
		
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="m_novo_u_ponudi.php" method="post" encryption="multipart/form-data">	

					<div class="form-group">
						<label>ID</label>
						<input id="m_novo_id" type="text" name="m_novo_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>" required>
						<label for="naslov">Naslov artikla</label>
						<input id="naslov" type="text" name="naslov1" class="form-control" value="<?php echo $rows['naslov_m_novo_u_ponudi']; ?>" required>
					</div>
					
					<div class="form-group">
						<img src="<?php echo $rows['slika_m_novo_u_ponudi']; ?>" style="width: 220px; height: 170px;" alt="Dječija spavaća soba" style="border: solid 1px black; margin-left: 20px; ">
						<label for="slika">Slika artikla</label>
						<input id="btn" type="file" name="slika1" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="cijena">Cijena artikla</label>
						<input id="price" type="text" name="cijena1" class="form-control" value="<?php echo $rows['cijena_m_novo_u_ponudi']; ?>" required>
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-danger btn-block" value="Uredi">
					</div>
				</form>
			</div>		
			<hr>
	</div>
			<?php } 
					}
				?>
		<!-- PREGLED REZULTATA -->
		<div >
			<div class="container">
			<br>
			<?php
				$sel_sql = "SELECT * FROM mal_novo_u_ponudi ORDER BY id_m_novo_u_ponudi DESC LIMIT $start_from,$per_page";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<div class="col-md-3" style="align-content: center;">
							<div class="panel panel-warning">
								<div class="panel-heading">
									<div class="row">
										<h4 align="center">'.$rows['naslov_m_novo_u_ponudi'].'</h4>
									</div><!-- row -->
									
								</div><!-- panel-heading -->	
								<div class="panel-body">
										<img src="'.$rows['slika_m_novo_u_ponudi'].'" style="width: 220px; height: 170px;" alt="Dječija spavaća soba" style="border: solid 1px black; margin-left: 20px; ">
										<div class="row">
											<p style="text-align: center; margin-top: 10px;"><b>Cijena '.$rows['cijena_m_novo_u_ponudi'].'</b></p>
										</div>
								</div><!-- panel-body -->
								<div class="panel-footer">
									<div class="row">
										<a href="m_novo_u_ponudi.php?edit_id='.$rows['id_m_novo_u_ponudi'].'" class="btn btn-warning pull-left" style="margin-left: 20px;">Uredi</a>
										<a href="m_novo_u_ponudi.php?del_id='.$rows['id_m_novo_u_ponudi'].'" class="btn btn-danger pull-right" onclick="return confirm()"; style="margin-right: 20px;">Ukloni</a>
									</div>
								</div>
							</div><!-- panel-primary -->
						</div><!-- col-md-3 -->
					';
				}
			?>
			</div><!-- container -->
		</div><!-- margin-auto -->
		<!-- PAGINATION -->
		<nav aria-label="Page navigation" style="text-align: center; margin-bottom: 50px;">
			<ul class="pagination">
				<?php
					$pagination_sql = "SELECT * FROM mal_novo_u_ponudi";
					$run_pagination = mysqli_query($conn,$pagination_sql);
					$count = mysqli_num_rows($run_pagination);
					$total_pages = ceil($count/$per_page);
					for($i=1;$i<=$total_pages;$i++){
						echo'<li><a href="m_novo_u_ponudi.php?page='.$i.'">'.$i.'</a></li>';
					}
				?>
			</ul>
		</nav>
		<!-- FOOTER -->       
		<footer class="navbar navbar-default navbar-fixed-bottom" style="text-align: center;">
			<h5>Copyright &copy; 2016 Salon Namještaja</h5>
		</footer>
    </body>
</html>