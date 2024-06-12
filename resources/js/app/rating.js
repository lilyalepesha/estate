window.onload = () => {
    const stars = document.querySelectorAll('.architect__stars svg');
    const ratingInput = document.querySelector('#rating');
    console.log(ratingInput)
    stars.forEach(star => {
        star.addEventListener('click', function () {
            const value = this.getAttribute('data-value');
            ratingInput.value = value;
            highlightStars(value);
        });

        star.addEventListener('mouseover', function () {
            const value = this.getAttribute('data-value');
            highlightStars(value);
        });

        star.addEventListener('mouseout', function () {
            const value = ratingInput.value;
            highlightStars(value);
        });
    });

    function highlightStars(value) {
        stars.forEach(star => {
            if (star.getAttribute('data-value') <= value) {
                star.classList.add('active');
            } else {
                star.classList.remove('active');
            }
        });
    }
};
