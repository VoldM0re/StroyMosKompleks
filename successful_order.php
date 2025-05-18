<?php session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /');
    exit();
} ?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Подтверждение заказа</title>
    <meta name='description' content='Подтвердите ваш заказ'>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/successful_order.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php include 'includes/components/header.php'; ?>
    <main>
        <section class="successful_order-wrapper container">
            <h2>Спасибо за заказ!</h2>
            <div class="successful_order-buttons">
                <a href="/profile.php" class="action_button actbtn-o">Узнайте статус заказа в профиле</a>
                <a href="/uslugi/" class="action_button actbtn-w">В каталог</a>
            </div>
        </section>
    </main>
    <?php include 'includes/components/footer.php'; ?>
</body>

</html>