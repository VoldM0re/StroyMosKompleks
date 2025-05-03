<?php
require_once '../db.php';

if (isset($_POST['review_id'])) {
    $review_id = filter_var($_POST['review_id'], FILTER_SANITIZE_NUMBER_INT);
    $stmt = $pdo->prepare("UPDATE `reviews` SET `review_status` = 'pending' WHERE `user_id` = :user_id");

    if ($stmt->execute([':user_id' => $review_id])) {
        echo json_encode(['success' => true, 'message' => 'Статус отзыва изменён.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ошибка при снятии отзыва с публикации.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Не передан ID отзыва.']);
}
