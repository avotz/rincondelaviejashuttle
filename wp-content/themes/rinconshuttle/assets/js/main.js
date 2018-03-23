;(function($){

  //var Scrollbar = window.Scrollbar;

  //Scrollbar.init(document.querySelector('.scroll-wrapper'));
   
  /*$('.slider-home').slick({
      infinite: true,
      speed: 500,
      fade: true,
      autoplay: true,
      arrows:false,
      dots:true,
      cssEase: 'linear'
  });*/
  /*$('#fullpage').fullpage({
        sectionsColor: ['#f2f2f2', '#FFFFFF', '#F3F0E6', '#FFFFFF', '#454139']
      });*/

  $('.map')
  .click(function(){
      $(this).find('iframe').addClass('clicked')})
  .mouseleave(function(){
      $(this).find('iframe').removeClass('clicked')});

  function isHome(){
      return $('body').hasClass('home');
    }
    
    $(window).scroll(function () {

          if(isHome()){
            
              if ($(this).scrollTop() > 0) {
                  $('body').addClass("header--fixed");
              } else {
                  $('body').removeClass("header--fixed");
              }
        }

        /* if ($(this).scrollTop() > $('.banner').height()-200) {
                  $('.banner-title').addClass("inSection");
              } else {
                  $('.banner-title').removeClass("inSection");
              }*/

      });



 
$(window).load(function() {
      
      resize();
     

});


$(window).resize(resize);

function resize () {
   responsive();
}

function responsive() {
           
                var isResponsive = $('.main').hasClass('fp-responsive');
                if (getWindowWidth() < 1000) {
                    if (!isResponsive) {
                        $.fn.fullpage.setAutoScrolling(false, 'internal');
                        $.fn.fullpage.setFitToSection(false, 'internal');
                        $('.main').addClass('fp-responsive');
                    }
                } else if (isResponsive) {
                     $.fn.fullpage.setAutoScrolling(true, 'internal');
                     $.fn.fullpage.setFitToSection(true, 'internal');
                     $('.main').removeClass('fp-responsive');
                }

               
            
        }


    
})(jQuery);

