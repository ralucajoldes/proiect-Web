<?php
   session_start();
   $conn=mysqli_connect('localhost','root','','prweb');
   if(isset($_POST["submit"]))
   {
    $email=$_POST['email'];
    $psw=$_POST['psw'];
    $pswrepeat=$_POST['pswrepeat'];
    $role=$_POST['role'];
    $duplicate=mysqli_query($conn,"select * from register where email='$email'");
    if(mysqli_num_rows($duplicate)>0)
    {
        echo "Someone already register using this email";
    }
    else
    {
        if($psw==$pswrepeat)
        {
            $query="insert into register(email,password,passwordrepeat,role) values('$email','$psw','$pswrepeat','$role')";
            mysqli_query($conn,$query);
            echo "<script> alert('Registration Successful'); </script>";
        }
        else
        {
            echo "<script> alert('Password does not match'); </script>";
        }
    }
   }
?>