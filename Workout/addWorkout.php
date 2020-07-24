<?php

$strDB="Nothing";
$strWN="Nothing";
if (@$_GET['DTP']==true) 
    {
        $strDB=$_GET['DTP'];
    }
$arrs=explode("?", $strDB);
$strWN=$arrs[1];
$strTS=$arrs[0];
//echo "You sent Wname: ".$strWN."<br>";
//echo "You sent desc: ".$strTS."<br>";

$tlbk = explode(" ", $strTS);
$wdescS="";

$wdescS="".$tlbk[0];
for ($i=1; $i < count($tlbk) ; $i++) {
 $wdescS=$wdescS."+".$tlbk[$i];
}
//echo "Finally sending ".$wdescS;

$conn = new mysqli('localhost', 'root', '', 'workoutdb');

      if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
      }
      $sql = "INSERT INTO workouts(wname,wdesc) VALUES ('".$strWN."','".$wdescS."')";

            if ($conn->query($sql) === TRUE) {
              //echo "added to db";
               header("location:createWorkout.html");

            } else {
               echo "Failed to add workout to database, make sure the name is unique " .$conn->error."<br>";
               echo "<a href='createWorkout.html'>Go Back</a>";
            }
            $conn->close();
?>