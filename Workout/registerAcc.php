<?php 
$username = $_POST['Rname'];
$password = $_POST['Rpwd'];
$suc=0;

if (!empty($username) || !empty($password)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "workoutdb";

    //*Create Connection 
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'.mysqli_connect_error());
    } else {
    $SELECT = "SELECT * From users Where uname = ? Limit 1";
    $INSERT = "INSERT Into users (uname, upwd) values (?, ?)";
        //Prepare Statement 
        $stmt  = $conn->prepare($SELECT);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        //$stmt->bind_result($username);
        $stmt->store_result();
        $rnum = $stmt->num_rows;
        if ($rnum==0) {
         $stmt->close();
         $stmt = $conn->prepare($INSERT);
         $stmt->bind_param("ss", $username, $password);
         $stmt->execute();
         echo "<strong style='color:black;'>Customer Registration is Successful !</strong>";
         $suc=1;
        }
         else {
         echo "<strong style='color:darkblue;'>Someone Already Registered Using This Email!</strong>";
        }
         $stmt->close();
         $conn->close();

         if($suc==1)
         {
            header("location:index.php");
         }
         else
         {
            alert("Account already taken");
            header("location:signup.html");
         }
    }

} else {
    echo "All Fields are required";
    die();
}

?>