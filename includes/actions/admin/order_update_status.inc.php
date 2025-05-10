<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != 'admin') {
    echo json_encode(['success' => false, 'message' => 'Недостаточно прав']);
    exit();
}

require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'], $_POST['action'])) {

    $action = $_POST['action'];
    $order_id = filter_var($_POST['order_id'], FILTER_VALIDATE_INT);

    if ($order_id === false) {
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
        query($pdo, "UPDATE `orders` SET `status` = :status WHERE `id` = :order_id", [':status' => $status_list[$action], ':order_id' => $order_id], null);
        echo json_encode(['success' => true, 'message' => "Статус заказа изменён"]);
    } catch (PDOException $e) {
        echo json_encode(['success' => false, 'message' => "Ошибка в БД: $e"]);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Неверный тип запроса или ошибка в параметрах']);
}
