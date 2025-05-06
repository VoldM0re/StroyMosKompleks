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

    <main>
        <section class='profile-wrapper container'>
            <h2>Ваш профиль</h2>
            <form class="profile__card sign__form" method="post" action='includes/actions/update_user.inc.php' enctype='multipart/form-data'>
                <div class="avatar_block">
                    <div class="avatar_block-buttons">
                        <label for="avatar_file">
                            <div class="avatar">
                                <img id='profile-image'
                                    src="<?= isset($_SESSION['user']['profile_image_url']) ? '/assets/uploads/profile_pictures/' . $_SESSION['user']['profile_image_url'] : '/assets/img/avatars/default_pfp.png' ?>"
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
                            <input class='sign__textfield' type='tel' name='phone' placeholder='+71234567890' value="<?= htmlspecialchars($_SESSION['user']['phone'] ?? '') ?>">
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
        </section>
    </main>

    <?php require_once 'includes/components/footer.php'; ?>
    <script src="/js/textarea.js"></script>
    <script>
        // Предварительный просмотр изображения
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
            pfp.src = '/assets/img/avatars/default_pfp.png';
            document.getElementById('avatar_file').value = '';
            document.getElementById('delete_avatar').value = '1';
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php
            $message = $_SESSION['message'] ?? null;
            unset($_SESSION['message']); ?>
            <?php if ($message): ?>
                const message = <?= json_encode($message); ?>;
                messageIcon = message.type == 'error' ?
                    `<svg class='message-icon' viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg" >
                        <path d="M4.34 9.5L6.5 7.34L8.66 9.5L9.49999 8.66L7.34 6.5L9.49999 4.34L8.66 3.5L6.5 5.66L4.34 3.5L3.5 4.34L5.66 6.5L3.5 8.66L4.34 9.5ZM6.5 12.5C5.67 12.5 4.89 12.3424 4.16 12.0272C3.43 11.712 2.795 11.2846 2.255 10.745C1.715 10.2054 1.2876 9.5704 0.972801 8.84C0.658001 8.1096 0.500401 7.3296 0.500001 6.5C0.499601 5.6704 0.657201 4.8904 0.972801 4.16C1.2884 3.4296 1.7158 2.7946 2.255 2.255C2.7942 1.7154 3.4292 1.288 4.16 0.9728C4.8908 0.6576 5.6708 0.5 6.5 0.5C7.3292 0.5 8.1092 0.6576 8.83999 0.9728C9.57079 1.288 10.2058 1.7154 10.745 2.255C11.2842 2.7946 11.7118 3.4296 12.0278 4.16C12.3438 4.8904 12.5012 5.6704 12.5 6.5C12.4988 7.3296 12.3412 8.1096 12.0272 8.84C11.7132 9.5704 11.2858 10.2054 10.745 10.745C10.2042 11.2846 9.56919 11.7122 8.83999 12.0278C8.1108 12.3434 7.3308 12.5008 6.5 12.5Z" fill="currentColor" />
                    </svg>` :
                    `<svg class='message-icon' viewBox='0 0 13 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path fill-rule='evenodd' clip-rule='evenodd' d='M6.5 12.5C7.28793 12.5 8.06815 12.3448 8.7961 12.0433C9.52405 11.7417 10.1855 11.2998 10.7426 10.7426C11.2998 10.1855 11.7417 9.52405 12.0433 8.7961C12.3448 8.06815 12.5 7.28793 12.5 6.5C12.5 5.71207 12.3448 4.93185 12.0433 4.2039C11.7417 3.47595 11.2998 2.81451 10.7426 2.25736C10.1855 1.70021 9.52405 1.25825 8.7961 0.956723C8.06815 0.655195 7.28793 0.5 6.5 0.5C4.9087 0.5 3.38258 1.13214 2.25736 2.25736C1.13214 3.38258 0.5 4.9087 0.5 6.5C0.5 8.0913 1.13214 9.61742 2.25736 10.7426C3.38258 11.8679 4.9087 12.5 6.5 12.5ZM6.34533 8.92667L9.67867 4.92667L8.65467 4.07333L5.788 7.51267L4.30467 6.02867L3.362 6.97133L5.362 8.97133L5.878 9.48733L6.34533 8.92667Z' fill='currentColor' />
                    </svg> `;

                const messageHTML = `
                <div class='message-block ${message.type}'>
                    <div class='message'>
                        ${messageIcon}
                        <p class='message-text'>${message.text}</p>
                    </div>
                </div> `;

                const mainElement = document.querySelector('main');
                mainElement.insertAdjacentHTML('afterbegin', messageHTML);
                const messageBlock = mainElement.querySelector('.message-block');

                messageBlock.classList.add('show');
                setTimeout(() => {
                    messageBlock.classList.remove('show');
                    setTimeout(() => {
                        mainElement.removeChild(messageBlock);
                    }, 300);
                }, 4000);
            <?php endif; ?>
        });
    </script>
</body>

</html>