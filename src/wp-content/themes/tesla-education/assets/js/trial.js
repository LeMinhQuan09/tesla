jQuery(($) => {
    Fancybox.bind('.fcy-popup, .fcy-video, .banner-video a', {});

    $(".gallery-slick-2").slick({
        rows: 2,
        slidesToShow: 3,
        dots: true,
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
});
