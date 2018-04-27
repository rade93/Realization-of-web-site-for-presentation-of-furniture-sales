<?php include 'includes/db.php';
	$match = '';
	$proslo = '';
	if(isset($_POST['submit'])){
		
		if($_POST['password'] == $_POST['con_password']){
			//$date = date('d-m-Y h:i:s');
			$ins_sql = "INSERT INTO users (a_name,a_email,a_pass,a_pol) VALUES ('$_POST[name]', '$_POST[email]', '$_POST[password]', '$_POST[gender]')";
			$run_sql = mysqli_query($conn,$ins_sql);
			$proslo = '<div class="alert alert-success"> Podaci su sačuvani</div>';
		}else
			$match = '<div class="alert alert-danger"> Šifre se ne poklapaju</div>';
		
	}
?>
<!DOCTYPE html>
<html>

    <head>
    
        <title>Registracija</title>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <script src="js/bootstrap.js"></script>
        <script src="js/jquery.js"></script>
    </head>
    
    <body>
    
        <div class="container">
        
            <article class="row">
            
                <section class="col-lg-8">
                    <div class="jumbotron">
                        <h2>Registracija</h2>
                    </div>
					<?php echo $match; ?>
					<?php echo $proslo; ?>
                    <form class="form-horizontal" action="registration.php" method="post" role="form">
						<div class="form-group">
							<label for="name" class="col-sm-3 control-label">Name *</label>
						<div class="col-sm-6">
							<input type="text" class="form-control" name="name" id="name" placeholder="Ime" required>
						</div>
						</div>
						<div class="form-group">
							<label for="email" class="col-sm-3 control-label">Email *</label>
						<div class="col-sm-6">
							<input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
						</div>
						</div>
						<div class="form-group">
							<label for="con_password" class="col-sm-3 control-label">Password *</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" name="password" id="con_password" placeholder="Unesite vaš password" required>
						</div>
						</div>
						<div class="form-group">
							<label for="password" class="col-sm-3 control-label">Potvrdi Password *</label>
						<div class="col-sm-6">
							<input type="password" class="form-control" name="con_password" id="con_password" placeholder="Potvrdite vaš password" required>
						</div>
						</div>
						
                        <div class="form-group">
							<label for="gender" class="col-sm-3 control-label" required>Pol *</label>
						<div class="col-sm-6">                            
                                <select class="form-control" name="gender" id="gender" required>
                                    <option value="">Izaberi pol</option>
                                    <option value="M">Muško</option>
                                    <option value="Z">Žensko</option>
                                </select>                            
						</div>
						</div>
						
						<div class="form-group">
							<label class="col-sm-3 control-label"></label>
						<div class="col-sm-6">
							<input type="submit" name="submit" value="Registruj se" class="btn btn-block btn-primary" id="subject">
						</div>
						</div>
					</form>
                
                </section><!-- section -->
            
            </article><!-- article -->
            
        </div><!-- container -->
    
    </body>
    
</html>