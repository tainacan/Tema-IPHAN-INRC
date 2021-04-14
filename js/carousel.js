jQuery(document).on('ready', function () {
    const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        direction: 'vertical',
        loop: false,
        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });
})
