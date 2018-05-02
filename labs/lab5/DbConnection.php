<?php


function getDataBaseconnection($opt){
    
     $connUrl = getenv('JAWSDB_MARIA_URL');
     //$connUrl = "mysql://cfwgru3ia5mrhhgk:jvizwj9otiayhs9q@gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/nzk83y5q057p5bz3";
     $hasConnUrl = !empty($connUrl);
     
     $connParts = null;
     if($hasConnUrl){
         $connParts = parse_url($connUrl);
     }
     
     var_dump($hasConnUrl);
     $host = $hasConnUrl ? $connParts['host'] : getenv('IP');
     $dbname = $hasConnUrl ? ltrim($connParts['path'],'/') : 'tech_checkout';
     $username = $hasConnUrl ? $connParts['user'] : getenv('C9_USER');
     $password = $hasConnUrl ? $connParts['pass'] : '';
     
     return new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
}


/*function getDataBaseconnection($opt){
    
    $host='localhost';
    $dbname=$opt;
    $username='gorozco';
    $password='';
    
    //mysql://b80082c70b0018:56c605d4@us-cdbr-iron-east-05.cleardb.net/heroku_681bddbab572813?reconnect=true
    
    
    //mysql://cfwgru3ia5mrhhgk:jvizwj9otiayhs9q@gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com:3306/nzk83y5q057p5bz3
    $connParts = parse_url($url);
    $host= "gmgcjwawatv599gq.cbetxkdyhwsb.us-east-1.rds.amazonaws.com";
    $dbname = "nzk83y5q057p5bz3";
    $username = "cfwgru3ia5mrhhgk";
    $password = "jvizwj9otiayhs9q";
    
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
    
    if  (strpos($_SERVER['HTTP_HOST'], 'herokuapp') !== false) {
        $url = parse_url(getenv("JAWSDB_MARIA_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
    } 
    
    //mysql://b80082c70b0018:56c605d4@us-cdbr-iron-east-05.cleardb.net/heroku_681bddbab572813?reconnect=true
    $dbConn = new PDO("mysql:host=$host;dbname=$dbname",$username,$password);
    
    $dbConn -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    return $dbConn;
    
}

*/
?>