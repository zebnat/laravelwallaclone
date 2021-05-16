document.addEventListener('DOMContentLoaded', () => {
    (function showAndHideMenu(){
        const burgerEl = document.getElementById('navburger');

        burgerEl.addEventListener('click', () => {
            const target = burgerEl.dataset.target;
            const $target = document.getElementById(target);

            burgerEl.classList.toggle('is-active');
            $target.classList.toggle('is-active');
        });
    })();
});
