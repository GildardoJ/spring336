

<!DOCTYPE html>
<html>
    <head>
        <title>AJAX Call</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional bootstrap theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    </head>
    <script>
     /* global $ */ 
    /*
        function getCountyList() {        
           var stateSelected = document.getElementById("state").value;
           var url = "https://www.showdeolabs.com/cors?url=http://hosting.csumb.edu/laramiguel/ajax/countyList.php?state=";
        
           var ajax;
            if (window.XMLHttpRequest) {
                 ajax= new XMLHttpRequest();
             }
        
           ajax.open("GET", url + stateSelected, true);
           ajax.send();
        
             ajax.onreadystatechange=function() {
                  if (ajax.readyState==4 && ajax.status==200) {
                       // alert(ajax.responseText);  //displays value retrieved from PHP program
                   }
              }  
        
        } //end Function
        
    */
    
    function getCountyList_jQuery() {        
     $.ajax({
          type: "GET",
          url: "https://www.showdeolabs.com/cors?url=http://hosting.csumb.edu/laramiguel/ajax/countyList.php",
          dataType: "json",
          data: { "state": $("#state").val() },
          success: function(data,status) {
             console.log(data);
             $("#county").html("<option> Select One </option>");
             //data= $.parseJSON(data);
             
             for (var i=0;  i< Object.keys(data).length; i++){
                 $("#county").append("<option>" + data["counties"][i].county + "</option>" );
                 
           }
          },
          complete: function(data,status) {
            //optional, used for debugging purposes
            console.log(status);
            
            console.log(Object.keys(data).length);
             //alert($.ajax.responseText);
          }
       });
    }
        
    </script>
    <body>
        <form>
          State: <input type="text" id="state" onchange="getCountyList_jQuery()">
          <br />  
          County: <select id="county"></select>
        </form>
        
         
    </body>
    
    <!-- jQuery 
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script type="text/javascript" 
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery-dateFormat/1.0/jquery.dateFormat.min.js"></script>
    -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
        
    </script>

    <!-- Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
    integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
    crossorigin="anonymous"></script>

    <!-- DEMO CODE -->
    <script src="index.js"></script>
    
    
</html>