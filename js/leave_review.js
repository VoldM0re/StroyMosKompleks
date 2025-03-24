const textarea = document.querySelector('.leave_review-textarea');
const counter = document.querySelector('.review-chars_counter');
const maxLenght = 200

function updateArea(element) {
    element.style.height = "5px";
    element.style.height = (element.scrollHeight + 15) + "px";

    counter.innerHTML = (textarea.value).length + `/${maxLenght}`;
    if ((textarea.value).length == 200) {
        counter.classList.add('full')
    } else {
        counter.classList.remove('full')
    }
}
