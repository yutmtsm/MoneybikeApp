jQuery(function() {
    $(".accordion p").hover(function(){
    $(this).next("ul").slideToggle();
    $(this).children("span").toggleClass("open");
  });
});