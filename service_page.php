<?php session_start(); ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - УСЛУГА</title>
    <meta name='description' content='ОПИСАНИЕ УСЛУГИ'>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/service_page.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php include 'includes/components/header.php'; ?>
    <main>
        <section class='service_info-wrapper container'>
            <h2>Об услуге</h2>
            <div class="service_info">
                <div class='service_info-block'>
                    <div class='service_info-main'>
                        <img class='service_info-img' src='https://dummyimage.com/1280x720.jpg' alt='Изображение услуги' />
                        <div class='service_info-main-text'>
                            <h3 class='service_info_title'>Блестящая чистота фасадов на любой высоте</h3>
                            <p class='service_info_price'>Цена от 50 ₽/м²</p>
                        </div>
                    </div>
                    <div class='service_info_description'>
                        <h4>Описание услуги</h4>
                        <p class='service_info_description-text'>
                            Компания "СтройМосКомплекс" предлагает профессиональную мойку окон и фасадов любой сложности на высоте. Наши опытные промышленные альпинисты используют
                            специализированное оборудование и безопасные, эффективные моющие средства, обеспечивая безупречную чистоту стеклянных, каменных и вентилируемых
                            поверхностей. Мы удаляем любые загрязнения, включая пыль, копоть, следы атмосферных осадков и строительные растворы.
                        </p>
                    </div>
                    <div class='service_info_price_info'>
                        <h4>Информация о ценообразовании</h4>
                        <p class='service_info_price_info-text'>
                            Стоимость мойки окон и фасадов зависит от площади поверхности, степени загрязнения и сложности работ. Ориентировочная цена - от 50 ₽/м². Для точного
                            расчета оставьте заявку.
                        </p>
                    </div>
                </div>
                <div class="service_info-actions">
                    <a href='/chastye-voprosy.php' class='action_button actbtn-w'>Частые вопросы</a>
                    <a href='/order_page.php' class='action_button actbtn-o'>Заказать</a>
                </div>
            </div>
        </section>
    </main>
    <?php include 'includes/components/footer.php'; ?>
</body>

</html>