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
                <svg class='slider__arrow' width='26' height='41' viewBox='0 0 26 41' fill='none' xmlns='http://www.w3.org/2000/svg'>
                    <path
                        d='M10.8678 21.9125C10.0866 21.1315 10.0866 19.865 10.8677 19.0839L24.5853 5.36631C25.3665 4.58507 25.3663 3.31835 24.5848 2.53738L22.6874 0.641375C21.9064 -0.139158 20.6405 -0.138986 19.8596 0.641763L1.41443 19.0841C0.63328 19.8651 0.633232 21.1315 1.41432 21.9126L19.8586 40.3569C20.6399 41.1381 21.9066 41.1379 22.6875 40.3564L24.5866 38.4559C25.3673 37.6748 25.367 36.4087 24.586 35.6279L10.8678 21.9125Z'
                        fill='#FDFDFD' />
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
                <svg class='slider__arrow' width='26' height='41' viewBox='0 0 26 41' fill='none' xmlns='http://www.w3.org/2000/svg'>
                    <path
                        d='M15.1322 21.9125C15.9134 21.1315 15.9134 19.865 15.1323 19.0839L1.41471 5.36631C0.633471 4.58507 0.633694 3.31835 1.41521 2.53738L3.31256 0.641375C4.09365 -0.139158 5.35951 -0.138986 6.14038 0.641763L24.5856 19.0841C25.3667 19.8651 25.3668 21.1315 24.5857 21.9126L6.14138 40.3569C5.36013 41.1381 4.09342 41.1379 3.31245 40.3564L1.41336 38.4559C0.632724 37.6748 0.633011 36.4087 1.414 35.6279L15.1322 21.9125Z'
                        fill='#FDFDFD' />
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
                    <svg class='advantage-icon' width='50' height='51' viewBox='0 0 50 51' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path
                            d='M5.46875 50.144C4.01835 50.144 2.62735 49.5679 1.60176 48.5423C0.57617 47.5167 0 46.1257 0 44.6753L0 5.61279C0 2.59404 2.45 0.144043 5.46875 0.144043H32.0312C35.05 0.144043 37.5 2.59404 37.5 5.61279V44.6753C37.5 44.9399 37.4813 45.2003 37.4438 45.4565H44.5312C44.7384 45.4565 44.9372 45.3742 45.0837 45.2277C45.2302 45.0812 45.3125 44.8825 45.3125 44.6753V26.0347C45.3126 25.9062 45.281 25.7796 45.2205 25.6662C45.16 25.5528 45.0724 25.4561 44.9656 25.3847L41.6687 23.1878C41.4127 23.0171 41.1927 22.7976 41.0215 22.5419C40.8502 22.2861 40.731 21.9992 40.6707 21.6974C40.6103 21.3956 40.61 21.0849 40.6697 20.783C40.7294 20.4811 40.848 20.1939 41.0188 19.9378C41.1895 19.6817 41.409 19.4618 41.6647 19.2905C41.9204 19.1193 42.2073 19.0001 42.5091 18.9397C42.8109 18.8793 43.1216 18.879 43.4236 18.9387C43.7255 18.9985 44.0127 19.1171 44.2688 19.2878L47.5656 21.4847C49.0875 22.5003 50 24.2065 50 26.0347V44.6753C50 46.1257 49.4238 47.5167 48.3982 48.5423C47.3727 49.5679 45.9817 50.144 44.5312 50.144H33.5938C33.386 50.1427 33.1792 50.1154 32.9781 50.0628C32.6698 50.117 32.3542 50.144 32.0312 50.144H22.6562C22.0346 50.144 21.4385 49.8971 20.999 49.4576C20.5594 49.018 20.3125 48.4219 20.3125 47.8003V43.894H17.1875V47.8003C17.1875 48.4219 16.9406 49.018 16.501 49.4576C16.0615 49.8971 15.4654 50.144 14.8438 50.144H5.46875ZM4.6875 44.6753C4.6875 45.1065 5.0375 45.4565 5.46875 45.4565H12.5V41.5503C12.5 40.9287 12.7469 40.3326 13.1865 39.893C13.626 39.4535 14.2221 39.2065 14.8438 39.2065H22.6562C23.2779 39.2065 23.874 39.4535 24.3135 39.893C24.7531 40.3326 25 40.9287 25 41.5503V45.4565H32.0312C32.2384 45.4565 32.4372 45.3742 32.5837 45.2277C32.7302 45.0812 32.8125 44.8825 32.8125 44.6753V5.61279C32.8125 5.40559 32.7302 5.20688 32.5837 5.06037C32.4372 4.91385 32.2384 4.83154 32.0312 4.83154H5.46875C5.26155 4.83154 5.06284 4.91385 4.91632 5.06037C4.76981 5.20688 4.6875 5.40559 4.6875 5.61279V44.6753ZM11.7188 18.894H13.2812C13.9029 18.894 14.499 19.141 14.9385 19.5805C15.3781 20.0201 15.625 20.6162 15.625 21.2378C15.625 21.8594 15.3781 22.4555 14.9385 22.8951C14.499 23.3346 13.9029 23.5815 13.2812 23.5815H11.7188C11.0971 23.5815 10.501 23.3346 10.0615 22.8951C9.62193 22.4555 9.375 21.8594 9.375 21.2378C9.375 20.6162 9.62193 20.0201 10.0615 19.5805C10.501 19.141 11.0971 18.894 11.7188 18.894ZM9.375 11.8628C9.375 11.2412 9.62193 10.645 10.0615 10.2055C10.501 9.76597 11.0971 9.51904 11.7188 9.51904H13.2812C13.9029 9.51904 14.499 9.76597 14.9385 10.2055C15.3781 10.645 15.625 11.2412 15.625 11.8628C15.625 12.4844 15.3781 13.0805 14.9385 13.5201C14.499 13.9596 13.9029 14.2065 13.2812 14.2065H11.7188C11.0971 14.2065 10.501 13.9596 10.0615 13.5201C9.62193 13.0805 9.375 12.4844 9.375 11.8628ZM21.875 21.2378C21.875 20.6162 22.1219 20.0201 22.5615 19.5805C23.001 19.141 23.5971 18.894 24.2188 18.894H25.7812C26.4029 18.894 26.999 19.141 27.4385 19.5805C27.8781 20.0201 28.125 20.6162 28.125 21.2378C28.125 21.8594 27.8781 22.4555 27.4385 22.8951C26.999 23.3346 26.4029 23.5815 25.7812 23.5815H24.2188C23.5971 23.5815 23.001 23.3346 22.5615 22.8951C22.1219 22.4555 21.875 21.8594 21.875 21.2378ZM24.2188 9.51904H25.7812C26.4029 9.51904 26.999 9.76597 27.4385 10.2055C27.8781 10.645 28.125 11.2412 28.125 11.8628C28.125 12.4844 27.8781 13.0805 27.4385 13.5201C26.999 13.9596 26.4029 14.2065 25.7812 14.2065H24.2188C23.5971 14.2065 23.001 13.9596 22.5615 13.5201C22.1219 13.0805 21.875 12.4844 21.875 11.8628C21.875 11.2412 22.1219 10.645 22.5615 10.2055C23.001 9.76597 23.5971 9.51904 24.2188 9.51904ZM9.375 30.6128C9.375 29.9912 9.62193 29.3951 10.0615 28.9555C10.501 28.516 11.0971 28.269 11.7188 28.269H13.2812C13.9029 28.269 14.499 28.516 14.9385 28.9555C15.3781 29.3951 15.625 29.9912 15.625 30.6128C15.625 31.2344 15.3781 31.8305 14.9385 32.2701C14.499 32.7096 13.9029 32.9565 13.2812 32.9565H11.7188C11.0971 32.9565 10.501 32.7096 10.0615 32.2701C9.62193 31.8305 9.375 31.2344 9.375 30.6128ZM24.2188 28.269H25.7812C26.4029 28.269 26.999 28.516 27.4385 28.9555C27.8781 29.3951 28.125 29.9912 28.125 30.6128C28.125 31.2344 27.8781 31.8305 27.4385 32.2701C26.999 32.7096 26.4029 32.9565 25.7812 32.9565H24.2188C23.5971 32.9565 23.001 32.7096 22.5615 32.2701C22.1219 31.8305 21.875 31.2344 21.875 30.6128C21.875 29.9912 22.1219 29.3951 22.5615 28.9555C23.001 28.516 23.5971 28.269 24.2188 28.269Z'
                            fill='#FF8A42' />
                    </svg>
                    <p class='advantage-text'>Сотрудничество с организациями</p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='50' height='56' viewBox='0 0 50 56' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path
                            d='M25 15.2312C26.3807 15.2312 27.5 14.1054 27.5 12.7167C27.5 11.328 26.3807 10.2022 25 10.2022C23.6193 10.2022 22.5 11.328 22.5 12.7167C22.5 14.1054 23.6193 15.2312 25 15.2312Z'
                            fill='#FF8A42' />
                        <path
                            d='M10 40.3762H40V45.4052H10V40.3762ZM20 27.3762L26.98 34.4017L36.81 24.5072L40 27.8037V17.7457H30L33.275 20.9517L26.9775 27.2857L20 20.2602L10 30.3182L13.535 33.8737L20 27.3762Z'
                            fill='#FF8A42' />
                        <path
                            d='M42.5 5.17321H34.255C34.0074 4.80297 33.7403 4.44624 33.455 4.10455L33.43 4.07438C31.5925 1.92341 29.0086 0.558296 26.205 0.257367C25.4087 0.106268 24.5913 0.106268 23.795 0.257367C20.9914 0.558296 18.4075 1.92341 16.57 4.07438L16.545 4.10455C16.2597 4.44542 15.9927 4.80131 15.745 5.1707V5.17321H7.5C5.51149 5.17521 3.60498 5.97061 2.19889 7.38486C0.7928 8.79911 0.00198554 10.7167 0 12.7167V47.9197C0.00198554 49.9197 0.7928 51.8373 2.19889 53.2515C3.60498 54.6658 5.51149 55.4612 7.5 55.4632H42.5C44.4885 55.4612 46.395 54.6658 47.8011 53.2515C49.2072 51.8373 49.998 49.9197 50 47.9197V12.7167C49.998 10.7167 49.2072 8.79911 47.8011 7.38486C46.395 5.97061 44.4885 5.17521 42.5 5.17321ZM45 47.9197C45 48.5866 44.7366 49.2262 44.2678 49.6977C43.7989 50.1693 43.163 50.4342 42.5 50.4342H7.5C6.83696 50.4342 6.20107 50.1693 5.73223 49.6977C5.26339 49.2262 5 48.5866 5 47.9197V12.7167C5 12.0498 5.26339 11.4103 5.73223 10.9387C6.20107 10.4671 6.83696 10.2022 7.5 10.2022H18.875C19.1619 8.78116 19.9284 7.50356 21.0447 6.58589C22.1609 5.66822 23.5583 5.16691 25 5.16691C26.4417 5.16691 27.8391 5.66822 28.9553 6.58589C30.0716 7.50356 30.8381 8.78116 31.125 10.2022H42.5C43.163 10.2022 43.7989 10.4671 44.2678 10.9387C44.7366 11.4103 45 12.0498 45 12.7167V47.9197Z'
                            fill='#FF8A42' />
                    </svg>
                    <p class='advantage-text'>Более 15 лет успешной работы на рынке </p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='50' height='54' viewBox='0 0 50 54' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path fill-rule='evenodd' clip-rule='evenodd'
                            d='M12.625 10.5726C12.9877 8.05403 14.1104 5.70611 15.843 3.84261C17.5757 1.9791 19.8359 0.688773 22.3214 0.144043V6.10833C22.3214 6.81873 22.6036 7.50004 23.106 8.00237C23.6083 8.50469 24.2896 8.7869 25 8.7869C25.7104 8.7869 26.3917 8.50469 26.894 8.00237C27.3964 7.50004 27.6786 6.81873 27.6786 6.10833V0.144043C30.1635 0.689416 32.4228 1.98003 34.1548 3.84348C35.8868 5.70693 37.009 8.0545 37.3714 10.5726H38.3929C39.1033 10.5726 39.7846 10.8548 40.2869 11.3572C40.7892 11.8595 41.0714 12.5408 41.0714 13.2512C41.0714 13.9616 40.7892 14.6429 40.2869 15.1452C39.7846 15.6476 39.1033 15.9298 38.3929 15.9298H37.5C37.5 19.245 36.183 22.4244 33.8388 24.7686C31.4946 27.1128 28.3152 28.4298 25 28.4298C21.6848 28.4298 18.5054 27.1128 16.1612 24.7686C13.817 22.4244 12.5 19.245 12.5 15.9298H11.6071C10.8967 15.9298 10.2154 15.6476 9.71311 15.1452C9.21078 14.6429 8.92857 13.9616 8.92857 13.2512C8.92857 12.5408 9.21078 11.8595 9.71311 11.3572C10.2154 10.8548 10.8967 10.5726 11.6071 10.5726H12.625ZM25 23.0726C23.1056 23.0726 21.2888 22.3201 19.9492 20.9805C18.6097 19.641 17.8571 17.8242 17.8571 15.9298H32.1429C32.1429 17.8242 31.3903 19.641 30.0508 20.9805C28.7112 22.3201 26.8944 23.0726 25 23.0726ZM5.35714 44.5012C5.35714 43.7726 6.14286 41.6119 10.0714 39.2905C10.3337 39.136 10.5992 38.9872 10.8679 38.844L14.3214 48.0726H8.92857C7.98137 48.0726 7.07296 47.6963 6.40319 47.0266C5.73342 46.3568 5.35714 45.4484 5.35714 44.5012ZM20.05 48.0726L15.8393 36.8512C18.8173 35.9952 21.9014 35.5647 25 35.5726C28.3214 35.5726 31.4286 36.0548 34.1607 36.8476L29.9536 48.0726H20.05ZM35.675 48.0726H41.0714C42.0186 48.0726 42.927 47.6963 43.5968 47.0266C44.2666 46.3568 44.6429 45.4484 44.6429 44.5012C44.6429 43.7726 43.8571 41.6119 39.9286 39.2905C39.6663 39.136 39.4008 38.9872 39.1321 38.844L35.675 48.0726ZM25 30.2155C11.25 30.2155 0 37.3583 0 44.5012C0 46.8692 0.940686 49.1402 2.61512 50.8146C4.28955 52.4891 6.56057 53.4298 8.92857 53.4298H41.0714C43.4394 53.4298 45.7104 52.4891 47.3849 50.8146C49.0593 49.1402 50 46.8692 50 44.5012C50 37.3583 38.75 30.2155 25 30.2155Z'
                            fill='#FF8A42' />
                    </svg>
                    <p class='advantage-text'>Квалифицированные сотрудники</p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='54' height='55' viewBox='0 0 54 55' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path
                            d='M9.5 37.4631L22 29.9631M32 24.9631L44.5 17.4631M27 9.96313V22.4631M27 9.96313C29.0711 9.96313 30.75 8.2842 30.75 6.21313M27 9.96313C24.9289 9.96313 23.25 8.2842 23.25 6.21313M27 32.4631V44.9631M27 44.9631C24.9289 44.9631 23.25 46.6421 23.25 48.7131M27 44.9631C29.0711 44.9631 30.75 46.6421 30.75 48.7131M9.5 17.4631L22 24.9631M32 29.9631L44.5 37.4631M48.25 19.9631V33.7131M48.25 19.9631C50.3211 19.9631 52 18.2842 52 16.2131C52 14.1421 50.3211 12.4631 48.25 12.4631C46.1789 12.4631 44.5 14.1421 44.5 16.2131C44.5 18.2842 46.1789 19.9631 48.25 19.9631ZM30.75 48.7131L44.5 41.2131M30.75 48.7131C30.75 50.7842 29.0711 52.4631 27 52.4631C24.9289 52.4631 23.25 50.7842 23.25 48.7131M8.25 41.2131L23.25 48.7131M5.75 34.9631V19.9631M5.75 34.9631C3.67893 34.9631 2 36.6421 2 38.7131C2 40.7842 3.67893 42.4631 5.75 42.4631C7.82107 42.4631 9.5 40.7842 9.5 38.7131C9.5 36.6421 7.82107 34.9631 5.75 34.9631ZM5.75 19.9631C7.82107 19.9631 9.5 18.2842 9.5 16.2131C9.5 14.1421 7.82107 12.4631 5.75 12.4631C3.67893 12.4631 2 14.1421 2 16.2131C2 18.2842 3.67893 19.9631 5.75 19.9631ZM8.25 13.7131L23.25 6.21313M23.25 6.21313C23.25 4.14207 24.9289 2.46313 27 2.46313C29.0711 2.46313 30.75 4.14207 30.75 6.21313M45.75 13.7131L30.75 6.21313M52 38.7131C52 40.7842 50.3211 42.4631 48.25 42.4631C46.1789 42.4631 44.5 40.7842 44.5 38.7131C44.5 36.6421 46.1789 34.9631 48.25 34.9631C50.3211 34.9631 52 36.6421 52 38.7131ZM27 21.8381L32 24.6506V30.2756L27 33.0881L22 30.2756V24.6506L27 21.8381Z'
                            stroke='#FF8A42' stroke-width='4' stroke-linecap='round' stroke-linejoin='round' />
                    </svg>
                    <p class='advantage-text'>Передовые технологии и оборудование</p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='52' height='55' viewBox='0 0 52 55' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path
                            d='M20.2308 22.852C23.0359 22.852 25.7262 21.7253 27.7098 19.7197C29.6933 17.7141 30.8077 14.9939 30.8077 12.1576C30.8077 9.32124 29.6933 6.60106 27.7098 4.59547C25.7262 2.58987 23.0359 1.46313 20.2308 1.46313C17.4256 1.46313 14.7353 2.58987 12.7518 4.59547C10.7682 6.60106 9.65385 9.32124 9.65385 12.1576C9.65385 14.9939 10.7682 17.7141 12.7518 19.7197C14.7353 21.7253 17.4256 22.852 20.2308 22.852ZM20.2308 5.35202C21.1149 5.35228 21.9904 5.52861 22.8071 5.87096C23.6239 6.2133 24.3659 6.71495 24.9909 7.34727C25.6159 7.97959 26.1117 8.73018 26.4498 9.5562C26.7879 10.3822 26.9618 11.2675 26.9615 12.1615C26.9613 13.0554 26.7869 13.9406 26.4483 14.7664C26.1097 15.5923 25.6136 16.3426 24.9882 16.9745C24.3629 17.6065 23.6205 18.1077 22.8036 18.4496C21.9866 18.7915 21.1111 18.9673 20.2269 18.967C18.4413 18.9665 16.729 18.2488 15.4668 16.9718C14.2045 15.6948 13.4956 13.963 13.4962 12.1576C13.4967 10.3521 14.2065 8.62081 15.4695 7.34452C16.7325 6.06823 18.4451 5.35151 20.2308 5.35202ZM6.76923 30.6298H27.1423L31.6308 26.7409H6.76923C5.23914 26.7409 3.77171 27.3555 2.68977 28.4495C1.60783 29.5434 1 31.0271 1 32.5742V34.5187C1 42.1837 8.15 50.0742 20.2308 50.0742V46.1854C10.3538 46.1854 4.84615 40.1109 4.84615 34.5187V32.5742C4.84615 32.0585 5.04876 31.564 5.40941 31.1993C5.77006 30.8347 6.2592 30.6298 6.76923 30.6298ZM25.4192 37.2448C24.9982 37.6099 24.6603 38.0626 24.4286 38.5721C24.1969 39.0816 24.077 39.6357 24.0769 40.1965V52.0187C24.0769 52.5344 24.2795 53.029 24.6402 53.3936C25.0008 53.7583 25.49 53.9631 26 53.9631H31.7692C32.2793 53.9631 32.7684 53.7583 33.1291 53.3936C33.4897 53.029 33.6923 52.5344 33.6923 52.0187V44.2409C33.6923 43.7252 33.8949 43.2306 34.2556 42.866C34.6162 42.5013 35.1054 42.2965 35.6154 42.2965H39.4615C39.9716 42.2965 40.4607 42.5013 40.8214 42.866C41.182 43.2306 41.3846 43.7252 41.3846 44.2409V52.0187C41.3846 52.5344 41.5872 53.029 41.9479 53.3936C42.3085 53.7583 42.7977 53.9631 43.3077 53.9631H49.0769C49.587 53.9631 50.0761 53.7583 50.4367 53.3936C50.7974 53.029 51 52.5344 51 52.0187V40.1965C51 39.0609 50.5077 37.9837 49.6577 37.2448L38.7923 27.8259C38.4437 27.5236 37.9996 27.3575 37.5404 27.3575C37.0811 27.3575 36.6371 27.5236 36.2885 27.8259L25.4192 37.2448Z'
                            fill='#FF8A42' stroke='#FF8A42' />
                    </svg>
                    <p class='advantage-text'>Учёт всех пожеланий клиента</p>
                    <hr class='advantage-hr'>
                </div>
                <div class='advantage'>
                    <svg class='advantage-icon' width='52' height='52' viewBox='0 0 52 52' fill='none' xmlns='http://www.w3.org/2000/svg'>
                        <path
                            d='M21.9304 49.381C24.7263 52.176 27.279 52.1544 30.0534 49.381L33.4429 46.0121C33.7951 45.6825 34.1031 45.55 34.5652 45.55H39.3203C43.2602 45.55 45.0869 43.7449 45.0869 39.7834V35.0284C45.0869 34.5663 45.2193 34.2582 45.549 33.906L48.8953 30.5156C51.7128 27.7422 51.6903 25.1895 48.8953 22.3935L45.549 19.0031C45.2193 18.6744 45.0869 18.3438 45.0869 17.9033V13.1266C45.0869 9.20835 43.2818 7.36004 39.3203 7.36004H34.5652C34.1031 7.36004 33.7951 7.24921 33.4429 6.91862L30.0525 3.55165C27.279 0.755704 24.7263 0.778244 21.9304 3.55165L18.54 6.91956C18.2112 7.24921 17.8806 7.3591 17.4402 7.3591H12.6635C8.72361 7.3591 6.8969 9.16421 6.8969 13.1257V17.9033C6.8969 18.3438 6.78608 18.6734 6.45549 19.004L3.08852 22.3945C0.292569 25.1895 0.315109 27.7422 3.08852 30.5165L6.45643 33.906C6.78608 34.2582 6.89596 34.5663 6.89596 35.0284V39.7834C6.89596 43.7233 8.72361 45.55 12.6625 45.55H17.4402C17.8806 45.55 18.2103 45.6825 18.5409 46.0121L21.9304 49.381ZM24.3958 46.9147L20.2577 42.7541C19.7731 42.2488 19.2669 42.0497 18.585 42.0497H12.6635C10.7044 42.0497 10.3963 41.7426 10.3963 39.7834V33.8619C10.3963 33.2017 10.1981 32.6954 9.71351 32.2108L5.55293 28.0728C4.1667 26.664 4.1667 26.2677 5.55293 24.8589L9.71351 20.7209C10.1981 20.2362 10.3963 19.73 10.3963 19.0482V13.1266C10.3963 11.1449 10.6827 10.8594 12.6635 10.8594H18.585C19.2669 10.8594 19.7731 10.6829 20.2568 10.1766L24.3958 6.01607C25.8045 4.62983 26.2009 4.62983 27.6096 6.01607L31.7477 10.1766C32.2323 10.6838 32.7385 10.8594 33.3988 10.8594H39.3203C41.2794 10.8594 41.5875 11.1675 41.5875 13.1266V19.0482C41.5875 19.73 41.8073 20.2362 42.2919 20.7199L46.4525 24.8589C47.8387 26.2677 47.8387 26.664 46.4525 28.0728L42.2919 32.2108C41.8073 32.6954 41.5875 33.2017 41.5875 33.8619V39.7834C41.5875 41.7426 41.2794 42.0506 39.3203 42.0506H33.3988C32.7385 42.0506 32.2323 42.2479 31.7477 42.755L27.6096 46.9156C26.2009 48.3018 25.8045 48.3009 24.3958 46.9147ZM22.569 37.011C23.2077 37.011 23.6914 36.7461 24.022 36.3498L36.2388 19.2689C36.4802 18.9167 36.6126 18.5203 36.6126 18.1466C36.6126 17.1773 35.8641 16.4072 34.8517 16.4072C34.1257 16.4072 33.7294 16.6495 33.2889 17.2881L22.5024 32.4747L16.933 26.3334C16.5592 25.9155 16.1413 25.7398 15.5909 25.7398C14.5127 25.7398 13.7417 26.4658 13.7417 27.4783C13.7417 27.9188 13.8957 28.3367 14.2047 28.6447L21.2044 36.4371C21.5341 36.7893 21.9529 37.011 22.569 37.011Z'
                            fill='#FF8A42' stroke='#FF8A42' />
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