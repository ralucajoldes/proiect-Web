<?php
require 'db.php';

$sql="delete from user where email='" . $_GET["email"] . "'";

if (!mysqli_query($con,$sql))
{
die('Error: ' . mysqli_error($con));
}
else{
echo "Record Deleted";
header("Location: register.php");
}
mysqli_close($con);
?>
