<?php

    $serverName = "localhost";
    $dBUsername = "root";
    $dBPassword = "";
    $dBName = "elicense";

        $conn = new mysqli($serverName, $dBUsername, $dBPassword, $dBName);

        //checking if the connection is established successfully

        if ($conn->connect_error)
        {
            die("connection failed ".$conn->connect_error);
        }
