<?php

session_start();
include 'inc/functions.php';



?>

<!DOCTYPE html>
<html>
    <head>
        <title>Forms</title>
        <meta charset="utf-8">
        
        <style>
            
        </style>
        
    </head>
    
    <body>
        
        <?php
        
           // displayData();
            
            
        ?>
        <form action="inc/functions.php">
            Name:<input type="text" id= "fullName" size= "25" /> <br/>
            Feedback: <textarea id= "feedback" cols="30" rows= "3"></textarea> <br/>
            State:
            <select id="state">
                <option value= "AZ"> Arizona</option>
                <option value= "CA"> California</option>
                <option value= "IL"> Illinois</option>
            </select>
            <br/>
            Highest Degree Obtained: <br/>
            <input type="radio" id="item1" name ="degreeChoices" value="High School">
                <label for="item1"> High School Diploma</label> <br/>
            <input type="radio" id= "item2" name= "degreeChoices" value="College">
                <label for="item2"> College</label> <br/>
            Favorite Sports: <br/>
            <input type= "checkbox" id="basket" name= "sports" value="basket">
                <label for="basket"> Basketball </label> <br/>
            <input type="checkbox" id="soccer" name="sports" value="basket">
                <label for="soccer"> Soccer </label> 
            
            <br/>
            <input type="submit" name="info" value="info">
            <!--<button onclick="displayData()"> Submit </button> -->
        </form>
    </body>
</html>