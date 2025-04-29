<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $review_text = getPost('review_text');

    $stmt = $pdo->prepare("INSERT INTO `reviews` (`user_id`, `review_text`) VALUES (:user_id, :review_text);");
    $stmt->execute([':review_text' => $review_text, ':user_id' => $_SESSION['user']['id']]);

    redirect('/otzyvy.php');
} else {
    redirect('/');
}
