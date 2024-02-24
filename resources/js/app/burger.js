window.onload = () => {
    (function () {
        const menu = document.querySelector('.header__nav');
        const button = document.querySelector('.icon__menu');
        if (menu && button) {
            button.addEventListener('click', () => {
                button.classList.toggle('active');
                menu.classList.toggle('active');
                document.body.classList.toggle('lock')
            });
            document.querySelectorAll('.header__list-item').forEach(item => {
                item.addEventListener('click', () => {
                    button.classList.remove('active');
                    menu.classList.remove('active');
                    document.body.classList.remove('lock')
                })
            });
        }
    })();
}
