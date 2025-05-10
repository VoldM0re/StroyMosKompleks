<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: /error_page.php');
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
function admin_listReviews($review_status)
{ ?>
    <section class='manage_reviews-block'>
        <h3 class='manage_reviews-block-title'><?= $review_status == 'pending' ? 'Отзывы на рассмотрении' : 'Опубликованные отзывы'; ?></h3>
        <div class='reviews' id='<?= $review_status ?>-reviews'>
            <?php global $pdo;
            $stmt = $pdo->prepare(
                "SELECT
                    reviews.review_text,
                    reviews.created_at,
                    reviews.user_id,
                    users.first_name,
                    users.last_name,
                    users.profile_image_url,
                    users.id
                FROM reviews
                LEFT JOIN users ON reviews.user_id = users.id
                WHERE reviews.review_status = :status
                ORDER BY reviews.created_at DESC;"
            );
            $stmt->execute([':status' => $review_status]);
            $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($reviews):
                foreach ($reviews as $review):
                    $reviewDate = isset($review['created_at']) ? (new DateTime($review['created_at']))->format('d.m.Y') : '';
                    $userName = isset($review['first_name']) ? ($review['first_name'] . ' ' . mb_substr($review['last_name'], 0, 1, 'UTF-8') . '.') : 'Аккаунт удалён';
                    $userAvatar = isset($review['profile_image_url']) ? $review['profile_image_url'] : 'default_pfp.png'; ?>
                    <div class='review-admin-block' data-review-id='<?= $review['user_id'] ?>'>
                        <div class='review'>
                            <div class='review-user'>
                                <img loading='lazy' width='40' height='40' class='review-user-pfp' src='/assets/uploads/profile_pictures/<?= $userAvatar  ?>' alt='Фото профиля'>
                                <h3><?= $userName ?></h3>
                            </div>
                            <p class='review-text'><?= $review['review_text'] ?></p>
                            <small><?= $reviewDate ?></small>
                        </div>
                        <div class='review-admin-actions'>
                            <?php if ($review_status == 'pending'): ?>
                                <button class='review-action reject' id='review-action-reject' data-action='reject' data-full-text='Удалить' data-short-text='✖' title='Удалить'></button>
                                <button class='review-action accept' id='review-action-accept' data-action='accept' data-full-text='Принять' data-short-text='✔' title='Опубликовать'></button>
                            <?php else: ?>
                                <button class='review-action pend' id='review-action-pend' data-action='pend' data-full-text='Снять с публикации' data-short-text='🕙︎' title='Снять с публикации'></button>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class='review' id='emptyReviews' style='text-align: center;'>
                    <h3><?= $review_status == 'pending' ? 'Новых отзывов пока нет.' : 'Опубликованных отзывов пока нет.'; ?></h3>
                </div>
            <?php endif ?>
        </div>
    </section>
<?php } ?>

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
            <?php
            admin_listReviews('pending');
            admin_listReviews('accepted');
            ?>
    </main>
    <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/components/footer.php'; ?>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.addEventListener('click', function(event) {
                const target = event.target;
                const actionButton = target.closest('.review-action');

                if (actionButton) {
                    const action = actionButton.dataset.action;
                    const reviewBlock = actionButton.closest('.review-admin-block');
                    const reviewId = reviewBlock.dataset.reviewId;
                    const originalContainer = reviewBlock.parentElement;

                    let targetContainerId = null;
                    let newActionButtonsHTML = '';
                    let isRemoval = false;

                    if (action === 'accept') {
                        targetContainerId = 'accepted-reviews';
                        newActionButtonsHTML = `<button class='review-action pend' data-action='pend' data-full-text='Снять с публикации' data-short-text='🕙︎' title='Снять с публикации'></button>`;
                    } else if (action === 'pend') {
                        targetContainerId = 'pending-reviews';
                        newActionButtonsHTML = `
                        <button class='review-action reject' data-action='reject' data-full-text='Удалить' data-short-text='✖' title='Удалить'></button>
                        <button class='review-action accept' data-action='accept' data-full-text='Принять' data-short-text='✔' title='Опубликовать'></button>
                    `;
                    } else if (action === 'reject') isRemoval = true;
                    else {
                        console.warn('Неизвестное действие отзыва:', action);
                        return;
                    }

                    fetch('/includes/actions/admin/review_update_status.inc.php', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/x-www-form-urlencoded'
                            },
                            body: 'review_id=' + encodeURIComponent(reviewId) + '&action=' + encodeURIComponent(action)
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                reviewBlock.remove();

                                if (!isRemoval && targetContainerId) {
                                    const targetContainer = document.getElementById(targetContainerId);
                                    if (targetContainer) {
                                        const actionsContainer = reviewBlock.querySelector('.review-admin-actions');
                                        const emptyReviewMessageTarget = targetContainer.querySelector('#emptyReviews');

                                        actionsContainer.innerHTML = newActionButtonsHTML;
                                        if (emptyReviewMessageTarget) emptyReviewMessageTarget.remove();
                                        targetContainer.prepend(reviewBlock);
                                    } else {
                                        console.error('Целевой контейнер не найден:', targetContainerId);
                                    }
                                }

                                if (originalContainer && !originalContainer.querySelector('.review-admin-block')) {
                                    const emptyText = originalContainer.id === 'pending-reviews' ? 'Новых отзывов пока нет.' : 'Опубликованных отзывов пока нет.';
                                    originalContainer.innerHTML = `
                                    <div class='review' id='emptyReviews' style='text-align: center;'>
                                        <h3>${emptyText}</h3>
                                    </div>`;
                                }
                            } else {
                                console.error('Ошибка на сервере: ' + (data.message || 'Неизвестная ошибка'));
                            }
                        })
                        .catch(error => {
                            console.error('Ошибка:', error);
                        });
                }
            });
        });
    </script>
</body>

</html>