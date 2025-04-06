<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /login.php');
}
?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Профиль</title>
    <meta name='description' content='Ваш профиль на сайте СтройМосКомплекс'>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/login.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>

    <main style="justify-content: center;">
        <section class='container' style="text-align: center;">
            <h2>Добро пожаловать, <?= $_SESSION['user']['first_name'] . ' ' . $_SESSION['user']['last_name'] ?>!</h2>
            <h2>Здесь будет ваш профиль :D</h2>
        </section>
    </main>

    <?php require_once 'includes/components/footer.php'; ?>
</body>

</html>