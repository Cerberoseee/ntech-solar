$(document).ready(function(){
  $('#brand-menu').click(function(){
    event.stopPropagation();
    $(this).toggleClass('active');
    $('#brand-dropdown').slideToggle();
  });

  $('#type-menu').click(function(){
    event.stopPropagation();
    $(this).toggleClass('active');
    $('#type-dropdown').slideToggle();
  });

  $('#power-menu').click(function(){
    event.stopPropagation();
    $(this).toggleClass('active');
    $('#power-dropdown').slideToggle();
  });

  $(window).click(function(){
    $('#type-menu').removeClass('active');
    $('#type-dropdown').slideUp();
    $('#brand-menu').removeClass('active');
    $('#brand-dropdown').slideUp();
    $('#power-menu').removeClass('active');
    $('#power-dropdown').slideUp();
  });
});
