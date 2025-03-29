const textarea = document.querySelector('.leave_review-textarea');
const counter = document.querySelector('.review-chars_counter');
const maxLenght = 200

function updateArea(elem) {
    elem.style.height = "5px";
    elem.style.height = (elem.scrollHeight + 15) + "px";

    const currentLength = (textarea.value).length;
    counter.innerHTML = currentLength + `/${maxLenght}`;

    if (currentLength === maxLenght) {
        counter.classList.add('full');
        counter.style.animation = 'none';
        counter.offsetHeight; // Перерисовываем счетчик, чтобы анимация сбросилась
        counter.style.animation = null;
    } else {
        counter.classList.remove('full');
    }
}
