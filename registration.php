<?php
session_start();
if (isset($_GET['referer'])) $_SESSION['referer'] = $_GET['referer'];
if (isset($_SESSION['user'])) header('Location: /profile.php');
?>

<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Регистрация</title>
    <meta name='description' content='Регистрация на сайте СтройМосКомплекс'>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/registration.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>
    <main>
        <section class='sign-wrapper container'>
            <h2>Регистрация</h2>
            <form class='sign__form' action='includes/actions/reg.inc.php' method='post'>
                <div class='sign__inputs'>
                    <?php
                    if (isset($_SESSION['message'])) {
                        echo "<p class='sign-error'>{$_SESSION['message']['text']}</p>";
                        unset($_SESSION['message']);
                    } ?>
                    <div class='sign__inputs-textfields'>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='15' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#person'></use>
                                </svg>
                                <span>Ваше имя</span>
                            </div>
                            <input class='sign__textfield' type='text' name='first_name' placeholder='Иван' required>
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='14' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#person'></use>
                                </svg>
                                <span>Ваша фамилия</span>
                            </div>
                            <input class='sign__textfield' type='text' name='last_name' placeholder='Иванов' required>
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='13' height='13'>
                                    <use href='/assets/svg/signForm_sprite.svg#mail'></use>
                                </svg>
                                <span>Логин (Почта)</span>
                            </div>
                            <input class='sign__textfield' type='email' name='email' placeholder='example@mail.ru' required>
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='14' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#tel'></use>
                                </svg>
                                <span>Телефон</span>
                            </div>
                            <input id='phoneInput' class='sign__textfield' type='tel' name='phone' placeholder='+71234567890' required>
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='12' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#pwd'></use>
                                </svg>
                                <span>Придумайте пароль</span>
                            </div>
                            <input class='sign__textfield' type='password' name='pwd' placeholder='Пароль' required>
                        </div>

                        <div class='sign__textfield-block'>
                            <div class="sign__textfield-text">
                                <svg class='sign__textfield-icon' width='12' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#pwd'></use>
                                </svg>
                                <span>Повторите пароль</span>
                            </div>
                            <input class='sign__textfield' type='password' name='pwdVerify' placeholder='Пароль ещё раз' required>
                        </div>
                    </div>
                    <button class='action_button actbtn-o'>Зарегистрироваться</button>
                </div>
                <p class='sign_other-text'>
                    Уже зарегистрированы?<br>
                    <a class='sign_other-link' href='login.php'>Войти в аккаунт</a>
                </p>
                <p class='sign_other-text'>
                    <label class="policy_accept" for="policy">
                        <input id="policy" type="checkbox" name="policy" required>
                        Я соглашаюсь с <a class='sign_other-link' href='/privacy.php'>политикой</a> в отношении персональных данных
                    </label>
                </p>
            </form>
        </section>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
    <script src="/js/format_phone.js"></script>
</body>

</html>