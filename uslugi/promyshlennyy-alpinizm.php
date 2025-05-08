<?php session_start(); ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Промышленный альпинизм</title>
    <meta name='description' content='Профессиональный промышленный альпинизм: мойка фасадов, ремонт, герметизация и монтаж рекламы на высоте. Качество и безопасность по доступным ценам!'>
    <meta name='robots' content='index, follow'>
    <link rel='stylesheet' href='/css/pages/services.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/header.php'; ?>
    <main>
        <section class='services_cards-wrapper container'>
            <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/list_services.php';
            listServices('Промышленный альпинизм', 'alpinism'); ?>
        </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/footer.php'; ?>
</body>

</html>