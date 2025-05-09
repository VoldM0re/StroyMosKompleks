<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: /error_page.php');
    exit();
} ?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Управление заказами - СтройМосКомплекс</title>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/manage_orders.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/header.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php'; ?>
    <main>
        <section class='orders-wrapper container'>
            <h2>Управление заказами</h2>
            <div class="orders">
                <?php
                $orders = query($pdo, "SELECT * FROM `orders` LEFT JOIN `users` ON orders.user_id = users.id ORDER BY orders.created_at DESC; ");
                if ($orders):
                    foreach ($orders as $order): ?>
                        <div class="order">
                            <div class="order-top">
                                <h3 class="order-top-text"><?= $order['service_name'] ?></h3>
                            </div>
                            <div class="order-main">
                                <div class="order-text">
                                    <div class="order-text-main">
                                        <img class="order-avatar" src="/assets/svg/profile_icon.svg" alt="Фото профиля">
                                        <h3 class="order-user"><?= $order['first_name'] ?>, <?= $order['phone'] ?></h3>
                                    </div>
                                    <div class="order-text-block">
                                        <h4 class="order-text-title">Адрес: </h4>
                                        <p class="order-text-description"><?= $order['address'] ?></p>
                                    </div>
                                    <div class="order-text-block">
                                        <h4 class="order-text-title">Комментарий: </h4>
                                        <p class="order-text-description"><?= $order['comment'] ?></p>
                                    </div>
                                    <div class="order-bottom"><?= $order['created_at'] ?></div>
                                </div>
                                <div class="order-buttons">
                                    <button class="order-button green">Принят</button>
                                    <button class="order-button yellow">В обработке</button>
                                    <button class="order-button red">Отклонён</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/footer.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/message_handler.php'; ?>
</body>

</html>