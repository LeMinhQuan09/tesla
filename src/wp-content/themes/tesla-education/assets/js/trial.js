jQuery(($) => {
    Fancybox.bind('.fcy-popup, .fcy-video, .banner-video a', {});

    $(".items-slick-2").slick({
        slidesToShow: 2,
        dots: false,
        arrows: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".gallery-slick-2").slick({
        rows: 2,
        slidesToShow: 3,
        dots: true,
        arrows: false,
        infinite: true,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });

    $(".infos-slick").slick({
        rows: 1,
        slidesToShow: 3,
        dots: false,
        arrows: false,
        infinite: false,
        responsive: [
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 2,
                    dots: true,
                }
            },
            {
                breakpoint: 576,
                settings: {
                    slidesToShow: 1,
                }
            }
        ]
    });
});
