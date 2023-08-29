//top
var btn = $("#top");
$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        btn.addClass("show");
    } else {
        btn.removeClass("show");
    }
});
btn.on("click", function (e) {
    e.preventDefault();
    $("html, body").animate({ scrollTop: 0 }, "300");
});
// textarea
function autoExpand(textarea) {
    textarea.style.height = '100px';
    textarea.style.height = `${textarea.scrollHeight}px`;
}
// burger
$(document).ready(function() {
    const myOffcanvas = $('.offcanvas-top');
    myOffcanvas.on('show.bs.offcanvas', function() {
        $('.catalog-btn').addClass('open');
        $('.burger').addClass('open');
    });
    myOffcanvas.on('hidden.bs.offcanvas', function() {
        $('.catalog-btn').removeClass('open');
        $('.burger').removeClass('open');
    });
});
$(document).ready(function() {
    const myOffcanvasTop = $('.offcanvas-top');
    const myOffset = 70;
    $(window).scroll(function() {
        if ($(this).scrollTop() > myOffset) {
            myOffcanvasTop.addClass('offcanvas-top_sidebar');
        } else {
            myOffcanvasTop.removeClass('offcanvas-top_sidebar');
        }
    });
});
// fixed header
$(document).ready(function() {
    $(window).scroll(function() {
        var scrolled = $(window).scrollTop();
        if (scrolled >= 70) {
            $('.header-nav-fixed').css('position', 'fixed');
            $('.header-nav-fixed').css('padding', '10px 20px');
        } else {
            $('.header-nav-fixed').css('position', 'relative');
            $('.header-nav-fixed').css('padding', '0');
        }
    });
});
//  sliders
$(document).ready(function(){
    $('.main-slider').owlCarousel({
        center: true,
        loop:true,
        dots: true,
        responsiveClass:true,
        nav: true,
        margin:36,
        navText: [
            '<img src="image/slider/arrowLeft.png" alt="">',
            '<img src="image/slider/arrowRight.png" alt="">',
        ],
        autoplay: true,
        autoplayTimeout: 3000,
        responsive:{
            0:{
                items:1.1,
                margin:10,
            },
            576:{
                items:1,
            }
        }
    });
    $('.actual-goods_slider').owlCarousel({
        center: true,
        loop:true,
        dots: false,
        nav: false,
        autoplay: false,
        center: false,
        margin:20,
        items: 5,
        autoplayTimeout: 3000,
        responsive:{
            0:{
                items:2.2,
                margin: 10
            },
            576:{
                items:2.6
            },
            768:{
                items:3
            },
            992:{
                items:4
            },
            1200:{
                items:5,
            }
        }
    });
    $('.popular-categories_slider').owlCarousel({
        dots: false,
        nav: true,
        autoplay: false,
        center: false,
        responsiveClass:true,
        loop: false,
        margin:20,
        navText: [
            '<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.6066 26.6066C24.5088 28.7044 21.8361 30.133 18.9264 30.7118C16.0166 31.2906 13.0006 30.9935 10.2597 29.8582C7.51886 28.7229 5.17618 26.8003 3.52796 24.3336C1.87973 21.8668 1 18.9667 1 16C1 13.0333 1.87973 10.1332 3.52796 7.66645C5.17618 5.19971 7.51886 3.27712 10.2597 2.14181C13.0006 1.00649 16.0166 0.709443 18.9264 1.28822C21.8361 1.867 24.5088 3.29561 26.6066 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M17.5 8.5L11.5 16M11.5 16L17.5 23.5M11.5 16H29.5"  stroke-width="2" stroke-linecap="round"/></svg>',
            '<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>',
        ],
        responsive:{
            0:{
                items:2.4,
                margin: 10,
                nav: false,
                loop: true
            },
            576:{
                items:4,
                loop: true
            },
            768:{
                items:5
            },
            992:{
                items:6
            },
            1200:{
                items:7,
            }
        }
    });
    $('.novelties-slider').owlCarousel({
        dots: false,
        autoplay: false,
        center: false,
        loop: false,
        nav: true,
        responsiveClass:true,
        margin:20,
        navText: [
            '<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.6066 26.6066C24.5088 28.7044 21.8361 30.133 18.9264 30.7118C16.0166 31.2906 13.0006 30.9935 10.2597 29.8582C7.51886 28.7229 5.17618 26.8003 3.52796 24.3336C1.87973 21.8668 1 18.9667 1 16C1 13.0333 1.87973 10.1332 3.52796 7.66645C5.17618 5.19971 7.51886 3.27712 10.2597 2.14181C13.0006 1.00649 16.0166 0.709443 18.9264 1.28822C21.8361 1.867 24.5088 3.29561 26.6066 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M17.5 8.5L11.5 16M11.5 16L17.5 23.5M11.5 16H29.5"  stroke-width="2" stroke-linecap="round"/></svg>',
            '<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>',
        ],
        responsive:{
            0:{
                items:2.2,
                loop: true,
            },
            576:{
                items:3
            },
            768:{
                items:3
            },
            1200:{
                items:4,
            }
        }
    });
    $('.goods-discount_slider').owlCarousel({
        dots: false,
        autoplay: false,
        center: false,
        loop: false,
        nav: true,
        responsiveClass:true,
        margin:20,
        navText: [
            '<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.6066 26.6066C24.5088 28.7044 21.8361 30.133 18.9264 30.7118C16.0166 31.2906 13.0006 30.9935 10.2597 29.8582C7.51886 28.7229 5.17618 26.8003 3.52796 24.3336C1.87973 21.8668 1 18.9667 1 16C1 13.0333 1.87973 10.1332 3.52796 7.66645C5.17618 5.19971 7.51886 3.27712 10.2597 2.14181C13.0006 1.00649 16.0166 0.709443 18.9264 1.28822C21.8361 1.867 24.5088 3.29561 26.6066 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M17.5 8.5L11.5 16M11.5 16L17.5 23.5M11.5 16H29.5"  stroke-width="2" stroke-linecap="round"/></svg>',
            '<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>',
        ],
        responsive:{
            0:{
                items:2.2,
                loop: true,
            },
            576:{
                items:3
            },
            768:{
                items:3
            },
            1200:{
                items:4,
            }
        }
    });
    $('.laptop-slider').owlCarousel({
        dots: false,
        autoplay: false,
        center: false,
        loop: false,
        nav: true,
        responsiveClass:true,
        margin:20,
        navText: [
            '<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.6066 26.6066C24.5088 28.7044 21.8361 30.133 18.9264 30.7118C16.0166 31.2906 13.0006 30.9935 10.2597 29.8582C7.51886 28.7229 5.17618 26.8003 3.52796 24.3336C1.87973 21.8668 1 18.9667 1 16C1 13.0333 1.87973 10.1332 3.52796 7.66645C5.17618 5.19971 7.51886 3.27712 10.2597 2.14181C13.0006 1.00649 16.0166 0.709443 18.9264 1.28822C21.8361 1.867 24.5088 3.29561 26.6066 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M17.5 8.5L11.5 16M11.5 16L17.5 23.5M11.5 16H29.5"  stroke-width="2" stroke-linecap="round"/></svg>',
            '<svg width="31" height="32" viewBox="0 0 31 32" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934" stroke-width="2" stroke-linecap="round"/><path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2" stroke-linecap="round"/></svg>',
        ],
        responsive:{
            0:{
                items:2.2,
                loop: true,
            },
            576:{
                items:3
            },
            768:{
                items:2
            },
            1200:{
                items:3,
            }
        }
    });
    // product photo slider
    var windowWidth = $(window).width();
    var slideCount = $('.product-photo_slider .product-photo_small').length;
    if (windowWidth < 576) {
        var slider = $('.product-photo_slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            infinite: false,
            vertical: false,
            responsive: [
                {
                    breakpoint: 576,
                    settings: {
                        dots: false
                    }
                }
            ]
        });
        $('.product-photo_slider .product-photo_small').addClass('modal')
    } else {
        var slider = $('.product-photo_slider').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            arrows: true,
            infinite: false,
            vertical: true,
            focusOnSelect: true
        });
        $('.product-photo_slider .product-photo_small').click(function() {
            var smallImage = $(this).find('img:last').attr('src');
            $('.product-photo_large img:last').attr('src', smallImage);
        });
        $('.product-photo_slider .product-photo_small:first').trigger('click');
        $('.product-photo_slider .product-photo_small').first().addClass('select');
        $('.product-photo_slider .product-photo_small').click(function() {
            $('.product-photo_slider .product-photo_small').removeClass('select');
            $(this).addClass('select');
        });
    }
    slider.on('init setPosition', function() {
        var currentSlideNumber = slider.slick('slickCurrentSlide') + 1;
        $('.product-photo_slider-count').text(currentSlideNumber + ' / ' + slideCount);
    });
})
// product photo modal slider
$(document).ready(function(){
    $('.product-photo_modal--slider_large').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: true,
        fade: false,
        adaptiveHeight: true,
        infinite: false,
        useTransform: true,
        responsive: [{
            breakpoint: 768,
            settings: {
                arrows: false,
            }
        }]
    });
    $('.product-photo_modal--slider_small').on('init', function() {
        $('.product-photo_modal--slider_small .slick-slide.slick-current').addClass('is-active');
    }).slick({
        slidesToShow: 11,
        slidesToScroll: 1,
        dots: false,
        arrows: true,
        focusOnSelect: false,
        infinite: false,
        responsive: [{
            breakpoint: 1400,
            settings: {
                slidesToShow: 8.5,
            }
        },{
            breakpoint: 1200,
            settings: {
                slidesToShow: 7,
            }
        },{
            breakpoint: 992,
            settings: {
                slidesToShow: 5.5,
            }
        },{
            breakpoint: 768,
            settings: {
                slidesToShow: 4.5,
                arrows: false
            }
        },{
            breakpoint: 576,
            settings: {
                slidesToShow: 3.3,
                arrows: false
            }
        }]
    });
    $('.product-photo_modal--slider_large').on('afterChange', function(event, slick, currentSlide) {
        $('.product-photo_modal--slider_small').slick('slickGoTo', currentSlide);
        var currrentNavSlideElem = '.product-photo_modal--slider_small .slick-slide[data-slick-index="' + currentSlide + '"]';
        $('.product-photo_modal--slider_small .slick-slide.is-active').removeClass('is-active');
        $(currrentNavSlideElem).addClass('is-active');
    });
    $('.product-photo_modal--slider_small').on('click', '.slick-slide', function(event) {
        event.preventDefault();
        var goToSingleSlide = $(this).data('slick-index');
        $('.product-photo_modal--slider_large').slick('slickGoTo', goToSingleSlide);
    });
    // show modal
    $('.product-photo_large, #productModalSliderClosebtn1, .product-photo_small.modal').on('click', function(){
        $('#productModalSlider1').toggleClass('show');
        if ($('#productModalSlider1, #productModalSlider2').hasClass('show')) {
            $("body").css("overflow", "hidden");
        } else {
            $("body").css("overflow", "auto");
        }
    });
    $('.product-review_img, #productModalSliderClosebtn2').on('click', function(){
        $('#productModalSlider2').toggleClass('show');
    });
})
// custom tab sidebar
$(document).ready(function() {
    $('.sidebar-tab-content .sidebar-tab:not(:first)').hide();
    $('.tab-links a').hover(function(e) {
        e.preventDefault();
        var currentTab = $('#' + $(this).data('tab'));
        $('.tab-links li').removeClass('active');
        $(this).parent().addClass('active');
        $('.sidebar-tab-content .sidebar-tab').hide();
        $(currentTab).show();
    });
});
// catalog more btn
$(document).ready(function() {
    $('.main-category-item').each(function() {
        let childCount = $(this).find('.children-category-item').length;
        if (childCount > 8) {
            $(this).find('.children-category-item').slice(8).hide();
            $(this).find('.children-categories').append('<div class="children-category-item_more"><a href="#!">Еще<span class="children-category-item_count">12</span><span class="icon-chevroneDown"></span></a></div>');
        }
    });
    $('.children-categories').on('click', '.children-category-item_more', function(e) {
        e.preventDefault();
        $(this).siblings('.children-category-item').show();
        $(this).remove();
    });
});
// column count catalog
function setColumnCount() {
    $('.main-categories').each(function () {
        const numCategoryItems = $(this).find('.main-category-item').length;
        if (numCategoryItems === 1) {
            $(this).css('column-count', '1');
        } else if (numCategoryItems === 2) {
            $(this).css('column-count', '2');
        } else {
            $(this).css('column-count', '3');
        }
    });
}
$(document).ready(function () {
    setColumnCount();
    $(window).on('resize', function () {
        if ($(window).width() < 992) {
            $('.main-categories').css('column-count', '1');
        }else if ($(window).width() < 1200) {
            $('.main-categories').css('column-count', '2');
        }else {
            setColumnCount();
        }
    });
});
// mailing
$('.mailing-form').each(function() {
    var $form = $(this);
    var $email = $form.find('.mailing-email');
    var $checkbox = $form.find('.mailing-form_check input[type="checkbox"]');
    var $submitButton = $form.find('button[type="submit"]');
    $email.add($checkbox).on('change', function() {
        if ($email.val() && $checkbox.is(':checked')) {
            $submitButton.prop('disabled', false);
            $submitButton.addClass('active')
        } else {
            $submitButton.prop('disabled', true);
            $submitButton.removeClass('active')
        }
    });
});
// phone
$('.phone-form').each(function() {
    var $form = $(this);
    var $name = $form.find('.phone-name');
    var $phone = $form.find('.phone-phone');
    var $submitButton = $form.find('button[type="submit"]');
    $name.add($phone).on('change', function() {
        if ($name.val() && $phone.val()) {
            $submitButton.prop('disabled', false);
            $submitButton.addClass('active')
        } else {
            $submitButton.prop('disabled', true);
            $submitButton.removeClass('active')
        }
    });
});
// stab
$(document).ready(function() {
    var expanded = false;
    $('.stab-btn').click(function() {
        var $this = $(this);
        var $text = $this.prev('.stab-text');
        if (expanded) {
            $text.removeClass('open');
            $this.find('.stab-icon').removeClass('arrow-up').addClass('arrow-down');
            $this.html('<button class="stab-btn">Развернуть<img class="icon" src="image/icons/arrRight.png" alt="arrow down"></button>');
        } else {
            $text.addClass('open');
            $this.find('.stab-icon').removeClass('arrow-down').addClass('arrow-up');
            $this.html('<button class="stab-btn">Свернуть<img class="icon" src="image/icons/arrLeft.png" alt="arrow down"></button>');
        }
        expanded = !expanded;
    });
});
// faq
$(document).ready(function() {
    $('.faq-accordion-header').click(function () {
        var $item = $(this).parent();
        if ($item.hasClass('active')) {
            $item.removeClass('active');
            $item.find('.faq-accordion-content').slideUp();
        } else {
            $('.faq-accordion-item').removeClass('active');
            $('.faq-accordion-item .faq-accordion-content').slideUp();
            $item.addClass('active');
            $item.find('.faq-accordion-content').slideDown();
        }
    });
});
// phone
document.addEventListener("DOMContentLoaded", function () {
    var eventCalllback = function (e) {
        var el = e.target,
            clearVal = el.dataset.phoneClear,
            pattern = el.dataset.phonePattern,
            matrix_def = "+998 __ ___ __ __",
            matrix = pattern ? pattern : matrix_def,
            i = 0,
            def = matrix.replace(/\D/g, ""),
            val = e.target.value.replace(/\D/g, "");
        if (clearVal !== 'false' && e.type === 'blur') {
            if (val.length < matrix.match(/([\_\d])/g).length) {
                e.target.value = '';
                return;
            }
        }
        if (def.length >= val.length) val = def;
        e.target.value = matrix.replace(/./g, function (a) {
            return /[_\d]/.test(a) && i < val.length ? val.charAt(i++) : i >= val.length ? "" : a
        });
    }
    var phone_inputs = document.querySelectorAll('[data-phone-pattern]');
    for (let elem of phone_inputs) {
        for (let ev of ['input', 'blur', 'focus']) {
            elem.addEventListener(ev, eventCalllback);
        }
    }
});
// footer menu
$(document).ready(function() {
    $('.category').on('click', function() {
        var $selectedCategory = $(this);
        $('.category').hide();
        $selectedCategory.show();
        $selectedCategory.find('.subcategories').show();
        $('#backButton').show();
    });

    $('#backButton').on('click', function() {
        $('.subcategories').hide();
        $('.category').show();
        $(this).hide();
    });
});
$('.footer-menu_item').click(function() { $(this).addClass('active').siblings().removeClass('active'); });
$('[data-bs-toggle="offcanvas"]').on('click', function() {
    var target = $(this).data('bs-target');
    $(target).on('hidden.bs.offcanvas', function() {
        $('[data-bs-target="'+target+'"]').removeClass('active');
    });
});
// category-price
$(document).ready(function(){
    $(".category-price").each(function(){
        const categoryPrice = $(this);
        const rangeInput = categoryPrice.find(".range-input input"),
            priceInput = categoryPrice.find(".price-input input"),
            range = categoryPrice.find(".category-price_progress");
        const resetBtn = categoryPrice.find(".category-price_reset--btn"),
            rangeMin = categoryPrice.find(".range-min"),
            rangeMax = categoryPrice.find(".range-max");
        let priceGap = 1000;
        priceInput.on("input", (e) => {
            let minPrice = parseInt(priceInput.eq(0).val()),
                maxPrice = parseInt(priceInput.eq(1).val());

            if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput.eq(1).attr("max")) {
                if (e.target.className === "input-min") {
                    rangeInput.eq(0).val(minPrice);
                    range.css("left", (minPrice / rangeInput.eq(0).attr("max")) * 100 + "%");
                } else {
                    rangeInput.eq(1).val(maxPrice);
                    range.css("right", 100 - (maxPrice / rangeInput.eq(1).attr("max")) * 100 + "%");
                }
            }
            categoryPrice.find(".input-min-value").text(minPrice);
            categoryPrice.find(".input-max-value").text(maxPrice);
        });
        resetBtn.on("click", (e) => {
            e.preventDefault();
            rangeInput.eq(0).val(rangeMin.attr("value"));
            rangeInput.eq(1).val(rangeMax.attr("value"));
            range.css("left", "0%");
            range.css("right", "0%");
            categoryPrice.find(".input-min-value").text(formatNumber(rangeMin.attr("value")));
            categoryPrice.find(".input-max-value").text(formatNumber(rangeMax.attr("value")));
            resetBtn.hide();
            $('.category-resetall_btn').removeClass("active");
            categoryPrice.find(".priceInptmin").attr('value', rangeMin.attr("value"));
            categoryPrice.find(".priceInptmax").attr('value', rangeMax.attr("value"));
            updateGoods();
        });
        $('.category-resetall_btn').click(function(){
            rangeInput.eq(0).val(rangeMin.attr("value"));
            rangeInput.eq(1).val(rangeMax.attr("value"));
            range.css("left", "0%");
            range.css("right", "0%");
            categoryPrice.find(".input-min-value").text(formatNumber(rangeMin.attr("value")));
            categoryPrice.find(".input-max-value").text(formatNumber(rangeMax.attr("value")));
            categoryPrice.find(".priceInptmin").attr('value', rangeMin.attr("value"));
            categoryPrice.find(".priceInptmax").attr('value', rangeMax.attr("value"));
            resetBtn.hide();
        })
        rangeInput.on("input", (e) => {
            let minVal = parseInt(rangeInput.eq(0).val()),
                maxVal = parseInt(rangeInput.eq(1).val());
            if (maxVal - minVal < priceGap) {
                if (e.target.className === "range-min") {
                    rangeInput.eq(0).val(maxVal - priceGap);
                    minVal = parseInt(rangeInput.eq(0).val());
                } else {
                    rangeInput.eq(1).val(minVal + priceGap);
                    maxVal = parseInt(rangeInput.eq(1).val());
                }
            }
            if (minVal == priceInput.eq(0).attr("min") && maxVal == priceInput.eq(1).attr("max")) {
                resetBtn.hide();
                $('.category-resetall_btn').removeClass("active")
                $('.category-apply_btn').removeClass("active")
            } else {
                resetBtn.show();
                $('.category-resetall_btn').addClass("active")
                $('.category-apply_btn').addClass("active")
            }

            priceInput.eq(0).val(minVal);
            priceInput.eq(1).val(maxVal);
            range.css("left", (minVal / rangeInput.eq(0).attr("max")) * 100 + "%");
            range.css("right", 100 - (maxVal / rangeInput.eq(1).attr("max")) * 100 + "%");
            categoryPrice.find(".input-min-value").text(formatNumber(minVal));
            categoryPrice.find(".priceInptmin").attr('value', minVal);
            categoryPrice.find(".input-max-value").text(formatNumber(maxVal));
            categoryPrice.find(".priceInptmax").attr('value', maxVal);
        });
    });

    function formatNumber(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }
})
// category filter list
$(document).ready(function() {
    $('.category-filter_nav').each(function() {
        var $filterNav = $(this);
        var filterItems = $filterNav.find('.category-filter_list li');
        var itemsToShow = 10;
        filterItems.slice(itemsToShow).hide();
        $filterNav.find('.category-filter_showall--btn').on('click', function(event) {
            event.preventDefault();
            itemsToShow = 20;
            filterItems.show();
            $(this).hide();
        });
        $filterNav.find('input[type="checkbox"]').on('change', function() {
            if ($filterNav.find('input[type="checkbox"]:checked').length > 0) {
                $filterNav.find('.category-filter_reset--btn').show();
                $('.category-resetall_btn').addClass("active")
                $('.category-apply_btn').addClass("active");
            } else {
                $filterNav.find('.category-filter_reset--btn').hide();
                $('.category-resetall_btn').removeClass("active")
                $('.category-apply_btn').removeClass("active");
            }
        });
        $filterNav.find('.category-filter_reset--btn').on('click', function(event) {
            event.preventDefault();
            $('.category-apply_btn').removeClass("active");
            $('.category-resetall_btn').removeClass("active")
            $filterNav.find('input[type="checkbox"]').prop('checked', false);
            $(this).hide();
            updateGoods();
        });
        if (filterItems.length > itemsToShow) {
            $filterNav.find('.category-filter_showall--btn').show();
        }
        $('.category-resetall_btn').click(function(){
            $filterNav.find('input[type="checkbox"]').prop('checked', false);
            $filterNav.find('.category-filter_reset--btn').hide();
            $(this).removeClass("active");
            $('.category-apply_btn').removeClass("active");
            $('.custom-offcanvas_selectsettings').text('')
            updateGoods();
        })
    });
});
// custom select
$(".custom-select").each(function() {
    var classes = $(this).attr("class"),
        id      = $(this).attr("id"),
        name    = $(this).attr("name");
    var template =  '<div class="' + classes + '">';
    template += '<span class="custom-select-trigger">' + $(this).attr("placeholder") + '</span>';
    template += '<div class="custom-options">';
    $(this).find("option").each(function() {
        template += '<span class="custom-option ' + $(this).attr("class") + '" data-value="' + $(this).attr("value") + '">' + $(this).html() + '</span>';
    });
    template += '</div></div>';

    $(this).wrap('<div class="custom-select-wrapper"></div>');
    $(this).hide();
    $(this).after(template);
});
$(".custom-option:first-of-type").hover(function() {
    $(this).parents(".custom-options").addClass("option-hover");
}, function() {
    $(this).parents(".custom-options").removeClass("option-hover");
});
$(".custom-select-trigger").on("click", function() {
    $('html').one('click',function() {
        $(".custom-select").removeClass("opened");
    });
    $(this).parents(".custom-select").toggleClass("opened");
    event.stopPropagation();
});
$(".custom-option").on("click", function() {
    $(this).parents(".custom-select-wrapper").find("select").val($(this).data("value"));
    $(this).parents(".custom-options").find(".custom-option").removeClass("selection");
    $(this).addClass("selection");
    $(this).parents(".custom-select").removeClass("opened");

    var trigger = $(this).parents(".custom-select").find(".custom-select-trigger");
    trigger.text($(this).text());
    trigger.removeClass().addClass("custom-select-trigger");
    trigger.addClass($(this).attr("class"));
});
// UPDATE GOODS FILTER !
function updateGoods() {
    var selectedPerformances = getSelectedPerformances();

    $.ajax({
        url: 'update-goods.php',
        method: 'POST',
        data: {performances: selectedPerformances},
        success: function(response) {
            $('.category-goods .goods_item').html(response);
        },
        error: function() {
            console.log('Ошибка вывода товаров');
        }
    });
}
function getSelectedPerformances() {
    var selectedPerformances = [];

    $('.category-filter_nav input[type="checkbox"]:checked').each(function() {
        selectedPerformances.push($(this).val());
    });

    var minPrice = $('.priceInptmin').attr('value');
    var maxPrice = $('.priceInptmax').attr('value');

    selectedPerformances.push('min_price:' + minPrice);
    selectedPerformances.push('max_price:' + maxPrice);
    console.log(selectedPerformances);
    return selectedPerformances;
}
$('.category-filter_nav input[type="checkbox"]').on('change', function() {
    updateGoods();
});
$('.category-price input[type="range"]').on('change', function() {
    updateGoods();
});
function deleteCategoryFilterOn768() {
    var screenWidth = window.innerWidth;
    if (screenWidth < 768) {
        var elementToRemove = document.getElementById("category-filter");
        if (elementToRemove) {
            elementToRemove.parentNode.removeChild(elementToRemove);
        }
    }
}
window.onload = deleteCategoryFilterOn768;
window.onresize = deleteCategoryFilterOn768;
// custom offcanvas
$(document).ready(function() {
    $(".open-custom-offcanvas-btn").on("click", function() {
        var target = $(this).data("target");
        $("#" + target).addClass("open");
    });

    $(".close-custom-offcanvas-btn").on("click", function() {
        $(this).closest(".custom-offcanvas").removeClass("open");
    });
});
$(document).ready(function() {
    $('.category-filter_nav').each(function() {
        var filterNav = $(this);
        var checkboxes = filterNav.find('input[type="checkbox"]');
        var target = filterNav.find('.custom-offcanvas_selectsettings:first');
        var clearBtn = filterNav.find('.category-filter_reset--btn')

        checkboxes.on('change', function() {
            var selectedItems = checkboxes.filter(':checked').map(function() {
                return $(this).next('label').text();
            }).get();

            var targetText = selectedItems.length > 0 ? selectedItems.join(', ') : '';

            target.text(targetText);
        });
        $(clearBtn).on('click', function(){
            target.text('');
        })
    });
});
// PRODUCT
// similar categoies
$(document).ready(function() {
    var maxShown = 15;
    var $links = $('.similar-categories_link');
    var $btn = $('.similar-categories_morebtn');
    if ($links.length > maxShown) {
        $links.slice(maxShown).hide();
        $btn.show();
    } else {
        $btn.hide();
    }
    $btn.click(function(e) {
        e.preventDefault();
        $links.show();
        $btn.hide();
    });
});
// product
$('.product-content_func--btns').on('click', function() {
    $(this).toggleClass("active")
})
$('.product-copy_vendorcodeBtn').on('click', function() {
    var textToCopy = $('#product-vendorcode').text();
    $('<textarea>').val(textToCopy).appendTo('body').select();
    document.execCommand('copy');
    $('textarea').remove();
    // console.log('Артикул скопирован: ' + textToCopy);
});
$(document).ready(function() {
    var isReviewsActive = $('.product-reviews_link').hasClass('active');
    if (isReviewsActive) {
        $('.product-add_review--btn').removeClass('d-none');
    } else {
        $('.product-add_review--btn').addClass('d-none');
    }
    $('.tabs-links').on('click', function() {
        $('.tabs-links').removeClass('active');
        $(this).addClass('active');
        var isReviewsActive = $('.product-reviews_link').hasClass('active');
        if (isReviewsActive) {
            $('.product-add_review--btn').removeClass('d-none');
            $('#productReviewsCount').addClass('active');

        } else {
            $('.product-add_review--btn').addClass('d-none');
            $('#productReviewsCount').removeClass('active');
        }
    });
});
// product description
$(document).ready(function() {
    $('#product-description_moreBtn').click(function() {
        $(this).siblings('.product-description_text').toggleClass('show');
        $(this).hide();
    });
});
// product chatacters
$(document).ready(function() {
    var trCount = $('.product-characteristics table tbody tr').length;
    if (trCount > 7) {
        $('.product-characteristics table tbody tr:gt(6)').hide();
        $(this).show();
    }
    $('#product-characteristics_moreBtn').click(function() {
        $('.product-characteristics table tbody tr:gt(6)').show();
        $(this).hide();
    });
});
$(document).ready(function() {
    if ($(window).width() < 768) {
        $('#productReviews').addClass('active show');
    }
});
// product add review
$(document).ready(function() {
    $('#product-review_text-area').on('input', function() {
        var currentLength = $(this).val().length;
        $('#product-review_counter--text').text(currentLength + " / 600");
    });
    $('#add-image-button').click(function() {
        if ($('#product-review_download--img img').length < 5) {
            $('#image-upload').click();
        } else {
            alert("Вы уже загрузили 5 изображений");
        }
    });
    $('#image-upload').change(function() {
        var files = this.files;
        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#product-review_download--img').append('<img src="' + e.target.result + '">');
            }
            reader.readAsDataURL(files[i]);
        }
    });
    $('#product-review_download--img').on('click', 'img', function() {
        $(this).remove();
    });
    $('.add-review_product--form').each(function() {
        var $form = $(this);
        var $inputs = $form.find('input');
        var $button = $form.find('button');
        $inputs.on('input', function() {
            var $input1 = $form.find('input[name="product-review_inpt--name"]');
            var $input2 = $form.find('input[name="product-review_inpt--phone"]');
            var $check = $('label[class="checked"]');
            if ($input1.val() && $check.on("keyup change") && $input2.val() ) {
                $button.removeClass('disabled');
            } else {
                $button.addClass('disabled');
            }
        });
    });
});
$('.review-grade_stars input[type="checkbox"]').on('change', function() {
    var checkbox = $(this);
    var index = checkbox.parent().index() + 1;
    checkbox.parent().removeClass('unchecked checked');
    for (var i = 1; i <= 5; i++) {
        var star = checkbox.parent().siblings(':nth-child(' + i + ')');
        if (i <= index) {
            star.removeClass('unchecked').addClass('checked');
        } else {
            star.removeClass('checked').addClass('unchecked');
        }
    }
});
// login
$(document).ready(function() {
    $('.password-eye').on('click', function() {
        var input = $(this).siblings('.password-input');
        if (input.attr('type') === 'password') {
            input.attr('type', 'text');
            $(this).attr('src', 'image/icons/eye-open.png');
        } else {
            input.attr('type', 'password');
            $(this).attr('src', 'image/icons/eye-close.png');
        }
    });
    $('.login').each(function() {
        var $loginform = $(this);
        var $loginInput = $loginform.find('input');
        var $loginBtn = $loginform.find('button');
        $loginInput.on('input', function() {
            var allInputsFilled = true;
            $loginform.find('input').each(function() {
                if (!$(this).val()) {
                    allInputsFilled = false;
                    return false;
                }
            });
            if (allInputsFilled && !$('#confirm-password').hasClass('error')) {
                $loginBtn.removeClass('disabled');
            } else {
                $loginBtn.addClass('disabled');
            }
        });
    });
    function validatePassword() {
        var password = $("#password-input").val();
        var confirmPassword = $("#confirm-password").val();
        if (password !== confirmPassword) {
            $("#password-error").text("Пароль не совпадает");
            $('input[name="confirm-password"]').addClass('error')
        } else {
            $("#password-error").text("");
            $('input[name="confirm-password"]').removeClass('error')
        }
        $('.login input').trigger('input');
    }
    $("#confirm-password").on("keyup change", validatePassword);
});
// random id
$(document).ready(function() {
    $('.goods_item').each(function(index) {
        if(localStorage.getItem('data-id-' + index)) {
            $(this).attr('data-id', localStorage.getItem('data-id-' + index));
        } else {
            var dataId = generateDataId();
            $(this).attr('data-id', dataId);
            localStorage.setItem('data-id-' + index, dataId);
        }
    });
});
function generateDataId() {
    var characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    var dataId = '';
    for (var i = 0; i < 10; i++) {
        dataId += characters.charAt(Math.floor(Math.random() * characters.length));
    }
    return dataId;
}
// FAVORITES
$(document).ready(function() {
    function updateQuantity() {
        let basketItems = JSON.parse(localStorage.getItem('favoritesItems')) || [];
        let totalQuantity = 0;
        for (let i = 0; i < basketItems.length; i++) {
            totalQuantity += basketItems[i].quantity;
        }
        if ($(basketItems).length === 0) {
            $('.favoritesCount').hide();
            $('.fav-btn_nav').removeClass('active');
        } else {
            $('.favoritesCount').show();
            $('.fav-btn_nav').addClass('active');
        }
        $('.favoritesCount').text(totalQuantity);
    }
    function displayBasketItems() {
        let favoritesItems = JSON.parse(localStorage.getItem('favoritesItems')) || [];
        let basketItems = $('.goods_item');
        favoritesItems.forEach(function(item) {
            let basketItem = $('<div class="goods_item" data-id="'+ item.id +'">' +
                '<div class="goods_header goods-img">' +
                '<div class="goods_header--menu d-flex align-items-center">' +
                '<span class="goods-itemNew" name="goodsItemNew">'+ item.new +'</span>' +
                '<button type="button"><svg width="24" height="24" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg"><path d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"  stroke="white" stroke-width="2"/></svg></button>' +
                '<button type="button" class="icon-heart addToFavoritesBtn active"></button>' +
                '</div>' +
                '<img src="image/cards/Group 511.svg" alt="">' +
                '<img src="' + item.img1 + '" alt="">' +
                '<div class="goods_header--installment d-flex align-items-center">' +
                '<span class="goods_proccent" name="actualGoodsProccent">'+ item.discount +'</span>' +
                '<p>'+ item.installment +'</p>' +
                '</div>' +
                '</div>' +
                '<div style="padding: 15px;">' +
                '<p class="goods_currentPrice" name="actualGoodsCurrentPrice">' + item.currentPrice + '</p>'
                +
                '<p class="goods_oldPrice" name="actualGoodsOldPrice">' + item.oldPrice + '</p>' +
                '<div class="mt-1 mb-1 d-flex align-items-center gap-3">' +
                '<div class="goods_rewies d-flex align-items-center gap-1">' +
                '<span class="icon-star active"></span>' +
                '<span class="icon-star active"></span>' +
                '<span class="icon-star active"></span>' +
                '<span class="icon-star"></span>' +
                '<span class="icon-star"></span>' +
                '<p class="goods_reviewCount" name="actualGoodsReviewCount">' + item.reviewCount + '</p>' +
                '</div>' +
                '<div class="goods_views d-flex gap-1">' +
                '<span class="icon-eye"></span>' +
                '<p class="goods_viewsCount" name="actualGoodsViewsCount">' + item.viewsCount + '</p>' +
                '</div>' +
                '</div>' +
                '<a href="productCard.html" class="goods_name" name="actualGoodsName">' + item.name + '</a>' +
                '<a href="/" class="goods_companyName" name="actualGoodsCompanyName">' + item.company + '</a>' +
                '<div class="goods-addProduct ">' +
                '<div class="goods-addProduct_btns">' +
                '<button class="goods-addProduct-minus" type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248" stroke="#999999" stroke-linecap="round"/><path d="M6 11V10H15V11H6Z" fill="#999999"/></svg></button>' +
                '<input value="1" type="text" class="goods-itemCount" />' +
                '<button class="goods-addProduct-plus"  type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248" stroke="#999999" stroke-linecap="round"/><path d="M5 11V10H14V11H5Z" fill="#999999"/><path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/></svg></button>' +
                '</div>' +
                '<button type="button" class="goods-item_addToBasket"><svg width="30" height="27" viewBox="0 0 30 27" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M28.0386 3.84668H5.8078C5.50821 3.84668 5.2244 3.981 5.03446 4.21269C4.84452 4.44438 4.76846 4.74902 4.82722 5.0428L6.7503 14.6582C6.84378 15.1256 7.25419 15.4621 7.73088 15.4621H26.4561C26.918 15.4664 27.3663 15.306 27.7207 15.0095C28.0713 14.7161 28.307 14.3087 28.3867 13.859L29.9605 6.18212L29.9645 6.1613C30.0162 5.87909 30.0053 5.58899 29.9326 5.31145C29.86 5.03391 29.7273 4.77569 29.544 4.55498C29.3607 4.33428 29.1313 4.15647 28.8718 4.03409C28.6123 3.91171 28.3291 3.84774 28.0422 3.84669L28.0386 3.84668ZM27.9877 5.84668L26.4265 13.4621H8.55068L7.0276 5.84668H27.9877Z" fill="#F08718"/><path fill-rule="evenodd" clip-rule="evenodd" d="M4.02692 2H0.999924C0.447639 2 -7.58171e-05 1.55228 -7.58171e-05 1C-7.58171e-05 0.447715 0.447639 9.85383e-09 0.999924 9.85383e-09L4.05741 6.94585e-08C4.05748 6.94585e-08 4.05755 9.85383e-09 4.05762 9.85383e-09C4.50974 -4.52897e-05 4.948 0.156097 5.29824 0.442011C5.64013 0.7211 5.87765 1.10711 5.97294 1.53739L6.77485 4.59226C6.91507 5.12644 6.5957 5.67316 6.06151 5.81338C5.52733 5.95361 4.98061 5.63424 4.84039 5.10005L4.03269 2.02313C4.03068 2.01544 4.02875 2.00773 4.02692 2Z" fill="#F08718"/><path fill-rule="evenodd" clip-rule="evenodd" d="M7.53473 13.4815C6.99317 13.5898 6.64195 14.1167 6.75026 14.6582L7.55796 18.6967L7.55874 18.7006C7.64918 19.1436 7.88992 19.5418 8.24022 19.8278C8.59047 20.1137 9.02872 20.2698 9.48084 20.2698H24.1924C24.7447 20.2698 25.1924 19.8221 25.1924 19.2698C25.1924 18.7175 24.7447 18.2698 24.1924 18.2698H9.51219L8.71143 14.266C8.60311 13.7244 8.07629 13.3732 7.53473 13.4815Z" fill="#F08718"/><path fill-rule="evenodd" clip-rule="evenodd" d="M22.2308 25.0771C22.2096 25.0771 22.1924 25.0599 22.1924 25.0387C22.1924 25.0174 22.2096 25.0002 22.2308 25.0002C22.2521 25.0002 22.2693 25.0174 22.2693 25.0387C22.2693 25.0599 22.2521 25.0771 22.2308 25.0771ZM24.1924 25.0387C24.1924 23.9554 23.3142 23.0771 22.2308 23.0771C21.1475 23.0771 20.2693 23.9554 20.2693 25.0387C20.2693 26.122 21.1475 27.0002 22.2308 27.0002C23.3142 27.0002 24.1924 26.122 24.1924 25.0387Z" fill="#F08718"/><path fill-rule="evenodd" clip-rule="evenodd" d="M10.6154 25.0771C10.5941 25.0771 10.5769 25.0599 10.5769 25.0387C10.5769 25.0174 10.5941 25.0002 10.6154 25.0002C10.6366 25.0002 10.6538 25.0174 10.6538 25.0387C10.6538 25.0599 10.6366 25.0771 10.6154 25.0771ZM12.5769 25.0387C12.5769 23.9554 11.6987 23.0771 10.6154 23.0771C9.53204 23.0771 8.65383 23.9554 8.65383 25.0387C8.65383 26.122 9.53204 27.0002 10.6154 27.0002C11.6987 27.0002 12.5769 26.122 12.5769 25.0387Z" fill="#F08718"/></svg></button>' +
                '</div>' +
                '</div>' +
                '</div>');
            $('.favorites-goods').append(basketItem);
            basketItems.each(function() {
                let basketItemId = $(this).data('id');
                if (basketItemId === item.id) {
                    $(this).find('.addToFavoritesBtn').addClass('active');
                    // favoritesStatus[item.id] = true;
                }
            });
        });
    }
    $(".goods_item, .favorites-goods").on("click", ".addToFavoritesBtn",  function() {
        var like = $(this).closest(".goods_item");
        var likeId = like.data('id');
        var basketItems = JSON.parse(localStorage.getItem('favoritesItems')) || [];
        var indexToRemove = -1;
        var $successDiv = $('#success_fav');
        var $unsuccessDiv = $('#unsuccess_fav');
        for (let i = 0; i < basketItems.length; i++) {
            if (basketItems[i].id === likeId) {
                indexToRemove = i;
                break;
            }
        }
        if (indexToRemove !== -1) {
            basketItems.splice(indexToRemove, 1);
            $(this).removeClass('active');
            $unsuccessDiv.addClass('show')
            setTimeout(function() {
                $unsuccessDiv.removeClass('show')
            }, 3000);
        }
        else {
            $successDiv.addClass('show')
            setTimeout(function() {
                $successDiv.removeClass('show')
            }, 3000);
            e = like.find(".goods-img img:last"),
                gn = like.find(".goods_name"),
                s = like.find(".goods_currentPrice"),
                o = like.find(".goods_oldPrice"),
                p = like.find(".goods_proccent"),
                n = like.find(".goods-itemNew"),
                r = like.find(".goods_reviewCount"),
                vc = like.find(".goods_viewsCount"),
                co = like.find(".goods_companyName"),
                ip = like.find(".goods_header--installment p"),
                a = parseInt(like.find(".goods-itemCount").val()),
                cg = {
                    img1: e.attr("src"),
                    id: likeId,
                    name: gn.text(),
                    new: n.text(),
                    viewsCount: vc.text(),
                    company: co.text(),
                    currentPrice: s.text(),
                    oldPrice: o.text(),
                    reviewCount: r.text(),
                    discount: p.text(),
                    installment: ip.text(),
                    quantity: a
                };

            basketItems.push(cg);
            $(this).addClass('active');
        }
        localStorage.setItem("favoritesItems", JSON.stringify(basketItems));



        updateQuantity()
    });
    displayBasketItems();
    updateQuantity();
});
// BASKET
$(document).ready(function() {
    $('.goods_item').each(function() {
        var $newItem = $(this).find('.goods-itemNew');
        var $procItem = $(this).find('.goods_proccent');
        var $installItem = $(this).find('.goods_header--installment p');
        if ($newItem.text().length === 0) {
            $newItem.hide();
            $procItem.hide();
            $installItem.hide();
        } else {
            $newItem.show();
            $procItem.show();
            $installItem.show();
        }
    });
    function checkBasketProducts() {
        let basketItems = JSON.parse(localStorage.getItem('basketItems')) || [];
        if ($(basketItems).length === 0) {
            $('.empty-basket_cont').show();
            $('.basket').hide();
            $('.total_quantity').hide();
            $('.basket-btn_nav').removeClass('active');
        } else {
            $('.empty-basket_cont').hide();
            $('.basket').show();
            $('.total_quantity').show();
            $('.basket-btn_nav').addClass('active');
        }
    }
    function updateQuantity() {
        let basketItems = JSON.parse(localStorage.getItem('basketItems')) || [];
        let totalQuantity = 0;
        for (let i = 0; i < basketItems.length; i++) {
            totalQuantity += basketItems[i].quantity;
        }
        $('.total_quantity').text(totalQuantity);
    }
    function updateButtonStatus() {
        $(".goods-itemCount").each(function() {
            let count = parseInt($(this).val());
            let minusButton = $(this).siblings(".goods-addProduct-minus");
            if (count === 1) {
                minusButton.addClass("disabled");
            } else {
                minusButton.removeClass("disabled");
            }
        });
    }
    $(".goods-addProduct-minus, .goods-addProduct-plus").on("click", function() {
        let t = $(this).siblings(".goods-itemCount"),
            e = parseInt(t.val());
        if ($(this).hasClass("goods-addProduct-minus") && e > 1) {
            t.val(e - 1);
            let index = $(this).closest(".basket-product").index();
            updateQuantity(index, e - 1);
        } else if ($(this).hasClass("goods-addProduct-plus")) {
            t.val(e + 1);
            let index = $(this).closest(".basket-product").index();
            updateQuantity(index, e + 1);
        }
        updateButtonStatus();
    });
    $(".goods-item_addToBasket").on("click", function() {
        let t = $(this).closest(".goods_item"),
            e = t.find(".goods-img img:last"),
            i = t.find(".goods_name"),
            s = t.find(".goods_currentPrice"),
            o = t.find(".goods_oldPrice"),
            n = t.find(".goods_proccent"),
            a = parseInt(t.find(".goods-itemCount").val()),
            c = {
                img1: e.attr("src"),
                name: i.text(),
                currentPrice: s.text(),
                oldPrice: o.text(),
                discount: n.text(),
                quantity: a
            },
            l = JSON.parse(localStorage.getItem("basketItems")) || [];
        l.push(c);
        localStorage.setItem("basketItems", JSON.stringify(l));
        let $successDiv = $('#success_div');
        $successDiv.addClass('show')
        setTimeout(function() {
            $successDiv.removeClass('show')
        }, 3000);
        calculateSavings();
        checkBasketProducts();
        updateQuantity()
    });
    function displayBasketItems() {
        let basketItems = JSON.parse(localStorage.getItem('basketItems')) || [];
        let totalPrice = 0;
        let totalQuantity = 0;
        basketItems.forEach(function(item) {
            let basketItem = $('<div class="basket-product">' +
                '<input type="checkbox" class="basket-product_checkbox d-flex justify-content-between">' +
                '<div class="d-flex">' +
                '<div class="basket-product_img">' +
                '<img src="' + item.img1 + '">' +
                '</div>' +
                '<p class="basket-product_name">' + item.name + '</p>' +
                '</div>' +
                '<div class="basket-product_functs">' +
                '<div class="basket-product_btns">' +
                '<button type="button" class="basket-product_minus"><svg width="30" height="30" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248" stroke="#999999" stroke-linecap="round"/><path d="M6 11V10H15V11H6Z" fill="#999999"/></svg></button>' +
                '<input value="' + item.quantity + '" type="text" class="item_count" disabled></input>' +
                '<button class="basket-product_plus"  type="button"><svg width="30" height="30" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248" stroke="#999999" stroke-linecap="round"/><path d="M5 11V10H14V11H5Z" fill="#999999"/><path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/></svg></button>' +
                '</div>' +
                '<div class="basket-order_adapt">' +
                '<div >' +
                '<h6 class="basket-product_currentPrice">' + item.currentPrice + '</h6>' +
                '<p class="goods_oldPrice basket-product_oldPrice" name="actualGoodsOldPrice">' + item.oldPrice + '</p>' +
                '</div>' +
                '<div class="basket-product_folltrash justify-content-end gap-3">' +
                '<button type="button" class="icon-heart"></button>' +
                '<button type="button" class="remove_from_basket"><svg width="22" height="25" viewBox="0 0 22 25" fill="none" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M8.40802 3.70312C8.78572 2.62457 9.80418 1.8519 11.0013 1.8519C12.1984 1.8519 13.2169 2.62457 13.5946 3.70312H8.40802ZM6.50979 3.70312C6.93471 1.59022 8.78416 0 11.0013 0C13.2184 0 15.0679 1.59022 15.4928 3.70312H19.25C20.7688 3.70312 22 4.94681 22 6.48097C22 8.01514 20.7688 9.25882 19.25 9.25882H2.75C1.23122 9.25882 0 8.01514 0 6.48097C0 4.94681 1.23122 3.70312 2.75 3.70312H6.50979ZM2.75 5.55502C2.24374 5.55502 1.83333 5.96959 1.83333 6.48097C1.83333 6.99236 2.24374 7.40692 2.75 7.40692H19.25C19.7563 7.40692 20.1667 6.99236 20.1667 6.48097C20.1667 5.96958 19.7563 5.55502 19.25 5.55502H2.75ZM3.66667 10.1855C4.17293 10.1855 4.58333 10.6001 4.58333 11.1115V22.2229C4.58333 22.7343 4.99374 23.1488 5.5 23.1488H16.5C17.0063 23.1488 17.4167 22.7343 17.4167 22.2229V11.1115C17.4167 10.6001 17.8271 10.1855 18.3333 10.1855C18.8396 10.1855 19.25 10.6001 19.25 11.1115V22.2229C19.25 23.757 18.0188 25.0007 16.5 25.0007H5.5C3.98122 25.0007 2.75 23.757 2.75 22.2229V11.1115C2.75 10.6001 3.16041 10.1855 3.66667 10.1855ZM9.85547 13.6582C10.2352 13.6582 10.543 13.9126 10.543 14.2264V21.4235C10.543 21.7374 10.2352 21.9917 9.85547 21.9917C9.47577 21.9917 9.16797 21.7374 9.16797 21.4235V14.2264C9.16797 13.9126 9.47577 13.6582 9.85547 13.6582ZM15.125 12.5011C15.125 12.1176 14.8172 11.8066 14.4375 11.8066C14.0578 11.8066 13.75 12.1176 13.75 12.5011V21.2976C13.75 21.6812 14.0578 21.9921 14.4375 21.9921C14.8172 21.9921 15.125 21.6812 15.125 21.2976V12.5011Z"/></svg></button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>');
            $('#basket-products').append(basketItem);
            let currentPrice = parseFloat(item.currentPrice.replace(/[^\d.]/g, ''));
            let quantity = parseInt(item.quantity);
            totalPrice += currentPrice * quantity;
            totalQuantity += quantity;
        });
        $('.total_price').text(totalPrice.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
        $('.total_quantity').text(totalQuantity);
    }
    function updateTotals() {
        let totalPrice = 0;
        let totalQuantity = 0;
        $('.basket-product').each(function() {
            let currentPrice = parseFloat($(this).find('.basket-product_currentPrice').text().replace(/[^\d.]/g, ''));
            let quantity = parseInt($(this).find('.item_count').val());
            totalPrice += currentPrice * quantity;
            totalQuantity += quantity;
        });
        let deliverySumm = parseFloat($('#deliverySumm').text().replace(/\s+/g, ''));
        let remainingSumm = deliverySumm - totalPrice;
        if (totalPrice >= deliverySumm) {
            $('#basketOrderDeliveryTextTrue').show();
            $('#basketOrderDeliveryTextFalse').hide();
        } else {
            $('#basketOrderDeliveryTextTrue').hide();
            $('#basketOrderDeliveryTextFalse').show();
        }
        $('#leftDelivery').text(remainingSumm.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
        $('.total_price').text(totalPrice.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
        $('.total_quantity').text(totalQuantity);
    }
    function numberWithSpaces(x) {
        let absoluteValue = Math.abs(x);
        return absoluteValue.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }
    function calculateSavings() {
        let total_price = 0;
        let total_price_with_discount = 0;
        $(".basket-product").each(function() {
            let current_price = parseFloat($(this).find(".basket-product_currentPrice").text().replace(/[^\d.]/g, ""));
            let old_price = parseFloat($(this).find(".basket-product_oldPrice").text().replace(/[^\d.]/g, ""));
            let quantity = parseInt($(this).find(".item_count").val());
            total_price += current_price * quantity;
            total_price_with_discount += isNaN(old_price) ? current_price * quantity : old_price * quantity;
        });
        let savings = total_price_with_discount - total_price;
        let formatted_savings = numberWithSpaces(savings.toFixed());
        $(".total_savings").text(formatted_savings);
    }
    function updateLocalStorage(input) {
        var value = parseInt(input.val());
        var basketItem = input.closest('.basket-product');
        var index = basketItem.index();
        var basketItems = JSON.parse(localStorage.getItem('basketItems')) || [];

        if (index >= 0 && index < basketItems.length) {
            basketItems[index].quantity = value;
            localStorage.setItem('basketItems', JSON.stringify(basketItems));
        }
    }
    displayBasketItems();
    $(document).on('click', '.remove_from_basket', function() {
        let basketItem = $(this).closest('.basket-product');
        let index = basketItem.index();
        let basketItems = JSON.parse(localStorage.getItem('basketItems')) || [];
        basketItems.splice(index, 1);
        localStorage.setItem('basketItems', JSON.stringify(basketItems));
        basketItem.remove();
        updateTotals();
        calculateSavings();
        checkBasketProducts();
    });
    $('.item_count').each(function() {
        var value = parseInt($(this).val());
        if (value === 1) {
            $(this).siblings('.basket-product_minus').addClass('disabled');
        } else {
            $(this).siblings('.basket-product_minus').removeClass('disabled');
        }
    });
    $(document).on('click', '.basket-product_plus', function() {
        var input = $(this).siblings('.item_count');
        var value = parseInt(input.val());
        input.val(value + 1);
        updateTotals();
        calculateSavings();
        toggleMinusButtonState(input);

        updateLocalStorage(input);
    });
    $(document).on('click', '.basket-product_minus', function() {
        var input = $(this).siblings('.item_count');
        var value = parseInt(input.val());

        if (value > 1) {
            input.val(value - 1);
        }
        updateTotals();
        calculateSavings();
        toggleMinusButtonState(input);

        updateLocalStorage(input);
    });
    function toggleMinusButtonState(input) {
        var value = parseInt(input.val());
        var minusButton = input.siblings('.basket-product_minus');
        if (value === 1) {
            minusButton.addClass('disabled');
        } else {
            minusButton.removeClass('disabled');
        }
    }
    $('#selectAll').change(function() {
        $('.basket-product_checkbox').prop('checked', this.checked);
    });
    $('#legalFace').on('change', function() {
        if ($(this).is(':checked')) {
            $('.basket-form').attr('action', 'orderLegal.html');
        } else {
            $('.basket-form').attr('action', 'orderNatural.html');
        }
    });
    $('.basket-product_checkbox').change(function() {
        if ($('.basket-product_checkbox:checked').length > 0) {
            $('.basket-order_button').addClass('active');
            $('.basket-order').addClass('active');
        } else {
            $('.basket-order_button').removeClass('active');
            $('.basket-order').removeClass('active');
        }
    });
    updateTotals();
    calculateSavings();
    checkBasketProducts();
    updateQuantity();
    updateButtonStatus();
});
function resizeOrder() {
    if($(window).width() > 576){
        $('.basket-order_button').text('Перейти к оформлению')
    }else{
        $('.basket-order_button').text('К оформлению')
    }
}
$(document).ready(function(){
    resizeOrder()
})
$(window).on('resize', function() {
    resizeOrder()
})
// ORDER BASKET
$(document).ready(function() {
    // inputs 1
    $('.order-payment_method').on('change', function() {
        if ($(this).is(':checked')) {
            $('.installment-bank').prop('checked', false);
            $('.installment-plan_bank').removeClass('selected');
        } else {
            $('.installment-bank').prop('checked', this.checked);
        }
    });
    $('.installment-bank').on('change', function() {
        if ($(this).is(':checked')) {
            $('#onlinePayment, #uponКeceipt').prop('checked', false);
            $('#installmentPlan').prop('checked', this.checked);
            $('.installment-plan_bank').removeClass('selected');
            $(this).closest('.installment-plan_bank').addClass('selected');
        } else {
            $(this).closest('.installment-plan_bank').removeClass('selected');
        }
    });
    // inputs 2
    $('.order-delivery_inpt').on('change', function() {
        if ($(this).is(':checked')) {
            $('.order-pickup_inpt').prop('checked', false);
            $('.order-pickup').removeClass('selected');
        } else {
            $('.order-pickup_inpt').prop('checked', this.checked);
        }
    });
    $('.order-pickup_inpt').on('change', function() {
        if ($(this).is(':checked')) {
            $('#courierDelivery, #expressDelivery, #oversizedDelivery').prop('checked', false);
            $('#pickup').prop('checked', this.checked);
            $('.order-pickup').removeClass('selected');
            $(this).closest('.order-pickup').addClass('selected');
        } else {
            $(this).closest('.order-pickup').removeClass('selected');
        }
    });
    // inputs text
    $('input[type="text"]').on('input', function() {
        var orderRecipientName = $('#orderRecipientName').val();
        var orderRecipientSurname = $('#orderRecipientSurname').val();
        var orderRecipientPhone = $('#orderRecipientPhone').val();
        if (orderRecipientName && orderRecipientSurname && orderRecipientPhone) {
            $('#orderRecipientPoint').addClass('active');
            $('#checkout').addClass('active');
            $('#orderRecipientLine').addClass('active');
        } else{
            $('#checkout').removeClass('active');
            $('#orderRecipientLine').removeClass('active');
        }
    });
    // add active to checkout
    $('.order-left input').on('input', function() {
        var orderRecipientName = $('#orderRecipientName').val();
        var orderRecipientSurname = $('#orderRecipientSurname').val();
        var orderRecipientPhone = $('#orderRecipientPhone').val();
        if($('.order-payment_method').is(':checked') && $('.order-delivery_inpt').is(':checked') && orderRecipientName && orderRecipientSurname && orderRecipientPhone || $('.order-payment_method').is(':checked') && orderRecipientName && orderRecipientSurname && orderRecipientPhone){
            $('.order-checkout').addClass('active')
            $('.order_button').addClass('active')
        } else{
            $('.order-checkout').removeClass('active')
            $('.order_button').removeClass('active')
        }
    })
    // order line
    $('#paymentMethod input').click(function() {
        $('#paymentMethodLine').addClass('active')
        $('#deliveryMethodPoint').addClass('active')
    })
    $('#deliveryMethod input').click(function() {
        $('#orderRecipientPoint').addClass('active')
        $('#deliveryMethodPoint').addClass('active')
        $('#deliveryMethodLine').addClass('active')
    })
    // goods in order
    $('.goods-in-order-accordion-header').click(function () {
        var $item = $(this).parent();
        if ($item.hasClass('active')) {
            $item.removeClass('active');
            $item.find('.goods-in-order-accordion-content').slideUp();
        } else {
            $('.goods-in-order-accordion').removeClass('active');
            $('.goods-in-order-accordion .goods-in-order-accordion-content').slideUp();
            $item.addClass('active');
            $item.find('.goods-in-order-accordion-content').slideDown();
        }
    });
    // basket goods add to checkout
    $('.basket-order_button').click(function() {
        var selectedItems = [];
        $('.basket-product').each(function() {
            var inputCheck = $(this).find('.basket-product_checkbox');
            if ($(inputCheck).is(':checked')) {
                var item = {
                    name: $(this).find('.basket-product_name').text(),
                    price: $(this).find('.basket-product_currentPrice').text(),
                    image: $(this).find('.basket-product_img img').attr('src'),
                    quantity: $(this).find('.item_count').val()
                };
                selectedItems.push(item);
            }
        });
        localStorage.setItem('selectedItems', JSON.stringify(selectedItems));
    });
    $(document).ready(function(){
        var selectedItems = JSON.parse(localStorage.getItem('selectedItems'));
        var goodsInOrderContainer = $('.goods-in-order_products');
        $(goodsInOrderContainer).empty();
        var totalPrice = 0;
        let totalQuantity = 0;
        selectedItems.forEach(function(item) {
            var goodsInOrderTemplate = `
        <div class="goods-in-order_product">
            <div class="basket-product d-flex justify-content-between">
                <div class="basket-product_img"><img src="${item.image}" alt=""></div>
                <div>
                    <p class="basket-product_name">${item.name}</p>
                    <input value="${item.quantity}" type="text" class="item_count" disabled>шт</input>
                </div>
            </div>
        </div>
      `;
            $(goodsInOrderContainer).append(goodsInOrderTemplate);
            var price = parseFloat(item.price.replace(/[^\d.]/g, ''));
            var quantity = parseInt(item.quantity);
            totalPrice += price * quantity;
            totalQuantity += quantity;
        });
        $('.total-order_quantity').text(totalQuantity);
        $('.total-order_price').text(totalPrice.toFixed().replace(/\B(?=(\d{3})+(?!\d))/g, " "));
    });
})

// CABINET
$(document).ready(function() {
    // tabs
    $('.cabinet-main .cabinet-main_tab:not(:first)').hide();
    $('.cabinet-tab').click(function(e) {
        e.preventDefault();
        var currentTab = $('#' + $(this).data('tab'));
        $('.cabinet-tab').removeClass('active');
        $(this).addClass('active');
        $('.cabinet-main .cabinet-main_tab').hide();
        $(currentTab).show();
    });
    // active btn
    $('.cabinet-main_profile--form').each(function() {
        var $form = $(this);
        var $inputs = $form.find('input');
        var $button = $form.find('button');
        $inputs.on('input', function() {
            var $input1 = $form.find('input[name="cabinetProfileName"]');
            var $input2 = $form.find('input[name="cabinetProfilePhone"]');
            var $input3 = $form.find('input[name="cabinetProfileEmail"]');
            if ($input1.val() && $input2.val() && $input3.val()) {
                $button.addClass('active');
            } else {
                $button.removeClass('active');
            }
        });
    });
    $('.addCardForm').each(function() {
        var $form = $(this);
        var $inputs = $form.find('input');
        var $button = $form.find('button');
        $inputs.on('input', function() {
            var $input1 = $form.find('input[name="cabinetCardNumber"]');
            var $input2 = $form.find('input[name="cabinetCardDate"]');
            var $input3 = $form.find('input[name="cabinetCardCvv"]');
            if ($input1.val() && $input2.val() && $input3.val()) {
                $button.addClass('active');
            } else {
                $button.removeClass('active');
            }
        });
    });
    // card stars
    $(".cabinet-main_card--number").each(function() {
        var fullNumber = $(this).text();
        if (fullNumber.length === 16) {
            var maskedNumber = fullNumber.slice(0, 6) + "******" + fullNumber.slice(12);
            $(this).text(maskedNumber);
        }
    });
    // accordion
    $('.cabinet-main-accordion-header').click(function () {
        var $item = $(this).parent();
        if ($item.hasClass('active')) {
            $item.removeClass('active');
            $item.find('.cabinet-main-accordion-content').slideUp();
        } else {
            $('.cabinet-main-accordion').removeClass('active');
            $('.cabinet-main-accordion .cabinet-main-accordion-content').slideUp();
            $item.addClass('active');
            $item.find('.cabinet-main-accordion-content').slideDown();
        }
    });
    $('.cabinet-main_goods-in-order-accordion-header').click(function () {
        var $item = $(this).parent();
        if ($item.hasClass('active')) {
            $item.removeClass('active');
            $item.find('.cabinet-main_goods-in-order-accordion-content').slideUp();
        } else {
            $('.cabinet-main_goods-in-order-accordion').removeClass('active');
            $('.cabinet-main_goods-in-order-accordion .cabinet-main_goods-in-order-accordion-content').slideUp();
            $item.addClass('active');
            $item.find('.cabinet-main_goods-in-order-accordion-content').slideDown();
        }
    });
    var windowWidth = $(window).width();
    var tabElement = $('.cmt');
    if (windowWidth < 992) {
        tabElement.removeClass('cabinet-main_tab');
        tabElement.addClass('offcanvas offcanvas-end');
    } else {
        tabElement.removeClass('offcanvas offcanvas-end');
        tabElement.addClass('cabinet-main_tab');
    }
});
$(window).on('resize', function() {
    var windowWidth = $(window).width();
    var tabElement = $('.cmt');
    if (windowWidth < 992) {
        tabElement.removeClass('cabinet-main_tab');
        tabElement.addClass('offcanvas offcanvas-end');
    } else {
        tabElement.addClass('cabinet-main_tab');
        tabElement.removeClass('offcanvas offcanvas-end');
    }
});

