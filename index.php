<?php session_start(); ?>
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
                    <a class='link_button' href='/uslugi/promyshlennyy-alpinizm.php'>Заказать</a>
                </div>
                <div class='slide'>
                    <p>Профессиональные строительные и отделочные работы</p>
                    <img loading='lazy' width="1200" class='slider__image' src='/assets/img/index/slider2.webp' alt='Изображение слайдера' />
                    <a class='link_button' href='/uslugi/index.php'>Заказать</a>
                </div>
                <div class='slide'>
                    <p>Дизайн и проектирование</p>
                    <img loading='lazy' width="1200" class='slider__image' src='/assets/img/index/slider3.webp' alt='Изображение слайдера' />
                    <a class='link_button' href='dizayn.php'>Заказать</a>
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

        <section class='services_cards-wrapper container'>
            <h2>Новые предложения</h2>
            <div class='services_cards'>
                <?php
                require_once 'includes/helpers.php';
                $services = query($pdo, "SELECT * FROM `services` ORDER BY `id` DESC LIMIT 3;");
                if ($services):
                    foreach ($services as $service):
                        $price_units = format_price_units($service['price_units']); ?>
                        <div class='service_card'>
                            <img class='service-img' src='/assets/uploads/services_images/<?= $service['image_url'] ?>' alt='Изображение услуги' />
                            <div class='service_card-text-block'>
                                <h3 class='service_title'><?= $service['name'] ?></h3>
                                <p class='service_description'><?= $service['short_description'] ?></p>
                                <p class='service_price'><?= $service['price'] != null ? "от {$service['price']} ₽{$price_units}" : 'Цена договорная' ?></p>
                            </div>
                            <a href='/service.php?service_id=<?= $service['id'] ?>' class='action_button actbtn-o'>Подробнее</a>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <h3>Услуг в этой категории пока нет</h3>
                <?php endif; ?>
            </div>
        </section>

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
                <?php $reviews = query($pdo, "SELECT
                reviews.review_text,
                reviews.created_at,
                reviews.user_id,
                users.first_name,
                users.last_name,
                users.profile_image_url
                FROM reviews
                LEFT JOIN users ON reviews.user_id = users.id
                WHERE reviews.review_status = 'accepted'
                ORDER BY reviews.created_at DESC LIMIT 3;");

                if ($reviews):
                    foreach ($reviews as $review):
                        $userName = isset($review['first_name']) ? ($review['first_name'] . ' ' . mb_substr($review['last_name'], 0, 1, 'UTF-8') . '.') : 'Аккаунт удалён';
                        $userAvatar = isset($review['profile_image_url']) ? $review['profile_image_url'] : 'default_pfp.png'; ?>
                        <div class='review'>
                            <div class='review-user'>
                                <img loading='lazy' width='40' height='40' class='review-user-pfp' src='/assets/uploads/profile_pictures/<?= $userAvatar  ?>' alt='Фото профиля'>
                                <h3><?= $userName ?></h3>
                            </div>
                            <p class='review-text'><?= $review['review_text'] ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="review" style="text-align: center;">
                        <h3>Отзывов пока нет</h3>
                    </div>
                <?php endif; ?>
            </div>
            <a class='action_button actbtn-w' href='otzyvy.php'>Все отзывы</a>
        </div>
        <div class="map-wrapper container">
            <h2>Наш офис на карте</h2>
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A946d4071ccc5d03b452b5690962b39b59eabd2f5919b3a9033de4f61da6585d1&amp;width=500&amp;height=400&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>
    </main>
    <?php require_once 'includes/components/footer.php'; ?>
    <script src='js/slider.js'></script>
</body>

</html>