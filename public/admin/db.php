<?php
// db.php

$host = "localhost";
/////////////////////////////////////////////////////////////////////
// if use xampp, use this code

/* 
$userID = "root";
$userPassword = "";
$Database = "project";

 */
// if use dothome, use this code


$userID = "jeonguk";
$userPassword = "Cjswo0909!";
$Database = "jeonguk";


/////////////////////////////////////////////////////////////////////
 $connect = mysqli_connect($host, $userID, $userPassword, $Database);

?>