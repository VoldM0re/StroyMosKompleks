<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Услуги</title>
    <meta name='description' content='Страница услуг компании СтройМосКомплекс – промышленный
        альпинизм, строительные и отделочные работы, дизайн и проектирование. Профессиональный подход к каждому
        проекту'>
    <meta name='robots' content='index, follow'>
    <link rel='stylesheet' href='/css/pages/uslugi.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>
    <main>
        <div class='services-wrapper container'>
            <h2>Каталог услуг</h2>
            <a class='service' href='#'>
                <p class='service-text'>Промышленный альпинизм</p>
                <picture>
                    <source media='(min-width: 659px)' srcset='/assets/img/uslugi/PromAlp_desktop.webp'>
                    <img src='/assets/img/uslugi/PromAlp_mobile.webp' alt='Услуги' width='1080'>
                </picture>
            </a>
            <a class='service' href='#'>
                <p class='service-text'>Строительные работы</p>
                <picture>
                    <source media='(min-width: 659px)' srcset='/assets/img/uslugi/Stroy_desktop.webp'>
                    <img src='/assets/img/uslugi/Stroy_mobile.webp' alt='Услуги' width='1080'>
                </picture>
            </a>
            <a class='service' href='#'>
                <p class='service-text'>Отделочные работы</p>
                <picture>
                    <source media='(min-width: 659px)' srcset='/assets/img/uslugi/Otdelka_desktop.webp'>
                    <img src='/assets/img/uslugi/Otdelka_mobile.webp' alt='Услуги' width='1080'>
                </picture>
            </a>
            <a class='service' href='#'>
                <p class='service-text'>Дизайн и проектирование</p>
                <picture>
                    <source media='(min-width: 659px)' srcset='/assets/img/uslugi/Proekt_desktop.webp'>
                    <img src='/assets/img/uslugi/Proekt_mobile.webp' alt='Услуги' width='1080'>
                </picture>
            </a>
        </div>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
</body>

</html>