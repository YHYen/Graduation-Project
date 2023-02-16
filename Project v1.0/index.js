$(function() {
  $('.carousel').carousel({
    interval:3000
  });
});


$(document).ready(function () {
    $('#btn-menu').click(function (e) {
        e.preventDefault();
        if(document.getElementById("main-navbar").className == "sidenav hidden"){
            document.getElementById("main-navbar").className = "sidenav";
            $('#main-navbar').animate({
                width:'15%'
            },"slow");
            $('#main-div').animate({
                marginLeft:'15%'
            },"slow");
           }else{
               $('#main-navbar').animate({
                width:'0%'
            },"fast");
               document.getElementById("main-navbar").className = "sidenav hide";
               document.getElementById("main-navbar").className = "sidenav hidden"
               $('#main-div').animate({
                marginLeft:'0%'
            },"fast");
           }
        
        
        return false;
    });
});

