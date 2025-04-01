<!DOCTYPE html>
<html lang='ru'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>СтройМосКомплекс - Главная</title>
    <meta name='description'
        content='Строительство, проектирование и дизайн под ключ в Москве и области. Профессиональные услуги промышленного альпинизма. Гарантия качества и соблюдение сроков.'>
    <meta name='robots' content='index, follow'>
    <link rel='stylesheet' href='/css/pages/index.css'>
    <link rel='shortcut icon' href='/assets/svg/favicon.svg' type='image/x-icon'>
</head>

<body>
    <?php require_once 'includes/components/header.php'; ?>
    <main>
        <div class='slider-wrapper'>
            <button id='prev' class='slider__button'>
                <svg class='slider__arrow' width='26' height='41'>
                    <use href='/assets/svg/slider_sprite.svg#leftArrow'></use>
                </svg>
            </button>
            <div class='slider' id='slider'>
                <div class='slide'>
                    <p>Услуги промышленного альпинизма</p>
                    <img width="1200" class='slider__image' src='/assets/img/index/slider1.webp' alt='Изображение слайдера' fetchpriority="high" />
                    <?php $link = 'prom-alpinizm.php';
                    $linkbtn_text = 'Заказать';
                    require 'includes/components/link_button.php'; ?>
                </div>
                <div class='slide'>
                    <p>Профессиональные строительные и отделочные работы</p>
                    <img loading='lazy' width="1200" class='slider__image' src='/assets/img/index/slider2.webp' alt='Изображение слайдера' />
                    <?php $link = 'katalog.php';
                    $linkbtn_text = 'Заказать';
                    require 'includes/components/link_button.php'; ?>
                </div>
                <div class='slide'>
                    <p>Дизайн и проектирование</p>
                    <img loading='lazy' width="1200" class='slider__image' src='/assets/img/index/slider3.webp' alt='Изображение слайдера' />
                    <?php $link = 'dizayn.php';
                    $linkbtn_text = 'Заказать';
                    require 'includes/components/link_button.php'; ?>
                </div>
            </div>
            <button id='next' class='slider__button'>
                <svg class='slider__arrow' width='26' height='41'>
                    <use href='/assets/svg/slider_sprite.svg#rightArrow'></use>
                </svg>
            </button>
            <div class='slider__dots'></div>
        </div>

        <div class='advantages__block-wrapper container'>
            <h2>Почему выбирают именно нас?</h2>
            <div class='advantages__block-text'>
                <p class='advantage__block-text' id='left-adv'>
                    <span class='inline-heading'>
                        <span class='stroy'>Строй</span>МосКомплекс
                    </span> – <br>надежный партнер в строительстве и ремонте
                </p>
                <p class='advantage__block-text' id='right-adv'>
                    Мы предлагаем комплексный подход, основанный на нескольких ключевых принципах:
                </p>
            </div>
            <div class='advantages'>
                <div class='advantage'>
                    <svg class='advantage-icon' width='50' height='51'>
                        <use href='/assets/svg/advantages_sprite.svg#organizations'></use>
                    </svg>
                    <p class='advantage-text'>Сотрудничество с организациями</p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='50' height='56'>
                        <use href='/assets/svg/advantages_sprite.svg#experience'></use>
                    </svg>
                    <p class='advantage-text'>Более 15 лет успешной работы на рынке </p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='50' height='54'>
                        <use href='/assets/svg/advantages_sprite.svg#workers'></use>
                    </svg>
                    <p class='advantage-text'>Квалифицированные сотрудники</p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='54' height='55'>
                        <use href='/assets/svg/advantages_sprite.svg#technologies'></use>
                    </svg>
                    <p class='advantage-text'>Передовые технологии и оборудование</p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='52' height='55'>
                        <use href='/assets/svg/advantages_sprite.svg#client'></use>
                    </svg>
                    <p class='advantage-text'>Учёт всех пожеланий клиента</p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='52' height='52'>
                        <use href='/assets/svg/advantages_sprite.svg#guarantee'></use>
                    </svg>
                    <p class='advantage-text'>Гарантия на выполненные работы</p>
                    <hr class='advantage-hr'>
                </div>
            </div>
        </div>

        <div class='our_projects-wrapper container'>
            <h2>Наши работы</h2>
            <div class='our_projects__cards'>
                <div class='project__card'>
                    <img loading='lazy' class='project__card-image' src='/assets/img/index/proj1.webp' alt='Проект офиса' width='320' height='250'>
                    <div class='project-text-wrapper'>
                        <div class='project-text'>
                            <h3 class='project-title'>Офис</h3>
                            <p class='project-text-description'>Ремонт офиса площадью 200м² в классическом стиле</p>
                        </div>
                    </div>
                </div>
                <div class='project__card'>
                    <img loading='lazy' class='project__card-image' src='/assets/img/index/proj2.webp' alt='Проект квартиры' width='320' height='250'>
                    <div class='project-text-wrapper'>
                        <div class='project-text'>
                            <h3 class='project-title'>Квартира</h3>
                            <p class='project-text-description'>
                                Отделка квартиры в новостройке площадью 100м² в современном стиле
                            </p>
                        </div>
                    </div>
                </div>
                <div class='project__card'>
                    <img loading='lazy' class='project__card-image' src='/assets/img/index/proj3.webp' alt='Проект дома' width='320' height='250'>
                    <div class='project-text-wrapper'>
                        <div class='project-text'>
                            <h3 class='project-title'>Дом</h3>
                            <p class='project-text-description'>
                                Реконструкция загородного дома площадью 250 м² в стиле "прованс"
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='reviews-wrapper container'>
            <h2>Отзывы наших клиентов</h2>
            <div class='reviews'>
                <div class='review'>
                    <div class='review-user'>
                        <img loading='lazy' width='40' height='40' class='review-user-pfp' src='/assets/img/avatars/irina.webp' alt='Фото профиля'>
                        <h3>Ирина Ё.</h3>
                    </div>
                    <p class='review-text'>
                        "СтройМосКомплекс" провёл реконструкцию нашего загородного дома. Работа заняла 6 месяцев.
                        Команда профессионалов учла все наши пожелания, проект был завершён в срок, результат превзошёл
                        все ожидания!!
                    </p>
                </div>
                <div class='review'>
                    <div class='review-user'>
                        <img loading='lazy' width='40' height='40' class='review-user-pfp' src='/assets/img/avatars/pavel.webp' alt='Фото профиля'>
                        <h3>Павел Т.</h3>
                    </div>
                    <p class='review-text'>
                        Заказывал здесь редизайн офиса для нашей компании. Работали быстро, качественно, учли все
                        детали. Доволен результатом.
                    </p>
                </div>
                <div class='review'>
                    <div class='review-user'>
                        <img loading='lazy' width='40' height='40' class='review-user-pfp' src='/assets/img/avatars/default_pfp.webp' alt='Фото профиля'>
                        <h3>Абдул Х.</h3>
                    </div>
                    <p class='review-text'>
                        Отличная работа, дом построили идеально и в срок!
                    </p>
                </div>
            </div>
            <a class='action_button actbtn-w' href='otzyvy.php'>Все отзывы</a>
        </div>

    </main>
    <?php require_once 'includes/components/footer.php'; ?>
    <script src='js/slider.js'></script>
</body>

</html>