<?php
session_start();
  $errors="";

  if(is_null($_SESSION["email"]))
  {
   header("Location: login.php");
  }
  
  $user=$_SESSION["email"];
  $connect=mysqli_connect("localhost", "root", "", "blood");
  $delete=mysqli_query($connect, "DELETE FROM register WHERE email='$user'");
  if($delete)
  {
      echo $user." account deleted";
  }
  else{
      
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
  }
?>