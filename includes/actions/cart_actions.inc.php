<?php
session_start();
require_once '../db.php';
require_once '../helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['service_id'], $_POST['action'])) {
    $serviceId = filter_var($_POST['service_id'], FILTER_SANITIZE_NUMBER_INT);
    $userId = $_SESSION['user']['id'] ?? null;
    $action = $_POST['action'];

    if (!$userId) {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'Пользователь не авторизован.']);
        exit();
    }

    try {
        if ($action === 'add_to_cart') {
            $stmt = $pdo->prepare("INSERT IGNORE INTO `cart_items` (`user_id`, `service_id`) VALUES (:user_id, :service_id)");
            $stmt->execute([':user_id' => $userId, ':service_id' => $serviceId]);
            $cartCount = query($pdo, "SELECT COUNT(*) FROM `cart_items` WHERE `user_id` = :user_id", [':user_id' => $userId], 'fetchColumn');
            echo json_encode([
                'success' => true,
                'count' => $cartCount,
                'button_text' => 'В корзине',
                'button_class' => 'actbtn-w',
                'new_action' => 'remove_from_cart'
            ]);
        } elseif ($action === 'remove_from_cart') {
            $stmt = $pdo->prepare("DELETE FROM `cart_items` WHERE `user_id` = :user_id AND `service_id` = :service_id");
            $stmt->execute([':user_id' => $userId, ':service_id' => $serviceId]);
            $cartCount = query($pdo, "SELECT COUNT(*) FROM `cart_items` WHERE `user_id` = :user_id", [':user_id' => $userId], 'fetchColumn');
            echo json_encode([
                'success' => true,
                'count' => $cartCount,
                'button_text' => 'Добавить в корзину',
                'button_class' => 'actbtn-o',
                'new_action' => 'add_to_cart'
            ]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Неизвестное действие.']);
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Произошла ошибка: ' . $e->getMessage()]);
    }
} else {
    http_response_code(400);
    echo json_encode(['success' => false, 'message' => 'Некорректный запрос.']);
}
