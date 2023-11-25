<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    @yield('seo_texts')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
{{--    <title>Stab.uz</title>--}}
    <link rel="stylesheet" href="{{ asset('/assets/front/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/front/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/front/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/front/css/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/front/css/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/front/css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/front/css/media.css') }}">
</head>
<body>
@yield('content')
<!-- footer -->
<footer class="footer d-md-block d-none">
    <div class="d-flex flex-wrap justify-content-between ">
        <div class="footer-contact d-flex flex-sm-column justify-content-sm-start justify-content-between flex-row col-lg-4 col-md-3 col-sm-6 col-12">
            <div class="d-flex flex-column gap-2">
                <span>г. Ташкент, ул. Уста Ширин, 134</span>
                <a href="tel:+998781138885">+998 78 113 88 85</a>
                <a href="tel:+998712078885">+998 71 207 88 85</a>
                <p>Пн — сб  ·  9 — 20</p>
            </div>
            <div class="footer-socials d-flex flex-sm-row flex-column gap-lg-5 gap-sm-3 gap-4">
                <a href="/"><img src="{{ asset('assets/front/images/icons/facebook.svg') }}" alt=""></a>
                <a href="/"><img src="{{ asset('assets/front/image/icons/instagram.svg') }}" alt=""></a>
                <a href="/"><img src="{{ asset('assets/front/images/icons/telegram.svg') }}" alt=""></a>
            </div>
        </div>
        <div class="footer-delivery d-flex flex-column col-lg-3 col-md-3 col-sm-5 col-12 gap-2">
            <h6>Покупателям</h6>
            <a href="/">Доставка</a>
            <a href="/">Самовывоз</a>
            <a href="/">Способы оплаты</a>
            <a href="/">Гарантия качества</a>
            <a href="/">Как купить?</a>

        </div>
        <div class="footer-sellers d-flex flex-column col-lg-3 col-md-3 col-sm-6 col-12 gap-3">
            <a href="/" style="color: var(--red);font-size: 20px;line-height: 140%;font-weight: 600;">Скидки</a>
            <a href="/" style="color: var(--red);font-size: 20px;line-height: 140%;font-weight: 600;">Рассрочка</a>
            <a href="/" style="font-size: 20px;line-height: 140%;color: var(--black);font-weight: 600;">Услуги мастеров</a>
            <a href="/" style="font-size: 20px;line-height: 140%;color: var(--black);font-weight: 600;">Тендеры</a>
            <a href="/" style="font-size: 20px;line-height: 140%;color: var(--black);font-weight: 600;">Как стать партнером</a>
        </div>
        <div class="footer-about d-flex flex-column col-md-2 col-sm-5 col-12 gap-2">
            <h6>О компании</h6>
            <a href="/">О нас</a>
            <a href="/">Контакты</a>
            <a href="/">Отзывы</a>
            <a href="/">Новости</a>
            <a href="/">Акции</a>
        </div>
    </div>
    <div class="footer-agreement d-flex  justify-content-between">
        <div class="gap-2 flex-wrap d-flex align-items-center">
            <p>© 2018 — 2023</p>
            <p>Stab.uz</p>
            <p>Пользовательское соглашение</p>
        </div>
        <div class="gap-2 flex-wrap d-flex align-items-center">
            <p>Разработка сайта</p>
            <a href="https://www.optimize.uz/"><img src="{{ asset('assets/front/images/optimize_black 1.png') }}" alt=""></a>
        </div>
    </div>
</footer>
<section class="footer-menu d-md-none d-flex justify-content-sm-center justify-content-between align-items-center gap-sm-5 gap-0">
    <a href="#!" class="footer-menu_item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasTop" aria-controls="offcanvasTop">
        <svg width="29" height="29" viewBox="0 0 29 29" xmlns="http://www.w3.org/2000/svg">
            <path d="M10.6429 1H2.92857C1.86345 1 1 1.86345 1 2.92857V10.6429C1 11.708 1.86345 12.5714 2.92857 12.5714H10.6429C11.708 12.5714 12.5714 11.708 12.5714 10.6429V2.92857C12.5714 1.86345 11.708 1 10.6429 1Z"  stroke-width="2"/>
            <path d="M26.0714 16.4286H18.3571C17.292 16.4286 16.4286 17.292 16.4286 18.3571V26.0714C16.4286 27.1365 17.292 28 18.3571 28H26.0714C27.1365 28 28 27.1365 28 26.0714V18.3571C28 17.292 27.1365 16.4286 26.0714 16.4286Z"  stroke-width="2"/>
            <path d="M10.6429 16.4286H2.92857C1.86345 16.4286 1 17.292 1 18.3571V26.0714C1 27.1365 1.86345 28 2.92857 28H10.6429C11.708 28 12.5714 27.1365 12.5714 26.0714V18.3571C12.5714 17.292 11.708 16.4286 10.6429 16.4286Z"  stroke-width="2"/>
            <circle cx="22.5" cy="6.5" r="5.5"  stroke-width="2"/>
        </svg>
        <p>Каталог</p>
    </a>
    <a href="#!" class="footer-menu_item" data-bs-toggle="offcanvas" data-bs-target="#mobile-compare" aria-controls="mobile-compare">
        <svg width="29" height="27" viewBox="0 0 29 27" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M5.875 2C3.72174 2 2 3.71782 2 5.80769C2 7.89756 3.72174 9.61539 5.875 9.61539C8.02826 9.61539 9.75 7.89756 9.75 5.80769C9.75 3.71782 8.02826 2 5.875 2ZM0 5.80769C1.19209e-07 2.58713 2.64348 -1.19209e-07 5.875 0C8.76414 1.19209e-07 11.1832 2.06796 11.6634 4.80769L28 4.80769V6.80769L11.6634 6.80769C11.1832 9.54743 8.76414 11.6154 5.875 11.6154C2.64348 11.6154 -1.19209e-07 9.02825 0 5.80769ZM23.125 17.3846C20.9717 17.3846 19.25 19.1024 19.25 21.1923C19.25 23.2822 20.9717 25 23.125 25C25.2783 25 27 23.2822 27 21.1923C27 19.1024 25.2783 17.3846 23.125 17.3846ZM17.3366 20.1923C17.8168 17.4526 20.2359 15.3846 23.125 15.3846C26.3565 15.3846 29 17.9717 29 21.1923C29 24.4129 26.3565 27 23.125 27C20.2359 27 17.8168 24.932 17.3366 22.1923L1 22.1923V20.1923L17.3366 20.1923Z"/>
        </svg>
        <p>Сравнить</p>
    </a>
    <a href="basket.html" class="footer-menu_item basket-btn_nav">
        <svg width="30" height="27" viewBox="0 0 30 27" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.104 23.0003C10.5464 23.0003 10.0945 23.448 10.0945 24.0002C10.0945 24.5523 10.5464 25 11.104 25C11.6617 25 12.1136 24.5523 12.1136 24.0002C12.1136 23.448 11.6617 23.0003 11.104 23.0003ZM8.07539 24.0002C8.07539 22.3433 9.43143 21.0003 11.104 21.0003C12.7766 21.0003 14.1327 22.3433 14.1327 24.0002C14.1327 25.657 12.7766 27 11.104 27C9.43143 27 8.07539 25.657 8.07539 24.0002Z"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M23.2206 23.0003C22.6629 23.0003 22.211 23.448 22.211 24.0002C22.211 24.5523 22.6629 25 23.2206 25C23.7782 25 24.2301 24.5523 24.2301 24.0002C24.2301 23.448 23.7782 23.0003 23.2206 23.0003ZM20.1919 24.0002C20.1919 22.3433 21.548 21.0003 23.2206 21.0003C24.8932 21.0003 26.2492 22.3433 26.2492 24.0002C26.2492 25.657 24.8932 27 23.2206 27C21.548 27 20.1919 25.657 20.1919 24.0002Z"/>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M3.94962 2.02188C3.78733 2.00183 3.55536 2.00001 3.12158 2.00001H1.00955C0.45199 2.00001 0 1.5523 0 1.00001C0 0.447728 0.45199 1.3219e-05 1.00955 1.3219e-05H3.12158C3.13782 1.3219e-05 3.15407 9.88118e-06 3.1703 6.54332e-06C3.53576 -6.72472e-05 3.89686 -0.000140205 4.19958 0.0372688C4.54369 0.0797939 4.93229 0.182133 5.27947 0.473021C5.62665 0.763909 5.79299 1.12653 5.8924 1.45562C5.97984 1.74511 6.03966 2.09786 6.1002 2.45486C6.10289 2.47072 6.10558 2.48659 6.10827 2.50246L6.19538 3.01551L26.8353 3.00325C27.359 3.00285 27.8553 3.00247 28.255 3.05911C28.6977 3.12184 29.2149 3.27788 29.5965 3.74614C29.9782 4.2144 30.0232 4.74807 29.9919 5.18994C29.9635 5.58893 29.8586 6.06937 29.7479 6.57641L28.306 13.1832C28.2322 13.5216 28.159 13.8573 28.0626 14.1324C27.9529 14.4457 27.7788 14.7881 27.4382 15.0603C27.0976 15.3325 26.7231 15.4287 26.3907 15.4688C26.0988 15.504 25.7521 15.5039 25.4027 15.5038L8.31574 15.5038L8.59769 17.1645C8.66963 17.5882 8.70991 17.8145 8.7568 17.9697C8.75744 17.9718 8.75807 17.9739 8.7587 17.9759C8.76082 17.9762 8.763 17.9765 8.76522 17.9767C8.92751 17.9968 9.15947 17.9986 9.59326 17.9986H26.2209C26.7785 17.9986 27.2305 18.4463 27.2305 18.9986C27.2305 19.5509 26.7785 19.9986 26.2209 19.9986H9.59326C9.57702 19.9986 9.56079 19.9986 9.54456 19.9986C9.1791 19.9987 8.81798 19.9988 8.51526 19.9613C8.17114 19.9188 7.78254 19.8165 7.43536 19.5256C7.08818 19.2347 6.92185 18.8721 6.82244 18.543C6.73499 18.2535 6.67517 17.9008 6.61463 17.5438C6.61195 17.5279 6.60925 17.512 6.60656 17.4962L6.12983 14.6884C6.12765 14.6768 6.12567 14.6651 6.12389 14.6534L4.11714 2.83416C4.0452 2.41043 4.00492 2.18414 3.95804 2.02894C3.9574 2.02681 3.95676 2.02474 3.95614 2.02271C3.95401 2.02243 3.95184 2.02216 3.94962 2.02188ZM7.97616 13.5038H25.3557C25.7712 13.5038 25.9919 13.5021 26.1467 13.4834C26.1489 13.4832 26.151 13.4829 26.153 13.4827C26.1537 13.4807 26.1544 13.4787 26.1552 13.4767C26.2063 13.3308 26.2546 13.1174 26.3424 12.7151L27.7611 6.21459C27.8899 5.62432 27.9609 5.28756 27.9778 5.04963C27.978 5.04646 27.9782 5.04335 27.9784 5.04031C27.9753 5.03986 27.9722 5.03941 27.9691 5.03896C27.7307 5.00518 27.3834 5.00294 26.7737 5.0033L6.53492 5.01531L7.97616 13.5038ZM27.9783 4.91331L27.9779 4.91078L27.9783 4.91331Z" />
        </svg>
        <p>Корзина</p>
        <div class="menu-count total_quantity"></div>
    </a>
    <a href="favorites.html" class="footer-menu_item">
        <svg width="30" height="26" viewBox="0 0 30 26" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.07107 2C4.71811 2 2 4.71811 2 8.07107C2 9.68122 2.63963 11.2254 3.77817 12.364L15 23.5858L26.2218 12.364C27.3604 11.2254 28 9.68121 28 8.07107C28 4.71811 25.2819 2 21.9289 2C20.3188 2 18.7746 2.63963 17.636 3.77817L15.7071 5.70711C15.3166 6.09763 14.6834 6.09763 14.2929 5.70711L12.364 3.77818C11.2254 2.63963 9.68121 2 8.07107 2ZM0 8.07107C0 3.61354 3.61354 0 8.07107 0C10.2116 0 12.2646 0.850343 13.7782 2.36396L15 3.58579L16.2218 2.36396C17.7354 0.850341 19.7884 0 21.9289 0C26.3865 0 30 3.61354 30 8.07107C30 10.2116 29.1497 12.2646 27.636 13.7782L15.7071 25.7071C15.3166 26.0976 14.6834 26.0976 14.2929 25.7071L2.36396 13.7782C0.850339 12.2646 0 10.2116 0 8.07107Z"/>
        </svg>
        <p>Избранное</p>
    </a>
    <a href="sign-in.html" class="footer-menu_item">
        <svg width="29" height="29" viewBox="0 0 29 29" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M14.5 2C7.59644 2 2 7.59644 2 14.5C2 17.703 3.20472 20.6247 5.18575 22.8365C5.90603 21.5901 6.98002 20.5158 8.30238 19.6991C10.099 18.5893 12.2773 18 14.5 18C16.7227 18 18.901 18.5893 20.6976 19.6991C22.02 20.5158 23.094 21.5901 23.8142 22.8365C25.7953 20.6247 27 17.703 27 14.5C27 7.59644 21.4036 2 14.5 2ZM22.3059 24.2637C21.7856 23.1614 20.8793 22.162 19.6466 21.4006C18.1888 20.5002 16.3795 20 14.5 20C12.6205 20 10.8112 20.5002 9.35337 21.4006C8.12067 22.162 7.21442 23.1614 6.6941 24.2637C8.83308 25.976 11.547 27 14.5 27C17.453 27 20.1669 25.976 22.3059 24.2637ZM0 14.5C0 6.49187 6.49187 0 14.5 0C22.5081 0 29 6.49187 29 14.5C29 22.5081 22.5081 29 14.5 29C6.49187 29 0 22.5081 0 14.5ZM14.5 8C12.567 8 11 9.567 11 11.5C11 13.433 12.567 15 14.5 15C16.433 15 18 13.433 18 11.5C18 9.567 16.433 8 14.5 8ZM9 11.5C9 8.46243 11.4624 6 14.5 6C17.5376 6 20 8.46243 20 11.5C20 14.5376 17.5376 17 14.5 17C11.4624 17 9 14.5376 9 11.5Z"/>
        </svg>
        <p>Профиль</p>
    </a>
</section>
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobile-catalog" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <button data-bs-dismiss="offcanvas" class="mobile-catalog_backBtn"><img src="image/icons/mobileArrLeft.png" alt=""></button>
        <form action="index.html" method="get" class="header-search">
            <input type="search" placeholder="Я ищу..." class="icon-search">
            <button type="submit" class="icon-search"></button>
        </form>
    </div>
    <div class="offcanvas-body mobile-catalog_body">
        <div id="categories">
            <div class="category">
                <h3>Категория 1</h3>
                <ul class="subcategories">
                    <li>Подкатегория 1.1</li>
                    <li>Подкатегория 1.2</li>
                    <li>Подкатегория 1.3</li>
                </ul>
            </div>
            <div class="category">
                <h3>Категория 2</h3>
                <ul class="subcategories">
                    <li>Подкатегория 2.1</li>
                    <li>Подкатегория 2.2</li>
                    <li>Подкатегория 2.3</li>
                </ul>
            </div>
            <div class="category">
                <h3>Категория 3</h3>
                <ul class="subcategories">
                    <li>Подкатегория 3.1</li>
                    <li>Подкатегория 3.2</li>
                    <li>Подкатегория 3.3</li>
                </ul>
            </div>
        </div>
        <a href="category.html">Все категории</a>
        <button id="backButton">Вернуться назад</button>
    </div>
</div>
<div class="offcanvas offcanvas-start" tabindex="-1" id="mobile-compare" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <button data-bs-dismiss="offcanvas" class="mobile-catalog_backBtn"><img src="image/icons/mobileArrLeft.png" alt=""></button>
        <form action="index.html" method="get" class="header-search">
            <input type="search" placeholder="Я ищу..." class="icon-search">
            <button type="submit" class="icon-search"></button>
        </form>
    </div>
    <div class="offcanvas-body mobile-catalog_body">
        <div id="categories">
            <div class="category">
                <h3>Категория 1</h3>
                <ul class="subcategories">
                    <li>Подкатегория 1.1</li>
                    <li>Подкатегория 1.2</li>
                    <li>Подкатегория 1.3</li>
                </ul>
            </div>
            <div class="category">
                <h3>Категория 2</h3>
                <ul class="subcategories">
                    <li>Подкатегория 2.1</li>
                    <li>Подкатегория 2.2</li>
                    <li>Подкатегория 2.3</li>
                </ul>
            </div>
            <div class="category">
                <h3>Категория 3</h3>
                <ul class="subcategories">
                    <li>Подкатегория 3.1</li>
                    <li>Подкатегория 3.2</li>
                    <li>Подкатегория 3.3</li>
                </ul>
            </div>
        </div>
        <button id="backButton">Вернуться назад</button>
    </div>
</div>
<div class="offcanvas offcanvas-end" tabindex="-1" id="burger-mobile" aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header d-flex justify-content-end">
        <button type="button" class="icon-xmark" data-bs-dismiss="offcanvas" aria-label="Закрыть"></button>
    </div>
    <div class="mobile-sidebar d-flex flex-column gap-3">
        <div class="mobile-sidebar_numbers d-flex flex-column gap-3">
            <a href="tel:+998781138885">+998 78 113 88 85</a>
            <a href="tel:+998712078885" style=" margin-bottom: 20px;">+998 71 207 88 85</a>
        </div>
        <div class="accordion d-flex flex-column gap-3" id="accordionExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="mobile-sidebar-link accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileAcc1" aria-expanded="false" aria-controls="mobileAcc1">
                        Покупателям
                    </button>
                </h2>
                <div id="mobileAcc1" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body mobile-accordion">
                        <a href="#!">Доставка</a>
                        <a href="#!">Самовывоз</a>
                        <a href="#!">Способы оплаты</a>
                        <a href="#!">Гарантия качества</a>
                        <a href="#!">Как купить?</a>
                    </div>
                </div>
            </div>
            <a href="#!" style="color: var(--red);" class="mobile-sidebar-link">Скидки</a>
            <a href="#!" style="color: var(--red);" class="mobile-sidebar-link">Рассрочка</a>
            <a href="#!" class="mobile-sidebar-link">Услуги мастеров</a>
            <a href="#!" class="mobile-sidebar-link">Тендеры</a>
            <a href="#!" class="mobile-sidebar-link">Как стать партнером</a>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="mobile-sidebar-link accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileAcc4" aria-expanded="false" aria-controls="mobileAcc4">
                        О компании
                    </button>
                </h2>
                <div id="mobileAcc4" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body mobile-accordion">
                        <a href="#!">Доставка</a>
                        <a href="#!">Самовывоз</a>
                        <a href="#!">Способы оплаты</a>
                    </div>
                </div>
            </div>
            <a href="#!" class="mobile-sidebar-link">Контакты</a>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="mobile-sidebar-link accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#mobileAcc5" aria-expanded="false" aria-controls="mobileAcc5">
                        Язык
                    </button>
                </h2>
                <div id="mobileAcc5" class="accordion-collapse collapse " data-bs-parent="#accordionExample">
                    <div class="accordion-body mobile-accordion">
                        <a href="#!">Ру</a>
                        <a href="#!">Уз</a>
                    </div>
                </div>
            </div>
            <div class="footer-socials d-flex gap-4 justify-content-end">
                <a href="/"><img src="{{ asset('assets/front/images/icons/facebook.svg') }}" alt=""></a>
                <a href="/"><img src="{{ asset('assets/front/images/icons/instagram.svg') }}" alt=""></a>
                <a href="/"><img src="{{ asset('assets/front/images/icons/telegram.svg') }}" alt=""></a>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('/assets/front/js/jquery.min.js') }}"></script>
<script src="{{ asset('/assets/front/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/assets/front/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('/assets/front/js/slick.min.js') }}"></script>
<script src="{{ asset('/assets/front/js/main.js') }}"></script>
</body>
</html>
