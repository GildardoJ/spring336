<!DOCTYPE html>
<html>

<head>
    <title>Contact List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="contact-list.css">

<script>
    function printContact(contact){
        var contactList = document.getElementById("contact-list");
        
        // <li class="list-group-item">
        var contactListItem = document.createElement("li");
        contactListItem.setAttribute("class","list-group-item");
        contactList.appendChild(contactListItem);
        //                 <div class="row w-100">
        var rowDiv = document.createElement("div");
        rowDiv.setAttribute("class","row w-100");
        contactList.appendChild(rowDiv);
        
        //                     <div class="col-12 col-sm-6 col-md-3 px-0">
        var pictureColumnDiv = document.createElement("div");
        pictureColumnDiv.setAttribute("class","col-12 col-sm-6 col-md-3 px-0");
        rowDiv.appendChild(pictureColumnDiv);
        
        //                         <img src="http://demos.themes.guide/bodeo/assets/images/users/m101.jpg" alt="Mike Anamendolla" class="rounded-circle mx-auto d-block img-fluid">
        var pictureImg = document.createElement("img");
        pictureImg.setAttribute("class","rounded-circle mx-auto d-block img-fluid");
        pictureImg.setAttribute("src",contact.pictureUrl);
        pictureImg.setAttribute("alt",contact.name);
        pictureColumnDiv.appendChild(pictureImg);
        
        //                     </div> // don't need code just a close tag.
        
        //                     <div class="col-12 col-sm-6 col-md-9 text-center text-sm-left">
        var infoColumnDiv = document.createElement("div");
        infoColumnDiv.setAttribute("class","col-12 col-sm-6 col-md-9 text-center text-sm-left");
        rowDiv.appendChild(infoColumnDiv);
        
        //                         <span class="fa fa-mobile fa-2x text-success float-right pulse" title="online now"></span>
        var presenceSpan = document.createElement("span");
        presenceSpan.setAttribute("class","fa fa-mobile fa-2x text-success float-right pulse");
        presenceSpan.setAttribute("title","online now");
        infoColumnDiv.appendChild(presenceSpan);
        
        //                         <label class="name lead">Mike Anamendolla</label>
        var nameLabel = document.createElement("label");
        nameLabel.setAttribute("class","name lead");
        nameLabel.innerHTML = contact.name;
        infoColumnDiv.appendChild(nameLabel);
        
        //                         <br>
        var nameLineBreak = document.createElement("br");
        infoColumnDiv.appendChild(nameLineBreak);
        
        //                         <span class="fa fa-map-marker fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="5842 Hillcrest Rd"></span>
        var addressActionSpan = document.createElement("span");
        addressActionSpan.setAttribute("class","fa fa-map-marker fa-fw text-muted");
        addressActionSpan.setAttribute("data-toggle","tootip");
        addressActionSpan.setAttribute("data-original-title",contact.address);
        addressActionSpan.setAttribute("title","");
        infoColumnDiv.appendChild(addressActionSpan);
        
        //                         <span class="text-muted">5842 Hillcrest Rd</span>
        var addressSpan = document.createElement("span");
        infoColumnDiv.appendChild(addressSpan);
        
        //                         <br>
        var addressLineBreak = document.createElement("br");
        infoColumnDiv.appendChild(addressLineBreak);
        
        //            <span class="fa fa-phone fa-fw text-muted" data-toggle="tooltip" title="" data-original-title="(870) 288-4149"></span>
          var phoneActionSpan = document.createElement("span");
          phoneActionSpan.setAttribute("class", "fa fa-phone fa-fw text-muted");
          phoneActionSpan.setAttribute("data-toggle", "tooltip");
          phoneActionSpan.setAttribute("data-original-title", contact.phone);
          phoneActionSpan.setAttribute("title", "");
          infoColumnDiv.appendChild(phoneActionSpan);
        
          //            <span class="text-muted small">(870) 288-4149</span>
          var phoneSpan = document.createElement("span");
          phoneSpan.setAttribute("class", "text-muted small");
          phoneSpan.innerHTML = contact.phone;
          infoColumnDiv.appendChild(phoneSpan);
        
          //            <br>
          var phoneLineBreak = document.createElement("br");
          infoColumnDiv.appendChild(phoneLineBreak);
        
          //            <span class="fa fa-envelope fa-fw text-muted" data-toggle="tooltip" data-original-title="" title=""></span>
          var emailActionSpan = document.createElement("span");
          emailActionSpan.setAttribute("class", "fa fa-envelope fa-fw text-muted");
          emailActionSpan.setAttribute("data-toggle", "tooltip");
          emailActionSpan.setAttribute("data-original-title", "");
          emailActionSpan.setAttribute("title", "");
          infoColumnDiv.appendChild(emailActionSpan);
        
          //            <span class="text-muted small text-truncate">mike.ana@example.com</span>
          var emailSpan = document.createElement("span");
          emailSpan.setAttribute("class", "text-muted small text-truncate");
          emailSpan.innerHTML = contact.email;
          infoColumnDiv.appendChild(emailSpan);

        //                     </div>
        //                 </div>
        //             </li>
    }
</script>
</head>
<body>
    <div class="pos-f-t">
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
      </nav>
</div>
    <div class="container">
        <div class="card card-default" id="card_contacts">
            <div id="contacts" class="panel-collapse collapse show" aria-expanded="true" style="">
                <ul class="list-group pull-down" id="contact-list">
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
                      name: "Rosemary Porter",
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
                <!--/contacts list-->
            </div>
        </div>
        <!-- contacts card -->

    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>