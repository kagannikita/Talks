$(document).ready(function(){
  $("#move").on('click', function(event) {
    if (this.hash !== "") {
      event.preventDefault();
      var hash = this.hash;
      $('html, body').animate({
        scrollTop: $("#contactus").offset().top
      }, 1000, function(){
        window.location.hash = hash;
      });
    }
  });
});