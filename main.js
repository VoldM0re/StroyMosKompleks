const sliderWrapper = document.querySelector('.slider-wrapper');
const sliderDots = document.querySelector('.slider__dots');
const slider = document.getElementById('slider');
const prevBtn = document.getElementById('prev');
const nextBtn = document.getElementById('next');

const slidesCount = slider.children.length;
let currentSlide = 0;
let isAnimating = false;

for (let i = 0; i < slidesCount; i++) {
    const dot = `
        <label class='dot-label'>
            <input class='slider-dot' type="radio" name="slider-dot" class="slider-dot" value="%INDEX%">
        </label>
        `.replace('%INDEX%', i);
    sliderDots.insertAdjacentHTML('beforeend', dot);
}
const dots = document.querySelectorAll('.slider-dot');
dots[currentSlide].checked = true;


function showSliderProgress() {
    sliderWrapper.style.setProperty('--progress', `${(currentSlide + 1) * 100 / slidesCount}%`);
}

function showSlide(slideIndex) {
    if (isAnimating) return;
    isAnimating = true;
    console.log(currentSlide);
    if (slideIndex < 0) {
        currentSlide = slidesCount - 1;
        showSliderProgress();
        dots[currentSlide].checked = true;
    } else if (slideIndex >= slidesCount) {
        currentSlide = 0;
        showSliderProgress();
        dots[currentSlide].checked = true;
    } else {
        currentSlide = slideIndex;
        showSliderProgress();
        dots[currentSlide].checked = true;
    }

    slider.style.transform = `translateX(-${currentSlide * 100}%)`;

    setTimeout(() => { isAnimating = false; }, 400); // Время должно совпадать с длительностью transition в CSS
}

prevBtn.addEventListener('click', () => {
    showSlide(currentSlide - 1);
});

nextBtn.addEventListener('click', () => {
    showSlide(currentSlide + 1);
});

let touchStartX = 0;
let touchEndX = 0;
const minSwipeDistance = 70;

slider.addEventListener('touchstart', (e) => {
    touchStartX = e.changedTouches[0].screenX;
    touchStartY = e.changedTouches[0].screenY;
});

slider.addEventListener('touchend', (e) => {
    touchEndX = e.changedTouches[0].screenX;
    handleSwipe();
});

function handleSwipe() {
    const swipeDistance = touchEndX - touchStartX;

    // Если свайп достаточно длинный
    if (Math.abs(swipeDistance) > minSwipeDistance) {
        swipeDistance > 0 ?
            showSlide(currentSlide - 1) :
            showSlide(currentSlide + 1);
    }
}

// Предотвращаем прокрутку страницы при свайпе слайдера
slider.addEventListener('touchmove', (e) => {
    // Если движение горизонтальное, предотвращаем прокрутку страницы
    const touchMoveX = e.touches[0].screenX;
    const diffX = Math.abs(touchMoveX - touchStartX);
    const touchMoveY = e.touches[0].screenY;
    const diffY = Math.abs(touchMoveY - touchStartY);

    if (diffX > diffY) {
        e.preventDefault();
    }
}, { passive: false });

dots.forEach(radio => {
    radio.addEventListener('change', function () {
        if (this.checked) currentSlide = Number(this.value);
        showSlide(currentSlide);
    });
});

showSliderProgress()

// Автопрокрутка
// setInterval(() => {
//     showSlide(currentSlide + 1);
// }, 5000);
