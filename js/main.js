$(document).ready(function(){
  $('.hamburguesa').on('click', closeNav);

  function closeNav(){
    $('.navegacion-lateral').toggleClass('open-nav');
    $('.hamburguesa').toggleClass('clicked');
    $('#bar_1').toggleClass('bar_1');
    $('#bar_2').toggleClass('bar_2');
    $('#bar_3').toggleClass('bar_3');
  }
  var mod_1 = $("#modelo_1");
  var mod_2 = $("#modelo_2");
  var mod_3 = $("#modelo_3");
  $("#carousel_2").hide();
  $("#carousel_3").hide();

  mod_1.on("click", function(){
    console.log("click");
    $("#carousel_1").show();
    $("#carousel_2").hide();
    $("#carousel_3").hide();
  });

  mod_2.on("click", function(){
    console.log("click");
    $("#carousel_1").hide();
    $("#carousel_2").show();
    $("#carousel_3").hide();
  });

  mod_3.on("click", function(){
    console.log("click");
    $("#carousel_1").hide();
    $("#carousel_2").hide();
    $("#carousel_3").show();
  });
});
