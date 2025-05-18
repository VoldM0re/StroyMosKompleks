const questions = document.querySelectorAll('.question');
questions.forEach((question) => {
    question.addEventListener('click', () => {
        const answer = question.parentNode.querySelector('.answer');
        const questionIcon = question.parentNode.querySelector('.question-icon use');

        if (answer.classList.contains('opened')) {
            answer.classList.remove('opened')
            questionIcon.setAttribute('href', '/assets/svg/faq_sprite.svg#qArrow');
        } else {
            answer.classList.add('opened');
            questionIcon.setAttribute('href', '/assets/svg/faq_sprite.svg#qQuestionMark');
        }
    });
});