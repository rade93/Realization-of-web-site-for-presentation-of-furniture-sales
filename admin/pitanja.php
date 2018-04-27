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
	$result='';
	if(isset($_GET['del_id'])){
		if(confirm == true){
			$del_id = $_GET['del_id'];
			$sql = "DELETE FROM pitanja WHERE id_pitanja = '$del_id'";
			if($run = mysqli_query($conn,$sql)){
				$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Upravo ste obrisali stavku pod ID '.$del_id.' </div>';
			}else{
				$result = '<div class="alert alert-danger col-sm-5" style="margin-top: 10px;">Nesto nije u redu</div>';
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
        
		<meta charset utf-8>
    </head>
    <body>
        <?php include '../admin/includes/header.php'; ?>
		<div style="width:50px;height:50px;"></div>
        <?php include 'includes/sidebar.php'; ?>
        <?php echo $result; ?>
		<div class="container">
		<div class="col-lg-8">
			<div style="width: 50px;height: 50px;"></div>
			
			<div class="panel panel-primary">
				<div class="panel-heading"><h4>Pitanja</h4></div>
				<div class="panel-body">
				<table class="table">
						<thead>
							<tr>
								<th>R.br</th>
								<th>Korisnik</th>
								<th>Email</th>							
								<th>Pitanje</th>
								<th>Ukloni</th>
							</tr>
						</thead>
				<?php 
				$sel_sql = "SELECT * FROM pitanja";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<tbody>
							<tr>
								<td>'.$rows['id_pitanja'].'</td>
								<td>'.$rows['ime_korisnika'].'</td>
								<td>'.$rows['email_korisnika'].'</td>
								<td>'.$rows['pitanje'].'</td>
								<td><a href="pitanja.php?del_id='.$rows['id_pitanja'].'" onclick="return confirm()"; class="btn btn-danger btn-sm navbar-btn">Ukloni</a></td>
							</tr>			
						</tbody>
					
					';
				}
					?>
						
					</table><!--post_list.php?del_id='.$rows['id'].'  OVO IDE KAO LINK NA TASTER UKLONI-->
					
				</div>
			</div><!-- panel-primary -->
		</div><!-- col-lg-7 -->
			<div style="height: 100px;"></div>
		</div><!-- container -->
		
        <?php include '../includes/footer.php'; ?>
    </body>
</html>