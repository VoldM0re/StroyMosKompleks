<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = getPost('email');
    $pwd = getPost('pwd');

    if (!$email || !$pwd) {
        $_SESSION['error'] = 'Заполните все поля';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Некорректный email';
    }

    if (empty($_SESSION['error'])) {
        $stmt = $pdo->prepare('SELECT * from `users` WHERE `email` = :email;');
        $stmt->execute([':email' => $email]);
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);

        if (password_verify($pwd, $userData['password_hash'])) {
            $_SESSION['user'] = [
                'id' => $userData['id'],
                'first_name' => $userData['first_name'],
                'last_name' => $userData['last_name'],
                'email' => $userData['email'],
                'role' => $userData['role'],
                'patronymic' => $userData['patronymic'] ?? null,
                'phone' => $userData['phone'] ?? null,
                'address' => $userData['address'] ?? null,
                'profile_image_url' => $userData['profile_image_url'] ?? null,
            ];
            redirect('/profile.php');
        } else {
            $_SESSION['error'] = 'Неверный логин или пароль';
            redirect('/login.php');
        }
    } else {
        redirect('/login.php');
    }
} else {
    redirect('/');
}
