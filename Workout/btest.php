<!DOCTYPE html>
<html>
<head>
	<title>Time sequence controller</title>
	<link rel="stylesheet" type="text/css" href="CSS/btest.css">
	<script type="text/javascript">
		
		var stat="stopped";
		var inte = null;
        var enarr = ["Pushups","Pullups","Squats"];
        var edarr = [15,20,13];
        var ss=5;
		var mm=1;
		var hh=0;
        
        var cc=0;
        var isCdone=true;
        
        var dbwnames=["Default"];
        var dbwdesc=["Pushups+15|Pullups+20|Squats+13"];
        
        var dbc=1;
        var wsdd = document.getElementById("wpicker");

        function regWorkouts(fname,fd){
            dbwnames[dbc]=fname;
            dbwdesc[dbc]=fd;
            dbc++;
           // alert("Regd "+dbwnames[dbc-1] + "d : "+dbwdesc[dbc-1] + "dbwlength "+ dbwnames.length);
        }

        function buildDD()
        {
                //alert("b 0");
        	    for(var i=0;i<dbwnames.length;i++)
        	    {   
        	    var btn = document.createElement("BUTTON");
				btn.setAttribute("id", ""+i);
				btn.setAttribute("class", "butons");
				btn.style.background="none";
				btn.style.color="white";
				btn.style.position="relative";

				btn.style.clear="right";
				btn.style.left="5%";
				btn.style.margin="0px";
				btn.style.border="1px solid white";

				btn.innerText = ""+dbwnames[i];
				btn.onclick=function(){
					//alert("You clicked workout "+this.id);
					document.getElementById("cwp").innerHTML="Current workout: "+this.innerHTML;
					//alert("Befoe split 1");
					var schemes=dbwdesc[parseInt(this.id)].split("|");
					//alert("afta split 1");
					var elist=[];
					var dlist=[];
					//alert("afta init arrays");
					
					for(var tc=0;tc<schemes.length;tc++)
					{  
                       var temp = schemes[tc].split("+");
                       var tempEN = temp[0];
                       var tempED = parseInt(temp[1]);
                       elist.push(tempEN);
                       dlist.push(tempED);
					}
					
					enarr=[];
					for(var i=0;i<elist.length;i++)
					{
                      enarr[i]=elist[i];
					}
					
					edarr=[];
					for(var i=0;i<dlist.length;i++)
					{
						if(isNaN(dlist[i]))
						{
							edarr[i]=parseInt(dlist[i]);
						}
						else
						{
							edarr[i]=dlist[i];
						}
					}
			    };
				document.body.appendChild(btn);

        	    }
        }

		function clickedThis()
		{
			if(stat=="stopped")
			{
                cc=0;
                isCdone=false;
                setCountDown(cc);
                inte = window.setInterval(ut,1000);
                stat = "running";
                document.getElementById("cB").value = "STOP";         
			}
			else
			{
                hh=0;
                mm=0;
                ss=edarr[0];
				window.clearInterval(inte);
				stat="stopped";
				document.getElementById("cB").value = "START";
			}
		}

		function ut()
		{
	 		if(hh===0 && mm===0 && ss<=0)
		    {
		    	if(cc<enarr.length)
                {
                	if(isCdone==false)
                	{   
                		isCdone=true;
                		cc++;
                		if(cc==enarr.length)
                		{
                			resetT("c");
                		}
                		else{
                		setCountDown(cc);
                		window.clearInterval(inte);
                		inte = window.setInterval(ut,1000);
                       	stat = "running";
                  		document.getElementById("cB").value = "STOP";
                  		isCdone=false;	
                		}
                		
                	}
                	else
                	{
                		alert("c not done error - change ut code");
                	}
                  
                }
                else
                {
                	resetT("c");
                }
		    }	
		    else{

				ss--;
				if(ss<0 && mm>0)
				{
					ss=59;
					mm--;
					if(mm===0 && hh>0)
					{
						mm=59;
						hh--;
					}
				}
				document.getElementById("timerP").innerHTML = ""  + ss;
		    }
		}

		function resetT(Rval)
		{   
			
			hh=0;
            mm=0;
            ss=0;
			if(stat=="stopped")
			{
                
			}
			else{

				window.clearInterval(inte);
				stat="stopped";
				document.getElementById("cB").value = "START";

			}

			if(Rval=="c")
			{
				document.getElementById("exn").innerHTML = "Excercise: complete";
        		document.getElementById("exd").innerHTML = "Duration: complete";
			}
			else
			{
				document.getElementById("exn").innerHTML = "Excercise: aborted";
        		document.getElementById("exd").innerHTML = "Duration: aborted";
			}
			document.getElementById("timerP").innerHTML = ""  + ss;
			
		}

        function setCountDown(cct){
        hh=0;
        mm=0;
        ss=edarr[cct];
        document.getElementById("exn").innerHTML = "Excercise: " + enarr[cct];
        document.getElementById("exd").innerHTML = "Duration: "  + ss+" seconds";	
        }

        

	</script>
</head>
<body>

	<center>
		<div id="container">
			<br>
			<div id="audo">
				<audio id="myAudio" src="samplesong.mp3" preload="auto"></audio>
				<button onClick="togglePlay()" id="btn"> CLICK TO PLAY</button>
			</div>
			<div id="startDiv"> 
				<?php
					$conn = new mysqli('localhost', 'root', '', 'workoutdb');

					if ($conn->connect_error) {
					    die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT * FROM workouts";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    while($row = $result->fetch_assoc()) {
					     //echo " Name ".$row["wname"]." Desc ".$row["wdesc"]. "<br>";
					     echo "<script> 
					        regWorkouts(\"".$row["wname"]."\", \"".$row["wdesc"]."\");
					        </script>";

					     }
					 echo "<script> buildDD(); </script>"; 
					 }
					else {
					    echo "0 results";
					}
					$conn->close();

				?>
			</div>

			<div id="sometext">
				<div>Time Sequence Controller</div><br>
				<div id="cwp">Current Workout: &nbsp Default</div><br>
				<div id="exn">Excercise: &nbsp </div><br>
				<div id="exd">Duration: &nbsp </div>
			</div>
			<br>
			<div>
				<div id="timerP">0</div><br>
				<input type="submit" id="cB" onclick="clickedThis()" value='START'>&nbsp &nbsp &nbsp
				<input type="submit" id="cB" onclick="resetT(this.id)" value='RESET'>
			</div>
		</div><br>
	</center>	

		<script type="text/javascript">
			var myAudio = document.getElementById("myAudio");
			var isPlaying = false;

			function togglePlay() {
			  if (isPlaying) {
			    myAudio.pause()
			  } else {
			    myAudio.play();
			  }
			};
			myAudio.onplaying = function() {
			  isPlaying = true;
			};
			myAudio.onpause = function() {
			  isPlaying = false;
			};
		</script>

</body>
</html>