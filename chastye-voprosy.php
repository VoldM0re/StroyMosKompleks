<?php
session_start();
?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Частые вопросы</title>
    <meta name='description' content='Ответы на частозадаваемые вопросы'>
    <meta name='robots' content='index, follow'>
    <link rel='stylesheet' href='/css/pages/chastye-voprosy.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>

    <?php require_once 'includes/components/header.php'; ?>
    <main>
        <div class='faq-wrapper container'>
            <h2>Часто задаваемые вопросы</h2>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Какие услуги предоставляет "СтройМосКомплекс"?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Мы специализируемся на строительстве, реконструкции и ремонте домов, офисов и
                        квартир. Также оказываем услуги проектирования и внутренней отделки.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>В каких регионах вы работаете?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Основной регион нашей работы — Московская область. Однако мы готовы рассматривать проекты в
                        близлежащих регионах по согласованию с клиентом.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Как рассчитать стоимость строительства или ремонта?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Вы можете оставить заявку на бесплатную консультацию на главной странице. Мы обсудим с вами все
                        детали проекта для составления точной сметы.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Сколько времени занимает строительство дома?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Сроки зависят от площади дома, сложности проекта и погодных условий. В среднем строительство
                        занимает от 6 до 12 месяцев.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Работаете ли вы с готовыми проектами домов?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Да, мы можем работать как с готовыми проектами заказчика, так и предложить собственные решения,
                        адаптированные под ваши потребности.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Гарантируете ли вы качество выполненных работ?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Мы предоставляем гарантию на все виды выполненных работ. Длительность гарантии зависит от вида
                        услуг и указана в договоре.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Можно ли внести изменения в проект в процессе работы?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Да, изменения возможны, но это может повлиять на сроки и стоимость. Все корректировки
                        обсуждаются и фиксируются документально.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Какие материалы вы используете в работе?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Мы работаем только с качественными, сертифицированными материалами от проверенных поставщиков.
                        Выбор материалов согласовывается с клиентом.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Как проходит процесс сотрудничества?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Сначала мы обсуждаем ваш проект и пожелания, составляем смету и заключаем договор. Затем
                        выполняем строительные или ремонтные работы в установленные сроки и сдаём объект под ключ.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
            <div class='question-block'>
                <div class='question'>
                    <p class='question-text'>Какой у вас опыт работы?</p>
                    <svg class='question-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                    </svg>
                </div>
                <div class='answer'>
                    <p class='answer-text'>
                        Наша компания основана в 2005 году, и за это время мы реализовали более 500 проектов разной
                        сложности.
                    </p>
                    <svg class='answer-icon' width='50' height='50'>
                        <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                    </svg>
                </div>
            </div>
        </div>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
    <script src="js/question.js"></script>
</body>

</html>