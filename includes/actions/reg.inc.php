<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = getPost('first_name');
    $last_name = getPost('last_name');
    $email = getPost('email');
    $phone = getPost('phone');
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

    if (!preg_match('/^\+?[1-9]\d{1,14}$/', $phone)) {
        $_SESSION['error'] = "Неверный формат номера!";
    }

    if (empty($_SESSION['error'])) {
        $stmt = $pdo->prepare('INSERT INTO `users` (first_name, last_name, email, phone, password_hash) VALUES (:first_name, :last_name, :email, :phone, :pwd);');
        $isRegSuccessful = $stmt->execute([
            ':first_name' => $first_name,
            ':last_name' => $last_name,
            ':email' => $email,
            ':phone' => $phone,
            ':pwd' => password_hash($pwd, PASSWORD_BCRYPT)
        ]);
        if ($isRegSuccessful) {
            $_SESSION['user'] = [
                'id' => $pdo->lastInsertId(),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone
            ];
            redirect('/');
        } else {
            $_SESSION['error'] = 'Не удалось зарегистрировать пользователя';
            redirect('/registration.php');
        }
    } else {
        redirect('/registration.php');
    }
} else {
    redirect('/');
}
