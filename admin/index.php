<?php session_start();
	include '../includes/db.php';
	if(isset($_SESSION['user']) && isset ($_SESSION['password']) == true){
		$sel_sql="SELECT * FROM users WHERE a_email = '$_SESSION[user]' AND a_pass = '$_SESSION[password]'";
		if($run_sql = mysqli_query($conn,$sel_sql)){
			while($rows = mysqli_fetch_assoc($run_sql)){
				$ime = $rows['a_name'].' '.$rows['a_prezime'];
				$zanimanje = $rows['a_zanimanje'];
				$phone = $rows['a_telefon'];
				if (mysqli_num_rows($run_sql) == 1){
					
				}else{
					header('Location: ../index.php?postoji_vise_redova_sa_istim_podacima');
				}
			}
		}else {
			header('Location: ../index.php?upit_nije_prosao');
		}
	}else{
		header('Location: ../index.php?morate_se_ulogovati_kao_administrator');
	}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <script src="../js/jquery.js"></script>
		<script src="../js/bootstrap.js"></script>
       	<script src="../css/custom.css"></script>
		<meta charset utf-8>
    </head>
    <body>
		<?php include 'includes/sidebar.php';?>
		<div class="col-sm-2">
			
		</div>
		<div class="col-sm-8">
			<div class="col-sm-3">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size: 4.5em"></i></div>
							<div class="col-xs-8 text-right">
							<?php $sel_sql = "SELECT * FROM mal_trenutno_u_ponudi";
									$run_sql1 = mysqli_query($conn,$sel_sql);
									$total_trenutno = mysqli_num_rows($run_sql1);
							?>
								<div style="font-size: 2.5em"><?php echo $total_trenutno;?></div>
								<div>Maloprodaja</div>
							</div><!-- col-xs-8 -->
						</div><!-- row -->
					</div><!-- panel-heading -->
					<a href="#">
						<div class="panel-footer">
							<div class="pull-right"><a href="mal_trenutno_u_ponudi.php">Trenutno u ponudi</a></div>
							<div class="pull-left"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							<div class="clearfix"></div>
						</div><!-- panel-footer -->
					</a>
				</div><!-- panel-primary -->
			</div><!-- col-md-3 -->
			
			<div class="col-md-3">
				<div class="panel panel-success">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size: 4.5em"></i></div>
							<div class="col-xs-8 text-right">
							<?php $sel_sql = "SELECT * FROM mal_novo_u_ponudi";
									$run_sql1 = mysqli_query($conn,$sel_sql);
									$total_novo = mysqli_num_rows($run_sql1);
							?>
								<div style="font-size: 2.5em"><?php echo $total_novo;?></div>
								<div>Maloprodaja</div>
							</div><!-- col-xs-8 -->
						</div><!-- row -->
					</div><!-- panel-heading -->
					<a href="#">
						<div class="panel-footer">
							<div class="pull-right"><a href="mal_novo_u_ponudi.php">Novo u ponudi</a></div>
							<div class="pull-left"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							<div class="clearfix"></div>
						</div><!-- panel-footer -->
					</a>
				</div><!-- panel-primary -->
			</div><!--- col-md-3 -->
			
			<div class="col-md-3">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size: 4.5em"></i></div>
								<div class="col-xs-8 text-right">
								<?php $sel_sql = "SELECT * FROM vel_trenutno_u_prodaji";
									$run_sql1 = mysqli_query($conn,$sel_sql);
									$total_ugostiteljstvo = mysqli_num_rows($run_sql1);
								?>
									<div style="font-size: 2.5em"><?php echo $total_ugostiteljstvo;?></div>
									<div>Veleprodaja</div>
								</div><!-- col-xs-8 -->
						</div><!-- row -->
					</div><!-- panel-heading -->
					<a href="#">
						<div class="panel-footer">
							<div class="pull-right"><a href="vel_trenutno_u_prodaji.php">Trenutno u prodaji</a></div>
							<div class="pull-left"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							<div class="clearfix"></div>
						</div><!-- panel-footer -->
					</a>
				</div><!-- panel-primary -->
			</div><!-- col-md-3 -->
			
			<div class="col-md-3">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size: 4.5em"></i></div>
								<div class="col-xs-8 text-right">
								<?php $sel_sql = "SELECT * FROM vel_ugostiteljstvo";
									$run_sql1 = mysqli_query($conn,$sel_sql);
									$total_vel_tren = mysqli_num_rows($run_sql1);
								?>
									<div style="font-size: 2.5em"><?php echo $total_vel_tren;?></div>
									<div>Veleprodaja</div>
								</div><!-- col-xs-8 -->
						</div><!-- row -->
					</div><!-- panel-heading -->
					<a href="#">
						<div class="panel-footer">
							<div class="pull-right"><a href="vel_ugostiteljstvo.php">Ugostiteljstvo</a></div>
							<div class="pull-left"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							<div class="clearfix"></div>
						</div><!-- panel-footer -->
					</a>
				</div><!-- panel-primary -->
			</div><!-- col-md-3 -->
			
			<div class="col-md-3">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="glyphicon glyphicon-signal" style="font-size: 4.5em"></i></div>
								<div class="col-xs-8 text-right">
								<?php $sel_sql = "SELECT * FROM aktuelno";
									$run_sql1 = mysqli_query($conn,$sel_sql);
									$total_aktuelno = mysqli_num_rows($run_sql1);
								?>
									<div style="font-size: 2.5em"><?php echo $total_aktuelno;?></div>
									<div>Aktuelno</div>
								</div><!-- col-xs-8 -->
						</div><!-- row -->
					</div><!-- panel-heading -->
					<a href="#">
						<div class="panel-footer">
							<div class="pull-right"><a href="aktuelno.php">Aktuelno</a></div>
							<div class="pull-left"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							<div class="clearfix"></div>
						</div><!-- panel-footer -->
					</a>
				</div><!-- panel-primary -->
			</div><!-- col-md-3 -->
			
			<div class="col-md-3">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="glyphicon glyphicon-user" style="font-size: 4.5em"></i></div>
								<div class="col-xs-8 text-right">
								<?php $sel_sql = "SELECT * FROM users";
									$run_sql1 = mysqli_query($conn,$sel_sql);
									$total_admins = mysqli_num_rows($run_sql1);
								?>
									<div style="font-size: 2.5em"><?php echo $total_admins;?></div>
									<div>Administratori</div>
								</div><!-- col-xs-8 -->
						</div><!-- row -->
					</div><!-- panel-heading -->
					<a href="#">
						<div class="panel-footer">
							<div class="pull-right">Pogledaj administratore</div>
							<div class="pull-left"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							<div class="clearfix"></div>
						</div><!-- panel-footer -->
					</a>
				</div><!-- panel-primary -->
			</div><!-- col-md-3 -->
			<div class="col-md-3">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-3"><i class="glyphicon glyphicon-question-sign" style="font-size: 4.5em"></i></div>
								<div class="col-xs-8 text-right">
								<?php $sel_sql = "SELECT * FROM pitanja";
									$run_sql1 = mysqli_query($conn,$sel_sql);
									$total_faq = mysqli_num_rows($run_sql1);
								?>
									<div style="font-size: 2.5em"><?php echo $total_faq;?></div>
									<div>Pitanja</div>
								</div><!-- col-xs-8 -->
						</div><!-- row -->
					</div><!-- panel-heading -->
					<a href="#">
						<div class="panel-footer">
							<div class="pull-right"><a href="pitanja.php">Pogledaj pitanja</a></div>
							<div class="pull-left"><i class="glyphicon glyphicon-circle-arrow-right"></i></div>
							<div class="clearfix"></div>
						</div><!-- panel-footer -->
					</a>
				</div><!-- panel-primary -->
			</div><!-- col-md-3 -->
			<!-- KRAJ BLOKOVA -->
			<!-- LISTA KORISNIKA -->
			<div class="col-lg-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4>Administratori</h4>
					</div><!-- panel-heading -->					
						<div class="panel-body">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>ID</th>
										<th>Ime</th>
										<th>Prezime</th>
										<th>Funkcija</th>
										<th>Adresa</th>
										<th>Grad</th>
										<th>Telefon</th>
										<th>Email</th>
									</tr>
								</thead>
								<tbody>
								<?php $sel_sql = "SELECT * FROM users";
									$run_sql = mysqli_query($conn,$sel_sql);
									while($a_rows = mysqli_fetch_assoc($run_sql)){
										echo '
									<tr>
										<td>'.$a_rows['id_a'].'</td>
										<td>'.$a_rows['a_name'].'</td>
										<td>'.$a_rows['a_prezime'].'</td>
										<td>'.$a_rows['a_zanimanje'].'</td>
										<td>'.$a_rows['a_adresa'].'</td>
										<td>'.$a_rows['a_grad'].'</td>
										<td>'.$a_rows['a_telefon'].'</td>
										<td>'.$a_rows['a_email'].'</td>
									</tr>
									';
									}?>
									</tbody>
							</table>
						</div><!-- panel-footer -->					
				</div><!-- panel-primary -->
			</div><!-- col-lg-6 -->			
			<div class="clearfix"></div>
		</div>
    </body>
</html>