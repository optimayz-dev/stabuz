@extends('front.__layouts.layout')
@section('seo_texts')
    <title>{{ $product->seo_title ?? str_replace('{name}', $product->title, $seo->seo_title) }}</title>
    <meta name="description"
          content="{{ $product->seo_description ?? str_replace('{name}', $product->title, $seo->meta_description) }}">
@endsection
@section('content')
    @include('front.__layouts.header')
    <!-- breadcrumb -->
    <nav class="container d-md-block d-none" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="{{ route('categories.view') }}">Категории</a></li>
            @foreach($categories as $category)
                <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
            @endforeach
        </ol>
    </nav>
    <div class="container d-md-none d-flex align-items-center gap-sm-5 gap-3">
        <a href="{{ route('categories.view') }}" class="category-name_link"><img
                src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt="">Все категории</a>
        <a href="{{ route('category.view', $categories->first()->slug) }}" class="category-name_link"><img
                src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt="">{{ $categories->first()->title }}
        </a>
    </div>
    {{--    @dd($categories)--}}
    {{--        <h6 class="title mb-sm-5 mb-3 mt-3 container" name="category-name">{{ $categories->first()->title }}</h6>--}}
    <!-- caregory nav -->
    <ul class="category-nav_list container d-md-none d-flex align-items-center gap-3" name="categoryCategoriesList">
        @foreach($categories as $category)
            <li><a href="/" name="categoryCategoriesLink" class="category-categories-link">{{ $category->title }}</a>
            </li>
        @endforeach
    </ul>

    <h6 class="title mb-sm-5 mb-3 mt-3 container d-lg-flex d-none" name="productName">{{ $product->title }}</h6>
    <!-- product -->
    <section style="box-shadow: none !important;"
             class="product goods_item container d-flex flex-lg-row flex-column justify-content-between">
        <div class="product-photo d-flex align-items-center gap-4">
            <a href="/" class="product-photo_slider-backbtn d-sm-none d-flex"><img src="" alt=""></a>
            <div class="product-photo_slider" name="productPhotoSlider">
                <!-- ВЫВОД КАРТИНКОК ТОВАРА ИЗ БД -->
                @foreach($product->images as $image)
                    <div class="product-photo_small goods-img">
                        <img src="{{ asset('assets/front/images/cards/Group 511.svg') }}" alt="">
                        <img src="{{ asset($image->image) }}" alt="">
                    </div>
                @endforeach
            </div>

            <div class="product-photo_brand">
                <img src="{{ asset($product->brand->brand_logo ?? '') }}" alt="" name="productCompanyImg">
            </div>
            <div class="product-photo_large d-sm-flex d-none">
                <img src="{{ asset('assets/front/images/cards/Group 511.svg') }}" alt="">
                <img src="" alt="">
            </div>
            <div class="product-photo_slider-count d-sm-none d-flex"></div>
        </div>
        <div class="product-content d-flex flex-column align-items-end">
            <h6 class="title mb-4 mt-4 p-0 container d-lg-none d-flex goods_name"
                name="productName">{{ $product->title }}</h6>
            <div class="procuct-content_price d-flex align-items-start justify-content-between w-100">
                <div class="d-flex">
                    <span class="goods_proccent" style="margin-right: 20px;" name="productProccent">-25%</span>
                    <div class="d-flex flex-column">
                        <p class="goods_currentPrice" name="productCurrentPrice">{{ $product->price }} usd</p>
                        @if($product->old_price)
                            <p class="goods_oldPrice" name="productOldPrice">{{ $product->old_price }} usd</p>
                        @endif
                    </div>
                </div>
                @if($product->credit)
                    <p class="product-photo_plan" name="productPlan">Рассрочка</p>
                @endif
            </div>

            <form data-action="{{ route('cart.add-product') }}" method="post" class="cart">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product->id }}">
                <div class="product-content_purchase d-flex flex-wrap justify-content-between">
                    <div class="product-content_purchase--info d-lg-none  d-flex justify-content-between gap-2">
                        <p class="product-content_purchase--info_name"
                           name="productName">{{ $product->brand->title ?? '' }}</p>
                        <div class="d-flex gap-2 align-items-center">
                            <span name="productProccent">-25%</span>
                            <h6 name="productCurrentPrice">{{ $product->price ?? '' }}usd</h6>
                        </div>
                        <button type="button" class="product-content_func--btns">
                            <svg width="25" height="22" viewBox="0 0 29 26" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 8.89256C5 6.71638 6.73126 5 8.80838 5C9.80909 5 10.7747 5.40303 11.4912 6.12989L13.0756 7.73734C13.4515 8.11865 13.9646 8.33333 14.5 8.33333C15.0354 8.33333 15.5485 8.11865 15.9244 7.73734L17.5088 6.12989C18.2253 5.40303 19.1909 5 20.1916 5C22.2687 5 24 6.71638 24 8.89256C24 9.93411 23.5919 10.9273 22.8744 11.6552L14.5 20.151L6.12558 11.6552C5.40811 10.9273 5 9.93411 5 8.89256ZM8.80838 1C4.4683 1 1 4.56145 1 8.89256C1 10.9766 1.81576 12.9809 3.27688 14.4632L13.0756 24.404C13.4515 24.7853 13.9646 25 14.5 25C15.0354 25 15.5485 24.7853 15.9244 24.404L25.7231 14.4632C27.1842 12.9809 28 10.9766 28 8.89256C28 4.56145 24.5317 1 20.1916 1C18.1113 1 16.1222 1.83864 14.6601 3.32189L14.5 3.48434L14.3399 3.32189C12.8778 1.83865 10.8887 1 8.80838 1Z"
                                    stroke="white" stroke-width="2"/>
                            </svg>
                        </button>
                    </div>
                    <div class="product-add_btns d-flex align-items-center justify-content-between">
                        <button class="goods-addProduct-minus disabled" type="button">
                            <svg width="30" height="30" viewBox="0 0 20 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248"
                                    stroke="#999999" stroke-linecap="round"/>
                                <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                            </svg>
                        </button>
                        <input value="1" type="text" name="product_qty" class="goods-itemCount text-center">
                        <button class="goods-addProduct-plus" type="button">
                            <svg width="30" height="30" viewBox="0 0 20 21" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248"
                                    stroke="#999999" stroke-linecap="round"/>
                                <path d="M5 11V10H14V11H5Z" fill="#999999"/>
                                <path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/>
                            </svg>
                        </button>
                    </div>
                    <button type="button" class="product-buyinclick_btn">Купить в 1 клик</button>
                    <button type="submit" class="product-buy_btn goods-item_addToBasket">В корзину
                        <svg width="44" height="44" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M10.519 56.481C15.0642 61.0262 20.8552 64.1215 27.1596 65.3755C33.4639 66.6295 39.9986 65.9859 45.9372 63.5261C51.8758 61.0662 56.9516 56.9006 60.5228 51.556C64.0939 46.2114 66 39.9279 66 33.5C66 27.0721 64.0939 20.7886 60.5228 15.444C56.9516 10.0994 51.8758 5.93377 45.9372 3.47392C39.9986 1.01407 33.464 0.370459 27.1596 1.62448C20.8552 2.8785 15.0642 5.97382 10.519 10.519"
                                stroke-width="2" stroke-linecap="round"/>
                            <path d="M28.3333 17L42 33.5M42 33.5L28.3333 50M42 33.5H0.999999" stroke-width="2"
                                  stroke-linecap="round"/>
                        </svg>
                    </button>
                </div>
            </form>

            <div class="product-content_funcs d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center gap-4">
                    <div class="goods_rewies d-flex align-items-center gap-1">
                        <span class="icon-star active"></span>
                        <span class="icon-star active"></span>
                        <span class="icon-star active"></span>
                        <span class="icon-star"></span>
                        <span class="icon-star"></span>
                        <p class="goods_reviewCount" name="productGoodsReviewCount">5</p>
                    </div>
                    <div class="goods_views d-flex align-items-center gap-1">
                        <span class="icon-eye"></span>
                        <p class="goods_viewsCount" name="productGoodsViewsCount">{{ $product->views }}</p>
                    </div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <button type="button" class="product-content_func--btns">
                        <svg width="19" height="20" viewBox="0 0 23 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M16 6C16 5.44772 16.4477 5 17 5C17.5523 5 18 5.44772 18 6C18 6.55228 17.5523 7 17 7C16.4477 7 16 6.55228 16 6ZM17 1C14.2386 1 12 3.23858 12 6C12 6.13297 12.0052 6.26486 12.0155 6.39547L9.08166 8.06241C8.23291 7.39748 7.1624 7 6 7C3.23858 7 1 9.23858 1 12C1 14.7614 3.23858 17 6 17C7.17104 17 8.24876 16.5966 9.10048 15.9228L12.0168 17.5883C12.0057 17.7242 12 17.8615 12 18C12 20.7614 14.2386 23 17 23C19.7614 23 22 20.7614 22 18C22 15.2386 19.7614 13 17 13C15.8357 13 14.7637 13.3988 13.9143 14.0656L10.9848 12.3925C10.9949 12.2629 11 12.132 11 12C11 11.8597 10.9942 11.7205 10.9828 11.5828L13.9016 9.92439C14.753 10.5973 15.8299 11 17 11C19.7614 11 22 8.76142 22 6C22 3.23858 19.7614 1 17 1ZM5 12C5 11.4477 5.44772 11 6 11C6.55228 11 7 11.4477 7 12C7 12.5523 6.55228 13 6 13C5.44772 13 5 12.5523 5 12ZM16 18C16 17.4477 16.4477 17 17 17C17.5523 17 18 17.4477 18 18C18 18.5523 17.5523 19 17 19C16.4477 19 16 18.5523 16 18Z"
                                stroke="white" stroke-width="2"/>
                        </svg>
                    </button>
                    <button type="button" class="product-content_func--btns active">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"
                                stroke="white" stroke-width="2"/>
                        </svg>
                    </button>
                    <button type="button" class="product-content_func--btns ">
                        <svg width="25" height="22" viewBox="0 0 29 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 8.89256C5 6.71638 6.73126 5 8.80838 5C9.80909 5 10.7747 5.40303 11.4912 6.12989L13.0756 7.73734C13.4515 8.11865 13.9646 8.33333 14.5 8.33333C15.0354 8.33333 15.5485 8.11865 15.9244 7.73734L17.5088 6.12989C18.2253 5.40303 19.1909 5 20.1916 5C22.2687 5 24 6.71638 24 8.89256C24 9.93411 23.5919 10.9273 22.8744 11.6552L14.5 20.151L6.12558 11.6552C5.40811 10.9273 5 9.93411 5 8.89256ZM8.80838 1C4.4683 1 1 4.56145 1 8.89256C1 10.9766 1.81576 12.9809 3.27688 14.4632L13.0756 24.404C13.4515 24.7853 13.9646 25 14.5 25C15.0354 25 15.5485 24.7853 15.9244 24.404L25.7231 14.4632C27.1842 12.9809 28 10.9766 28 8.89256C28 4.56145 24.5317 1 20.1916 1C18.1113 1 16.1222 1.83864 14.6601 3.32189L14.5 3.48434L14.3399 3.32189C12.8778 1.83865 10.8887 1 8.80838 1Z"
                                stroke="white" stroke-width="2"/>
                        </svg>
                    </button>
                </div>
            </div>
            <div
                class="product-content_info mt-4 d-sm-flex d-block flex-lg-column flex-sm-row flex-column justify-content-between">
                <table>
                    <tbody>
                    <tr>
                        <td>Артикул</td>
                        <td id="product-vendorcode" name="productVendorCode">{{ $product->article ?? '' }}
                            <button class="product-copy_vendorcodeBtn"><img src="image/icons/copy.svg" alt=""></button>
                        </td>
                    </tr>
                    <tr>
                        <td>Модель</td>
                        <td name="productModel">{{ $product->modification ?? '' }}</td>
                    </tr>
                    @if(!empty($product->brand->slug))
                        <tr>
                            <td>Бренд</td>
                            <td><a href="{{ route('brand.detail', $product->brand->slug) }}"
                                   name="productCompany">{{ $product->brand->title }}</a></td>
                        </tr>
                    @endif
                    <tr>
                        @if(!empty($product->brand->country) )
                            <td>Страна</td>
                            <td name="productCountry">{{ $product->brand->country->title}}</td>
                        @endif
                    </tr>
                    </tbody>
                </table>
                <div class="mt-sm-0 mt-3">
                    @if($product->amount)
                        <div class="product-instock_count">В наличии <span
                                name="productInstockCount">{{ $product->amount }}</span> шт
                        </div>
                    @endif
                    <p class="product-delivery"><a href="/">Доставка</a> по Ташкенту и Узбекистану</p>
                </div>
            </div>
        </div>
    </section>
    <!-- about product -->
    <section class="container tab-content mt-5 product-decr_tabs">
        <div class="product-tabs nav d-md-flex d-none align-items-center">
            <a href="#aboutProduct" class="tabs-links active" data-bs-toggle="tab">
                О товаре
            </a>
            <a href="#productReviews" class="tabs-links product-reviews_link" data-bs-toggle="tab">
                Отзывы
                <span name="productReviewsCount" id="productReviewsCount">25</span>
            </a>
            <button type="button" class="product-add_review--btn d-none" id="productAdRreviewBtn" data-bs-toggle="modal"
                    data-bs-target="#addReviewProductModal">Написать отзыв
            </button>
        </div>
        <div class="tab-content pt-4">
            <div class="tab-pane fade active show justify-content-between" id="aboutProduct">
                <div class="d-flex justify-content-between flex-md-row flex-column">
                    <div class="product-characteristics">
                        <p class="mobile-review_title mb-4">
                            О товаре
                        </p>
                        <h6>Характеристики</h6>
                        {!! $product->characteristics !!}
                        <button class="product-more-btn" id="product-characteristics_moreBtn">Все характеристики<img
                                class="icon" src="{{ asset('assets/front/images/icons/greenArrRight.png') }}"
                                alt="arrow down"></button>
                    </div>
                    <div class="product-description">
                        <h6>Описание товара</h6>
                        {!! $product->description !!}
                        <button class="product-more-btn" id="product-description_moreBtn">Развернуть описание<img
                                class="icon" src="{{ asset('assets/front/images/icons/greenArrRight.png') }}"
                                alt="arrow down"></button>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="productReviews">
                <div class="d-md-none d-flex justify-content-between align-items-center mb-4 mt-5">
                    <p class="mobile-review_title">
                        Отзывы
                        <span name="productReviewsCount">25</span>
                    </p>
                    <button type="button" id="productAdRreviewBtn" data-bs-toggle="modal"
                            data-bs-target="#addReviewProductModal">Написать отзыв
                    </button>
                </div>
                <div class="product-reviews">
                    <div class="product-review">
                        <h6 class="product-review_name" name="productReviewName">Константин</h6>
                        <div class="mt-1 mb-2 d-flex align-items-center gap-3">
                            <div class="goods_rewies d-flex align-items-center gap-1">
                                <span class="icon-star active"></span>
                                <span class="icon-star active"></span>
                                <span class="icon-star active"></span>
                                <span class="icon-star active"></span>
                                <span class="icon-star"></span>
                            </div>
                            <p class="product-review_date" name="productReviewDate">2 июня 2023</p>
                        </div>
                        <p class="product-review_text mb-3" name="productReviewText">Высокая производительность при
                            снижении вибрации на 20%. Снижение вибрации по сравнению с другими перфораторами этого
                            класса повышает удобство работы благодаря системе Bosch Vibration Control.</p>
                        <div class="product-review_imgs d-flex gap-sm-3 gap-2" name="productReviewImgs">
                            <img src="image/product/review.png" alt="" class="product-review_img">
                            <img src="image/product/review.png" alt="" class="product-review_img">
                        </div>
                    </div>
                    <div class="product-review">
                        <h6 class="product-review_name" name="productReviewName">Константин</h6>
                        <div class="mt-1 mb-2 d-flex align-items-center gap-3">
                            <div class="goods_rewies d-flex align-items-center gap-1">
                                <span class="icon-star active"></span>
                                <span class="icon-star active"></span>
                                <span class="icon-star active"></span>
                                <span class="icon-star active"></span>
                                <span class="icon-star"></span>
                            </div>
                            <p class="product-review_date" name="productReviewDate">2 июня 2023</p>
                        </div>
                        <p class="product-review_text mb-3" name="productReviewText">Высокая производительность при
                            снижении вибрации на 20%. Снижение вибрации по сравнению с другими перфораторами этого
                            класса повышает удобство работы благодаря системе Bosch Vibration Control.</p>
                        <div class="product-review_imgs d-flex gap-sm-3 gap-2" name="productReviewImgs">
                            <img src="image/product/review.png" alt="" class="product-review_img">
                            <img src="image/product/review.png" alt="" class="product-review_img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
