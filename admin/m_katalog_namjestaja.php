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
	if(isset($_POST['katalog_namjestaja'])){
		$upit = "INSERT INTO mal_katalog_namjestaja (slika_m_katalog_namjestaja) VALUES ('slike/$_POST[slika]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/m_katalog_namjestaja.php');
			$result = '<div class="alert alert-success col-sm-5" style="margin-top: 10px;">Uspješno ste dodali sliku!</div>';
		}else{
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Desila se greška prilikom čuvanja slike!</div>';
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE mal_katalog_namjestaja SET slika_m_katalog_namjestaja = 'slike/$_POST[slika]' WHERE id_m_katalog_namjestaja = '$_POST[id_namjestaj]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/m_katalog_namjestaja.php');
		}else{
			$result = '<div class="alert alert-danger"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM mal_katalog_namjestaja WHERE id_m_katalog_namjestaja = '$del_id'";
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
        <title>Maloprodaja | Katalog namještaja</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/sminka.css">
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
	 	<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
	  	<script>tinymce.init({ selector:'textarea' });</script>

		<meta charset utf-8>
    </head>
    <body>		
        <?php include 'includes/sidebar.php'; ?>
		<div class="container-fluid">
		<div class="col-lg-10">	
				
			
			<?php
			if(isset($_GET['dodaj'])){
				echo '
			
			<p style="color: red;">NAPOMENA: Polja označena zvjezdicom (*) su obavezna</p>
				<form class="form-horizontal col-sm-3" action="m_katalog_namjestaja.php" method="post" encryption="multipart/form-data">
					<div class="form-group">
						<label for="slika">Slika artikla *</label>
						<input id="btn" type="file" name="slika" class="form-control" required>
					</div>
					<div class="form-group">
						<input id="btn" type="submit" name="katalog_namjestaja" class="btn btn-danger btn-block">
					</div>
			</form>
			
			</div><!-- container-fluid -->
			';}
				?>
		</div><!-- col-lg-10 -->
		<div class="col-lg-10">			
			
			<?php
			if(isset($_GET['edit_id'])){
			$sql = "SELECT * FROM mal_katalog_namjestaja WHERE id_m_katalog_namjestaja = '$_GET[edit_id]'";
			$run = mysqli_query($conn,$sql);
			while($rows = mysqli_fetch_assoc($run)){?>
			<div class="container-fluid" style="margin-left: 250px;">
			<p style="color: red;">NAPOMENA: Polja označena zvjezdicom (*) su obavezna</p>
				<form class="form-horizontal col-lg-5" action="m_katalog_namjestaja.php" method="post" encryption="multipart/form-data">
					<div class="form-group">
						<label for="id_namjestaj">ID</label>
						<input id="btn" type="text" name="id_namjestaj" class="forom-control" value="<?php echo $_GET['edit_id']; ?>" required>
					</div>
					<div class="form-group">
						<img src="<?php echo $rows['slika_m_katalog_namjestaja']; ?>" style="width: 220px; height: 170px;" alt="Katalog namjestaja" style="border: solid 1px black; margin-left: 20px; ">
						<label for="slika">Slika artikla *</label>
						<input id="btn" type="file" name="slika" class="form-control" required>
					</div>
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-danger btn-block" value="Uredi">
					</div>
			</form>
			
			</div><!-- container-fluid -->
			<?php } 
					}
				?>
		</div><!-- col-lg-10 -->

		<!-- REZULTATI -->
		<div style="margin:auto;">
		
			<div class="container">
			<div class="page-header"><h1>Maloprodaja | Katalog namještaja </h1>
			<a href="m_katalog_namjestaja.php?dodaj" class="btn btn-success" ><b><i class="glyphicon glyphicon-plus"></i> Dodaj</b></a>
			</div>

		<?php 
				$sel_sql = "SELECT * FROM mal_katalog_namjestaja ORDER BY id_m_katalog_namjestaja DESC LIMIT $start_from,$per_page";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<div class="col-sm-6">

							<img id="myImg" class="modal-content" src="'.$rows['slika_m_katalog_namjestaja'].'" style="width: 500px; height: 330px; margin: 10px;">
							<a href="m_katalog_namjestaja.php?edit_id='.$rows['id_m_katalog_namjestaja'].'" class="btn btn-warning pull-left" style="margin-left: 200px;"><b>Uredi</b></a>
							<a href="m_katalog_namjestaja.php?del_id='.$rows['id_m_katalog_namjestaja'].'" class="btn btn-danger pull-right" onclick="return confirm()"; style="margin-right: 200px;"><b>Ukloni</b></a>
						</div>
					';
				}
					?>
					<div id="myModal" class="modal">
						<span class="close">&times;</span>
						<img class="modal-content" id="img01">
						<div id="caption"></div>
					</div>
			</div><!-- container -->
		</div><!-- margin-auto -->
				<!-- PAGINATION -->
<nav aria-label="Page navigation" style="text-align: center; margin-bottom: 50px;">
	<ul class="pagination">
		<?php
			$pagination_sql = "SELECT * FROM mal_katalog_namjestaja";
			$run_pagination = mysqli_query($conn,$pagination_sql);
			$count = mysqli_num_rows($run_pagination);
			$total_pages = ceil($count/$per_page);
			for($i=1;$i<=$total_pages;$i++){
				echo'<li><a href="m_katalog_namjestaja.php?page='.$i.'">'.$i.'</a></li>';
			}
		?>
	</ul>
</nav>
		<!-- FOOTER -->
<?php echo include '../includes/footer.php'; ?>
    </body>
</html>