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
                <?php require_once 'includes/db.php';
                $stmt = $pdo->prepare(
                    "SELECT 
                    reviews.review_text,
                    reviews.created_at,
                    reviews.user_id,
                    users.first_name,
                    users.last_name,
                    users.profile_image_url
                FROM reviews
                LEFT JOIN users ON reviews.user_id = users.id
                WHERE reviews.review_status = 'accepted'
                ORDER BY reviews.created_at DESC;"
                );
                $stmt->execute();
                $acceptedReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($acceptedReviews):
                    foreach ($acceptedReviews as $review):
                        $reviewDate = isset($review['created_at']) ? (new DateTime($review['created_at']))->format('d.m.Y') : '';
                        $userName = isset($review['first_name']) ? ($review['first_name'] . ' ' . mb_substr($review['last_name'], 0, 1, 'UTF-8') . '.') : 'Аккаунт удалён';
                        $userAvatar = isset($review['profile_image_url']) ? $review['profile_image_url'] : 'default_pfp.png'; ?>
                        <div class='review'>
                            <div class='review-user'>
                                <img loading='lazy' width='40' height='40' class='review-user-pfp'
                                    src='/assets/uploads/profile_pictures/<?= $userAvatar  ?>' alt='Фото профиля'>
                                <h3><?= $userName ?></h3>
                            </div>
                            <p class='review-text'><?= $review['review_text'] ?></p>
                            <small><?= $reviewDate ?></small>
                        </div>
                    <?php endforeach;
                else: ?>
                    <div class='review' style='text-align: center;'>
                        <h3>Отзывов пока нет</h3>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <?php
        if (isset($_SESSION['user'])) {
            $userId = $_SESSION['user']['id'];

            $approvedReview = false;
            foreach ($acceptedReviews as $review) {
                if ($review['user_id'] == $userId) {
                    $approvedReview = true;
                    break;
                }
            }

            $stmt = $pdo->prepare(query: "SELECT 1 FROM reviews WHERE user_id = :user_id AND review_status = 'pending' LIMIT 1;");
            $stmt->execute([':user_id' => $userId]);
            $pendingReview = $stmt->fetchColumn();
        ?>
            <div class='leave_review container'>
                <h2>Оставьте свой отзыв</h2>
                <div class='leave_review-block'>
                    <?php if ($pendingReview): ?>
                        <p class='leave_review-text'>Ваш отзыв на рассмотрении модерации.</p>
                    <?php elseif ($approvedReview): ?>
                        <p class='leave_review-text'>Вы уже оставили свой отзыв.</p>
                    <?php else: ?>
                        <form class='leave_review-form' action='includes/actions/add_review.inc.php' method='post'>
                            <input type='hidden' name='redirect_url' value='<?= htmlspecialchars($_SERVER['REQUEST_URI']) ?>'>
                            <div class='textarea-block'>
                                <textarea class='textarea' oninput='updateArea(this)' name='review_text' maxlength='200' placeholder='Пишите здесь, максимум 200 символов' required
                                    autocomplete='off'></textarea>
                                <small class='chars_counter'>0/200</small>
                            </div>
                            <button class='action_button actbtn-w'>Отправить</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        <?php } else { ?>
            <div class='leave_review container'>
                <h2>Оставьте свой отзыв</h2>
                <div class='leave_review-block'>
                    <p class='leave_review-text'>Чтобы оставить отзыв, войдите в аккаунт или зарегистрируйтесь</p>
                </div>
                <a class='action_button actbtn-o' href='login.php?referer=<?= urlencode($_SERVER['REQUEST_URI']) ?>'>Войти</a>
                <a class='action_button actbtn-w' href='registration.php?referer=<?= urlencode($_SERVER['REQUEST_URI']) ?>'>Зарегистрироваться</a>
            </div>
        <?php } ?>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
    <?php require_once 'includes/components/message_handler.php'; ?>
    <script src='/js/textarea.js'></script>

</body>

</html>