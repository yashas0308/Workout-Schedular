<!DOCTYPE html>

<html>
<head>
	<title>WorkoutPlanner.in</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="CSS/homepage.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
</head>

<body>
	<center>
		<center>
			<div style="width:1250px; height:120px; border: 1px solid white;" id="heads">
				<?php
				session_start();
				if(isset($_SESSION['User']))
				{
					?><div class="top"><?php
						echo "Welcome &nbsp &nbsp" .$_SESSION['User']. "<br>";?></div>
					<div><?php 
					echo "<br><a href='logout.php' name='logoutB'><button class = 'btn btn22'><i class='fas fa-sign-out-alt'></i>&nbsp &nbsp LOGOUT</button></a><br>";
				}
				else
				{
					header("location:index.php");
				}
				?></div>
			</div>
		</center>
		<br><br>
		<center>
			<div style="width: 260px; height: 1030px; font-family: Facon; font-size: 15px; border: 1px solid white; border-collapse: collapse;" id="all">
				<center>
					<br>
					<p><a href="1archer.html" target="iframe_a"><button class="btn btn1">ARCHER PUSHUPS</button></a></p>
					<p><a href="2pushup.html" target="iframe_a"><button class="btn btn2">PUSHUPS</button></a></p>
					<p><a href="3bicyclecrunch.html" target="iframe_a"><button class="btn btn3">BICYCLE CRUNCH</button></a></p>
					<p><a href="4burpee.html" target="iframe_a"><button class="btn btn4">BURPEES</button></a></p>
					<p><a href="5chinups.html" target="iframe_a"><button class="btn btn5">CHINUPS</button></a></p>
					<p><a href="6crunches.html" target="iframe_a"><button class="btn btn6">CRUNCHES</button></a></p>
					<p><a href="7declinepushups.html" target="iframe_a"><button class="btn btn7">DECLINE PUSHUPS</button></a></p>
					<p><a href="8explosive.html" target="iframe_a"><button class="btn btn8">EXPLOSIVE PUSHUPS</button></a></p>
					<p><a href="9incline.html" target="iframe_a"><button class="btn btn9">INCLINE PUSHUPS</button></a></p>
					<p><a href="10jumpingsquat.html" target="iframe_a"><button class="btn btn10">JUMPING SQUATS</button></a></p>
					<p><a href="11legdescent.html" target="iframe_a"><button class="btn btn11">LEG DESCENT</button></a></p>
					<p><a href="12lunges.html" target="iframe_a"><button class="btn btn12">LUNGES</button></a></p>
					<p><a href="13mountain.html" target="iframe_a"><button class="btn btn13">MOUNTAIN CLIMBERS</button></a></p>
					<p><a href="14planck.html" target="iframe_a"><button class="btn btn14">PLANCKS</button></a></p>
					<p><a href="15pullups.html" target="iframe_a"><button class="btn btn15">PULLUPS</button></a></p>
					<p><a href="16sidelunge.html" target="iframe_a"><button class="btn btn16">SIDE LUNGE</button></a></p>
					<p><a href="17sideplanck.html" target="iframe_a"><button class="btn btn17">SIDE PLANCKS</button></a></p>
					<p><a href="18splitsquat.html" target="iframe_a"><button class="btn btn18">SPLIT SQUATS</button></a></p>
					<p><a href="19squats.html" target="iframe_a"><button class="btn btn19">SQUATS</button></a></p>
					<p><a href="20twisting.html" target="iframe_a"><button class="btn btn20">TWISTING SITUPS</button></a></p>
					<p><a href="21walking.html" target="iframe_a"><button class="btn btn21">WALKING PLANCK</button></a></p>
				</center>	
			</div>
			<center>
				<div>
					<iframe src="1archer.html" height="405px" width="520px" id="img" name="iframe_a"></iframe>
				</div>

				<div >
					<iframe src="createWorkout.html" height="405px" width="350px" id="creation"></iframe>
				</div>
			</center>
		</center>
		<br>
		<center>
			<br>
			<div>
				<iframe src="atest.php" height="620px" width="880px" id="sequence"></iframe>
			</div>
		</center>
		<footer id="footer" style="width: 1145px; height: 100px; border: 1px solid white;">
			<center><p>Thank You For Working Out!</p></center>
		</footer> 
	</center>
</body>
</html>