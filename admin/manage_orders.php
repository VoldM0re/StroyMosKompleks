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
                $orders = query($pdo, "SELECT orders.*, users.first_name, users.phone, users.profile_image_url FROM `orders` LEFT JOIN `users` ON orders.user_id = users.id ORDER BY orders.created_at DESC; ");
                if ($orders):
                    foreach ($orders as $order):
                        $order_status = $order['status'] ?? 'pending'; ?>
                        <div class="order" data-order-id="<?= $order['id'] ?>">
                            <div class="order-top">
                                <h3 class="order-top-text"><?= htmlspecialchars($order['service_name']) ?></h3>
                            </div>
                            <div class="order-main">
                                <div class="order-text">
                                    <div class="order-text-main">
                                        <?php
                                        if (isset($order['profile_image_url'])) {
                                            $profileImageUrl = $order['profile_image_url'] === 'default_pfp.png'
                                                ? '/assets/svg/profile_icon.svg'
                                                : '/assets/uploads/profile_pictures/' . $order['profile_image_url'];
                                        } ?>
                                        <img class="order-avatar" src='<?= $profileImageUrl ?>' alt="Фото профиля">
                                        <h3 class="order-user"><?= htmlspecialchars($order['first_name']) ?></h3>
                                    </div>
                                    <div class="order-text-block">
                                        <h4 class="order-text-title">Телефон: </h4>
                                        <p class="order-text-description"><?= nl2br(htmlspecialchars($order['phone'])) ?></p> <!-- Use nl2br for address/comment -->
                                    </div>
                                    <div class="order-text-block">
                                        <h4 class="order-text-title">Адрес: </h4>
                                        <p class="order-text-description"><?= nl2br(htmlspecialchars($order['address'])) ?></p> <!-- Use nl2br for address/comment -->
                                    </div>
                                    <div class="order-text-block">
                                        <h4 class="order-text-title">Комментарий: </h4>
                                        <p class="order-text-description"><?= nl2br(htmlspecialchars($order['comment'])) ?></p>
                                    </div>
                                    <div class="order-bottom"><?= htmlspecialchars($order['created_at']) ?></div>
                                </div>
                                <div class="order-buttons">
                                    <button class="order-button green <?= $order_status == 'accepted' ? 'active' : '' ?>" data-action="accept">Принят</button>
                                    <button class="order-button yellow <?= $order_status == 'pending' ? 'active' : '' ?>" data-action="pend">В обработке</button>
                                    <button class="order-button red <?= $order_status == 'rejected' ? 'active' : '' ?>" data-action="reject">Отклонён</button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <p style="text-align: center;">Заказов пока нет.</p>
                <?php endif; ?>
            </div>
        </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/footer.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/message_handler.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ordersContainer = document.querySelector('.orders');
            if (ordersContainer) {
                ordersContainer.addEventListener('click', function(event) {
                    const target = event.target;
                    if (target.classList.contains('order-button')) {
                        const orderBlock = target.closest('.order');
                        if (orderBlock) {
                            const orderId = orderBlock.dataset.orderId;
                            const action = target.dataset.action;
                            fetch('/includes/actions/admin_update_order_status.inc.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/x-www-form-urlencoded'
                                    },
                                    body: 'order_id=' + encodeURIComponent(orderId) + '&action=' + encodeURIComponent(action)
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        orderBlock.querySelectorAll('.order-button').forEach(btn => btn.classList.remove('active'));
                                        target.classList.add('active');
                                    } else {
                                        if (window.showMessage) {
                                            console.error('Не удалось обновить статус: ' + data.message);
                                        } else {
                                            console.error('Не удалось обновить статус: ' + data.message);
                                        }
                                    }
                                })
                                .catch(error => console.error(error));
                        }
                    }
                });
            }
        });
    </script>
</body>

</html>