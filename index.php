<?php include 'includes/db.php';
	$sel_sql = "SELECT * FROM o_nama";
	$run_sql = mysqli_query($conn,$sel_sql);
	$login_err = '';
	if(isset($_GET['login_error'])){
		if($_GET['login_error'] == ['empty']){
			$login_err = '<div class="alert alert-danger">Email ili password je prazan</div>';
		}elseif($_GET['login_error' == 'wrong']){
			$login_err = '<div class="alert alert-danger">Email ili password je netačan</div>';
		}
	}
	/*------------------------------------*/
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Početna strana</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      	<link rel="stylesheet" type="text/css" href="css/sminka.css">
       	<script src="js/moj.js"></script>
       	<script src="js/jquery.js"></script>
		<script src="js/bootstrap.js"></script>
</head>

<body>
<?php include 'includes/navbar.php'; ?>
		<!-- ADMIN PANEL -->
		<div class="modal fade" id="myModal" role="dialog">
		    <div class="modal-dialog">
				<div class="col-lg-12 col-md-12 col-sm-8">
					<div class="panel" >
						<form class="panel-group form-horizontal" role="form" action="accounts/login.php" method="post">
							<div class="modal-header">
					          	<button type="button" class="close" data-dismiss="modal">&times;</button>
					          	<h4 class="modal-title"><i class="glyphicon glyphicon-log-in"></i> Prijavi se</h4>
					        </div>
							<div class="panel-body">
								<div class="form-group">				
									<div class="col-sm-12">
									<label for="username">E-mail</label>
										<input type="text" id="username" placeholder="gojkovic007@gmail.com" name="user_name" class="form-control">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
									<label for="password">Šifra</label>
										<input type="password" id="password" class="form-control" name="password" placeholder="456">
									</div>
								</div>
								<div class="form-group">
									<div class="col-sm-12">
										<input type="submit" class="btn btn-success btn-block" name="submit_login" value="Pošalji">
									</div>
								</div>
							</div>
						</form>
						
					</div>
				</div><!--- col-md-2 -->
			</div>
		</div>

		<div id="onama" class="container panel">
			<?php echo $login_err; ?>
			<?php
				while($rows = mysqli_fetch_assoc($run_sql)){
				echo '
					<h3 id="naslov">'.$rows['o_nama_naslov'].'</h3>
					<p>'.$rows['o_nama_tekst'].'</p><br>
				';
			}
			?>
		</div>
		<?php include 'includes/footer.php'; ?>
	</body>
</html>
