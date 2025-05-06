<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: /error_page.php');
    exit();
} ?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Управление отзывами - СтройМосКомплекс</title>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/manage_reviews.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/header.php'; ?>
    <main>
        <section class='manage_reviews-wrapper container'>
            <h2>Добро пожаловать, <?= $_SESSION['user']['first_name'] ?></h2>
            <section class='manage_reviews-block'>
                <h3 class='manage_reviews-block-title'>Отзывы на рассмотрении</h3>
                <div class='reviews' id='pending-reviews'>
                    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
                    $stmt = $pdo->prepare("SELECT reviews.review_text, reviews.created_at, reviews.user_id, users.first_name, users.last_name, users.profile_image_url FROM reviews LEFT JOIN users ON reviews.user_id = users.id WHERE reviews.review_status = 'pending' ORDER BY reviews.created_at DESC;");
                    $stmt->execute();
                    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($reviews):
                        foreach ($reviews as $review):
                            $reviewDate = isset($review['created_at']) ? (new DateTime($review['created_at']))->format('d.m.Y') : ''; ?>
                            <div class='review-admin-block' data-review-id='<?= $review['user_id'] ?>'>
                                <div class='review'>
                                    <div class='review-user'>
                                        <img loading='lazy' width='40' height='40' class='review-user-pfp'
                                            src='/assets/uploads/profile_pictures/<?= isset($review['user_id']) ? $review['profile_image_url'] : 'default_pfp.png'  ?>' alt='Фото профиля'>
                                        <h3><?= isset($review['user_id']) ? ($review['first_name'] . ' ' . mb_substr($review['last_name'], 0, 1, 'UTF-8') . '.') : 'Аккаунт удалён' ?></h3>
                                    </div>
                                    <p class='review-text'><?= $review['review_text'] ?></p>
                                    <small><?= $reviewDate ?></small>
                                </div>

                                <div class='review-admin-actions'>
                                    <button class='review-action reject' id='review-action-reject' data-action='reject' data-full-text='Удалить' data-short-text='✖'
                                        title='Удалить'></button>
                                    <button class='review-action accept' id='review-action-accept' data-action='accept' data-full-text='Принять' data-short-text='✔'
                                        title='Опубликовать'></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class='review' id='emptyReviews' style='text-align: center;'>
                            <h3>Новых отзывов пока нет.</h3>
                        </div>
                    <?php endif ?>
                </div>
            </section>

            <section class='manage_reviews-block'>
                <h3 class='manage_reviews-block-title'>Опубликованные отзывы</h3>
                <div class='reviews' id='accepted-reviews'>
                    <?php
                    $stmt = $pdo->prepare("SELECT reviews.review_text, reviews.created_at, reviews.user_id, users.first_name, users.last_name, users.profile_image_url FROM reviews LEFT JOIN users ON reviews.user_id = users.id WHERE reviews.review_status = 'accepted' ORDER BY reviews.created_at DESC;");
                    $stmt->execute();
                    $acceptedReviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($acceptedReviews):
                        foreach ($acceptedReviews as $review):
                            $reviewDate = isset($review['created_at']) ? (new DateTime($review['created_at']))->format('d.m.Y') : ''; ?>
                            <div class='review-admin-block' data-review-id='<?= $review['user_id'] ?>'>
                                <div class='review'>
                                    <div class='review-user'>
                                        <img loading='lazy' width='40' height='40' class='review-user-pfp'
                                            src='/assets/uploads/profile_pictures/<?= isset($review['user_id']) ? $review['profile_image_url'] : 'default_pfp.png'  ?>' alt='Фото профиля'>
                                        <h3><?= isset($review['user_id']) ? ($review['first_name'] . ' ' . mb_substr($review['last_name'], 0, 1, 'UTF-8') . '.') : 'Аккаунт удалён' ?></h3>
                                    </div>
                                    <p class='review-text'><?= $review['review_text'] ?></p>
                                    <small><?= $reviewDate ?></small>
                                </div>

                                <div class='review-admin-actions'>
                                    <button class='review-action pend' id='review-action-pend' data-action='pend' data-full-text='Снять с публикации' data-short-text='🕙︎'
                                        title='Снять с публикации'></button>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div class='review' id='emptyReviews' style='text-align: center;'>
                            <h3>Опубликованных отзывов пока нет.</h3>
                        </div>
                    <?php endif ?>
            </section>
        </section>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reviewsContainers = document.querySelectorAll('.reviews');
            reviewsContainers.forEach(function(reviewsContainer) {
                reviewsContainer.addEventListener('click', function(event) {
                    const target = event.target;
                    if (target.classList.contains('review-action')) {
                        const action = target.dataset.action;
                        const reviewBlock = target.closest('.review-admin-block');

                        if (reviewBlock) {
                            const reviewId = reviewBlock.dataset.reviewId;
                            let targetContainer = '';
                            let url = '';
                            let confirmationMessage = '';

                            if (action === 'accept') {
                                targetContainer = document.querySelector('#accepted-reviews');
                                actionButtons =
                                    `<button class='review-action pend' id='review-action-pend' data-action='pend' data-full-text='Снять с публикации' data-short-text='🕙︎' title='Снять с публикации'></button>`;
                                url = 'includes/actions/admin_accept_review.inc.php';
                                confirmationMessage = 'Принять этот отзыв?';
                            } else if (action === 'pend') {
                                actionButtons = `
                                    <button class='review-action reject' id='review-action-reject' data-action='reject' data-full-text='Удалить' data-short-text='✖' title='Удалить'></button>
                                    <button class='review-action accept' id='review-action-accept' data-action='accept' data-full-text='Принять' data-short-text='✔' title='Опубликовать'></button>
                                `;
                                targetContainer = document.querySelector('#pending-reviews');
                                url = 'includes/actions/admin_pend_review.inc.php';
                                confirmationMessage = 'Снять с публикации этот отзыв?';
                            } else if (action === 'reject') {
                                url = 'includes/actions/admin_reject_review.inc.php';
                                confirmationMessage = 'Удалить этот отзыв?';
                            }

                            if (url && confirmationMessage && confirm(confirmationMessage)) {
                                fetch(url, {
                                        method: 'POST',
                                        headers: {
                                            'Content-Type': 'application/x-www-form-urlencoded'
                                        },
                                        body: 'review_id=' + encodeURIComponent(reviewId)
                                    })
                                    .then(response => response.json())
                                    .then(data => {
                                        if (data.success) {
                                            reviewBlock.remove();
                                            if (targetContainer) {
                                                reviewBlock.querySelector('.review-admin-actions').innerHTML = actionButtons;
                                                const emptyReviewMessage = targetContainer.querySelector('#emptyReviews');
                                                if (emptyReviewMessage) emptyReviewMessage.remove();
                                                targetContainer.prepend(reviewBlock)
                                            };
                                            if (!reviewsContainer.querySelector('.review-admin-block')) {
                                                const emptyText = reviewsContainer.id == 'pending-reviews' ? 'Новых отзывов пока нет.' :
                                                    'Опубликованных отзывов пока нет.'
                                                reviewsContainer.innerHTML = `
                                                    <div class='review' id='emptyReviews' style='text-align: center;'>
                                                        <h3>${emptyText}</h3>
                                                    </div> `;
                                            }
                                        } else {
                                            alert('Ошибка: ' + data.message);
                                        }
                                    })
                                    .catch(error => {
                                        console.error('Ошибка при отправке запроса:', error);
                                        alert('Произошла ошибка при обработке отзыва.');
                                    });
                            }
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>