<?php
function redirect($location)
{
    header("Location: $location");
    exit();
}

// Безопасное получение данных из $_POST
function getPost($key)
{
    if (isset($_POST[$key])) {
        return htmlspecialchars(trim($_POST[$key]));
    }
    return null;
}
