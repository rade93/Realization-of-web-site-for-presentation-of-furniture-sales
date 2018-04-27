<?php session_start();
	include '../includes/db.php';
	if(isset($_SESSION['user']) && isset ($_SESSION['password']) == true){
		$sel_sql="SELECT * FROM users WHERE a_email = '$_SESSION[user]' AND a_pass = '$_SESSION[password]'";
		if($run_sql = mysqli_query($conn,$sel_sql)){
				if (mysqli_num_rows($run_sql) == 1){
					
				}else{
					header('Location: ../index.php?postoji_vise_redova_sa_istim_podacima');
				}
		}else {
			header('Location: ../index.php?upit_nije_prosao');
		}
	}else{
		header('Location: ../index.php?morate_se_ulogovati');
	}
	$result='';
	if(isset($_GET['del_id'])){
		$del_id = $_GET['del_id'];
		$sql = "DELETE FROM vel_ugostiteljstvo WHERE id_vel_ugostiteljstvo = '$del_id'";
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
        
		<meta charset utf-8>
    </head>
    <body>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10">
			<div style="width: 50px;height: 50px;"></div>			
			<div class="panel panel-primary">
				<div class="panel-heading"><h4>Veleprodaja | Ugostiteljstvo</h4></div>
				<div class="panel-body">
				<table class="table">
						<thead>
							<tr>
								<th>ID</th>
								<th>Naslov</th>
								<th>Slika</th>							
								<th>Cijena</th>
								<th>Autor</th>
								<th>Uredi</th>
								<th>Ukloni</th>
							</tr>
						</thead>
				<?php 
				$sel_sql = "SELECT * FROM vel_ugostiteljstvo";
				$run_sql = mysqli_query($conn,$sel_sql);
				while($rows = mysqli_fetch_assoc($run_sql)){
					echo '
						<tbody>
							<tr>
								<td>'.$rows['id_vel_ugostiteljstvo'].'</td>
								<td>'.$rows['naslov_vel_ugostiteljstvo'].'</td>
								<td><img src="'.$rows['slika_vel_ugostiteljstvo'].'" width="100px"</td>
								<td>'.$rows['cijena_vel_ugostiteljstvo'].'</td>
								<td>Rade Gojković</td>
								<td><a href="#" class="btn btn-warning btn-sm navbar-btn">Uredi</a></td>
								<td><a href="edit_ugostiteljstvo.php?del_id='.$rows['id_vel_ugostiteljstvo'].'" class="btn btn-danger btn-sm navbar-btn">Ukloni</a></td>
							</tr>			
						</tbody>
					
					';
				}
					?>
						
					</table><!--post_list.php?del_id='.$rows['id'].'  OVO IDE KAO LINK NA TASTER UKLONI-->
					
				</div>
			</div><!-- panel-primary -->
			<div style="height: 100px;"></div>
		</div>
		
        <?php include '../includes/footer.php'; ?>
    </body>
</html>