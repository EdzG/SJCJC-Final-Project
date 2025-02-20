<?php

    if (isset($_POST['submit'])){

        $username = $_POST["username"];
        $password = $_POST["password"];

        require_once 'dbh-action.php';
        require_once 'functions.php'; 

        if (emptyInputLogin($username, $password) !== false) {
            header("location: ../login.php?error=emptyinput");
            exit();
        }
      

        if($_POST['accType'] == 0){
            
            loginUser($conn, $username, $password);
        
            
        } else if ($_POST['accType'] == 1){
            loginPolice($conn, $username, $password);

        } else if ($_POST['accType'] == 2){
            loginAdmin($conn, $username, $password);

        } else {
            header ("location: ../login.php?error=noacctype");
        }

    } else {
        header ("location: ../login.php");
    }