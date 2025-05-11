<?php
session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/helpers.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['user']['role'] == 'admin') {
    $category = getPost('category');
    $name = getPost('name');
    $short_description = getPost('short_description');
    $full_description = getPost('full_description');
    $price_units = getPost('price_units');
    $price_info = getPost('price_info');
    $price = getPost('price');
    $service_image_url = null;

    // Добавление картинки услуги
    if (isset($_FILES['service_img']) && $_FILES['service_img']['error'] === UPLOAD_ERR_OK) {
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'jfif'];
        $fileExtension = strtolower(pathinfo($_FILES['service_img']['name'], PATHINFO_EXTENSION));
        $maxFileSize = 8 * 1024 * 1024;
        if (!in_array($fileExtension, $allowedExtensions)) {
            setMessage('Недопустимый формат файла. Разрешены: ' . implode(', ', $allowedExtensions) . '.');
        } elseif ($_FILES['service_img']['size'] > $maxFileSize) {
            setMessage("Размер файла превышает " . $maxFileSize / 1024 / 1024 . " Мб");
        } else {
            $newFilename = uniqid() . '.' . $fileExtension;
            $uploadFile = $_SERVER['DOCUMENT_ROOT'] . '/assets/uploads/services_images/' . $newFilename;
            if (move_uploaded_file($_FILES['service_img']['tmp_name'], $uploadFile)) {
                $service_image_url = $newFilename;
            } else {
                setMessage('Ошибка при загрузке файла на сервер');
            }
        }
    } elseif (isset($_FILES['service_img']) && $_FILES['service_img']['error'] !== UPLOAD_ERR_NO_FILE) {
        setMessage(match ($_FILES['service_img']['error']) {
            UPLOAD_ERR_INI_SIZE => 'Размер файла превышает 8Мб',
            UPLOAD_ERR_FORM_SIZE => 'Размер загруженного файла превышает значение MAX_FILE_SIZE, указанное в HTML-форме',
            UPLOAD_ERR_PARTIAL => 'Файл был загружен частично',
            UPLOAD_ERR_NO_TMP_DIR => 'Отсутствует временная папка',
            UPLOAD_ERR_CANT_WRITE => 'Не удалось записать файл на диск',
            UPLOAD_ERR_EXTENSION => 'Загрузка файла прервана расширением PHP',
            default => 'Произошла неизвестная ошибка при загрузке файла'
        });
    }

    if (empty($_SESSION['message'])) {
        try {
            query(
                $pdo,
                "INSERT INTO `services` (`category`, `name`, `short_description`, `full_description`, `price_units`, `price_info`, `price`, `image_url`)
                VALUES (:category, :name, :short_description, :full_description, :price_units, :price_info, :price, :image_url)",
                [
                    ':category' => $category,
                    ':name' => $name,
                    ':short_description' => $short_description,
                    ':full_description' => $full_description,
                    ':price_units' => $price_units,
                    ':price_info' => $price_info,
                    ':price' => $price,
                    ':image_url' => $service_image_url
                ]
            );
            setMessage("Услуга успешно добалена!", 'success');
            redirect('/admin/manage_services.php');
        } catch (\Throwable $th) {
            setMessage("Ошибка: $th $price");
            redirect('/admin/manage_services.php');
        }
    } else {
        redirect('/admin/manage_services.php');
    }
}
