/**
 * Created by franklyn on 25/07/17.
 */

jQuery(document).ready(function ($){
    $('.main-header').addClass('hide'); // hide menu
    $(window).scroll(function (){
        var top = $(window).scrollTop();
        var topMenu = $('#main-header-menu').offset().top;
        if (top > topMenu){
            $('.main-header').removeClass('hide');
        }else{
            $('.main-header').addClass('hide');
        }
    })
});