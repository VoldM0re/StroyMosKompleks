<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = getPost('first_name');
    $last_name = getPost('last_name');
    $email = getPost('email');
    $pwd = getPost('pwd');
    $pwdVerify = getPost('pwdVerify');

    if (!$first_name || !$last_name || !$email || !$pwd || !$pwdVerify) {
        $_SESSION['error'] = 'Заполните все поля';
    }

    $stmt = $pdo->prepare('SELECT * FROM `users` WHERE email = :email');
    $stmt->execute([':email' => $email]);
    if ($stmt->fetch()) {
        $_SESSION['error'] = 'Пользователь с таким email уже существует';
    }

    if ($pwd !== $pwdVerify) {
        $_SESSION['error'] = 'Пароли не совпадают';
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = 'Некорректный email';
    }

    if (empty($_SESSION['error'])) {
        $stmt = $pdo->prepare('INSERT INTO `users` (first_name, last_name, email, password_hash) VALUES (:first_name, :last_name, :email, :pwd);');
        $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
            ':pwd' => password_hash($pwd, PASSWORD_BCRYPT)
        ]);

        $_SESSION['user'] = ['first_name' => $first_name, 'last_name' => $last_name,];
        redirect('/');
    } else {
        redirect('/profile.php');
    }
} else {
    redirect('/');
}
