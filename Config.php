<?php
session_start();
try{
    $con = new PDO("mysql:dbname=registration; host=localhost","root", "");
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

}
catch(PDOException $e){
    exit("Connection failed: " .$e->getMessage());

}

?>