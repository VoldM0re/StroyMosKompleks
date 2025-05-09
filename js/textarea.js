const textareas = document.querySelectorAll('.textarea');
const maxLenght = 200
if (textareas) {
    textareas.forEach((textarea) => {
        window.onload = updateArea(textarea);
        console.log(1);
    });
}
function updateArea(elem) {
    elem.style.height = "5px";
    elem.style.height = (elem.scrollHeight + 15) + "px";

    const currentLength = (elem.value).length;
    const counter = elem.nextElementSibling;
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
