import 'slick-carousel';
$(document).ready(function() {
    $('.display_product, .show_product').hover(function() {
        $('.show_product').stop().fadeIn(600);
    }, function() {
        $('.show_product').stop().fadeOut(600);
    });
});

$(document).ready(function() {
    // Khi di chuột vào các liên kết <a> trong .css_effect
    $('.css_effect a').hover(function() {
        // Lấy chiều rộng của liên kết <a>
        var width = $('.width_effect').outerWidth();

        // Hiển thị gạch chân (hr), thiết lập chiều rộng và màu sắc đỏ
        $(this).next('.effect').removeClass('hidden').stop().css({
            'width': '0',
            'height': '3px',
            'background-color': '#14B8A6' // Màu đỏ
        }).animate({
            width: width
        }, 300);
    }, function() {
        // Khi di chuột ra khỏi các liên kết <a>, ẩn gạch chân (hr)
        $(this).next('.effect').stop().animate({
            width: '0'
        }, 300, function() {
            $(this).addClass('hidden');
        });
    });
});

// JavaScript to toggle mobile menu
$(document).ready(function() {
    $('#mobile-menu-button').click(function() {
        $('.show_product_mobile').toggleClass('hidden');
    });
});

// Chạy ảnh nền
$('.multiple-items').slick({
    infinite: true,
    slidesToShow: 1,
    autoplay: true,
    autoplaySpeed: 2000, // Đặt autoplaySpeed thích hợp cho tốc độ muốn
    arrows: false,
    draggable: true,
    fade: true, // Áp dụng hiệu ứng fade
    speed: 2000,
    cssEase: 'linear' // Hoặc sử dụng 'ease' cho hiệu ứng mượt mà hơn
});

