<?php 
 
 require_once "includes/dbh-action.php";

 $password = "password";
 $hashedPwd = password_hash($password, PASSWORD_DEFAULT);
 $admin = 'SISE-13325';

 $sql="UPDATE user SET Pass = '$hashedPwd' WHERE LIC='$admin'";
 $conn->query($sql);

 $conn->close();

 header("location: index.php");
 exit();