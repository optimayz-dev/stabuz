@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <!-- breadcrumb -->
    <nav class="container" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Категории</li>
        </ol>
    </nav>
    <!-- all categories -->
    <section class="categories container">
        <h6 class="title mb-3">ВСЕ КАТЕГОРИИ</h6>
        <div class="categories-grid" name="allCategories">
            @foreach($catalogs as $catalog)
                <a href="{{ route('category.view', $catalog->slug) }}" class="categories-item">
                    <div class="categories_item--img">
                        <img src="image/cards/Group 511.svg" alt="">
                        <img src="{{ asset($catalog->category_img) }}" alt="" name="allCategoriesImg">
                    </div>
                    <p name="allCategoriesName">{{ $catalog->title }}</p>
                </a>
            @endforeach
        </div>
    </section>
    <!-- reccomend -->
    @include('front.includes.recommend-products')
    <!-- recently viewed -->
    @include('front.includes.recently-viewed-products')
    <!-- pickup points -->
    <section class="pickup-points container">
        <h6 class="title mb-sm-5 bm-3">Пункты самовывоза</h6>
        <div class="pickup-points_main d-flex justify-content-between flex-lg-row flex-column gap-lg-0 gap-4">
            <div class="pickup-points_points row justify-content-between col-xl-7 col-lg-6 col-12">
                <div class="pickup-points_point col-xl-6 col-lg-12 col-md-6 col-12">
                    <div>
                        <h6>Ташкент</h6>
                        <p>Алмазарский район, ул. Уста Ширин, 134, магазин № 12</p>
                    </div>
                    <a href="/" class="d-flex gap-2 align-items-center">
                        <span>На карте</span>
                        <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967"
                                stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00"
                                  stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
                <div class="pickup-points_point col-xl-6 col-lg-12 col-md-6 col-12">
                    <div>
                        <h6>Ташкент</h6>
                        <p>Яшнабаский район, строительный рынок «Куйлюк», павильон 2, магазин № 63</p>
                    </div>
                    <a href="/" class="d-flex gap-2 align-items-center">
                        <span>На карте</span>
                        <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967"
                                stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00"
                                  stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
                <div class="pickup-points_point col-xl-4 col-lg-12 col-md-4 col-12">
                    <div>
                        <h6>Самарканд</h6>
                        <p>ул. Туркистон, 62А, махалля Юкорий Хужа</p>
                    </div>
                    <a href="/" class="d-flex gap-2 align-items-center">
                        <span>На карте</span>
                        <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967"
                                stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00"
                                  stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
                <div class="pickup-points_point col-xl-4 col-lg-6 col-md-4 col-12">
                    <div>
                        <h6>Бухара</h6>
                        <p>ул. Шохруб, 115 (ор-р — мечеть Файзобад)</p>
                    </div>
                    <a href="/" class="d-flex gap-2 align-items-center">
                        <span>На карте</span>
                        <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967"
                                stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00"
                                  stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
                <div class="pickup-points_point col-xl-4 col-lg-6 col-md-4 col-12">
                    <div>
                        <h6>Андижан</h6>
                        <p>ул. Пирмухамедова, 96, этаж 2, «Шинам», магазин № 187</p>
                    </div>
                    <a href="/" class="d-flex gap-2 align-items-center">
                        <span>На карте</span>
                        <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967"
                                stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00"
                                  stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="pickup-points_map col-xl-5 col-lg-6 col-12">
                <div style="position:relative;overflow:hidden;"><a
                        href="https://yandex.uz/maps/org/stab_uz/187208734623/?utm_medium=mapframe&utm_source=maps"
                        style="color:#eee;font-size:12px;position:absolute;top:0px;">Stab. uz</a><a
                        href="https://yandex.uz/maps/10335/tashkent/category/electrical_products/184107066/?utm_medium=mapframe&utm_source=maps"
                        style="color:#eee;font-size:12px;position:absolute;top:14px;">Электротехническая продукция в
                        Ташкенте</a>
                    <iframe
                        src="https://yandex.uz/map-widget/v1/?ll=69.250263%2C41.355994&mode=search&oid=187208734623&ol=biz&z=16.69"
                        width="100%" frameborder="1" allowfullscreen="true" style="position:relative;"></iframe>
                </div>
            </div>
        </div>
    </section>
    <!-- stab -->
    <div class="stab container">
        <h6 class="title mb-sm-4 mb-2">Stab.Uz — Интернет-магазин электротехнического оборудования</h6>
        <p class="stab-text">Онлайн-мегамаркет Stab.Uz — уникальный проект, представляющий десятки тысяч товаров
            непродовольственной группы от более сотни брендов. В каталоге представлены позиции по всем востребованным на
            современном рынке категориям. К нам обращаются те, кто ищет в Узбекистане <a href="/">Интернет-магазин</a>Онлайн-мегамаркет
            Stab.Uz — уникальный проект, представляющий десятки тысяч товаров непродовольственной группы от более сотни
            брендов. Онлайн-мегамаркет Stab.Uz — уникальный проект, представляющий десятки тысяч товаров
            непродовольственной группы от более сотни брендов.</p>
        <button class="stab-btn">Развернуть<img class="icon" src="image/icons/arrRight.png" alt="arrow down"></button>
    </div>
    <!-- mailing  -->
    <section class="container ">
        <div class="mailing d-flex justify-content-between align-items-center flex-lg-row flex-column gap-3">
            <div class="mailing-lext d-flex flex-column align-items-lg-start align-items-center">
                <img src="image/whiteLogo.png" alt="">
                <p>Будьте всегда в курсе!</p>
            </div>
            <form action="URL" class="mailing-form">
                <div class="mailing-form_check d-flex gap-3">
                    <input type="checkbox" required>
                    <p>Ознакомлен(а) с <a href="/">правилами</a> предоставления услуг и согласен(на) на обработку своих
                        персональных данных</p>
                </div>
                <div class="d-flex gap-4 flex-nowrap flex-md-row flex-column">
                    <input type="email" class="mailing-email" placeholder="Ваш e-mail" required>
                    <button disabled type="submit">Подписаться
                        <svg width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.519 56.481C15.0642 61.0262 20.8552 64.1215 27.1596 65.3755C33.4639 66.6295 39.9986 65.9859 45.9372 63.5261C51.8758 61.0662 56.9516 56.9006 60.5228 51.556C64.0939 46.2114 66 39.9279 66 33.5C66 27.0721 64.0939 20.7886 60.5228 15.444C56.9516 10.0994 51.8758 5.93377 45.9372 3.47392C39.9986 1.01407 33.464 0.370459 27.1596 1.62448C20.8552 2.8785 15.0642 5.97382 10.519 10.519"
                                stroke-width="2" stroke-linecap="round"/>
                            <path d="M28.3333 17L42 33.5M42 33.5L28.3333 50M42 33.5H0.999999" stroke-width="2"
                                  stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </section>
@endsection
