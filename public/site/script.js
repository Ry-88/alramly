AOS.init();

$( function() {
  $( "#datepicker" ).datepicker();
} );

$(document).ready(function(){
    $(".owl-one").owlCarousel({
      nav: false,
      items: 6,
      margin: 130,
      rtl: true,
      dots: true,
      
      responsive:{
        0:{
          items:1
        },
        576:{
          items:2
        },
        768:{
          items:3
        },
        1200:{
          items:4
        },
        1400:{
          items:5
        }
    }
    });
  });

  $(document).ready(function(){
    $(".owl-two").owlCarousel({
      nav: false,
      items: 2,
      margin: 130,
      rtl: true,
      dots: true,
      
      responsive:{
        0:{
          items:1
        },
        768:{
          items:1
        },
        1400:{
          items:1
        }
    }
    });
  });