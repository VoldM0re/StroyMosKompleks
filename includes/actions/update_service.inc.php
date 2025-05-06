<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['user']['role'] == 'admin') {
    $id = getPost('id');
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
            "UPDATE `services`
        SET
            `category` = :category,
            `name` = :name,
            `short_description` = :short_description,
            `full_description` = :full_description,
            `price_units` = :price_units,
            `price_info` = :price_info,
            `price` = :price
        WHERE `id` = :id;",
            [
                ':category' => $category,
                ':name' => $name,
                ':short_description' => $short_description,
                ':full_description' => $full_description,
                ':price_units' => $price_units,
                ':price_info' => $price_info,
                ':price' => $price,
                ':id' => $id
            ]
        );
        setMessage("Услуга успешно изменена!", 'success');
        redirect('/admin/manage_services.php');
    } catch (\Throwable $th) {
        setMessage("Ошибка: $th");
        redirect('/admin/manage_services.php');
    }
}
