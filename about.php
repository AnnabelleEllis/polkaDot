<?php
  
  session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>polkaDot|About</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
	 <header>
      <div class="container">
        <div id="branding">
          <h1><span class="highlight">polka</span>Dot</h1>
        </div>
        <nav>
          <ul>
            <li><a href="home.php">Home</a></li>
            <li class="current"><a href="about.php">About</a></li>
            <li ><a href="messages.php">Messages</a></li>
            <li><form action = "" method = "POST" ><button class = "log-out"><a href="#">Logout</a></button></form></li>
            <!-- <li><a href="login.php">LogOut</a></li> -->
            <!-- Put the home page. logout page in this link -->
          </ul>
        </nav>
      </div>
    </header>


    <footer>
      <p>polkaDot, Copyright &copy; 2020</p>
    </footer>
</body>
</html>