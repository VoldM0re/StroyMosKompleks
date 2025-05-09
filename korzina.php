<?php session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /login.php?referer=' . urlencode($_SERVER['REQUEST_URI']));
    exit();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php'; ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - УСЛУГА</title>
    <meta name='description' content='Корзина'>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/cart.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php include 'includes/components/header.php'; ?>
    <main>
        <section class='cart-wrapper container'>
            <h2>Корзина</h2>
            <div class="cart-block">
                <div class="cart_services">
                    <?php
                    $cart_services = query($pdo, "SELECT
                    services.id,
                    services.name,
                    services.short_description,
                    services.price,
                    services.price_units,
                    services.image_url
                    FROM `cart_items`
                    LEFT JOIN `services` ON cart_items.service_id = services.id
                    WHERE `user_id` = :user_id;", [':user_id' => $_SESSION['user']['id']]);
                    if ($cart_services):
                        foreach ($cart_services as $service):
                            $price_units = format_price_units($service['price_units']); ?>
                            <div class="cart_service" data-service-id="<?= $service['id'] ?>">
                                <a href="/service.php?service_id=<?= $service['id'] ?>" class="cart_service-img">
                                    <img src='/assets/uploads/services_images/<?= $service['image_url'] ?>' alt='Фото услуги' loading='lazy'>
                                </a>
                                <div class="cart_service-text">
                                    <h3 class="cart_service-title"><?= $service['name'] ?></h3>
                                    <div class="cart_service-price-block">
                                        <p class='cart_service-price'><?= $service['price'] != null ? "от {$service['price']} ₽{$price_units}" : 'Цена договорная' ?></p>
                                        <button class="cart_service-delete_button" id='cartAction'>
                                            <svg viewBox="0 0 14 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M11 6.5V16.5H3V6.5H11ZM9.5 0.5H4.5L3.5 1.5H0V3.5H14V1.5H10.5L9.5 0.5ZM13 4.5H1V16.5C1 17.6 1.9 18.5 3 18.5H11C12.1 18.5 13 17.6 13 16.5V4.5Z" fill="#969696" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h3 style="text-align: center;">Ваша корзина пуста</h3>
                        <a class="action_button actbtn-o" href="/uslugi/">В каталог</a>
                    <?php endif; ?>
                </div>
                <?php if ($cart_services): ?>
                    <a id="confirmOrderButton" class="action_button actbtn-o" href="confirm_order.php">Оставить заявку</a>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php include 'includes/components/footer.php'; ?>
    <script>
        const cartDeleteButton = document.querySelectorAll('.cart_service-delete_button')
        cartDeleteButton.forEach(deleteButton => {
            deleteButton.addEventListener('click', () => {
                const cart_service = deleteButton.closest('.cart_service');
                serviceId = cart_service.dataset.serviceId;

                const action = 'remove_from_cart';
                const formData = new FormData();
                formData.append('service_id', serviceId);
                formData.append('action', action);

                fetch('includes/actions/cart_actions.inc.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const counter = document.querySelector('.cart_counter');
                            counter.innerHTML = data.count;
                            if (data.count > 0) {
                                counter.classList.remove('hidden');
                            } else {
                                counter.classList.add('hidden');
                                document.querySelector('.cart_services').innerHTML = `
                                <h3 style="text-align: center;">Ваша корзина пуста</h3>
                                <a class="action_button actbtn-o" href="/uslugi/">В каталог</a>`;
                                document.querySelector('#confirmOrderButton').remove();
                            }
                            cart_service.remove();
                        } else {
                            alert('Ошибка: ' + data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Ошибка при отправке запроса:', error);
                        alert('Произошла ошибка.');
                    });
            });
        });
    </script>
</body>

</html>