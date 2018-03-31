<?php
    
    include 'DbConnection.php';
    
    $conn = getDataBaseconnection("tech_checkout");
    
    //echo "after getDB";
    $sql = "SELECT DISTINCT(deviceType)
            FROM 'device'
            ORDER BY deviceType";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
    
    
    //print_r ($records);
    
    foreach($records as $record){
        echo $record['deviceName'] . " ";
        
    }


?>