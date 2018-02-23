<?php
    ini_set('session.cookie_lifetime', 60 * 60 * 60 *24 * 7);
    session_start();
    if(!isset($_SESSION['MONEY'])){
        $_SESSION['MONEY'] = 0;
    }
    //print_r($)COOKIE);
    include 'inc/functions.php';
    
?>

<script type="text/javascript">
    function play_sound() {
        var audioElement = document.createElement('audio');
        audioElement.setAttribute('src','/gorozco/lab/lab2/music/ding.flac');
        audioElement.setAttribute('autoplay', 'autoplay');
        audioElement.load();
        
        audioElement.play();
    }
    
</script>
    
<!DOCTYPE html>
<html>
    <head>
        <title> 777 Slot Machine </title>
        <meta charset="utf-8" />
        <link href="https://fonts.googleapis.com/css?family+Merriweather" rel="stylesheet">
        
        <style>
            @import url("css/styles.css");
            
        </style>
    </head>
    
    <body>
        <div id="main">
            <?php
                 play();
            ?>
            
            <form >
                <input id="submit" type="submit" value = "Spin!"/>
            </form>
            <form action = "reset.php" method = "post">
                Reset Total Score <input type= "Submit">
            </form>
        </div>
    </body>
</html>