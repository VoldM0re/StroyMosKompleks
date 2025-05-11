<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../helpers.php';
    require_once '../db.php';

    $first_name = getPost('first_name');
    $phone = getPost('phone');
    $address = getPost('address');
    $comment = getPost('comment');
    $service_name = getPost('service_name');

    if (empty($first_name) || empty($phone) || empty($address) || empty($service_name)) {
        setMessage("Заполните все поля!");
    }

    try {
        $user_cart = query($pdo, "SELECT cart_items.service_id, services.name  FROM `cart_items` LEFT JOIN `services` ON cart_items.service_id = services.id WHERE `user_id` = :user_id;", [':user_id' => $_SESSION['user']['id']]);
        $stmt = $pdo->prepare("INSERT INTO `orders`
        (`user_id`, `first_name`, `phone`, `address`, `comment`, `service_id`, `service_name`)
        VALUES
        (:user_id, :first_name, :phone, :address, :comment, :service_id, :service_name);");
        foreach ($user_cart as $cart_item) {
            $stmt->execute([
                ':user_id' => $_SESSION['user']['id'],
                ':first_name' => $first_name,
                ':phone' => $phone,
                ':address' => $address,
                ':comment' => $comment,
                ':service_id' => $cart_item['service_id'],
                ':service_name' => $cart_item['name']
            ]);
        }
        query($pdo, "DELETE FROM `cart_items` WHERE `user_id` = :user_id;", [':user_id' => $_SESSION['user']['id']]);
        redirect('/successful_order.php');
    } catch (\Throwable $th) {
        setMessage("Ошибка: $th");
        redirect('/confirm_order.php');
    }
} else {
    redirect('/');
}
