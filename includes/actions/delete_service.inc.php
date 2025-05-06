<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && $_SESSION['user']['role'] == 'admin') {
    $id = htmlspecialchars(trim($_GET['id']));
    $image_url = htmlspecialchars(trim($_GET['image_url']));
    $image_path = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/services_images/' . $image_url;
    try {
        if (file_exists($image_path)) unlink($image_path);
        query($pdo, "DELETE FROM `services` WHERE id = :id;", [':id' => $id]);

        setMessage("Услуга успешно удалена!", 'success');
        redirect('/admin/manage_services.php');
    } catch (\Throwable $th) {
        setMessage("Ошибка при удалении услуги");
        redirect('/admin/manage_services.php');
    }
}
