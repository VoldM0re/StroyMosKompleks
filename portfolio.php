<?php session_start(); ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Портфолио</title>
    <meta name='description' content='Все наши выполненные работы на одной странице. Узнайте, какие задачи клиентов мы решаем и начните сотрудничество уже сегодня!'>
    <meta name='robots' content='index, follow'>
    <link rel='stylesheet' href='/css/pages/portfolio.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>
    <main>
        <div class='our_projects-wrapper container'>
            <h2>Наши работы</h2>
            <div class='our_projects__cards'>
                <?php
                $projects = [
                    [
                        'title' => 'Офис в центре Красногорска',
                        'description' => 'Проект по ремонту офиса площадью 200 м² в классическом стиле занял 3 месяца. Работа шла строго по графику, и клиенты остались довольны качеством отделки и уютной атмосферой.',
                        'img' => 'project1.jpg'
                    ],
                    [
                        'title' => 'Дом в Барвихе',
                        'description' => 'Реконструкция загородного дома площадью 250 м² в стиле "прованс". Проект реализован за 5 месяцев, включал сложные кровельные работы и адаптацию к особенностям местного климата.',
                        'img' => 'project2.jpg'
                    ],
                    [
                        'title' => 'Современная квартира в Одинцово',
                        'description' => 'Оформление квартиры площадью 100 м² в современном стиле. Дизайн интерьера сочетает минимализм и функциональность, а весь процесс занял 2 месяца.',
                        'img' => 'project3.jpg'
                    ],
                    [
                        'title' => 'Дом в Жуковке',
                        'description' => 'Полная реконструкция дома площадью 250 м² в стиле "прованс". Реализация проекта длилась 6 месяцев и потребовала детальной работы с фасадом.',
                        'img' => 'project4.jpg'
                    ],
                    [
                        'title' => 'Дом у реки в Солнечногорске',
                        'description' => 'Капитальная реконструкция дома площадью 250 м². На этом проекте мы работали 7 месяцев, решая сложные задачи по укреплению фундамента и восстановлению деревянных конструкций.',
                        'img' => 'project5.jpg'
                    ],
                    [
                        'title' => 'Дом в Павловской Слободе',
                        'description' => 'Проект дома площадью 250 м² в стиле "прованс". Мы завершили его за 5 месяцев, тщательно проработав детали фасада и внутренней отделки.',
                        'img' => 'project6.jpg'
                    ],
                    [
                        'title' => 'Дом в Внукове',
                        'description' => 'Реконструкция загородного дома площадью 250 м². Основные сложности заключались в соблюдении исторического облика дома при внедрении современных технологий.',
                        'img' => 'project7.jpg'
                    ],
                    [
                        'title' => 'Дом в Пушкино',
                        'description' => 'Дом в стиле "прованс" площадью 250 м². Весь процесс реконструкции, включая оформление интерьера и ландшафтные работы, занял 8 месяцев.',
                        'img' => 'project8.jpg'
                    ]
                ];
                ?>
                <?php foreach ($projects as $project): ?>
                    <div class='project__card'>
                        <img loading='lazy' class='project__card-image' src='/assets/img/projects/<?= $project['img'] ?>' alt='<?= $project['title'] ?>' width='320' height='250'>
                        <div class='project-text-wrapper'>
                            <div class='project-text'>
                                <h3 class='project-title'><?= $project['title'] ?></h3>
                                <p class='project-text-description'><?= $project['description'] ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
</body>

</html>