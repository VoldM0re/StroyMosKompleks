<?php session_start(); ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Отзывы</title>
    <meta name='description' content='Отзывы о компании СтройМосКомплекс'>
    <meta name='robots' content='index, follow'>
    <link rel='stylesheet' href='/css/pages/otzyvy.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>
    <main>
        <div class='reviews-wrapper container'>
            <h2>Отзывы наших клиентов</h2>
            <div class='reviews'>

                <?php
                require_once 'includes/db.php';
                $stmt = $pdo->prepare("SELECT reviews.review_text, reviews.created_at, reviews.user_id, users.first_name, users.last_name, users.profile_image_url FROM reviews LEFT JOIN users ON reviews.user_id = users.id ORDER BY reviews.created_at DESC;");
                $stmt->execute();
                $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($reviews) {
                    foreach ($reviews as $review) {
                        echo /*html*/ "
                        <div class='review'>
                            <div class='review-user'>
                                <img loading='lazy' width='40' height='40' class='review-user-pfp'
                                    src='/assets/uploads/profile_pictures/" . (isset($review['user_id']) ? $review['profile_image_url'] : 'default_pfp.png') . "' alt='Фото профиля'>
                                <h3>" . (isset($review['user_id']) ? ($review['first_name'] . ' ' . mb_substr($review['last_name'], 0, 1, 'UTF-8') . '.') : 'Аккаунт удалён') . "</h3>
                            </div>
                            <p class='review-text'>" . $review['review_text'] . "</p>
                            <small>" . explode(' ', $review['created_at'])[0] . "</small>
                        </div> ";
                    }
                } else {
                    echo "
                    <div class='review'>
                        <div class='review-user'>
                            <h3>Отзывов пока нет</h3>
                        </div>
                    </div> ";
                } ?>
            </div>
        </div>

        <?php
        if (isset($_SESSION['user'])) {
            $userIds = array_column($reviews, 'user_id');
            if (in_array($_SESSION['user']['id'], $userIds)) {
                echo "
                <div class='leave_review container'>
                    <h2>Оставьте свой отзыв</h2>
                    <div class='leave_review-block'>
                        <p class='leave_review-text'>Вы уже оставили свой отзыв.</p>
                    </div>
                </div> ";
            } else {
                echo "
                <form class='leave_review container' action='includes/actions/add_review.inc.php' method='post'>
                    <h2>Оставьте свой отзыв</h2>
                    <div class='leave_review-block'>
                        <input type='hidden' name='redirect_url' value=" . $_SERVER['REQUEST_URI'] . ">
                        <textarea class='textarea' oninput='updateArea(this)' name='review_text' maxlength='200'
                            placeholder='Пишите здесь, максимум 200 символов' required></textarea>
                        <small class='chars_counter'>0/200</small>
                    </div>
                    <button class='action_button actbtn-o'>Отправить</button>
                </form> ";
            }
        } else {
            echo "
            <div class='leave_review container'>
                <h2>Оставьте свой отзыв</h2>
                <div class='leave_review-block'>
                    <p class='leave_review-text'>Чтобы оставить отзыв, войдите в аккаунт или зарегистрируйтесь</p>
                </div>
                <a class='action_button actbtn-o' href='login.php?referer=" . urlencode($_SERVER['REQUEST_URI']) . "'>Войти</a>
                <a class='action_button actbtn-w' href='registration.php?referer=" . $_SERVER["REQUEST_URI"] . "'>Зарегистрироваться</a>
            </div> ";
        } ?>

    </main>
    <?php require_once 'includes/components/footer.php'; ?>
    <script src="/js/textarea.js"></script>
</body>

</html>