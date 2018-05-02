<!DOCTYPE html>
<html>

<head>
    <title>Contact List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="contact-list.css">

<script type="text/javascript" src="javascript.js"></script>
</head>
<body>
    
    <div class="pos-f-t"> <!-- Menu bar -->
      <div class="collapse" id="navbarToggleExternalContent">
        <div class="bg-dark p-4">
          <h4 class="text-white">Collapsed content</h4>
          <span class="text-muted">Toggleable via the navbar brand.</span>
            </div>
    </div>
      <nav class="navbar navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      </nav>       <!-- End Menu Bar -->
      
</div>
   <!--  <div class="container"> 
        <div class="card card-default" id="card_contacts">
           <!-- <div id="contacts" class="panel-collapse collapse show" aria-expanded="true" style=""> -->
                <ul class="list-group pull-down" id="contact-list">
                     <li class="list-group-item">
                         
                         
                         
                         <div class="card" style="width: 20rem;">
                             <span class="fa fa-mobile fa-2x text-success  " title="online now"></span>
                                <label class="name lead text-muted">Mike Anamendolla</label>
                          <img class="card-img-top" src="http://demos.themes.guide/bodeo/assets/images/users/m101.jpg" alt="Card image cap">
                          <div class="card-body">
                            <span class="fa fa-map-marker fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="5842 Hillcrest Rd"></span>
                                <span class="text-muted">5842 Hillcrest Rd</span> <br>
                            <span class="fa fa-phone fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="(870) 288-4149"></span>
                                <span class="text-muted small">(870) 288-4149</span> <br>
                            <span class="fa fa-envelope fa-fw text-muted" data-toggle="tooltip" data-original-title="" title=""></span>
                                <span class="text-muted small text-truncate">mike.ana@example.com</span>
                            
                          </div>
                        </div>
                        
                        
                       
                    </li>
                    
                    
                   <script>
                   
                   var contacts = [{
                      name: "Mike Anamendolla",
                      address: "5842 Hillcrest Rd",
                      email: "mike.ana@example.com",
                      phone: "(870) 288-4149",
                      pictureUrl: "http://demos.themes.guide/bodeo/assets/images/users/m101.jpg"
                    }, {
                      name: "Debbie Schmidt",
                      address: "3903 W Alexander Rd",
                      email: "debbie.schmidt@example.com",
                      phone: "(867) 322-1852",
                      pictureUrl: "http://demos.themes.guide/bodeo/assets/images/users/m104.jpg"
                    }, {
                      name: "Rosemary*Porter",
                      address: "5267 Cackson St",
                      email: "rosemary.porter@example.com",
                      phone: "(497) 160-9776",
                      pictureUrl: "http://demos.themes.guide/bodeo/assets/images/users/w102.jpg"
                    }];
                     for (var c in contacts) {
                      var contact = contacts[c];
                      printContact(contact);
                    }
                        
                   </script>
                   
                   
                   
                   
                </ul>
                <!--/contacts list
            </div>
     <!--   </div>  -->
        <!-- contacts card -->

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>