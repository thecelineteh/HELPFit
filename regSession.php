<?php
session_start();
//connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "helpfit";
$con = new mysqli($servername, $username, $password, $dbname);

 if (!$con) {
  die("Could not connect to database.");
  }

//to update member profile
  $theMember = $_SESSION['user'];



$query = mysqli_query($con, $regSession);

  if ($query) {
    echo "The Session : ".$sessionID. " is successfully registered.<br>";
    echo "Redirecting back to training history page...";
    header("Refresh: 5; url=  memberTrainingHist.php");
  }
  else {
     echo "Error updating member profile : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);


 ?>
