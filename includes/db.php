<?php
try {
    require_once $_SERVER['DOCUMENT_ROOT'] . 'config.php';
    $pdo = new PDO("mysql:host={$config['host']};dbname={$config['name']};charset={$config['charset']}", $config['user'], $config['pwd']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Не удалось подключиться к БД:<br>' . $e->getMessage());
}
