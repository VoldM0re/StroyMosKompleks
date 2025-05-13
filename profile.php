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
    <link rel='stylesheet' href='/css/pages/profile.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>

    <main class="container">
        <h2>Ваш профиль</h2>
        <section class='profile-wrapper'>
            <form class="profile__card sign__form" method="post" action='includes/actions/user_update.inc.php' enctype='multipart/form-data'>
                <div class="avatar_block">
                    <div class="avatar_block-buttons">
                        <label for="avatar_file">
                            <div class="avatar">
                                <img id='profile-image'
                                    src="<?= isset($_SESSION['user']['profile_image_url']) ? '/assets/uploads/profile_pictures/' . $_SESSION['user']['profile_image_url'] : '/assets/uploads/profile_pictures/default_pfp.png' ?>"
                                    alt="Фото профиля">
                            </div>
                        </label>
                        <input style="display: none;" name="avatar_file" id="avatar_file" type="file" accept="image/png, image/jpeg">
                        <input type="hidden" id="delete_avatar" name="delete_avatar" value="0">

                        <input type="button" class="action_button actbtn-w" value="Удалить фото" onclick="deleteAvatar()">
                    </div>
                </div>
                <div class="sign__inputs">
                    <div class="sign__inputs-textfields">
                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='15' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#person'></use>
                                </svg>
                                <span>Имя<span class="requred_star">*</span></span>
                            </div>
                            <input class='sign__textfield' type='text' name='first_name' placeholder='Иван' required
                                value="<?= htmlspecialchars($_SESSION['user']['first_name']) ?? '' ?>">
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='14' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#person'></use>
                                </svg>
                                <span>Фамилия<span class="requred_star">*</span></span>
                            </div>
                            <input class='sign__textfield' type='text' name='last_name' placeholder='Иванов' required
                                value="<?= htmlspecialchars($_SESSION['user']['last_name'] ?? '') ?>">
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='14' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#person'></use>
                                </svg>
                                <span>Отчество</span>
                            </div>
                            <input class='sign__textfield' type='text' name='patronymic' placeholder='Иванович'
                                value="<?= htmlspecialchars($_SESSION['user']['patronymic'] ?? '') ?>">
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='13' height='13'>
                                    <use href='/assets/svg/signForm_sprite.svg#mail'></use>
                                </svg>
                                <span>Логин (Почта)</span>
                            </div>
                            <div class='sign__textfield readonly-field'><?= htmlspecialchars($_SESSION['user']['email'] ?? 'noemail@mail.ru') ?></div>
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='14' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#tel'></use>
                                </svg>
                                <span>Телефон<span class="requred_star">*</span></span>
                            </div>
                            <input id="phoneInput" oninput="formatPhoneNumber(this)" class='sign__textfield' type='tel' name='phone' placeholder='+71234567890' value="<?= htmlspecialchars($_SESSION['user']['phone'] ?? '') ?>">
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
                                    maxlength='200'><?= htmlspecialchars($_SESSION['user']['address'] ?? '') ?></textarea>
                                <small class='chars_counter'>0/200</small>
                            </div>
                        </div>

                        <button class="action_button actbtn-w">Сохранить</button>

                        <?php if ($_SESSION['user']['role'] == 'admin'): ?>
                            <a class='action_button actbtn-o' href='/admin/manage_reviews.php'>
                                <span>Управление отзывами</span>
                            </a>
                            <a class='action_button actbtn-o' href='/admin/manage_services.php'>
                                <span>Управление услугами</span>
                            </a>
                            <a class='action_button actbtn-o' href='/admin/manage_orders.php'>
                                <span>Управление заказами</span>
                            </a>
                        <?php endif; ?>

                        <a class='logout-button' href='/includes/actions/logout.inc.php'>
                            <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M7.78496 6.27197V9.12197H0.157715L0.157715 11.022H7.78496V13.872L12.552 10.072L7.78496 6.27197Z" fill="#222222" />
                                <path
                                    d="M2.74561 12.922H4.65242V17.672H16.0933V2.47196H4.65242V7.22196H2.74561V1.52196C2.74561 1.27 2.84605 1.02837 3.02485 0.850209C3.20365 0.672049 3.44615 0.57196 3.69901 0.57196L17.0467 0.57196C17.2995 0.57196 17.542 0.672049 17.7208 0.850209C17.8996 1.02837 18.0001 1.27 18.0001 1.52196V18.622C18.0001 18.8739 17.8996 19.1156 17.7208 19.2937C17.542 19.4719 17.2995 19.572 17.0467 19.572H3.69901C3.44615 19.572 3.20365 19.4719 3.02485 19.2937C2.84605 19.1156 2.74561 18.8739 2.74561 18.622L2.74561 12.922Z"
                                    fill="currentColor" />
                            </svg>
                            <span>Выйти из аккаунта</span>
                        </a>
                    </div>
                </div>
            </form>
            <section class="orders-wrapper">
                <div class="orders">
                    <h3 class="orders-block-title">Ваши заказы</h3>
                    <?php require_once 'includes/helpers.php'; ?>
                    <?php $orders = query($pdo, "SELECT orders.*, services.image_url, orders.service_id FROM `orders` LEFT JOIN `services` ON orders.service_id = services.id WHERE orders.user_id = :user_id ORDER BY orders.created_at DESC;", [':user_id' => $_SESSION['user']['id']]);
                    $status_list = ['accepted' => 'Принят', 'pending' => 'В обработке', 'rejected' => 'Отклонён',];
                    if ($orders):
                        foreach ($orders as $order): ?>
                            <div class="order">
                                <a class="order-top" href="/service.php?service_id=<?= $order['service_id'] ?>">
                                    <div class="order-img-block" class="cart_service-img">
                                        <img class="order-img" src='/assets/uploads/services_images/<?= $order['image_url'] ?>' alt='Фото услуги' loading='lazy'>
                                    </div>
                                    <h3 class="order-top-text"><?= htmlspecialchars($order['service_name']) ?></h3>
                                </a>
                                <div class="order-main">
                                    <div class="order-text">
                                        <div class="order-text-block">
                                            <h4 class="order-text-title">Заказ на имя: </h4>
                                            <p class="order-text-description"><?= nl2br(htmlspecialchars($order['first_name'])) ?></p> <!-- Use nl2br for address/comment -->
                                        </div>
                                        <div class="order-text-block">
                                            <h4 class="order-text-title">Указанный телефон: </h4>
                                            <p class="order-text-description"><?= nl2br(htmlspecialchars($order['phone'])) ?></p> <!-- Use nl2br for address/comment -->
                                        </div>
                                        <div class="order-text-block">
                                            <h4 class="order-text-title">Указанный адрес: </h4>
                                            <p class="order-text-description"><?= nl2br(htmlspecialchars($order['address'])) ?></p> <!-- Use nl2br for address/comment -->
                                        </div>
                                        <?php if (isset($order['comment'])): ?>
                                            <div class="order-text-block">
                                                <h4 class="order-text-title">Ваш комментарий: </h4>
                                                <p class="order-text-description"><?= nl2br(htmlspecialchars($order['comment'])) ?></p>
                                            </div>
                                        <?php endif; ?>
                                        <div class="order-bottom-info">
                                            <div class="order-text-block">
                                                <h4 class="order-text-title">Дата заказа: </h4>
                                                <p class="order-text-description"><?= htmlspecialchars($order['created_at']) ?></p>
                                            </div>
                                            <p class="order-bottom-status <?= htmlspecialchars($order['status']) ?>"><?= htmlspecialchars($status_list[$order['status']]) ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <h3 class="orders-block-title">У вас пока нет заказов</h3>
                    <?php endif; ?>
                </div>
            </section>
        </section>
    </main>

    <?php require_once 'includes/components/footer.php'; ?>
    <?php require_once 'includes/components/message_handler.php'; ?>
    <script src="/js/textarea.js"></script>
    <script src="/js/format_phone.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            formatPhoneNumber(document.getElementById('phoneInput'));
        });

        // Предварительный просмотр аватарки
        document.getElementById('avatar_file').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                document.getElementById('delete_avatar').value = '0';
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('profile-image').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        function deleteAvatar() {
            const pfp = document.getElementById('profile-image');
            pfp.src = '/assets/uploads/profile_pictures/default_pfp.png';
            document.getElementById('avatar_file').value = '';
            document.getElementById('delete_avatar').value = '1';
        }
    </script>
</body>

</html>