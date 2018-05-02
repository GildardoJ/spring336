$(function(){
    function getCountyList_jQuery() {        
  $.ajax({
      type: "POST",
      url: "https://www.showdeolabs.com/data/ajax/post",
      dataType: "json",
      contentType: "application/json",
      data: {
        "state": $("#state").val()
      },
      success: function(data, status) {
         console.log(data);
      },
      complete: function(data, status) {
        //optional, used for debugging purposes
        //console.log(status);
      }
   });
}
})