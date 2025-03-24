<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Отзывы</title>
    <meta name='description' content='Отзывы о компании СтройМосКомплекс'>
    <link rel='stylesheet' href='/css/pages/otzyvy.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>
    <main>
        <div class='reviews-wrapper container'>
            <h2>Отзывы наших клиентов</h2>
            <div class='reviews'>
                <div class='review'>
                    <div class='review-user'>
                        <img loading='lazy' width='40' height='40' class='review-user-pfp'
                            src='/assets/img/avatars/irina.webp' alt='Фото профиля'>
                        <h3>Ирина Ё.</h3>
                    </div>
                    <p class='review-text'>
                        "СтройМосКомплекс" провёл реконструкцию нашего загородного дома. Работа заняла 6 месяцев.
                        Команда профессионалов учла все наши пожелания, проект был завершён в срок, результат превзошёл
                        все ожидания!!
                    </p>
                </div>
                <div class='review'>
                    <div class='review-user'>
                        <img loading='lazy' width='40' height='40' class='review-user-pfp'
                            src='/assets/img/avatars/pavel.webp' alt='Фото профиля'>
                        <h3>Павел Т.</h3>
                    </div>
                    <p class='review-text'>
                        Заказывал здесь редизайн офиса для нашей компании. Работали быстро, качественно, учли все
                        детали. Доволен результатом.
                    </p>
                </div>
                <div class='review'>
                    <div class='review-user'>
                        <img loading='lazy' width='40' height='40' class='review-user-pfp'
                            src='/assets/img/avatars/default_pfp.webp' alt='Фото профиля'>
                        <h3>Абдул Х.</h3>
                    </div>
                    <p class='review-text'>
                        Отличная работа, дом построили идеально и в срок!
                    </p>
                </div>
                <div class='review'>
                    <div class='review-user'>
                        <img loading='lazy' width='40' height='40' class='review-user-pfp'
                            src='/assets/img/avatars/default_pfp.webp' alt='Фото профиля'>
                        <h3>Наталья Д.</h3>
                    </div>
                    <p class='review-text'>
                        Мне очень понравилось!! Спасибо за качественный сервис!!!
                    </p>
                </div>
                <div class='review'>
                    <div class='review-user'>
                        <img loading='lazy' width='40' height='40' class='review-user-pfp'
                            src='/assets/img/avatars/default_pfp.webp' alt='Фото профиля'>
                        <h3>Яша Л.</h3>
                    </div>
                    <p class='review-text'>
                        Заказывали строительство загородного дома в "СтройМосКомплекс". Понравился профессиональный
                        подход: всё выполнено качественно, в срок, с учётом наших пожеланий. Дом получился красивым и
                        уютным, рекомендуем!
                    </p>
                </div>
            </div>
            <?php $color = 'w';
            $actbtn_text = 'Показать все отзывы';
            require_once 'includes/components/action_button.php'; ?>
        </div>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
</body>

</html>