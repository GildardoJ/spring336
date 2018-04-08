<?php
session_start();

if (!isset($_SESSION['username'])) { //checks whether admin has logged in
    
    header("Location: index.php");
    exit();
    
}

include '../../dbConnection.php';
$conn = getDatabaseConnection("tcp");


function displayUsers() {
    global $conn;
    $sql = "SELECT * 
            FROM tc_user
            ORDER BY lastName";
    $statement = $conn->prepare($sql);
    $statement->execute();
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);
    //print_r($users);
    return $users;
}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Admin Page </title>
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script>
            function confirmDelete(firstName) {
                return confirm("Are you sure you want to delete " + firstName + "?");
            }
        </script>
        <style>
            td{
                text-align: left;
            }
        </style>
    </head>
    <body class="jumbotron text-center">

        <h1> TCP ADMIN PAGE </h1>
        <h2> Welcome <?=$_SESSION['adminFullName']?>! </h2>
        <table style="width:60%" align="center">
                
            <tr><td text-align="center">
            <form action="addUser.php">
                
                <input type="submit" value="Add new User" />
                
            </form>
            </td><td>
            <form action="logout.php">
                
                <input type="submit" value="Logout" />
                
            </form>
            </td></tr>
        </table>
        
        
        <br /><br />
        <table style="width:60%" align="center">
        <tr><td>ID:</td><td>First name</td><td>Last Name</td><td></td></tr>
        <?php
        
        $users =displayUsers();
        
        foreach($users as $user) {
            
            echo "<tr><td>";
            echo $user['userId'] . " ";
            echo "</td><td>";
            echo "<a href='userInfo.php?userId=".$user['userId']."'> ".$user['firstName']." ". $user['firstName'] ." </a> " . " ";
            echo "</td><td>";
            echo "<a href='userInfo.php?userId=".$user['lastName']."'>". $user['lastName'] ." </a> ";
            echo "</td><td>";
            echo "[<a href='updateUser.php?userId=".$user['userId']."'> Update </a> ]";
            //echo "[<a href='deleteUser.php?userId=".$user['userId']."'> Delete </a> ]";
            echo "<form action='deleteUser.php' style='display:inline' onsubmit='return confirmDelete(\"".$user['firstName']."\")'>
                     <input type='hidden' name='userId' value='".$user['userId']."' />
                     <input type='submit' value='Delete'>
                  </form>
                ";
            
            echo "<br />";
            echo "</td><td>";
            
        }
        ?>
        
        </table>
    </body>     
</html>