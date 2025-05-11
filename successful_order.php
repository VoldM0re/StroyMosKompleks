<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php';
if (!isset($_SESSION['user'])) {
    echo $_SERVER['REQUEST_METHOD'];
    redirect('/');
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
                <a href="/" class="action_button actbtn-w">На главную</a>
            </div>
        </section>
    </main>
    <?php include 'includes/components/footer.php'; ?>
    <?php include 'includes/components/message_handler.php'; ?>
    <script src="/js/textarea.js"></script>
    <script src="/js/format_phone.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            formatPhoneNumber(document.getElementById('phoneInput'));
        });
    </script>
</body>

</html>