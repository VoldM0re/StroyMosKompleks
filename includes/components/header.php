<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/includes/db.php';
function isActive($pageName)
{
    $currentPage = basename($_SERVER['PHP_SELF']);
    if ($currentPage == $pageName) {
        return 'is-current';
    }
    return '';
}
?>

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
                <img src='/assets/svg/mail.svg' alt='mail icon' class='header__contact-icon icon'>
                <a href='mailto:somemail@mail.ru' class='header__contact-text'>somemail@mail.ru</a>
            </div>
            <div class='header__contact-box'>
                <img src='/assets/svg/phone.svg' alt='phone icon' class='header__contact-icon icon'>
                <a href='tel:+71234567890' class='header__contact-text'>+7 (495) 633-62-62</a>
            </div>
        </address>
        <a href='/korzina.php' class='account__button'>
            <div class='header_top-link-icon' id='cart-icon'>
                <svg width="20" height="20" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path width='20' height='20' d="M1.34253 6.04498V5.03599C1.05903 5.03599 0.788618 5.15525 0.597451 5.36459C0.406284 5.57394 0.312004 5.85404 0.337682 6.13637L1.34253 6.04498ZM17.4865 6.04498L18.4913 6.13637C18.517 5.85404 18.4227 5.57394 18.2315 5.36459C18.0404 5.15525 17.7699 5.03599 17.4865 5.03599V6.04498ZM16.6439 15.3086L15.6391 15.2172L15.6391 15.2173L16.6439 15.3086ZM14.635 17.1439L14.635 18.1529L14.6354 18.1529L14.635 17.1439ZM4.19395 17.1439L4.19355 18.1529H4.19395V17.1439ZM2.18504 15.3086L3.18989 15.2173L3.18989 15.2172L2.18504 15.3086ZM4.36965 8.06297C4.36965 8.62022 4.82139 9.07196 5.37865 9.07196C5.9359 9.07196 6.38764 8.62022 6.38764 8.06297H4.36965ZM9.41463 1V-0.00899506V1ZM13.4506 5.03598L14.4596 5.03598L13.4506 5.03598ZM12.4416 8.06297C12.4416 8.62022 12.8934 9.07196 13.4506 9.07196C14.0079 9.07196 14.4596 8.62022 14.4596 8.06297H12.4416ZM1.34253 6.04498V7.05398H17.4865V6.04498V5.03599H1.34253V6.04498ZM17.4865 6.04498L16.4816 5.95359L15.6391 15.2172L16.6439 15.3086L17.6488 15.4L18.4913 6.13637L17.4865 6.04498ZM16.6439 15.3086L15.6391 15.2173C15.6163 15.4679 15.5006 15.7011 15.3148 15.8709L15.9954 16.6158L16.6759 17.3607C17.2335 16.8513 17.5805 16.152 17.6488 15.3999L16.6439 15.3086ZM15.9954 16.6158L15.3148 15.8709C15.129 16.0406 14.8864 16.1348 14.6346 16.1349L14.635 17.1439L14.6354 18.1529C15.3906 18.1526 16.1184 17.8701 16.6759 17.3607L15.9954 16.6158ZM14.635 17.1439V16.1349H4.19395V17.1439V18.1529H14.635V17.1439ZM4.19395 17.1439L4.19435 16.1349C3.94262 16.1348 3.70003 16.0406 3.51418 15.8709L2.83362 16.6158L2.15305 17.3607C2.71058 17.8701 3.43837 18.1526 4.19355 18.1529L4.19395 17.1439ZM2.83362 16.6158L3.51418 15.8709C3.32834 15.7011 3.21268 15.4679 3.18989 15.2173L2.18504 15.3086L1.18019 15.3999C1.24853 16.152 1.59553 16.8513 2.15305 17.3607L2.83362 16.6158ZM2.18504 15.3086L3.18989 15.2172L2.34738 5.95359L1.34253 6.04498L0.337682 6.13637L1.18019 15.4L2.18504 15.3086ZM5.37865 8.06297H6.38764V5.03598H5.37865H4.36965V8.06297H5.37865ZM5.37865 5.03598H6.38764C6.38764 4.23317 6.70655 3.46325 7.27422 2.89558L6.56076 2.18211L5.84729 1.46864C4.90117 2.41476 4.36965 3.69797 4.36965 5.03598H5.37865ZM6.56076 2.18211L7.27422 2.89558C7.84189 2.32791 8.61182 2.009 9.41463 2.009V1V-0.00899506C8.07662 -0.00899506 6.79341 0.522527 5.84729 1.46864L6.56076 2.18211ZM9.41463 1L9.41463 2.009C10.2174 2.009 10.9874 2.32791 11.555 2.89558L12.2685 2.18211L12.982 1.46864C12.0358 0.522527 10.7526 -0.00899506 9.41463 -0.00899506L9.41463 1ZM12.2685 2.18211L11.555 2.89558C12.1227 3.46325 12.4416 4.23317 12.4416 5.03598L13.4506 5.03598L14.4596 5.03598C14.4596 3.69797 13.9281 2.41476 12.982 1.46864L12.2685 2.18211ZM13.4506 5.03598H12.4416V8.06297H13.4506H14.4596V5.03598H13.4506Z" fill="#222222" />
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
                    <svg width='14' height='11' viewBox='0 0 14 11' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path
                            d='M6.46478 9.85598C6.52441 9.9448 6.60421 10.0174 6.69729 10.0676C6.79038 10.1178 6.89396 10.144 6.99912 10.144C7.10428 10.144 7.20786 10.1178 7.30094 10.0676C7.39403 10.0174 7.47382 9.9448 7.53346 9.85598L13.3839 1.18991C13.4516 1.08996 13.4913 0.97288 13.4987 0.851404C13.5061 0.729928 13.4809 0.608699 13.4258 0.500887C13.3708 0.393075 13.2879 0.302803 13.1863 0.239881C13.0847 0.176958 12.9683 0.143791 12.8496 0.143983H1.14866C1.03025 0.144484 0.914212 0.178078 0.813027 0.241151C0.711842 0.304225 0.629337 0.394391 0.574385 0.501953C0.519434 0.609516 0.494115 0.730406 0.501151 0.851621C0.508187 0.972837 0.547312 1.08979 0.614319 1.18991L6.46478 9.85598Z'
                            fill='white' />
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
                    <svg width="21" height="17" viewBox="0 0 21 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M2.57886 16.072C2.02886 16.072 1.55819 15.8764 1.16686 15.485C0.775524 15.0937 0.579524 14.6227 0.578857 14.072L0.578857 2.07202C0.578857 1.52202 0.774858 1.05135 1.16686 0.660021C1.55886 0.268688 2.02952 0.0726882 2.57886 0.0720215L18.5789 0.0720215C19.1289 0.0720215 19.5999 0.268021 19.9919 0.660021C20.3839 1.05202 20.5795 1.52269 20.5789 2.07202V14.072C20.5789 14.622 20.3832 15.093 19.9919 15.485C19.6005 15.877 19.1295 16.0727 18.5789 16.072H2.57886ZM10.5789 9.07202L18.5789 4.07202V2.07202L10.5789 7.07202L2.57886 2.07202V4.07202L10.5789 9.07202Z"
                            fill="#222222" />
                    </svg>
                    <a href='mailto:somemail@mail.ru' class='header__top-contact-text'>somemail@mail.ru</a>
                </div>

                <div class='header__top-contact-box'>
                    <svg width="21" height="22" viewBox="0 0 21 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M20.532 16.3992C20.299 16.1397 19.4762 15.3724 17.9637 14.3572C16.44 13.3332 15.3163 12.6948 14.9939 12.5459C14.9655 12.5327 14.9342 12.5279 14.9034 12.5319C14.8726 12.5359 14.8434 12.5487 14.8189 12.5687C14.2997 12.9921 13.4256 13.7696 13.3787 13.8116C13.076 14.0828 13.076 14.0828 12.8283 13.9983C12.3925 13.849 11.0389 13.0975 9.85943 11.8616C8.67993 10.6257 7.92411 9.17561 7.78125 8.72055C7.69955 8.46105 7.69955 8.46105 7.95982 8.14461C8 8.0956 8.74422 7.18174 9.14914 6.6394C9.16834 6.61386 9.18053 6.58334 9.18438 6.5511C9.18824 6.51887 9.18362 6.48614 9.17102 6.45645C9.0286 6.119 8.41787 4.94471 7.43838 3.35176C6.46603 1.77095 5.73298 0.910764 5.48476 0.667131C5.46198 0.64466 5.43383 0.629027 5.40326 0.621881C5.3727 0.614735 5.34086 0.61634 5.31109 0.626526C4.44343 0.938261 3.60626 1.33601 2.81103 1.81435C2.04334 2.28091 1.31654 2.81739 0.639093 3.41757C0.615445 3.43859 0.597716 3.46594 0.587806 3.49669C0.577896 3.52744 0.57618 3.56043 0.582842 3.59213C0.676148 4.04672 1.12214 5.94444 2.50611 8.57307C3.9182 11.2558 4.8968 12.6303 6.97051 14.7908C9.04423 16.9513 10.4005 18.036 12.9693 19.5123C15.4837 20.9591 17.2998 21.4259 17.7337 21.5225C17.7641 21.5294 17.7957 21.5276 17.8252 21.5172C17.8547 21.5068 17.8809 21.4884 17.9012 21.4637C18.4751 20.7555 18.9882 19.9956 19.4342 19.193C19.8917 18.3616 20.2722 17.4864 20.5704 16.5793C20.58 16.5485 20.5814 16.5155 20.5747 16.4838C20.5679 16.4521 20.5532 16.4229 20.532 16.3992Z"
                            fill="#222222" />
                    </svg>
                    <a href='tel:+71234567890' class='header__top-contact-text'>+7 (495) 633-62-62</a>
                </div>
            </div>
        </address>
    </nav>
</header>
<script src='/js/burger.js'></script>