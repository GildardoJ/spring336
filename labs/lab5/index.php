<?php

    session_start();
    
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Lab 6: admin Login Page </title>
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
    </head>
    <body class="jumbotron text-center">
        
        <h1> Admin Login </h1>
        <table style="width:50%" align="center">
             <tr>
            <form method="POST" action="loginProcess.php">
                
               <td>Username:</td><td> <input type="text" name="username"/> </td></tr>
                
                <tr><td>Password:</td><td><input type="password" name="password"/> </td></tr>
                
                <tr><td colspan="2"><input type="submit" name="login" value="Login"/></td>
                
                
            </form></tr>
        </table>
        
        <?php
            if($_SESSION['loginError'] == true){
            echo "<p style= 'color: red;' >Wrong username or password!</p>";
            }
        ?>
        
    </body>
</html>