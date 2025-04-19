<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = getPost('first_name');
    $last_name = getPost('last_name');
    $patronymic = getPost('patronymic');
    $phone = getPost('phone');
    $address = getPost('address');

    if (!$first_name) {
        $_SESSION['error'] = 'Имя не может быть пустым!';
    }

    if (!$last_name) {
        $_SESSION['error'] = 'Фамилия не может быть пустой!';
    }

    if (!$phone) {
        $_SESSION['error'] = "Номер не может быть пустым!";
    } else {
        if (!preg_match('/^\+?[1-9]\d{1,14}$/', $phone)) {
            $_SESSION['error'] = "Неверный формат номера!";
        }
    }


    $stmt = $pdo->prepare('SELECT `first_name` FROM `users` WHERE `phone` = :phone AND `email` != :email');
    $stmt->execute([
        ':phone' => $phone,
        ':email' => $_SESSION['user']['email'],
    ]);

    if ($stmt->fetch()) {
        $_SESSION['error'] = 'Пользователь с таким номером телефона уже существует!';
    }

    if (empty($_SESSION['error'])) {
        try {
            $stmt = $pdo->prepare('UPDATE `users` SET `first_name` = :first_name, `last_name` = :last_name, `patronymic` = :patronymic, `phone` = :phone, `address` = :address WHERE `email` = :email;');
            $stmt->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $_SESSION['user']['email'],
                ':phone' => $phone,
                ':patronymic' => $patronymic,
                ':address' => $address,
            ]);
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th;
            redirect('/profile.php');
        }

        $_SESSION['user']['first_name'] = $first_name;
        $_SESSION['user']['last_name'] = $last_name;
        $_SESSION['user']['patronymic'] = $patronymic;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;

        redirect('/profile.php');
    } else {
        redirect('/profile.php');
    }
} else {
    redirect('/');
}
