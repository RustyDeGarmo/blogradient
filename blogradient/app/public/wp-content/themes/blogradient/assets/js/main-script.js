(function($) {
"use strict";

// submenu dropdown toggler

if($('.main-menu li.menu-item-has-children ul').length) {

    $('.main-menu li.menu-item-has-children').append(
        '<div class="dropdown-btn"><i class="flaticon ' + 
        'flaticon-arrow-down-sign-to-navigate"></i></div>');

    //dropdown button
    $('.main-menu li.menu-item-has-children .dropdown-btn').on(
        'click', function() {
            $(this).prev('ul').slideToggle(500);
        });
    
    //disable dropdown parent link
    $('.main-menu .navigation li.menu-item-has-children > a, hidden-bar ' + 
        '.side-menu li.menu-item-has-children > a').on('click', function() {
            e.preventDefault();
        });

}

// mobile nav hide / show 
if($('.mobile-menu').length){

    var mobileMenuContent = $('#top-navigation .navigation').html();

    $('.mobile-menu .navigation').append(mobileMenuContent);

    $('.sticky-header .navigation').append(mobileMenuContent);

    $('.mobile-menu .close-btn').on('click', function() {
        $('body').removeClass('mobile-menu-visible');
    });

    //dropdown button
    $('.mobile-menu li.menu-item-has-children .dropdown-btn').on('click', 
    function() {
        $(this).prev('ul').slideToggle(500);
    });

    //menu toggle button
    $('.mobile-nav-toggler').on('click', function() {
        $('body').addClass('mobile-menu-visible');
    });

    //menu toggle button 
    $('.mobile-menu .menu-backdrop, .mobile-menu .close-btn').on('click', 
    function() {
        $('body').removeClass('mobile-menu-visible');
    });
}

})(jQuery);