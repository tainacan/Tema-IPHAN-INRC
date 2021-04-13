/* import { Swiper } from '../assets/swiper-bundle.esm.browser.min.js' */

jQuery(document).on('ready', function () {
    const swiper = new Swiper('.swiper-container', {
        // Optional parameters
        direction: 'vertical',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
    });

    console.log(swiper);
    console.log("Entrei no carousel");
})
