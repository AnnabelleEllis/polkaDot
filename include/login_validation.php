<?php

if(isset($_POST["login_submit"])){
	require 'databaseconnection.php';

	$loginUsername = $_POST["login_username"];
	$loginPassword = $_POST["login_password"];

	if(empty($loginUsername) || empty($loginPassword)){
		header("Location: ../index.php?error=fieldempty");
		exit();
	}else{
		$sql = "SELECT * FROM User WHERE user_id=? OR email=?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../index.php?error=sqlerror");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"ss",$loginUsername,$loginUsername);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				$pwdCheck = password_verify($loginPassword, $row['password_digest']);//digest comes from the database
				if($pwdCheck == false){
					header("Location: ../index.php?error=wrongpassword");
					exit();
				}else if($pwdCheck == true){
					session_start();
					$_SESSION['userID']=$row['user_id']; //User_id comes from the database 
					$_SESSION['firstNAME']=$row['firstname'];
					$_SESSION['lastNAME']=$row['lastname'];
					header("Location: ../home.php?login=success");
					exit();
				}else{
					header("Location: ../index.php?error=wrongpassword");
					exit();
				}
			}else{
				header("Location: ../index.php?error=nouser");
				exit();
			}
		}
	}

}else{
	header("Location: ../index.php?hello1");
	exit();
}

?>