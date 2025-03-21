<?php
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
        <a href='login.php' class='account__button'>
            <img src='/assets/svg/profile_icon.svg' class='account__icon' alt='account icon'>
            <span class='account__button-text'>Войти</span>
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
                <a href='uslugi.php' class='header__menu-link <?= isActive('uslugi.php'); ?>'>
                    <span class='header__menu-text'>Услуги</span>
                    <svg width='14' height='11' viewBox='0 0 14 11' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path
                            d='M6.46478 9.85598C6.52441 9.9448 6.60421 10.0174 6.69729 10.0676C6.79038 10.1178 6.89396 10.144 6.99912 10.144C7.10428 10.144 7.20786 10.1178 7.30094 10.0676C7.39403 10.0174 7.47382 9.9448 7.53346 9.85598L13.3839 1.18991C13.4516 1.08996 13.4913 0.97288 13.4987 0.851404C13.5061 0.729928 13.4809 0.608699 13.4258 0.500887C13.3708 0.393075 13.2879 0.302803 13.1863 0.239881C13.0847 0.176958 12.9683 0.143791 12.8496 0.143983H1.14866C1.03025 0.144484 0.914212 0.178078 0.813027 0.241151C0.711842 0.304225 0.629337 0.394391 0.574385 0.501953C0.519434 0.609516 0.494115 0.730406 0.501151 0.851621C0.508187 0.972837 0.547312 1.08979 0.614319 1.18991L6.46478 9.85598Z'
                            fill='white' />
                    </svg>
                </a>
                <div class="expanded">
                    <a href="#" class='header__menu-link'>Промышленный альпинизм</a>
                    <a href="#" class='header__menu-link'>Строительные работы</a>
                    <a href="#" class='header__menu-link'>Отделочные работы</a>
                    <a href="#" class='header__menu-link'>Дизайн и проектирование</a>
                </div>
            </li>
            <li class='header__menu-item'>
                <a href='o-kompanii.php' class='header__menu-link <?= isActive('o-kompanii.php'); ?>'>
                    <span class='header__menu-text'>О компании</span>
                </a>
            </li>
            <li class='header__menu-item'>
                <a href='portfolio.php' class='header__menu-link <?= isActive('portfolio.php'); ?>'>
                    <span class='header__menu-text'>Портфолио</span>
                </a>
            </li>
            <li class='header__menu-item'>
                <a href='otzyvy.php' class='header__menu-link <?= isActive('otzyvy.php'); ?>'>
                    <span class='header__menu-text'>Отзывы</span>
                </a>
            </li>
            <li class='header__menu-item'>
                <a href='faq.php' class='header__menu-link <?= isActive('aq.php'); ?>'>
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