<?php session_start();
	include 'includes/db.php';
	if(isset($_POST['submit_login'])){
		if(!empty($_POST['email']) && (!empty($_POST['password'])))
			$get_user_name = mysqli_real_escape_string($conn,$_post['email']);
			$get_password = mysqli_real_escape_string($conn,$_post['password']);
			$sql = "SELECT * FROM users WHERE a_email = '$get_user_name' AND a_pass = '$get_password'";
			if($result = mysqli_query($conn,$sql)){
				if(mysqli_num_rows($result) > 0){
					header("Location: ../admin/index.php");
				}else{
					$header("Location: index.php?something_missing");
				}
			}else{
				$header("Location: index.php?login=query_error");
			}
	}else{
		$header("Location: index.php?login=empty");
	}
?>