<?php session_start();
	include '../includes/db.php';
	if(isset($_POST['submit_login'])){
		if(!empty($_POST['user_name']) && !empty($_POST['password'])){
			$get_user_name = mysqli_real_escape_string($conn,$_POST['user_name']);
			$get_password = mysqli_real_escape_string($conn,$_POST['password']);
			$sql="SELECT * FROM users WHERE a_email = '$get_user_name' AND a_pass = '$get_password'";
			if($result = mysqli_query($conn,$sql)){
				while($rows = mysqli_fetch_assoc($result)){
					$ime = $rows['a_name'].' '.$rows['a_prezime'];
					if(mysqli_num_rows($result) == 1){
						$_SESSION['user'] = $get_user_name;
						$_SESSION['password'] = $get_password;
						$_SESSION['ime'] = $rows['a_name'];
						header('Location: ../admin/index.php');
					}else{
						header('Location: ../index.php?something_is_wrong');
					}
				}	
			}else {
					header('Location: ../index.php?error_query');
			}
		}else{
			header('Location: ../index.php?wrong_email_or_password');
		}
	}else{
	}
?>