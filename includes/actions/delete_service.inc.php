<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SESSION['user']['role'] == 'admin') {
    $id = htmlspecialchars(trim($_GET['id']));
    try {
        query($pdo, "DELETE FROM `services` WHERE id = :id;", [':id' => $id]);
        setMessage("Услуга успешно удалена!", 'success');
        redirect('/admin/manage_services.php');
    } catch (\Throwable $th) {
        setMessage("Ошибка: $th $price");
        redirect('/admin/manage_services.php');
    }
}
