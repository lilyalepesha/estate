document.addEventListener('DOMContentLoaded', () => {
    const starsContainer = document.querySelector('.architect__image-stars');
    const stars = document.querySelectorAll('.star-container');
    const rating = parseFloat(starsContainer.getAttribute('data-rating'));

    highlightStars(rating);

    function highlightStars(value) {
        stars.forEach(star => {
            const starValue = parseFloat(star.getAttribute('data-value'));
            let fillWidth = 0;

            if (value >= starValue) {
                fillWidth = 100;
            } else if (value > starValue - 1) {
                fillWidth = (value - (starValue - 1)) * 100;
            }

            star.style.setProperty('--clip-width', `${fillWidth}%`);
        });
    }
});
