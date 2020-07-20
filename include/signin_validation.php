<?php
if (isset($_POST['signup_submit'])){
	// include_once 'databaseconnection.php';
	require 'databaseconnection.php';
	//Difference 1. include_once even if the script fails incluse will just give a warning and continue to run the rest of the script
	//2. Require where ever the script fails, it will terminate the script there and then it will not continue to run the rest of the code beyond the error in the script

	$firstname = $_POST['fname'];
	$lastname = $_POST['lname'];
	$email = $_POST['email'];
	$username = $_POST['user_id'];
	$password = $_POST['pwd'];
	$c_pword = $_POST['c_pwd'];


	if(empty($firstname) || empty($lastname) || empty($email) || empty($username) || empty($password) || empty($c_pword)){

		header("Location: ../index.php?error=emptyfields&fname".$firstname."&lname".$lastname."&email".$email."&username".$username);
		exit();
	}else if(!filter_var($email,FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $firstname) && !preg_match("/^[a-zA-Z0-9]*$/", $lastname) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){

		header("Location: ../index.php?invalidfieldsfname&lname&username&email");
		exit();
	}else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){

		header("Location: ../index.php?error=invalidemail&username=".$username."&fname=".$firstname."&lname=".$lastname);
		exit();

	}else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){

		header("Location: ../index.php?error=invalidusername&email".$email."&fname=".$firstname."&lname=".$lastname);
		exit();

	}else if(!preg_match("/^[a-zA-Z0-9]*$/", $firstname)){

		header("Location: ../index.php?error=invalidfname&email".$email."&username=".$username."&lname=".$lastname);
		exit();
	
	}else if(!preg_match("/^[a-zA-Z0-9]*$/", $lastname)){

		header("Location: ../index.php?error=invalidlname&email".$email."&username=".$username."&fname=".$firstname);
		exit();
	
	}else if ($password !== $c_pword) {

		header("Location: ../index.php?error=invalidpassword&email".$email."&username".$username."&fname=".$firstname."&lname=".$lastname);
		exit();

	}else{

		$sql = "SELECT user_id FROM user WHERE user_id=?;";
		$stmt = mysqli_stmt_init($conn);

		if(!mysqli_stmt_prepare($stmt,$sql)){
			header("Location: ../index.php?error=sqlerror1");
			// echo "<script>alert('stopped here');</script>";
			exit();
		}else{
			mysqli_stmt_bind_param($stmt,"s",$username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows(stmt);

			if($resultCheck > 0){
				header("Location: ../index.php?error=usertaken&email".$email."&fname=".$firstname."&lname=".$lastname);
				exit();
			}else{
				$sql = "INSERT INTO User(user_id,firstname,lastname,email,password_digest) VALUES(?,?,?,?,?);";

				$stmt = mysqli_stmt_init($conn);

				if(!mysqli_stmt_prepare($stmt,$sql)){
					header("Location: ../index.php?error=sqlerror2");
					exit();
				}else{
					$hashPassword = password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt,"sssss",$username,$firstname,$lastname,$email,$hashPassword);
					mysqli_stmt_execute($stmt);
					echo "<script>alert(Sign Up Successful);</script>";
					header("Location: ../index.php?signup=success");
				}
			}

		}

	}
	mysqli_stmt_close(stmt);
	mysql_close($conn);
}else{
	header("Location: ../index.php?hello");
	close();
}
	


?>