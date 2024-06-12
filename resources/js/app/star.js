document.addEventListener('DOMContentLoaded', () => {
    const starsContainer = document.querySelector('.architect__image-stars');
    const stars = document.querySelectorAll('.star-container');
    const rating = parseFloat(starsContainer.getAttribute('data-rating'));

    highlightStars(rating);

    function highlightStars(value) {
        stars.forEach(star => {
            const starValue = parseFloat(star.getAttribute('data-value'));
            const fillWidth = (value >= starValue) ? 100 : Math.max(0, (value - (starValue - 1)) * 100);
            star.style.setProperty('--clip-width', `${fillWidth}%`);
        });
    }
});
