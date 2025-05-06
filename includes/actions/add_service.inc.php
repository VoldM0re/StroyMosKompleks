<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['user']['role'] == 'admin') {
    $category = getPost('category');
    $name = getPost('name');
    $short_description = getPost('short_description');
    $full_description = getPost('full_description');
    $price_units = getPost('price_units');
    $price_info = getPost('price_info');
    $price = getPost('price');
    try {
        query(
            $pdo,
            "INSERT INTO `services` (`category`, `name`, `short_description`, `full_description`, `price_units`, `price_info`, `price`)
            VALUES (:category, :name, :short_description, :full_description, :price_units, :price_info, :price)",
            [
                ':category' => $category,
                ':name' => $name,
                ':short_description' => $short_description,
                ':full_description' => $full_description,
                ':price_units' => $price_units,
                ':price_info' => $price_info,
                ':price' => $price
            ]
        );
        setMessage("Услуга успешно добалена!", 'success');
        redirect('/admin/manage_services.php');
    } catch (\Throwable $th) {
        setMessage("Ошибка: $th $price");
        redirect('/admin/manage_services.php');
    }
}
