<?php
function getDataBaseconnection($opt){
    
    $host='localhost';
    $dbname=$opt;
    $username='gorozco';
    $password='';
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    //echo "connection established";
    return $dbConn;
    
}


?>