<?php

    $database= new mysqli("localhost","root","","db_telepulse");
    if ($database->connect_error){
        die("Connection failed:  ".$database->connect_error);
    }

?>