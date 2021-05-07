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
    const swiperRelacionados = new Swiper('.swiper-container-posts-relacionados', {
        // Default parameters
        direction: 'horizontal',
        loop: false,
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 768px
            768: {
                slidesPerView: 1,
                spaceBetween: 5
            },
            // when window width is >= 1024px
            1024: {
                slidesPerView: 2,
                spaceBetween: 20
            },
            // when window width is >= 1300px
            1300: {
                slidesPerView: 3,
                spaceBetween: 20
            }
        },
        // Navigation arrows
        navigation: {
            nextEl: '.navigation-relacionados-next',
            prevEl: '.navigation-relacionados-prev',
        },
    })
})