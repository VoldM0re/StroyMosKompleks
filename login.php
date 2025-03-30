<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Вход</title>
    <meta name='description' content='Вход на сайт СтройМосКомплекс'>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/login.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>

    <main>
        <section class='sign-wrapper container'>
            <h2>Вход в профиль</h2>
            <form class='sign__form' action='includes/actions/login.inc.php' method='post'>
                <div class='sign__inputs'>
                    <div class='sign__inputs-textfields'>

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
                                <svg class='sign__textfield-icon' width='12' height='15'>
                                    <use href='/assets/svg/signForm_sprite.svg#pwd'></use>
                                </svg>
                                <span>Пароль</span>
                            </div>
                            <input class='sign__textfield' type='password' name='pwd' placeholder='Пароль' required>
                        </div>
                    </div>

                    <?php $actbtn_text = 'Войти';
                    $color = 'o';
                    require_once 'includes/components/action_button.php' ?>

                </div>

                <p class='sign_other-text'>
                    Нет аккаунта?<br>
                    <a class='sign_other-link' href='registration.php'>Зарегистрироваться</a>
                </p>

            </form>
        </section>
    </main>

    <?php require_once 'includes/components/footer.php'; ?>
</body>

</html>