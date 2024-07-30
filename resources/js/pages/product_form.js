import $ from 'jquery';
$(document).ready(function() {
    $('.display_product, .show_product').hover(function() {
        $('.show_product').stop().fadeIn(600);
    }, function() {
        $('.show_product').stop().fadeOut(600);
    });
});
