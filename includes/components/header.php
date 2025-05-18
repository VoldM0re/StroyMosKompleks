<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
function isActive($pageName)
{
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage == $pageName) return 'is-current';
    return '';
} ?>

<header>
    <div class='header__top container'>
        <div class='burger__button'>
            <span></span>
            <span></span>
            <span></span>
        </div>

        <a class='logo' href='/'>
            <img class='logo-icon icon' src='/assets/svg/logo.svg' alt='logo' loading='eager'>
            <h1 class='logo-text'>
                <span class='stroy'>Строй</span>МосКомплекс
            </h1>
        </a>

        <address class='header__contacts'>
            <div class='header__contact-box'>
                <svg width="21" height="21" viewBox="0 0 21 17">
                    <use xlink:href="/assets/svg/contact_icons_sprite.svg#email"></use>
                </svg>
                <a href='mailto:mail@stroymoskompleks.ru' class='header__contact-text'>mail@stroymoskompleks.ru</a>
            </div>
            <div class='header__contact-box'>
                <svg width="21" height="21" viewBox="0 0 21 17">
                    <use xlink:href="/assets/svg/contact_icons_sprite.svg#phone"></use>
                </svg>
                <a href='tel:+71234567890' class='header__contact-text'>+7 (495) 633-62-62</a>
            </div>
        </address>
        <a href='/korzina.php' class='account__button'>
            <div class='header_top-link-icon' id='cart-icon'>
                <svg class='footer__contact-icon' width="20" height="20" viewBox="0 0 19 19">
                    <use xlink:href="/assets/svg/header_sprite.svg#cart"></use>
                </svg>
                <?php if (isset($_SESSION['user'])):
                    $stmt = $pdo->prepare("SELECT COUNT(*) FROM `cart_items` WHERE `user_id` = :user_id;");
                    $stmt->execute([':user_id' => $_SESSION['user']['id']]);
                    $cart_count = $stmt->fetchColumn(); ?>
                    <div class="cart_counter <?= $cart_count > 0 ? '' : 'hidden' ?>"><?= $cart_count ?></div>
                <?php endif; ?>
            </div>
            <span class='account__button-text'>Корзина</span>
        </a>
        <a href='<?= isset($_SESSION['user']) ? '/profile.php' : '/login.php'; ?>' class='account__button'>
            <?php $profileImageUrl = '/assets/svg/profile_icon.svg';
            if (isset($_SESSION['user']['profile_image_url'])) {
                $profileImageUrl = $_SESSION['user']['profile_image_url'] === 'default_pfp.png'
                    ? '/assets/svg/profile_icon.svg'
                    : '/assets/uploads/profile_pictures/' . $_SESSION['user']['profile_image_url'];
            } ?>
            <img src='<?= $profileImageUrl ?>' class='header_top-link-icon account-icon' alt='account icon'>
            <span class='account__button-text'><?= $_SESSION['user']['first_name'] ?? 'Войти' ?></span>
        </a>
    </div>

    <nav class='header__menu'>
        <ul class='header__menu-list'>
            <li class='header__menu-item'>
                <a href='/' class='header__menu-link <?= isActive('index.php'); ?>'>
                    <span class='header__menu-text'>Главная</span>
                </a>
            </li>
            <li class='header__menu-item is-expandable'>
                <a href='/uslugi/index.php' class='header__menu-link <?= isActive('/uslugi/index.php'); ?>'>
                    <span class='header__menu-text'>Услуги</span>
                    <svg class='footer__contact-icon' width='14' height='11' viewBox="0 0 21 17">
                        <use xlink:href="/assets/svg/header_sprite.svg#downArrow"></use>
                    </svg>
                </a>
                <div class="expanded">
                    <a href="/uslugi/promyshlennyy-alpinizm.php" class='header__menu-link'>Промышленный альпинизм</a>
                    <a href="/uslugi/stroitelnye-raboty.php" class='header__menu-link'>Строительные работы</a>
                    <a href="/uslugi/otdelochnye-raboty.php" class='header__menu-link'>Отделочные работы</a>
                    <a href="/uslugi/dizayn-i-proektirovanie.php" class='header__menu-link'>Дизайн и проектирование</a>
                </div>
            </li>
            <li class='header__menu-item'>
                <a href='/o-kompanii.php' class='header__menu-link <?= isActive('o-kompanii.php'); ?>'>
                    <span class='header__menu-text'>О компании</span>
                </a>
            </li>
            <li class='header__menu-item'>
                <a href='/portfolio.php' class='header__menu-link <?= isActive('portfolio.php'); ?>'>
                    <span class='header__menu-text'>Портфолио</span>
                </a>
            </li>
            <li class='header__menu-item'>
                <a href='/otzyvy.php' class='header__menu-link <?= isActive('otzyvy.php'); ?>'>
                    <span class='header__menu-text'>Отзывы</span>
                </a>
            </li>
            <li class='header__menu-item'>
                <a href='/chastye-voprosy.php' class='header__menu-link <?= isActive('chastye-voprosy.php'); ?>'>
                    <span class='header__menu-text'>FAQ</span>
                </a>
            </li>
        </ul>
        <address class='header__top-contacts'>
            <h4>Наши контакты:</h4>
            <div class="header__top-contacts-box">
                <div class='header__top-contact-box'>
                    <svg class='footer__contact-icon' width="21" height="17" viewBox="0 0 21 17">
                        <use xlink:href="/assets/svg/contact_icons_sprite.svg#email"></use>
                    </svg>
                    <a href='mailto:mail@stroymoskompleks.ru' class='header__top-contact-text'>mail@stroymoskompleks.ru</a>
                </div>

                <div class='header__top-contact-box'>
                    <svg class='footer__contact-icon' width="21" height="17" viewBox="0 0 21 17">
                        <use xlink:href="/assets/svg/contact_icons_sprite.svg#phone"></use>
                    </svg>
                    <a href='tel:+71234567890' class='header__top-contact-text'>+7 (495) 633-62-62</a>
                </div>
            </div>
        </address>
    </nav>
</header>
<script src='/js/burger.js'></script>