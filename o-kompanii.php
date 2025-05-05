<?php session_start(); ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - О компании</title>
    <meta name='description' content='СтройМосКомплекс: Многолетний стаж, более 500 завершённых проектов. Узнайте историю компании, которая строит будущее.'>
    <meta name='robots' content='index, follow'>
    <link rel='stylesheet' href='/css/pages/o-kompanii.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>
    <main>
        <div class='about-wrapper container'>
            <h2>Наша история</h2>
            <div class='about-text-wrapper'>
                <p class='about-text'>
                    <span class='stroymoskompleks'><span class='stroy'>Строй</span>МосКомплекс</span>
                    был основан в 2005 году, с тех пор успешно реализовал более 500 проектов. Мы начинали с малого, но
                    благодаря профессионализму и преданности делу, быстро завоевали доверие клиентов и партнеров.<br>
                    Сегодня <span class='stroymoskompleks'><span class='stroy'>Строй</span>МосКомплекс</span> — одна
                    из ведущих строительных компаний в регионе, известная надежностью и высокими стандартами качества.
                </p>
                <picture>
                    <source media='(min-width: 767px)' srcset='/assets/img/o-kompanii/history.webp 310w'>
                    <img class='about-img' src='/assets/img/o-kompanii/history_mobile.webp' alt='История компании'>
                </picture>
            </div>
        </div>
        <div class='about-wrapper container'>
            <h2>Миссия и цели</h2>
            <div class='about-text-wrapper'>
                <p class='about-text'>
                    Наша миссия — создавать комфортные и современные пространства для жизни и работы, воплощая мечты
                    клиентов в реальность. Мы стремимся к лидерству в отрасли, предлагая оптимальные решения, соблюдая
                    экологические стандарты и гарантируя высокое качество на каждом этапе строительства.
                </p>
                <picture>
                    <source media='(min-width: 767px)' srcset='/assets/img/o-kompanii/missions.webp 310w'>
                    <img class='about-img' src='/assets/img/o-kompanii/missions_mobile.webp' alt='Миссии компании'>
                </picture>
            </div>
        </div>
        <div class='about-wrapper container'>
            <h2>Команда</h2>
            <div class='about-text-wrapper'>
                <p class='about-text'><span class='stroymoskompleks'><span class='stroy'>Строй</span>МосКомплекс</span>
                    — это команда опытных профессионалов, объединенных общей целью. Наши архитекторы, инженеры,
                    строители и менеджеры проектов обладают многолетним опытом и регулярно повышают квалификацию. Мы
                    гордимся тем, что в нашей команде работают лучшие специалисты отрасли.
                </p>
                <picture>
                    <source media='(min-width: 767px)' srcset='/assets/img/o-kompanii/team.webp 310w'>
                    <img class='about-img' src='/assets/img/o-kompanii/team_mobile.webp' alt='Команда СтройМосКомплекс'>
                </picture>
            </div>
        </div>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
</body>

</html>