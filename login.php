<?php session_start();
	include '../includes/db.php';
	if(isset($_POST['login'])){
		if(!empty($_SESSION['email']) && !empty($_SESSION['password'])){
				$get_email = mysqli_real_escape_string($conn,$_POST['email']);
				$get_password = mysqli_real_escape_string($conn,$_POST['password']);
				$sel_sql="SELECT * FROM users WHERE a_email = '$get_email' AND a_password = '$get_password'";
				if($result = mysqli_query($conn,$sel_sql)){
					if (mysqli_num_rows($result) == 1){
						$_SESSION['email'] = $get_email;
						$_SESSION['password'] = $get_password;
						header('Location: admin/index.php');
					}else{
						header('Location: ../index.php?login_wrong');
					}
				}else {
					header('Location: ../index.php?login_wrong');
			}
		}else {
			header('Location: ../index.php?login_wrong');
		}
	}else {
		
	}
?>