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
        <?php include '../includes/header.php'; ?>
		<div style="width:50px;height:50px;"></div>
        <?php include 'includes/sidebar.php'; ?>
		<div class="col-lg-10">
			<div style="width: 50px;height: 50px;"></div>
			<!-- LISTA KORISNIKA -->
			<div class="col-lg-8">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>Kategorije</h4>
					</div><!-- panel-heading -->					
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>R.br</th>
										<th>Ime kategorije</th>
										<th>Ukloni</th>
										<th>Uredi</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>1</td>
										<td>Trenutno u ponudi</td>
										<td><a href="#" class="btn btn-danger btn-xs">Ukloni</a></td>
										<td><a href="#" class="btn btn-warning btn-xs">Uredi</a></td>
									</tr>
									<tr>
										<td>2</td>
										<td>Novo u ponudi</td>
										<td><a href="#" class="btn btn-danger btn-xs">Ukloni</a></td>
										<td><a href="#" class="btn btn-warning btn-xs">Uredi</a></td>
									</tr>
								</tbody>
							</table>
						</div><!-- panel-footer -->					
				</div><!-- panel-primary -->
			</div><!-- col-lg-6 -->
			<!-- PROFIL KORISNIKA -->
			
			
			<div class="clearfix"></div>
			<!-- Top blocks ends -->
			
			
			
			
		</div>
       
        <footer></footer>
    </body>
</html>