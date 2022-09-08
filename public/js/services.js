  function services() {
  $("#sub_services").empty();
    var all_services="";
      $.ajax({
     type: "GET",
     url: '/api/services',
     data: "check",
     success: function(response){
        var services=response.services;
        for (var i = services.length - 1; i >= 0; i--) {
         all_services+="<a class='dropdown-item' href='/product single/"+services[i].id+"'>"+services[i].title+"</a>";
        }
         $("#sub_services").append(all_services);

     }
});
  }