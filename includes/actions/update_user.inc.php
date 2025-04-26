<?php
session_start();
require_once '../helpers.php';
require_once '../db.php';

const UPLOAD_DIR = '/assets/uploads/profile_pictures/';
const DEFAULT_AVATAR = 'default_pfp.png';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = getPost('first_name');
    $last_name = getPost('last_name');
    $patronymic = getPost('patronymic');
    $phone = getPost('phone');
    $address = getPost('address');

    $profile_image_url = $_SESSION['user']['profile_image_url'] ?? null;

    function deletePicture($filenameToDelete)
    {
        if (!empty($filenameToDelete) && $filenameToDelete !== DEFAULT_AVATAR) {
            $oldFilePath = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR . $filenameToDelete;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }
    }

    // Удаление картинки профиля
    if (isset($_POST['delete_avatar']) && $_POST['delete_avatar'] == '1' && isset($_SESSION['user']['profile_image_url'])) {
        deletePicture($_SESSION['user']['profile_image_url']);
        $profile_image_url = null;
    }

    // Добавление картинки профиля
    if (isset($_FILES['avatar_file']) && $_FILES['avatar_file']['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'jfif'];
        $fileExtension = strtolower(pathinfo($_FILES['avatar_file']['name'], PATHINFO_EXTENSION));
        $maxFileSize = 2 * 1024 * 1024;

        if (!in_array($fileExtension, $allowedExtensions)) {
            $_SESSION['error'] = 'Недопустимый формат файла. Разрешены: ' . implode(', ', $allowedExtensions) . '.';
        } elseif ($_FILES['avatar_file']['size'] > $maxFileSize) {
            $_SESSION['error'] = 'Размер файла превышает 2 Мб';
        } else {
            $newFilename = uniqid() . '.' . $fileExtension;
            $uploadFile = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_DIR . $newFilename;

            if (move_uploaded_file($_FILES['avatar_file']['tmp_name'], $uploadFile)) {
                deletePicture($_SESSION['user']['profile_image_url'] ?? ''); // Передаем текущий URL для удаления
                $profile_image_url = $newFilename;
            } else {
                $_SESSION['error'] = 'Ошибка при загрузке файла на сервер';
            }
        }
    } elseif (isset($_FILES['avatar_file']) && $_FILES['avatar_file']['error'] !== UPLOAD_ERR_NO_FILE) {
        $_SESSION['error'] = match ($_FILES['avatar_file']['error']) {
            UPLOAD_ERR_INI_SIZE => 'Размер загруженного файла превышает значение upload_max_filesize в php.ini',
            UPLOAD_ERR_FORM_SIZE => 'Размер загруженного файла превышает значение MAX_FILE_SIZE, указанное в HTML-форме',
            UPLOAD_ERR_PARTIAL => 'Файл был загружен частично',
            UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка',
            UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск',
            UPLOAD_ERR_EXTENSION => 'Загрузка файла прервана расширением PHP',
            default => 'Произошла неизвестная ошибка при загрузке файла'
        };
    }

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
            $stmt = $pdo->prepare('UPDATE `users` SET `first_name` = :first_name, `last_name` = :last_name, `patronymic` = :patronymic, `phone` = :phone, `address` = :address, `profile_image_url` = :profile_image_url WHERE `email` = :email;');
            $stmt->execute([
                ':first_name' => $first_name,
                ':last_name' => $last_name,
                ':email' => $_SESSION['user']['email'],
                ':phone' => $phone,
                ':patronymic' => $patronymic,
                ':address' => $address,
                ':profile_image_url' => $profile_image_url,
            ]);

            $_SESSION['user']['first_name'] = $first_name;
            $_SESSION['user']['last_name'] = $last_name;
            $_SESSION['user']['patronymic'] = $patronymic;
            $_SESSION['user']['phone'] = $phone;
            $_SESSION['user']['address'] = $address;
            $_SESSION['user']['profile_image_url'] = $profile_image_url;

            $_SESSION['success'] = 'Данные профиля обновлены!';
        } catch (\Throwable $th) {
            $_SESSION['error'] = $th;
        }
        redirect('/profile.php');
    } else {
        redirect('/profile.php');
    }
} else {
    redirect('/');
}
