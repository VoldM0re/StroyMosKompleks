const burgerButton = document.querySelector('.burger__button');
const menu = document.querySelector('.header__menu');

function toggleBurgerMenu() {
    burgerButton.classList.toggle('active');
    menu.classList.toggle('active');
}

burgerButton.addEventListener('click', toggleBurgerMenu);