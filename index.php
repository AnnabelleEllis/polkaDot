<?php
	
	session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>polkaDot|Login</title>
	<link rel="stylesheet" type="text/css" href="style/stylelogin.css">
</head>


<body><script type='text/javascript' id="__bs_script__">//<![CDATA[
    document.write("<script async src='/browser-sync/browser-sync-client.2.8.2.js'><\/script>".replace("HOST", location.hostname));
//]]></script>

	<header>
	    <h1><span class="highlight">polka</span>Dot</h1>
    	<form action="include/login_validation.php" method = "POST">
    		<label>UserName</label>
    		<input type="text" name="login_username" placeholder=" eg. John123 ">
    		<label>Password</label>
    		<input type="password" name="login_password" placeholder=" ****** ">
    		<button type ="submit" name="login_submit">Login</button>
    	</form>
    </header>

    <section>
    	<div class = "box">
    		<h2> Welcome to polkaDot</h2>
    		<form action = "include/signin_validation.php" method = "POST">
				<div>
					<input type="text" name="fname" placeholder="First Name">
				</div>

				<div>
					<input type="text" name="lname" placeholder="Last Name">
				</div>

				<div>
					<input type="text" name="email" placeholder="E-mail">
				</div>

				<div>
					<input type="text" name="user_id" placeholder="User Name">
				</div>

				<div>
					<input type="password" name="pwd" placeholder="Password">
				</div>

				<div>
					<input type="password" name="c_pwd" placeholder="Confirm Password">
				</div>

				<button type ="submit" name="signup_submit">Sign Up</button>
			</form>
    	</div>
    </section>

    <footer>
      <p>polkaDot, Copyright &copy; 2020</p>
    </footer>

</body>
</html>