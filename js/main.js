var dir_url= $('#sait_url').text();
function include(scriptUrl) {
    document.write('<script src="'+dir_url + scriptUrl + '"></script>');
}

// smooth scroll
$(function() {
    $('a[href*="#"]:not([href="#"])').click(function() {
        var link = this;
        if ($(link)[0].hasAttribute("data-toggle")) return true;
        if ($(link).hasClass("fancybox")) return true;
        if ($('body').is(".fp-viewing")) {
            if ($(link).is(".next__link")) {
                if ($('body').is(".fp-last-slide")) {
                    $.fn.fullpage.moveTo(1);
                } else {
                    $.fn.fullpage.moveSectionDown();
                }
            }
            return false;
        }
        if (location.pathname.replace(/^\//, '') == link.pathname.replace(/^\//, '') && location.hostname == link.hostname) {
            var target = $(link.hash);
            var w = $(window).width();
            var lambda;
            if (w >= 1200) lambda = 110;
            else lambda = 10;
            if ($(link).hasClass("team__link")) lambda = 100;
            // target = target.length ? target : $('[name=' + link.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - lambda
                }, 1000);
                return false;
            }
        }
    });
});

$(document).ready(function() {
    $('body').css('opacity', '1');
    $('.fancybox').fancybox();
    $('.js-mslider').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
    });

    $('.js-mreviews').slick({
        dots: false,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        responsive: [{
            breakpoint: 992,
            settings: {
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });

    if ($('body').hasClass('page-template-page-catalog')) {
        $('.category__items_6more').each(function(index, el) {
            var cat_items = $('.category__items_6more .category__item');
            $(this).addClass('js-category-slider');
            for (var i = 0; i < cat_items.length; i += 6) {
                cat_items.slice(i, i + 6).wrapAll("<div class='category__slide'></div>");
            }
        });
    }

    $('input[type=tel]').inputmask({
        mask: "+7(999) 999-99-99"
    });

    // меняем картинку на странице Команда по смене таба
    var $team_cur_img = $('.team .nav-tabs').css('background-image');
    $('.team a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        $cur_img = $(this).parent().attr('data-img');
        if ($cur_img) {
            $(this).closest('.nav-tabs').css('background-image','url('+$cur_img+')');
        } else {
            $(this).closest('.nav-tabs').css('background-image',$team_cur_img);
        }
    });

    // открыть описание персоны по клику
    $('.team__link').click(function(event) {
        var cur_person = $(this).attr('href');
        // console.log("cur_person", cur_person);
        $('.detail__item').removeClass('active');
        $(cur_person).addClass('active');
    });

    function init() {
        var fullpage__selector = '.fullpage__item';
        var fullpage__lastnum = $(fullpage__selector).length || 0;
        $(fullpage__selector).last().addClass(fullpage__selector.substring(1)+'__last');
        if (fullpage__lastnum > 1 && $(window).height() > 1000 && $(window).width() >= 1200) {
            if ( !$( 'html' ).hasClass( 'fp-enabled' ) ) {
                $('#fullpage').fullpage({
                    sectionSelector: fullpage__selector,
                    // scrollOverflow: true,
                    // menu: '.mmenu',
                    afterRender: function() {
                        $('body').addClass('fp-viewing');
                    },
                    onLeave: function(index, nextIndex, direction){
                        if (nextIndex == fullpage__lastnum ) $('body').addClass('fp-last-slide');
                            else $('body').removeClass('fp-last-slide');
                    }
                });
            }
        } else {
            if ( $( 'html' ).hasClass( 'fp-enabled' ) ) {
                $.fn.fullpage.destroy('all');
            }
        }
        if ($(window).width() < 992) {
            $('.js-mcatalog').not('.slick-initialized').slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
            });
            if ($('.js-category-slider').hasClass('slick-initialized')) {
                $('.js-category-slider').slick('unslick');
            }
        } else {
            if ($('.js-mcatalog').hasClass('slick-initialized')) {
                $('.js-mcatalog').slick('unslick');
            }
            $('.js-category-slider').not('.slick-initialized').slick({
                dots: true,
                infinite: true,
                slidesToShow: 1,
            });
        }
        var doc_height = $('html').height();
        var win_height = $(window).height();
        if (doc_height < win_height) {
            $('.content').css('min-height', $('.content').innerHeight() + win_height - doc_height);
        }
    }

    $(window).ready(init);
    $(window).resize(init);

    $(window).scroll(function(event) {
        if ($(window).scrollTop() > 50) $('.mmenu').addClass('fixed');
        else $('.mmenu').removeClass('fixed');

    });

});

/* Yandex Map
 ========================================================*/
;
(function ($) {
    var map = document.getElementById("map");
    if (map) {
        include('/js/api-maps.yandex.ru.js');
        $(document).ready(function () {
            var map = $('#map');
            if (map.length > 0) {
                ymaps.ready(init);
                var myMap, 
                    myPlacemark,
                    curLat,
                    curLong,
                    curDesc;

                function init(){ 
                    myMap = new ymaps.Map("map", {
                        center: [61.582319, 98.112851],
                        zoom: 3
                    }); 
                    for (var i = 0, l = where_dealers.length; i < l; i++) {
                        curLat = where_dealers[i]['lat'];
                        curLong = where_dealers[i]['long'];
                        curDesc = where_dealers[i]['desc'];
                        myPlacemark = new ymaps.Placemark([curLat, curLong], {
                            balloonContent: curDesc
                        });
                        myMap.geoObjects.add(myPlacemark);
                    }
                }
            }
        });
    }
})
(jQuery);

