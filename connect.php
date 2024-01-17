<?php
   $email=$_POST['email'];
   $psw=$_POST['psw'];
   $pswrepeat=$_POST['pswrepeat'];
   $role=$_POST['role'];

   $conn = new mysqli('localhost','root','','prweb');
   if($conn->connect_error)
   {
    die('Connection Failed : '.$conn->connect_error);
   }
   else
   {
      $SELECT="select email from register where email=? limit 1";
      $INSERT="insert into register(email,password,passwordrepeat,role) values(?,?,?,?)";
      $stmt=$conn->prepare($SELECT);
      $stmt->bind_param("s",$email);
      $stmt->execute();
      $stmt->bind_result($email);
      $stmt->store_result();
      $rnum=$stmt->num_rows;
      
      if ($rnum==0)
      {
         if($psw==$pswrepeat)
         {
            $stmt->close();

            $stmt=$conn->prepare($INSERT);
            $stmt->bind_param("ssss",$email,$psw,$pswrepeat,$role);
            $stmt->execute();
            echo "New record inserted successfully";
         }
         else
         {
            echo "Password does not match";
         }

      }
      else
      {
         echo "Someone already register using this email";
      }
      $stmt->close();
      $conn->close();
   }
?>