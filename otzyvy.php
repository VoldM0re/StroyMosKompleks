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
                $stmt = $pdo->prepare(
                    "SELECT 
                    reviews.review_text,
                    reviews.created_at,
                    reviews.user_id,
                    users.first_name,
                    users.last_name,
                    users.profile_image_url
                FROM
                    reviews
                LEFT JOIN
                    users ON reviews.user_id = users.id
                WHERE
                    reviews.review_status = 'accepted'
                ORDER BY
                    reviews.created_at DESC;"
                );
                $stmt->execute();
                $acceptedReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if ($acceptedReviews):
                    foreach ($acceptedReviews as $review):
                        $hasUserId = isset($review['user_id']);
                        $profileImageUrl = $hasUserId && $review['profile_image_url'] ? '/assets/uploads/profile_pictures/' . htmlspecialchars($review['profile_image_url']) : '/assets/uploads/profile_pictures/default_pfp.png';
                        $userName = $hasUserId ? htmlspecialchars($review['first_name']) . ' ' . mb_substr(htmlspecialchars($review['last_name']), 0, 1, 'UTF-8') . '.' : 'Аккаунт удалён';
                        $reviewDate = isset($review['created_at']) ? (new DateTime($review['created_at']))->format('d.m.Y') : '';
                ?>
                        <div class='review'>
                            <div class='review-user'>
                                <img loading='lazy' width='40' height='40' class='review-user-pfp' src='<?= $profileImageUrl ?>' alt='Фото профиля'>
                                <h3><?= $userName ?></h3>
                            </div>
                            <p class='review-text'><?= htmlspecialchars($review['review_text']) ?></p>
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
                            <div class="textarea-block">
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
                <a class='action_button actbtn-w' href='registration.php?referer=<?= htmlspecialchars($_SERVER["REQUEST_URI"]) ?>'>Зарегистрироваться</a>
            </div>
        <?php } ?>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
    <script src="/js/textarea.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            <?php
            $message = $_SESSION['message'] ?? null;
            unset($_SESSION['message']); ?>
            <?php if ($message): ?>
                const message = <?= json_encode($message); ?>;
                const messageHTML = `
                <div class='message-block ${message.type}'>
                    <div class='message'>
                        <svg class='message-icon' viewBox='0 0 13 13' fill='none' xmlns='http://www.w3.org/2000/svg'>
                            <path fill-rule='evenodd' clip-rule='evenodd' d='M6.5 12.5C7.28793 12.5 8.06815 12.3448 8.7961 12.0433C9.52405 11.7417 10.1855 11.2998 10.7426 10.7426C11.2998 10.1855 11.7417 9.52405 12.0433 8.7961C12.3448 8.06815 12.5 7.28793 12.5 6.5C12.5 5.71207 12.3448 4.93185 12.0433 4.2039C11.7417 3.47595 11.2998 2.81451 10.7426 2.25736C10.1855 1.70021 9.52405 1.25825 8.7961 0.956723C8.06815 0.655195 7.28793 0.5 6.5 0.5C4.9087 0.5 3.38258 1.13214 2.25736 2.25736C1.13214 3.38258 0.5 4.9087 0.5 6.5C0.5 8.0913 1.13214 9.61742 2.25736 10.7426C3.38258 11.8679 4.9087 12.5 6.5 12.5ZM6.34533 8.92667L9.67867 4.92667L8.65467 4.07333L5.788 7.51267L4.30467 6.02867L3.362 6.97133L5.362 8.97133L5.878 9.48733L6.34533 8.92667Z'
                                    fill='currentColor' />
                            </svg>
                            <p class='message-text'>${message.text}</p>
                        </div>
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