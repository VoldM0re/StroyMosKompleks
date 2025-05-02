<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    header('Location: /error_page.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Страница админа</title>
    <meta name='robots' content='noindex, nofollow'>
    <link rel='stylesheet' href='/css/pages/admin_page.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>

    <main>
        <section class='admin_page-wrapper container'>
            <h2>Добро пожаловать, <?= $_SESSION['user']['first_name'] ?></h2>
            <section class='admin_page-block'>
                <h3 class='admin_page-block-title'>Новые отзывы</h3>
                <div class='reviews'>

                    <?php
                    require_once 'includes/db.php';
                    $stmt = $pdo->prepare("SELECT reviews.review_text, reviews.created_at, reviews.user_id, users.first_name, users.last_name, users.profile_image_url FROM reviews LEFT JOIN users ON reviews.user_id = users.id WHERE reviews.review_status = 'pending' ORDER BY reviews.created_at DESC;");
                    $stmt->execute();
                    $reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

                    if ($reviews) {
                        foreach ($reviews as $review) {
                            echo "
                            <div class='review-admin-block' data-review-id='" . $review['user_id'] . "'>
                                <div class='review'>
                                    <div class='review-user'>
                                        <img loading='lazy' width='40' height='40' class='review-user-pfp'
                                            src='/assets/uploads/profile_pictures/" . (isset($review['user_id']) ? $review['profile_image_url'] : 'default_pfp.png') . "' alt='Фото профиля'>
                                        <h3>" . (isset($review['user_id']) ? ($review['first_name'] . ' ' . mb_substr($review['last_name'], 0, 1, 'UTF-8') . '.') : 'Аккаунт удалён') . "</h3>
                                    </div>
                                    <p class='review-text'>" . $review['review_text'] . "</p>
                                    <small>" . explode(' ', $review['created_at'])[0] . "</small>
                                </div>
                                
                                <div class='review-admin-actions'>
                                    <button class='review-action reject' id='review-action-reject' data-action='reject' data-full-text='Удалить' data-short-text='✖'></button>
                                    <button class='review-action accept' id='review-action-accept' data-action='accept' data-full-text='Принять' data-short-text='✔'></button>
                                </div>
                            </div> ";
                        }
                    } else {
                        echo "
                        <div class='review' style='text-align: center;'>
                            <h3>Новых отзывов пока нет.</h3>
                        </div> ";
                    } ?>
                </div>

            </section>
        </section>
    </main>

    <?php require_once 'includes/components/footer.php'; ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const reviewsContainer = document.querySelector('.reviews');

            if (reviewsContainer) {
                reviewsContainer.addEventListener('click', function(event) {
                    const target = event.target;
                    if (target.classList.contains('review-action')) {
                        const action = target.dataset.action;
                        const reviewBlock = target.closest('.review-admin-block');

                        if (reviewBlock) {
                            const reviewId = reviewBlock.dataset.reviewId;
                            let url = '';
                            let confirmationMessage = '';

                            if (action === 'accept') {
                                url = 'includes/actions/admin_accept_review.inc.php';
                                confirmationMessage = 'Принять этот отзыв?';
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
                                            if (!reviewsContainer.querySelector('.review-admin-block')) {
                                                reviewsContainer.innerHTML = `
                                                <div class='review' style='text-align: center;'>
                                                    <h3>Новых отзывов пока нет.</h3>
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
            }
        });
    </script>
</body>

</html>