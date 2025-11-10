$(document).ready(function () { 
   var cn = 0;
    var win = $(this);
    $('.ham-icon').click(function(){
        if(cn == 0){
            var st = "hidden";
            cn = 1;
            $('header').addClass('bluebg');
            $('.cross-btn2').show();
             $('html').css('overflow-y', 'hidden');
        }else{
            var st = "unset";
            cn = 0;
            $('header').removeClass('bluebg');
            $('.cross-btn2').hide();
            $('html').css('overflow-y', 'visible');
            $('html').css('overflow-x', 'hidden');
        }
        $("body").css("overflow", st);
        $(".my-sidenav1").slideToggle("slow");
        // $(this).text( $(this).text() == 'Menu' ? "Close" : "Menu");
    });
    $(".my-sidenav").accordion();

   $('.ham-icon1').click(function(){
    $('.my-sidenav').css('max-width', '100%');
});

   $('.cross-btn1').click(function () {
    $(".my-sidenav").css('max-width', '0');
});

$(".inner-nav1 .mbl-more-pages,.innernav2 .mbl-more-pages").click(function() {
        var id = $(this).attr("data");
        $(".commonav,.mainav").hide();
        $(".menusuv" + id).show();
        $(".menusuv" + id).addClass("opn-slide-patch");
        $(".menusuv" + id).removeClass("cls-slide-patch")
    });
   
    $(".back-div").click(function() {
        var id = $(this).attr("data");
        $(".commonav").hide();
        $(".menusuv" + id).show();
        $(".menusuv" + id).addClass("opn-slide-patch-right")
    }); 
$('.baclTxt').bind('click', function(e) {
    e.preventDefault();
    $('body,html').animate({scrollTop:0},800);  
}); 



});
const scrollIndicator = $('#header');
    const content = $('#content');
    let lastScrollTop = 0;

    $(window).scroll(function() {
        const scrollTop = $(this).scrollTop();

        if (scrollTop > lastScrollTop) {
      // Scrolling down
          scrollIndicator.hide();
          content.hide();
      } else {
      // Scrolling up
          scrollIndicator.css('display', 'flex');
          content.show();
      }

      lastScrollTop = scrollTop;
  });

    $(window).on("scroll", function() {
  // Sticky nev Effect
  if($(this).scrollTop() > 70) {
   $('#header').addClass("sticky"); 
} 
else {
   $('#header').removeClass("sticky");
} 
});

$('.backTop').bind('click', function(e) {
  e.preventDefault();
  $('body,html').animate({scrollTop:0},500);  
});


$('.busines_slider.owl-carousel').owlCarousel({
    autoplay: false,
    loop: false,
    dots:true,   
    nav: true,
    navText:"",
    touchDrag: true,
    mouseDrag: false,
    smartSpeed: 2000,
    margin:0,
    responsive: {
      0: {
        items: 1
    },
    600: {
        items: 1
    },
    1000: {
        items: 1
    }
} 
});



$('.apart-slider.owl-carousel').owlCarousel({
    autoplay: false,
    loop: true,
    dots:false,   
    nav: true,
    navText:"",
    touchDrag: true,
    mouseDrag: false,
    smartSpeed: 1000,
    margin:30,
    stagePadding:250,
    responsive: {
      0: {
        items: 1
    },
    600: {
        items: 1
    },
    1000: {
        items: 1
    }
} 
});


