<?php 
    
    //print_r($_FILES);
   // echo "File size " . $_FILES['myFile']['size'];
    move_uploaded_file($_FILES["myFile"]["tmp_name"], "gallery/" . $_FILES["myFile"]["name"] );

    $files = scandir("gallery/", 1);
    
    //print_r($files);
    
    if (file_exists($_FILES["myFile"]["name"])) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
    }

    
    function filterUploadedFile(){
          $allowedSize= 1000000;
          //echo "In function";
          if($_FILES["myFile"]["size"] > $allowedSize){
              $fileterError = "<h1>File size too big.</h1><br>";
          }
          return $filterError;
     }
    
    if(isset($_POST['uploadForm'])){
        $filterError = filterUploadedFile();
        if(empty($filterError)){
            if($_FILES['myFile']['error'] >0 ){
                
                echo "<br><h1 >File size too big</h1>". $_FILES['myFile']['name']. " <br> <br>";
            }else{
                echo"<br>Upload:".$_FILES["myFile"]["name"]."<br>";
                echo"Type: ".$_FILES["myFile"]["type"]."<br>";
                echo "Size:".($_FILES["myFile"]["size"]/ 1024)."KB<br>";
                
            }
        }else{
            echo $filterError;
        }
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title> Lab 10: Photo Gallery </title>
        <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
        <script  src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60="  crossorigin="anonymous"></script>
        <link href = "https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel = "stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link  href="css/styles.css" rel="stylesheet" type="text/css" />
        <style>
        
        body {
            text-align:center;
            margin: 40px;
        }
        form {text-align:center;}
        
    </style>  
      
    <script type="text/javascript">
    jQuery.noConflict()
    //  $(document).ready(function(){   
          (function($){
           $("img").click(function(){    
               // alert('after');
                $('img').animate({width: "500px"});
                var image = $(this).attr("src");
                //alert(image);
                var info = $(this).attr('alt');
                $('#img01').attr('src',image);
                $('#caption').attr('alt', info);
                $('#caption').text(info);
               // event.preventDefault();
               // jQuery.noConflict()
                $('#myModal').show();
            });
     });
        
    </script>
    </head>

    <body>
       
        
    <?php
        
        for ($i = 0; $i < count($files) - 2; $i++) {
        echo "<img  id= 'myImg' src='gallery/" . $files[$i] . "' alt='".$files[$i]."' onclick='document.getElementById('img01').src='gallery/". $files[$i] ."'' width='300' class='upImaga' >";
        }
        
        
    
    ?>
    
    <!--  Trigger the Modal
    <img id="myImg" src="https://cst336spring-gorozco.c9users.io/spring336/labs/lab7/gallery/s-l300.jpg" style="width: 500px;" onclick="window.open(this.src)">
     -->
    <!-- The Modal -->
    
    <div id="myModal" class="modal">
      <!-- The Close Button -->
      <span class="close">&times;</span>
    
      <!-- Modal Content (The Image) -->
      <img class="modal-content" id="img01" >
        
      <!-- Modal Caption (Image Text) -->
      <div id="caption"></div>
    </div>
    
    <div id="form">
        <h2> Photo Gallery </h2>
        
        <form method="POST" enctype="multipart/form-data"> 
            Select file: <input type="file" name="myFile" /> 
            <input type="submit" name="uploadForm" value="Upload File!" />
    
        </form>
    </div>
    
    
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');
        var caption = document.getElementById('caption')
        // Get the image and insert it inside the modal - use its "alt" text as a caption
        var img = document.getElementById('myImg');
        var modalImg = document.getElementById("img01");
       // var captionText = document.getElementById("alt");
        img.onclick = function(){
           
            var src = img.src;
            modal.style.display = "block";
            modalImg.src = src;
            caption.innerHTML = this.alt;
        }
        
        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];
        
        // When the user clicks on <span> (x), close the modal
        span.onclick = function() { 
            modal.style.display = "none";
        }

    </script>
    
    </body>
</html>
