<?php session_start(); ?>
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
            <?php
            $questions = [
                ['question' => 'Какие услуги предоставляет "СтройМосКомплекс"?', 'answer' => 'Мы специализируемся на строительстве, реконструкции и ремонте домов, офисов и квартир. Также оказываем услуги проектирования и внутренней отделки.'],
                ['question' => 'В каких регионах вы работаете?', 'answer' => 'Основной регион нашей работы — Московская область. Однако мы готовы рассматривать проекты в близлежащих регионах по согласованию с клиентом.'],
                ['question' => 'Как рассчитать стоимость строительства или ремонта?', 'answer' => 'Вы можете оставить заявку на бесплатную консультацию на главной странице. Мы обсудим с вами все детали проекта для составления точной сметы.'],
                ['question' => 'Сколько времени занимает строительство дома?', 'answer' => 'Сроки зависят от площади дома, сложности проекта и погодных условий. В среднем строительство занимает от 6 до 12 месяцев.'],
                ['question' => 'Работаете ли вы с готовыми проектами домов?', 'answer' => 'Да, мы можем работать как с готовыми проектами заказчика, так и предложить собственные решения, адаптированные под ваши потребности.'],
                ['question' => 'Гарантируете ли вы качество выполненных работ?', 'answer' => 'Мы предоставляем гарантию на все виды выполненных работ. Длительность гарантии зависит от вида услуг и указана в договоре.'],
                ['question' => 'Можно ли внести изменения в проект в процессе работы?', 'answer' => 'Да, изменения возможны, но это может повлиять на сроки и стоимость. Все корректировки обсуждаются и фиксируются документально.'],
                ['question' => 'Какие материалы вы используете в работе?', 'answer' => 'Мы работаем только с качественными, сертифицированными материалами от проверенных поставщиков. Выбор материалов согласовывается с клиентом.'],
                ['question' => 'Как проходит процесс сотрудничества?', 'answer' => 'Сначала мы обсуждаем ваш проект и пожелания, составляем смету и заключаем договор. Затем выполняем строительные или ремонтные работы в установленные сроки и сдаём объект под ключ.'],
                ['question' => 'Какой у вас опыт работы?', 'answer' => 'Наша компания основана в 2005 году, и за это время мы реализовали более 500 проектов разной сложности.'],
            ];

            foreach ($questions as $question): ?>
                <div class='question-block'>
                    <div class='question'>
                        <p class='question-text'><?= $question['question'] ?></p>
                        <svg class='question-icon' width='50' height='50'>
                            <use href='/assets/svg/faq_sprite.svg#qArrow'></use>
                        </svg>
                    </div>
                    <div class='answer'>
                        <p class='answer-text'><?= $question['answer'] ?></p>
                        <svg class='answer-icon' width='50' height='50'>
                            <use href='/assets/svg/faq_sprite.svg#qAnswer'></use>
                        </svg>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
    <script src="js/question.js"></script>
</body>

</html>