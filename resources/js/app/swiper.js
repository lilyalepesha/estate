document.addEventListener("DOMContentLoaded", () => {
    const swiper = new Swiper('.regions__slider', {
        autoplay: {
            delay: 1000,
        },
        slidesPerView: 3,
        spaceBetween: 30,
        breakpoints: {
            600: {
                slidesPerView: 3,
            },
            400: {
                slidesPerView: 20,
            },
            320: {
                slidesPerView: 1,
            },
            1260: {
                slidesPerView: 4,
            },
        },
        navigation: {
            nextEl: '.regions__slider-button--prev ',
            prevEl: '.regions__slider-button--next',
        },
    });
});
