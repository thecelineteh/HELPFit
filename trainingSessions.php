<?php
  session_start();
   // Connect to database
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "helpfit";
   $con = new mysqli($servername, $username, $password, $dbname);

   if (!$con) {
    die("Could not connect to database.");
    }
   echo "Database connected."."</br>";

   // Query
   $title=$_POST['title'];
   $sessionDate=$_POST['sessionDate'];
   $sessionTime=$_POST['sessionTime'];
   $sessionFee=$_POST['sessionFee'];
   $type=$_POST['type'];
   $theTrainer = $_SESSION['user'];

   //to convert the time from am/pm to 24hours time format to store in database
   $sessionTime= date("G:i", strtotime($sessionTime));

   // Add record
   if ($type == "Personal") {
     $maxPax = 1;
     $classType = "";
   } else {
     $maxPax=$_POST['maxPax'];
     $classType= $_POST['classTypes'];
   }
   $sql_addTrainingSession = "INSERT INTO trainingsessions(title,sessionDate,sessionTime,sessionFee,maxPax,type,classType, sessionTrainer)
   VALUES ('$title','$sessionDate','$sessionTime','$sessionFee','$maxPax','$type','$classType', '$theTrainer')";

   $result_addTrainingSession = mysqli_query($con, $sql_addTrainingSession);

  if ($result_addTrainingSession) {
    echo "Training session : ".$title. " successfully added.";
    echo "Redirecting back to training session page";
    header("Refresh: 5; url= trainingSession.html");
  }
  else {
     echo "Error adding a training session : " . mysqli_error($con);
     mysqli_error($con);
   }

  mysqli_close($con);
?>