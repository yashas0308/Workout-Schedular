<!DOCTYPE HTML>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="CSS/login.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>
<body>
	<center>
		<div class="genBox">
		<h1>Login</h1>
		<br>
		<form action="proclogin.php" method="post">
			<input type="text" name="UNTxt" placeholder="User Name" class="ITB" required>
			<br>
			<br>
			<input type="password" name="UPTxt" placeholder="User Password" pattern="[A-Za-z0-9]{6}" class="ITB" required>
			<br>
			<?php 
            if (@$_GET['Emp']==true) {
            	# code...
           
             ?>
            <div class="alertB"><?php echo $_GET['Emp']; ?></div>
             <?php 
              } 
             ?>
			<br>
			<?php 
            if (@$_GET['Inv']==true) {
            	# code...
           
             ?>
            <div class="alertB"><?php echo $_GET['Inv']; ?></div>
             <?php 
              } 
             ?>
            <br>
            <input type="submit" style="font-family: Facon;" value="LOGIN" class="logB" name="loginButton">
			<a href="mainpage.html"><input type="button" style="font-family: Facon;" value="GO HOME" class="logB" name="homeButton"></a>
			<br>
            <br>

		</form>
	</div>
	</center>
	

</body>
</html>