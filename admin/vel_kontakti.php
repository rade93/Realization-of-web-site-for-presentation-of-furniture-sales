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
	if(isset($_POST['vel_kontakti'])){
		$upit = "INSERT INTO vel_kontakti (kancelarija_vel_kontakti, telefon_vel_kontakti, fax_vel_kontakti, email_vel_kontakti) VALUES ('$_POST[kancelarija]', '$_POST[telefon]', '$_POST[fax]', '$_POST[email]')";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/vel_kontakti.php');
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Podaci su uspješno upisani!</div>';
		}else{
			$result = '<div class="alert alert-danger col-sm-3" style="margin-top: 10px;">Nesto nije u redu</div>';;
		}
	}
	if(isset($_POST['uredi'])){
		$upit = "UPDATE vel_kontakti SET kancelarija_vel_kontakti = '$_POST[kancelarija]', telefon_vel_kontakti = '$_POST[telefon]', fax_vel_kontakti = '$_POST[fax]', email_vel_kontakti = '$_POST[email]' WHERE id_vel_kontakti = '$_POST[kontakti_id]'";
		if(mysqli_query($conn,$upit)){
			header('Location: ../admin/vel_kontakti.php');
		}else{
			$result = '<div class="alert alert-danger"> Desila se greška prilikom čuvanja podataka</div>';
		}
	}
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM vel_kontakti WHERE id_vel_kontakti = '$del_id'";
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
        <title>Admin | Veleprodaja | Kontakti</title>
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
			<div class="page-header" style="margin-left: 250px;"><h1>Veleprodaja | Kontakti <a href="vel_kontakti.php?dodaj" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Dodaj novu stavku</a></h1></div>
			<p style="color: red; margin-left: 250px;">NAPOMENA: Polja označena zvjezdicom(*) su obavezna!</p>
			<div class="container-fluid">
				<form class="form-horizontal col-lg-5" action="vel_kontakti.php" method="post" enctype="multipart/form-data">	
				<?php
				if(isset($_GET['dodaj'])){
				echo '
					<div class="form-group">
						<label for="naslov">Kancelarija: *</label>
						<input id="naslov" type="text" name="kancelarija" class="form-control" reqired>
					</div>
					
					<div class="form-group">
						<label for="telefon">Telefon: *</label>
						<input id="telefon" type="text" name="telefon" class="form-control" required>
					</div>
					
					<div class="form-group">
						<label for="fax">FAX:</label>
						<input id="fax" type="text" name="fax" class="form-control">
					</div>
					
					<div class="form-group">
						<label for="email">Email</label>
						<input id="email" type="email" name="email" class="form-control">
					</div>				
					<div class="form-group">
						<input id="btn" type="submit" name="vel_kontakti" class="btn btn-danger btn-block" value="Dodaj">
					</div>
				</form>
				';}?>
				<?php
				if(isset($_GET['edit_id'])){
				$sql = "SELECT * FROM vel_kontakti WHERE id_vel_kontakti = '$_GET[edit_id]'";
				$run = mysqli_query($conn,$sql);
				while($rows = mysqli_fetch_assoc($run)){?>
				<form class="form-horizontal col-lg-5" action="vel_kontakti.php" method="post" enctype="multipart/form-data">	

					<div class="form-group">
						<label for="kontakti_id">ID: *</label>
						<input id="btn" type="text" name="kontakti_id" class="form-control" value="<?php echo $_GET['edit_id']; ?>" reqired>
					</div>
					<div class="form-group">
						<label for="naslov">Kancelarija: *</label>
						<input id="btn" type="text" name="kancelarija" class="form-control" value="<?php echo $rows['kancelarija_vel_kontakti']; ?>" reqired>
					</div>
					
					<div class="form-group">
						<label for="telefon">Telefon: *</label>
						<input id="btn" type="text" name="telefon" class="form-control" value="<?php echo $rows['telefon_vel_kontakti']; ?>" required>
					</div>
					
					<div class="form-group">
						<label for="fax">FAX:</label>
						<input id="btn" type="text" name="fax" class="form-control" value="<?php echo $rows['fax_vel_kontakti']; ?>">
					</div>
					
					<div class="form-group">
						<label for="email">Email</label>
						<input id="btn" type="email" name="email" class="form-control" value="<?php echo $rows['email_vel_kontakti']; ?>">
					</div>				
					<div class="form-group">
						<input id="btn" type="submit" name="uredi" class="btn btn-danger btn-block">
					</div>
				</form>
				<?php } 
					}
				?>
			</div>
		</div><!-- col-lg-10 -->
		<!-- PREGLED REZULTATA ---------------------------------------------------------------------------->
		<div class="container" style=" font-size: 16px;">
		<h3 style="margin-top: 80px;">Pregled rezultata</h3><br>
		<div style="margin-left: 100px; margin-right: 100px; color: black;">
					<table style="width: 100%; border-bottom: 1px solid black" class="table-hover">
						<thead>
								<tr style="border-bottom: 2px solid white; text-decoration: underline;">
									<th style="text-align: center;">KANCELARIJA</th>
									<th style="text-align: center;">TELEFON</th>
									<th style="text-align: center;">FAX</th>
									<th style="text-align: center;">EMAIL</th>
								</tr>
								
						</thead>
						
						<?php
				$sel_sql = "SELECT * FROM vel_kontakti";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
							
						
						<tbody style=" border-bottom: 1px solid white;">
							<tr>
								<td style="text-align: center;"><b>'.$rows['kancelarija_vel_kontakti'].'</b></td>
								<td style="text-align: center;">'.$rows['telefon_vel_kontakti'].'</td>
								<td style="text-align: center;">'.$rows['fax_vel_kontakti'].'</td>
								<td style="text-align: center;">'.$rows['email_vel_kontakti'].'</td>
								<td>
									<a href="vel_kontakti.php?edit_id='.$rows['id_vel_kontakti'].'" class="btn btn-warning">Uredi</a>
									<a href="vel_kontakti.php?del_id='.$rows['id_vel_kontakti'].'" class="btn btn-danger" onclick="return confirm()";>Ukloni</a>
								</td>
							</tr>
							
						</tbody>
						';}?>
					</table>
			</div>
		</div>
		<div style="height: 100px;"></div>
<!-- FOOTER -->
<?php echo include '../includes/footer.php'; ?>
    </body>
</html>