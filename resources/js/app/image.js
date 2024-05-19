document.addEventListener("DOMContentLoaded", () => {
    const modal = document.querySelector('.modal');

    document.querySelectorAll('.best__image-wrapper').forEach(wrapper => {
        wrapper.querySelectorAll('.image').forEach(image => {
           image.addEventListener('click', () => {
                modal.classList.add('active')
                modal.querySelector('.modal-content').setAttribute('src', image.getAttribute('src'))
           });
        });
    });

    modal.querySelector('.close').addEventListener('click', () => {
        modal.classList.remove('active')
    });
});
