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
// Добавление сообщения об ошибке/успехе в сессию
function setMessage($text, $type = 'error')
{
    $_SESSION['message'] = ['type' => $type, 'text' => $text];
}

// Запрос к БД
function query($pdo, $sql, $params = [], $fetchMethod = 'fetchAll')
{
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return match ($fetchMethod) {
        'fetchAll' => $stmt->fetchAll(PDO::FETCH_ASSOC),
        'fetch' => $stmt->fetch(PDO::FETCH_ASSOC),
        'fetchColumn' => $stmt->fetchColumn(),
        'rowCount' => $stmt->rowCount(),
        null => null,
    };
}

function format_price_units($price_units)
{
    return match ($price_units) {
        'noUnits' => '',
        'm2' => '/м²',
        'pog_m' => '/пог. м',
        default => ''
    };
}
