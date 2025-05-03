<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $review_text = getPost('review_text');

    try {
        $stmt = $pdo->prepare("INSERT INTO `reviews` (`user_id`, `review_text`) VALUES (:user_id, :review_text);");
        $stmt->execute([':review_text' => $review_text, ':user_id' => $_SESSION['user']['id']]);

        $_SESSION['message'] = ['type' => 'success', 'text' => 'Ваш отзыв отправлен на модерацию'];
    } catch (\Throwable $th) {
        $_SESSION['message'] = ['type' => 'error', 'text' => 'Ошибка добавления отзыва'];
    }

    redirect('/otzyvy.php');
} else {
    redirect('/');
}
