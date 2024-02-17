document.addEventListener("DOMContentLoaded", () => {
    const swiper = new Swiper('.regions__slider', {
        autoplay: {
            delay: 1000,
        },
        slidesPerView: 3,
        spaceBetween: 30,
        breakpoints: {
            660: {
                slidesPerView: 2,
            },
            320: {
                slidesPerView: 1,
            },
            992: {
                slidesPerView: 4,
            },
        },
        navigation: {
            nextEl: '.regions__slider-button--prev ',
            prevEl: '.regions__slider-button--next',
        },
    });
});
