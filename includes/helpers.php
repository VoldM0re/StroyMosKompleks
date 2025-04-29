<?php
function redirect($location)
{
    if (isset($_SESSION['referer']) && !isset($_SESSION['error'])) {
        header("Location: {$_SESSION['referer']}");
        unset($_SESSION['referer']);
    } else {
        header("Location: $location");
    }
    exit();
}

// Безопасное получение данных из $_POST
function getPost($key)
{
    if (isset($_POST[$key]) and $_POST[$key] !== "") {
        return htmlspecialchars(trim($_POST[$key]));
    }
    return null;
}
