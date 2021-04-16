jQuery(document).on('ready', function () {
    const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: false,
        slidesPerView: 1,
        spaceBetween: 4,
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

    });
})
jQuery(document).on('ready', function () {
    const swiper = new Swiper('.swiper-container-relacionados', {
        // Default parameters
        slidesPerView: 1,
        spaceBetween: 10,
        direction: 'horizontal',
        loop: false,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            320: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            // when window width is >= 480px
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            // when window width is >= 640px
            1024: {
                slidesPerView: 3,
                spaceBetween: 40
            }
        }
    })
})