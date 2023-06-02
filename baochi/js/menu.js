$("#main-menu > li").mouseenter(function () {
    $(this).children('ul').addClass('show')
   
}).mouseleave(function () {
     $(this).children('ul').removeClass('show')
})