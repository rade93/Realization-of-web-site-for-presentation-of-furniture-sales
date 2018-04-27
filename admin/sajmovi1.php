<?php session_start();
	include '../includes/db.php';
	
	if(isset($_SESSION['user']) && isset ($_SESSION['password']) == true){
			$sel_sql="SELECT * FROM users WHERE a_email = '$_SESSION[user]' AND a_password = '$_SESSION[password]'";
			if($run_sql = mysqli_query($conn,$sel_sql)){
				if (mysqli_num_rows($run_sql > 0)){
					
				}else{
					header('Location: ../index.php');
				}
			}else {
		header('Location: ../index.php');
	}
	}
	$poruka = '';
	if(isset($_POST['sajam'])){
		$upit = "INSERT INTO sajmovi (naslov_sajmovi, opis_sajmovi, slika_sajmovi) VALUES ('$_POST[naslov]', '$_POST[opis]', 'slike/$_POST[slika]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/sajmovi1.php');
		}else{
			$poruka = '<div class="alert alert-danger"> Desila se greška prilikom čuvanja podataka</div>';
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
		$del_id = $_GET['del_id'];
		$sql = "DELETE FROM mal_trenutno_u_ponudi WHERE id_m_tren_u_ponudi = '$del_id'";
		if($run = mysqli_query($conn,$sql)){
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Upravo ste obrisali stavku pod ID '.$del_id.' </div>';
		}else{
			$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Nesto nije u redu</div>';
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
        <?php include 'includes/header.php'; ?>
		<div style="width:50px;height:50px;"></div>
        <?php echo $poruka; include 'includes/sidebar.php'; ?>
		<?php echo $result; ?>
		<div class="col-lg-10">			
			<div class="page-header"><h1>Sajmovi</h1></div>
			<div class="container-fluid">
			<p style="color: red;">NAPOMENA: Polja označena zvjezdicom (*) su obavezna</p>
			<form class="form-horizontal col-lg-5" action="sajmovi1.php" method="post" encryption="multipart/form-data">	

					<div class="form-group">
						<label for="naslov">Naslov *</label>
						<input id="naslov" type="text" name="naslov" class="form-control" required>
					</div>
					<div class="form-group">
						<label for="opis">Opis *</label>
						<textarea class="form-control" rows="10" style="resize:none;" name="opis" required></textarea>
					</div>
					
					<div class="form-group">
						<label for="cijena">Slika *</label>
						<input id="btn" type="file" name="slika" class="form-control" required>
					</div>
					
					<div class="form-group">
						<input id="btn" type="submit" name="sajam" class="btn btn-danger btn-block">
					</div>
				</form>
			
			</div><!-- container-fluid -->
		</div><!-- col-lg-10 -->
		<!-- ########################################################################## -->
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
						<p class="pull-left" style="width: 70%; margin-right: 20px; margin-top: 30px; text-align: justify">'.$rows['opis_sajmovi'].'</p>
						<img src="'.$rows['slika_sajmovi'].'" alt="" style="width: 300px; height: 250px; border-radius: 10px;">
						<div class="row">
						<a href="sajmovi.php?del_id='.$rows['id_sajmovi'].'" class="btn btn-danger pull-right" style="margin: 10px 10px;">Ukloni</a>
						<a href="" class="btn btn-warning pull-right" style="margin: 10px 10px;">Uredi</a>
						</div>
				';}?>
	</div><!-- container -->
	</div><!-- margin-auto -->
<div style="height: 100px;"></div>
<!-- PAGINATION -------------------------------------------------------------------->
<nav aria-label="Page navigation" style="text-align: center; margin-bottom: 50px;">
  <ul class="pagination">
<?php
	$pagination_sql = "SELECT * FROM mal_trenutno_u_ponudi";
	$run_pagination = mysqli_query($conn,$pagination_sql);
	$count = mysqli_num_rows($run_pagination);
	$total_pages = ceil($count/$per_page);
	for($i=1;$i<=$total_pages;$i++){
		echo'<li><a href="mal_trenutno_u_ponudi.php?page='.$i.'">'.$i.'</a></li>';
	}
?>
  </ul>
</nav>
        <?php include '../includes/footer.php'; ?>
    </body>
</html>