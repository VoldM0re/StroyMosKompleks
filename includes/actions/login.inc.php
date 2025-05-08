<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../helpers.php';
    require_once '../db.php';

    $email = getPost('email');
    $pwd = getPost('pwd');

    if (!$email || !$pwd) setMessage('Заполните все поля');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) setMessage('Некорректный email');

    if (empty($_SESSION['message'])) {
        $stmt = $pdo->prepare('SELECT * FROM `users` WHERE `email` = :email;');
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
            redirect('/');
        } else {
            setMessage('Неверный логин или пароль');
            redirect('/login.php');
        }
    } else {
        redirect('/login.php');
    }
} else {
    redirect('/');
}
