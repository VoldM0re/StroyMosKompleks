<?php session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php';

$service_id = $_GET['service_id'] ?? null;
if ($service_id) {
    $service = query($pdo, "SELECT * FROM `services` WHERE `id` = :id LIMIT 1;", [':id' => $service_id], 'fetch');
    if (!$service) redirect('/error_page.php');
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
    <meta name='description' content='<?= $service['short_description'] ?>'>
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
                    <div class='service_info-main' data-service-id='<?= $service_id ?>'>
                        <img class='service_info-img' src='/assets/uploads/services_images/<?= $service['image_url'] ?>' alt='Изображение услуги' />
                        <div class='service_info-main-text'>
                            <h3 class='service_info_title'><?= $service['name'] ?></h3>
                            <p class='service_info_price'><?= $service['price'] != null ? "от {$service['price']} ₽{$price_units}" : 'Цена договорная' ?></p>
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
                    <?php if (isset($_SESSION['user'])):
                        $is_in_cart = query($pdo, "SELECT COUNT(*) FROM `cart_items` WHERE `user_id` = :user_id AND `service_id` = :service_id;", [':user_id' => $_SESSION['user']['id'] ?? null, ':service_id' => $service_id], 'fetchColumn') ?? null; ?>
                        <button id='cartAction' class='action_button <?php echo $is_in_cart ? 'actbtn-w' : 'actbtn-o'; ?>' data-action="<?php echo $is_in_cart ? 'remove_from_cart' : 'add_to_cart'; ?>">
                            <?php echo $is_in_cart ? 'В корзине' : 'Добавить в корзину'; ?>
                        </button>
                    <?php else: ?>
                        <a href="/login.php?referer=<?= urlencode($_SERVER['REQUEST_URI']) ?>" class="action_button actbtn-o">Добавить в корзину</a>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </main>
    <?php include 'includes/components/footer.php'; ?>
    <script>
        const serviceId = document.querySelector('.service_info-main').dataset.serviceId;
        const cartActionButton = document.querySelector('#cartAction');

        cartActionButton.addEventListener('click', () => {
            const action = cartActionButton.dataset.action;
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
                        data.count > 0 ?
                            counter.classList.remove('hidden') :
                            counter.classList.add('hidden')

                        cartActionButton.classList.remove('actbtn-o', 'actbtn-w');
                        cartActionButton.classList.add(data.button_class);
                        cartActionButton.innerHTML = data.button_text;
                        cartActionButton.dataset.action = data.new_action;
                    } else {
                        alert('Ошибка: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Ошибка при отправке запроса:', error);
                    alert('Произошла ошибка.');
                });
        });
    </script>
</body>

</html>