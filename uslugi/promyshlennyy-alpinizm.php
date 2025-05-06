<?php session_start(); ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Промышленный альпинизм</title>
    <meta name='description' content='Промышленный альпинизм - услуги и возможности, которые мы предлагаем'>
    <meta name='robots' content='index, follow'>
    <link rel='stylesheet' href='/css/pages/prom_alpinizm.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/header.php'; ?>
    <main>
        <section class='services_cards-wrapper container'>
            <h2>Промышленный альпинизм</h2>
            <div class='services_cards'>
                <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
                $stmt = $pdo->prepare("SELECT * FROM `services` WHERE `category` = 'alpinism';");
                $stmt->execute();
                $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($services):
                    foreach ($services as $service): ?>
                <div class='service_card'>
                    <img class='service-img' src='/assets/uploads/services_images/<?= $service['image_url'] ?>' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'><?= $service['name'] ?></h3>
                        <p class='service_description'><?= $service['short_description'] ?></p>
                        <?php if ($service['price'] != null): ?>
                        <p class='service_price'>от <?= $service['price'] ?> ₽/<?= match ($service['price_units']) {
                                                                                                'm2' => 'м²',
                                                                                                'pog_m' => 'пог. м'
                                                                                            } ?>
                        </p>
                        <?php else: ?>
                        <p class='service_price'>Цена договорная</p>
                        <?php endif; ?>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>
                <?php endforeach;
                else: ?>
                <h3>Услуг в этой категории пока нет</h3>
                <?php endif; ?>
                <div class='service_card'>
                    <img class='service-img' src='https://dummyimage.com/600x400.jpg' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'>Монтаж наружной рекламы</h3>
                        <p class='service_description'>
                            Установка баннеров, вывесок, световых коробов и других рекламных конструкций на высоте быстро и безопасно
                        </p>
                        <p class='service_price'>от 5 000 ₽</p>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>
                <div class='service_card'>
                    <img class='service-img' src='https://dummyimage.com/600x400.jpg' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'>Защитная покраска металлоконструкций</h3>
                        <p class='service_description'>
                            Антикоррозийная обработка и покраска вышек, ферм, мостов и других металлических сооружений на высоте
                        </p>
                        <p class='service_price'>от 150 ₽/м²</p>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>
                <div class='service_card'>
                    <img class='service-img' src='https://dummyimage.com/600x400.jpg' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'>Монтаж и ремонт водосточных систем</h3>
                        <p class='service_description'>
                            Установка новых и ремонт существующих водосточных труб и желобов на зданиях любой высоты
                        </p>
                        <p class='service_price'>от 200 ₽/пог. м</p>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>
                <div class='service_card'>
                    <img class='service-img' src='https://dummyimage.com/600x400.jpg' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'>Безопасное удаление снега и наледи с крыш</h3>
                        <p class='service_description'>
                            Оперативная очистка кровель от снежных масс, сосулек и наледи для предотвращения аварийных ситуаций
                        </p>
                        <p class='service_price'>от 1 500 ₽</p>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>
                <div class='service_card'>
                    <img class='service-img' src='https://dummyimage.com/600x400.jpg' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'>Обследование высотных объектов</h3>
                        <p class='service_description'>
                            Визуальный и инструментальный осмотр состояния фасадов, кровли и несущих конструкций на высоте
                        </p>
                        <p class='service_price'>Цена договорная</p>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>
                <div class='service_card'>
                    <img class='service-img' src='https://dummyimage.com/600x400.jpg' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'>Защита от птиц и вандализма на высоте</h3>
                        <p class='service_description'>
                            Установка антивандальных сеток и шипов для защиты фасадов и конструкций от птиц и нежелательных воздействий
                        </p>
                        <p class='service_price'>от 1 000 ₽</p>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>
                <div class='service_card'>
                    <img class='service-img' src='https://dummyimage.com/600x400.jpg' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <h3 class='service_title'>Специализированные высотные работы</h3>
                        <p class='service_description'>
                            Выполнение нестандартных задач на высоте, требующих особого подхода и квалификации</p>
                        <p class='service_price'>Цена договорная</p>
                    </div>
                    <a href='/service_page.php' class='action_button actbtn-o'>Подробнее</a>
                </div>

            </div>
        </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/footer.php'; ?>
</body>

</html>