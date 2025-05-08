<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php';
$service_id = $_GET['service_id'] ?? null;
if ($service_id) {
    $stmt = query($pdo, "SELECT * FROM `services` WHERE `id` = :id;", [':id' => $service_id]);
    if ($stmt) $service = $stmt[0];
    else redirect('/error_page.php');
} else redirect('/error_page.php');
$price_units = match ($service['price_units']) {
    'noUnits' => '',
    'm2' => '/м²',
    'pog_m' => '/пог. м',
    default => ''
}; ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - УСЛУГА</title>
    <meta name='description' content='ОПИСАНИЕ УСЛУГИ'>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/service.css'>
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
                        <img class='service_info-img' src='/assets/uploads/services_images/<?= $service['image_url'] ?>' alt='Изображение услуги' />
                        <div class='service_info-main-text'>
                            <h3 class='service_info_title'><?= $service['name'] ?></h3>
                            <?php if ($service['price_units'] == null): ?>
                                <p class='service_info_price'>Цена договорная</p>
                            <?php else: ?>
                                <p class='service_info_price'>Цена от <?= $service['price'] ?> ₽<?= $price_units ?></p>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class='service_info_description'>
                        <h4>Описание услуги</h4>
                        <p class='service_info_description-text'><?= $service['full_description'] ?></p>
                    </div>
                    <div class='service_info_price_info'>
                        <h4>Информация о ценообразовании</h4>
                        <p class='service_info_price_info-text'><?= $service['price_info'] ?> </p>
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