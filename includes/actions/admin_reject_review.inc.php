<?php
require_once '../db.php';

if (isset($_POST['review_id'])) {
    $review_id = filter_var($_POST['review_id'], FILTER_SANITIZE_NUMBER_INT);
    $stmt = $pdo->prepare("DELETE FROM reviews WHERE user_id = :user_id");
    $stmt->bindParam(':user_id', $review_id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo json_encode(['success' => true, 'message' => 'Отзыв успешно удален.']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Ошибка при удалении отзыва.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Не передан ID отзыва.']);
}
