<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    echo json_encode(['success' => false, 'message' => 'Недостаточно прав']);
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['review_id'], $_POST['action'])) {

    $action = $_POST['action'];
    $review_id = filter_var($_POST['review_id'], FILTER_VALIDATE_INT);

    if ($review_id === false) {
        echo json_encode(['success' => false, 'message' => 'Некорректный id']);
        exit();
    }

    $status_list = [
        'accept' => 'accepted',
        'pend' => 'pending',
        'reject' => 'rejected',
    ];

    if (!isset($status_list[$action])) {
        echo json_encode(['success' => false, 'message' => 'Некорректное действие']);
        exit();
    }
    try {
        if ($action == 'reject') {
            query($pdo, "DELETE FROM `reviews` WHERE `user_id` = :review_id", [':review_id' => $review_id], null);
            echo json_encode(['success' => true, 'message' => "Отзыв удалён"]);
        } else {
            query($pdo, "UPDATE `reviews` SET `review_status` = :status WHERE `user_id` = :review_id", [':status' => $status_list[$action], ':review_id' => $review_id], null);
            echo json_encode(['success' => true, 'message' => "Статус отзыва изменён"]);
        }
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => "Ошибка в БД: $e"]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Неверный тип запроса или ошибка в параметрах']);
}
