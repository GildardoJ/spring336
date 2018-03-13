<?php
function getDataBaseconnection($opt){
    
    $host='localhost';
    $dbname=$opt;
    $username='gorozco';
    $password='';
    
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("JAWSDB_MARIA_URL"));
        $host = "gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com	";
        $dbname = substr($url["path"], 1);
        $username = $url["cfwgru3ia5mrhhgk"];
        $password = $url["jvizwj9otiayhs9q"];
    } 
    
    //mysql://b80082c70b0018:56c605d4@us-cdbr-iron-east-05.cleardb.net/heroku_681bddbab572813?reconnect=true
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
}


?>