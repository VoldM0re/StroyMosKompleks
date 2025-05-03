<?php
require_once '../db.php';

if (isset($_POST['review_id'])) {
    $review_id = filter_var($_POST['review_id'], FILTER_SANITIZE_NUMBER_INT);
    $stmt = $pdo->prepare("UPDATE `reviews` SET `review_status` = 'accepted' WHERE `user_id` = :user_id");

    if ($stmt->execute([':user_id' => $review_id])) {
        echo json_encode(['success' => true, 'message' => 'Отзыв успешно принят.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ошибка при принятии отзыва.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Не передан ID отзыва.']);
}
