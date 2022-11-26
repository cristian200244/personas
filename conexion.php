<?php
$hostname  = "localhost";
$user      = "root";
$password  = null;
$database  = "personas";

try{
    $con = mysqli_connect($hostname,$user,$password,$database);
}catch(\Throwable $th){
 print $e->message();
}