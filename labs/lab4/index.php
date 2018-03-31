<?php
    //session_start();
    
    include 'DbConnection.php';
    
    $conn = getDataBaseconnection('tech_checkout');
    
    function getDeviceTypes(){
        //echo " In deviceTypes() ";
        global $conn;
        $sql = "SELECT DISTINCT (deviceType)
                FROM device
                ORDER by deviceType";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $records = $stmt->fetchALL(PDO::FETCH_ASSOC);
        
        print_r($records);
        
        foreach($records as $record){
            echo "<option>" . $record['deviceType']. "</option>";
        }
    }
    
    function displayDevices(){
        //echo " In displayDevices() ";
        global $conn;
        
        $sql = "SELECT * FROM device WHERE 1";
        
        if(isset($_GET['submit'])){
            $namedParameters = array();
            
            if(!empty($_GET['deviceName'])){
                //The following query allows SQL injection due to the single quotes.
            //$sql .= " AND deviceName LIKe '%" . $_GET['deviceName'] . "%'";
            $sql .= " AND deviceName LIKE :deviceName"; // using named parameters,
            //to avoid using single quotes, prevent hacking by sql injection.
                                            //^place holder
            $namedParameters[':deviceName'] = "%" . $_GET['deviceName'] . "%"; 
            
            }
        }
        
        if(!empty($_GET['deviceType'])){
            $sql .= " AND deviceType = :dType";
            $namedParameters[':dType'] = $_GET['deviceType'];
            
        }
        
        if(!empty($_GET['available'])){
            $sql .= " AND status = :status";
            $namedParameters[':status'] = "A";
            echo $_GET['status'];
        }
        
        if(!empty($_GET['orderByName'])){
            $sql .= " ORDER BY deviceName";
        }
        
        if(!empty($_GET['orderByPrice'])){
            $sql .= " ORDER BY price";
        }
        
        $stmt = $conn->prepare($sql);
        $stmt->execute($namedParameters);
        $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table style='width:50%'>";
        
        
        foreach ($records as $record) {
            echo "<tr>";
            echo "<th>";
            echo $record['deviceName'] . " </th>";
            echo "<th> " . $record['deviceType'] . " </th>";
            echo "<th>" . $record['price'] . " </th>"; 
            echo "<th>" . $record['status'] . " </th> ";
                 // "<a href='checkoutHistory.php?deviceId=".$record['deviceId']."'> Checkout History </a> <br />";
            echo "</th>";
            echo "</tr>";
         }
         
         
         
         echo "</table>";
}
        
               

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Lab 4 Device Search</title>
        
        <style>
            @import url('css/styles.css');
        </style>
    </head>
    <body>
        <h1>+Technology Center: Checkout System+</h1>
        
        <form action="">
            Device: <input type="text" name="deviceName" placeholder="Device name"/>
            Type:
            <select name="deviceType" id="device">
                <option value="">Select One</option>
                <?php
                    //echo "before getDeviceTypes() ";
                    getDeviceTypes();
                    //echo "after getDeviceTypes() ";
                
                ?>
            </select>
            
            <input type="checkbox" name="available" id="available">
            <label for="available">Available</label>
            
            <br>
            
            Order by: 
            <input type="radio" name="orderByName" id="orderByName" value="name"/>
            <label for="order">Name</label>
            <input type="radio" name="orderByPrice" id="orderByPrice" value="price"/>
            <label for="order"> Price </label>
            
            <input type="submit" name="submit" value="Search!">
            
        </form>
        
        <hr>
        <?=displayDevices()?>

    </body>
</html>