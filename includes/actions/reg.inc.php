<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    require_once '../helpers.php';
    require_once '../db.php';

    $first_name = getPost('first_name');
    $last_name = getPost('last_name');
    $email = getPost('email');
    $phone = getPost('phone');
    $pwd = getPost('pwd');
    $pwdVerify = getPost('pwdVerify');

    $checkEmail = $pdo->prepare('SELECT `first_name` FROM `users` WHERE `email` = :email;');
    $checkEmail->execute([':email' => $email]);

    $checkPhone = $pdo->prepare('SELECT `first_name` FROM `users` WHERE `phone` = :phone;');
    $checkPhone->execute([':phone' => $phone]);

    if (!$first_name || !$last_name || !$email || !$pwd || !$pwdVerify) setMessage('Заполните все поля');
    if ($checkEmail->fetch()) setMessage('Пользователь с таким email уже существует');
    if ($checkPhone->fetch()) setMessage('Пользователь с таким номером телефона уже существует!');
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) setMessage('Некорректный email');
    if (!preg_match('/^\+?[1-9]\d{1,14}$/', $phone)) setMessage('Неверный формат номера');
    if ($pwd !== $pwdVerify) setMessage('Пароли не совпадают');

    if (empty($_SESSION['message'])) {
        try {
            $stmt = $pdo->prepare('INSERT INTO `users` (first_name, last_name, email, phone, password_hash) VALUES (:first_name, :last_name, :email, :phone, :pwd);');
            $stmt->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $email,
                ':phone' => $phone,
                ':pwd' => password_hash($pwd, PASSWORD_BCRYPT)
            ]);

            $_SESSION['user'] = [
                'id' => $pdo->lastInsertId(),
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email,
                'phone' => $phone,
                'role' => 'user'
            ];
            redirect('/');
        } catch (\Throwable $th) {
            setMessage('Не удалось зарегистрировать пользователя');
            redirect('/registration.php');
        }
    } else {
        redirect('/registration.php');
    }
} else {
    redirect('/');
}
