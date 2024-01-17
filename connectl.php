<?php
   $email=$_POST['email'];
   $psw=$_POST['psw'];

   $conn = new mysqli('localhost','root','','prweb');
   if($conn->connect_error)
   {
    die('Connection Failed : '.$conn->connect_error);
   }
   else
   {
      $SELECT="select email,password from register where email=? and password=? limit 1";
      $stmt=$conn->prepare($SELECT);
      $stmt->bind_param("ss",$email,$psw);
      $stmt->execute();
      $stmt->bind_result($email,$psw);
      $stmt->store_result();
      $rnum=$stmt->num_rows;
      
      if ($rnum==1)
      {
         
        header('Location: index.html');

      }
      else
      {
        echo "No account was found with this email address and password.";
      }
      $stmt->close();
      $conn->close();
   }
?>