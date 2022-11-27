$(document).ready(function(){
  let headerCart = 0;
  let showHeaderCart="";
  if (JSON.parse(localStorage.getItem('cartNum'))) {
    headerCart = JSON.parse(localStorage.getItem('cartNum'))
    console.log(headerCart)
    showHeaderCart = '' + headerCart
    $('.item-number').text(showHeaderCart)
  }

  $('#button-open-header').click(function() {
    $('.wrapper-button').toggleClass('active');
    $('.header-mobile-menu').animate({
      width: 'toggle'
    },300);
    // $('.header-mobile-menu').toggleClass('active')
    $('#items-header-mb').toggleClass('active');
    $('.header-mobile-nav-bar').toggleClass('active');
  });

  $('#mobile-extension1').click(function() {
    $(this).toggleClass('active');
    $('.mobile-product-category-menu').slideToggle();
  });

  $('#mobile-extension2').click(function() {
    $(this).toggleClass('active');
    $('.mobile-project-category-menu').slideToggle();
  });

  $('#project-category-item, .project-category-menu').hover(
    function() {
      $('.project-category-menu').stop().slideDown('fast');
    },
    function() {
      $('.project-category-menu').stop().slideUp('fast');
    },
  );

  $('#product-category-item, .product-category-menu').hover(
    function() {
      $('.product-category-menu').stop().slideDown('fast');
    },
    function() {
      $('.product-category-menu').stop().slideUp('fast');
    },
  );
})
