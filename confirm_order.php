<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php';
$cart_services = query(
    $pdo,
    "SELECT
        services.id,
        services.name,
        services.short_description,
        services.price,
        services.price_units,
        services.image_url
        FROM `cart_items`
        LEFT JOIN `services` ON cart_items.service_id = services.id
        WHERE `user_id` = :user_id;",
    [':user_id' => $_SESSION['user']['id']]
);
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
    <link rel='stylesheet' href='/css/pages/confirm_order.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php include 'includes/components/header.php'; ?>
    <main>
        <form class="confirm-wrapper container" method="post" action='includes/actions/order_confirm.inc.php'>
            <h2>Подтвердите заявку</h2>
            <div class='confirm-block'>
                <div class='sign__inputs'>
                    <div class='sign__inputs-textfields'>
                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='15' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#person'></use>
                                </svg>
                                <span>Ваше имя</span>
                            </div>
                            <input class='sign__textfield' type='text' name='first_name' placeholder='Иван' required value="<?= htmlspecialchars($_SESSION['user']['first_name']) ?? '' ?>">
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='14' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#tel'></use>
                                </svg>
                                <span>Телефон</span>
                            </div>
                            <input id='phoneInput' class='sign__textfield' type='tel' name='phone' placeholder='+71234567890' required value="<?= htmlspecialchars($_SESSION['user']['phone']) ?? '' ?>">
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='14' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#address'></use>
                                </svg>
                                <span>Адрес</span>
                            </div>
                            <div class="textarea-block">
                                <textarea class='textarea' oninput="updateArea(this)" name='address' placeholder='Московская обл., г. Щёлково, ул. Талсинская, д. 31'
                                    maxlength='200' required><?= htmlspecialchars($_SESSION['user']['address'] ?? '') ?></textarea>
                                <small class='chars_counter'>0/200</small>
                            </div>
                        </div>
                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='14' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#address'></use>
                                </svg>
                                <span>Комментарий</span>
                            </div>
                            <div class="textarea-block">
                                <textarea class='textarea' oninput="updateArea(this)" name='comment' placeholder='Дополнительная информация'
                                    maxlength='200'></textarea>
                                <small class='chars_counter'>0/200</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cart_services">
                    <?php
                    foreach ($cart_services as $service):
                        $price_units = format_price_units($service['price_units']); ?>
                        <div class="cart_service" data-service-id="<?= $service['id'] ?>">
                            <a href="/service.php?service_id=<?= $service['id'] ?>" class="cart_service-img">
                                <img src='/assets/uploads/services_images/<?= $service['image_url'] ?>' alt='Фото услуги' loading='lazy'>
                            </a>
                            <div class="cart_service-text">
                                <input type="hidden" name="service_name" value="<?= $service['name'] ?>">
                                <h3 class="cart_service-title"><?= $service['name'] ?></h3>
                                <div class="cart_service-price-block">
                                    <p class='cart_service-price'><?= $service['price'] != null ? "от {$service['price']} ₽{$price_units}" : 'Цена договорная' ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <button class="action_button actbtn-o">Подтвердить</button>
        </form>
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