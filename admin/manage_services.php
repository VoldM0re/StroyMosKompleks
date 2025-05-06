<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: /error_page.php');
    exit();
}
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
function services_list($title, $caregory)
{ ?>
    <h2 class="block-title"><?= $title ?></h2>
    <div class='services_cards'>
        <form action='/includes/actions/add_service.inc.php' method='POST' class='service_card new_service'>
            <img class='service-img' src='' alt='Изображение услуги' />
            <div class='service_card-text-block'>
                <h3>Категория</h3>
                <select name="category">
                    <option value="alpinism" <?= $caregory == 'alpinism' ? 'selected' : '' ?>>Промышленный альпинизм</option>
                    <option value="construction" <?= $caregory == 'construction' ? 'selected' : '' ?>>Строительные работы</option>
                    <option value="finishing" <?= $caregory == 'finishing' ? 'selected' : '' ?>>Отделочные работы</option>
                    <option value="design" <?= $caregory == 'design' ? 'selected' : '' ?>>Проектирование и дизайн</option>
                </select>
                <h3>Название</h3>
                <textarea rows="2" class='service_title' name='name' required placeholder="Введите название услуги"></textarea>
                <h3>Краткое описание</h3>
                <textarea rows="4" class='service_description' name='short_description' required placeholder="Введите краткое описание услуги"></textarea>
                <h3>Полное описание</h3>
                <textarea rows="12" class='service_description' name='full_description' required placeholder="Введите полное описание услуги"></textarea>
                <h3>Ценообразование</h3>
                <textarea rows="4" class='service_description' name='price_info' required placeholder="Опишите ценообразование услуги"></textarea>
                <h3>Цена</h3>
                <select class="price_units" name="price_units">
                    <option id='noPrice' value="">Договорная</option>
                    <option value="m2">за м²</option>
                    <option value="pog_m">пог. м</option>
                </select>
                <p class='service_price'>от <input type="text" name="price" value="0" required>₽</p>
            </div>
            <button class='action_button actbtn-o'>Добавить</button>
        </form>
        <?php
        global $pdo;
        $stmt = $pdo->prepare("SELECT * FROM `services` WHERE `category` = :category;");
        $stmt->execute([':category' => $caregory]);
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($services):
            foreach ($services as $service): ?>
                <form action='/includes/actions/update_service.inc.php' method='POST' class='service_card'>
                    <img class='service-img' src='/assets/uploads/services_images/<?= $service['image_url'] ?>' alt='Изображение услуги' />
                    <div class='service_card-text-block'>
                        <input type="hidden" name="id" value="<?= $service['id'] ?>">
                        <h3>Категория</h3>
                        <select name="category">
                            <option value="alpinism" <?= $service['category'] == 'alpinism' ? 'selected' : '' ?>>Промышленный альпинизм</option>
                            <option value="construction" <?= $service['category'] == 'construction' ? 'selected' : '' ?>>Строительные работы</option>
                            <option value="finishing" <?= $service['category'] == 'finishing' ? 'selected' : '' ?>>Отделочные работы</option>
                            <option value="design" <?= $service['category'] == 'design' ? 'selected' : '' ?>>Проектирование и дизайн</option>
                        </select>
                        <h3>Название</h3>
                        <textarea rows="2" class='service_title' name='name' required placeholder="Введите название услуги"><?= $service['name'] ?></textarea>
                        <h3>Краткое описание</h3>
                        <textarea rows="4" class='service_description' name='short_description' required
                            placeholder="Введите краткое описание услуги"><?= $service['short_description'] ?></textarea>
                        <h3>Полное описание</h3>
                        <textarea rows="12" class='service_description' name='full_description' required
                            placeholder="Введите полное описание услуги"><?= $service['full_description'] ?></textarea>
                        <h3>Ценообразование</h3>
                        <textarea rows="4" class='service_description' name='price_info' required placeholder="Опишите ценообразование услуги"><?= $service['price_info'] ?></textarea>
                        <h3>Цена</h3>
                        <select class="price_units" name="price_units">
                            <option id='noPrice' value="" <?= $service['price'] == null ? 'selected' : '' ?>>Договорная</option>
                            <option value="m2" <?= $service['price_units'] == 'm2' ? 'selected' : '' ?>>за м²</option>
                            <option value="pog_m" <?= $service['price_units'] == 'pog_m' ? 'selected' : '' ?>>пог. м</option>
                        </select>
                        <p class='service_price'>от <input type="text" name="price" value="<?= $service['price'] ?>" required>₽</p>
                    </div>
                    <div class="action_buttons">
                        <button class='action_button actbtn-w' type="button" onclick="deleteService(<?= $service['id'] ?>)">Удалить</button>
                        <button class='action_button actbtn-o'>Сохранить</button>
                    </div>
                </form>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
<?php } ?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Управление услугами - СтройМосКомплекс</title>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/manage_services.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/header.php'; ?>
    <main>
        <section class='services_cards-wrapper container'>
            <h2>Управление услугами</h2>
            <?php
            services_list('Промышленный альпинизм', 'alpinism');
            services_list('Строительные работы', 'construction');
            services_list('Отделочные работы', 'finishing');
            services_list('Дизайн и проектирование', 'design');
            ?>
        </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/footer.php'; ?>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/message_handler.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const selects = document.querySelectorAll('.price_units');
            selects.forEach((select) => {
                const price = select.parentNode.querySelector('.service_price');
                const priceParent = price.parentNode;

                function togglePrice() {
                    select.value === '' ?
                        price.remove() :
                        priceParent.append(price)
                }

                togglePrice();
                select.addEventListener('change', togglePrice);
            });
        });

        function deleteService(serviceId) {
            if (confirm("Вы уверены, что хотите удалить эту услугу?")) {
                window.location.href = '/includes/actions/delete_service.inc.php?id=' + serviceId;
            }
        }
    </script>
</body>

</html>