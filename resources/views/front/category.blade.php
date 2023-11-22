@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <!-- breadcrumb -->
    <nav class="container d-md-block d-none" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/">Категории</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $category->title }}</li>
        </ol>
    </nav>
    <div class="container d-md-none d-flex align-items-center gap-sm-5 gap-3">
        <a href="categories.html" class="category-name_link"><img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt="">Все категории</a>
        <a href="categories.html" class="category-name_link"><img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }} " alt="">{{ $category->title }}</a>
    </div>
    <h6 class="title mb-sm-5 mb-3 mt-3 container" name="category-name">{{ $category->title }}</h6>
    <!-- caregory nav -->
    <ul class="category-nav_list container d-md-none d-flex align-items-center gap-3" name="categoryCategoriesList">
        @foreach($category->children as $child)
            <li><a href="/" name="categoryCategoriesLink" class="category-categories-link">{{ $child->title }}</a></li>
        @endforeach
    </ul>
    <!-- category -->
    <section class="category container d-flex justify-content-between gap-4" id="category">
        <form action="" class="category-filter d-md-block d-none" id="category-filter">
            <div class="category-categories d-flex flex-column">
                <a href="/" class="category-name_link"><img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }} " alt="">Все
                    категории</a>
                <a href="/" class="category-name_link d-none" name="parentCategoryName"><img
                        src="{{ asset('/assets/front/images/icons/greenArrLeft.png') }} " alt="">{{ $category->title }}</a>
                <span name="categoryName" class="category-name">{{ $category->title }}</span>
                <ul class="category-categories_list" name="categoryCategoriesList">
                    @foreach($category->children as $child)
                        <li><a href="{{ route('category.view', $child->slug) }}" name="categoryCategoriesLink"
                               class="category-categories-link">{{ $child->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="category-price" id="categoryPrice">
                <div class="d-flex justify-content-between mb-3 mt-4">
                    <h6 class="category-filter_title">Цена</h6>
                    <button id="category-price_reset--btn" class="category-price_reset--btn">Сбросить</button>
                </div>
                <div class="category-price_slider">
                    <div class="category-price_progress"></div>
                </div>
                <div class="range-input">
                    <input type="range" name="min-price" class="range-min" min="0" max="1000000" value="0" step="100">
                    <input type="range" name="max-price" class="range-max" min="0" max="1000000" value="1000000"
                           step="100">
                </div>
                <div class="category-price_minmax d-flex justify-content-between align-items-center mt-3">
                    <p class="input-min-value">0</p>
                    <input type="text" class="priceInptmin d-none" value="0">
                    <p class="input-max-value">1 000 000</p>
                    <input type="text" class="priceInptmax d-none" value="1000000">
                </div>
            </div>
            <div class="category-filter_nav">
                <div class="d-flex justify-content-between mb-3 mt-4">
                    <h6 class="category-filter_title">Бренды</h6>
                    <button class="category-filter_reset--btn">Сбросить</button>
                </div>
                <ul class="category-filter_list" name="categoryBrandsList">
                    @foreach($category->brands as $brand)
                        <li>
                            <input type="checkbox" name="brand" id="brand1" value="brand1">
                            <label for="brand1">{{ $brand->title }}</label>
                        </li>
                    @endforeach

                </ul>
                <button class="category-filter_showall--btn">Все бренды<img src="{{ asset('assets/front/images/icons/chevroneBottom.svg') }}" alt=""></button>
            </div>
            <div class="category-filter_nav">
                <div class="d-flex justify-content-between mb-3 mt-4">
                    <h6 class="category-filter_title">Страны</h6>
                    <button class="category-filter_reset--btn">Сбросить</button>
                </div>
                <ul class="category-filter_list" name="categoryCountryList">

                    @foreach($category->brands as $brand)
                        @if(!(empty($brand->country)))
                            <li>
                                <input type="checkbox" name="country" id="country1" value="country1"> <label
                                    for="country1">{{ $brand->country->title }}</label>
                            </li>
                        @endif
                    @endforeach
                </ul>
                <button class="category-filter_showall--btn">Все страны<img src="{{ asset('assets/front/images/icons/chevroneBottom.svg') }} "
                                                                            alt=""></button>
            </div>
            <div class="category-filter_nav">
                <div class="d-flex justify-content-between mb-3 mt-4">
                    <h6 class="category-filter_title">Исполнение</h6>
                    <button class="category-filter_reset--btn">Сбросить</button>
                </div>
                <ul class="category-filter_list" name="categoryPerformanceList">
                    <li>
                        <input type="checkbox" name="perfomance" id="perfomance1" value="perfomance1">
                        <label for="perfomance1">Навесные</label>
                    </li>
                    <li>
                        <input type="checkbox" name="perfomance" id="perfomance2" value="perfomance2">
                        <label for="perfomance2">Напольные</label>
                    </li>
                    <li>
                        <input type="checkbox" name="perfomance" id="perfomance3" value="perfomance3">
                        <label for="perfomance3">Переносные</label>
                    </li>
                </ul>
                <button class="category-filter_showall--btn">Все страны<img src="{{ asset('assets/front/images/icons/chevroneBottom.svg') }} "
                                                                            alt=""></button>
            </div>
            <button type="button" class="category-resetall_btn">Сбросить все</button>
        </form>
        <div class="category-main">
            <div
                class="d-flex flex-sm-row flex-column align-items-md-center align-items-start justify-content-md-end justify-content-between">
                <a href="/" class="category-filters_btn d-md-none d-flex" data-bs-toggle="offcanvas"
                   data-bs-target="#filters" aria-controls="filters"><img src="{{ asset('assets/front/images/icons/filters.png') }} " alt="">Фильтры</a>
                <div
                    class="category-main_bar d-flex align-items-lg-center align-items-end flex-lg-row flex-column justify-content-end gap-lg-5 gap-1">
                    <div class="category-counts d-flex gap-3">
                        <div class="category-count_goods d-flex gap-2">
                            <img src="{{ asset('assets/front/images/icons/countGoods.svg') }}" alt="">
                            <p name="categoryCountGoods">{{ count($products) }} шт</p>
                        </div>
                        <div class="category-count_views d-flex gap-2">
                            <img src="{{ asset('assets/front/images/icons/eye.svg') }}" alt="">
                            <p name="categoryCountViews">15 025</p>
                        </div>
                    </div>
                    <form action="" class="category-main_filter d-flex align-items-center">
                        <p>Сортировать по:</p>
                        <select name="" id="" class="custom-select" placeholder="Популярности">
                            <option value="popularity">популярности</option>
                            <option value="date">дате добавления</option>
                            <option value="price-asc" class="icon-arrD">цене</option>
                            <option value="price-desc" class="icon-arrT">цене</option>
                            <option value="alphabet-asc" class="icon-arrD">алфавиту</option>
                            <option value="alphabet-asc" class="icon-arrT">алфавиту</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="category-goods">
                @foreach($products as $product)
                    <div class="goods_item">
                        <div class="goods_header">
                            <div class="goods_header--menu d-flex align-items-center">
                                @if($product->new)
                                    <span class="goods-itemNew" name="goodsItemNew">New</span>
                                @endif
                                <button type="button">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"
                                            stroke="white" stroke-width="2"/>
                                    </svg>
                                </button>
                                <button type="button" class="icon-heart">
                                </button>
                            </div>
                            <img src="{{ asset('assets/front/images/cards/Group 511.svg') }}" alt="">
                            <img src="{{ asset($product->images->first()->image ?? '') }}" alt="">
                            <div class="goods_header--installment d-flex align-items-center">
                                @if($product->old_price)
                                    @php
                                        $old_price = $product->old_price;
                                        $price = $product->price;
                                    @endphp
                                    <span class="goods_proccent" name="actualGoodsProccent">-{{ ($old_price - $price) / $price * 100  }}%</span>
                                @endif
                                @if($product->credit)
                                    <p>Рассрочка</p>
                                @endif
                            </div>
                        </div>
                        <div style="padding: 10px;">
                            <p class="goods_currentPrice" name="actualGoodsCurrentPrice">
                                                                {{ $product->price }}
{{--                                @currency({{$product->price}})--}}
                            </p>
                            @if($product->old_price)
                                <p class="goods_oldPrice"
                                   name="actualGoodsOldPrice">{{ $product->old_price }} usd
                                </p>
                            @endif
                            <div class="mt-1 mb-1 d-flex align-items-center gap-3">
                                <div class="goods_rewies d-flex align-items-center gap-1">
                                    <span class="icon-star active"></span>
                                    <span class="icon-star active"></span>
                                    <span class="icon-star active"></span>
                                    <span class="icon-star"></span>
                                    <span class="icon-star"></span>
                                    <p class="goods_reviewCount" name="actualGoodsReviewCount">5</p>
                                </div>
                                <div class="goods_views d-flex gap-1">
                                    <span class="icon-eye"></span>
                                    <p class="goods_viewsCount" name="actualGoodsViewsCount">123</p>
                                </div>
                            </div>
                            <a href="{{ route('product.detail', $product->slug) }}" class="goods_name"
                               name="actualGoodsName">{{ $product->title }}</a>
                            @if(!empty($product->brand->slug))
                                <a href="{{ route('brand.detail', $product->brand->slug) ?? ''}}"
                                   class="goods_companyName"
                                   name="actualGoodsCompanyName">{{ $product->brand->title ?? '' }}</a>
                            @endif

                            <div class="goods-addProduct ">
                                <div class="goods-addProduct_btns">
                                    <button class="goods-addProduct-minus disabled" type="button">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248"
                                                stroke="#999999" stroke-linecap="round"/>
                                            <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                                        </svg>
                                    </button>
                                    <p class="goods-itemCount">1</p>
                                    <button class="goods-addProduct-plus" type="button">
                                        <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248"
                                                stroke="#999999" stroke-linecap="round"/>
                                            <path d="M5 11V10H14V11H5Z" fill="#999999"/>
                                            <path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/>
                                        </svg>
                                    </button>
                                </div>
                                <button type="button" class="goods-item_addToBasket">
                                    <svg width="30" height="27" viewBox="0 0 30 27" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M28.0386 3.84668H5.8078C5.50821 3.84668 5.2244 3.981 5.03446 4.21269C4.84452 4.44438 4.76846 4.74902 4.82722 5.0428L6.7503 14.6582C6.84378 15.1256 7.25419 15.4621 7.73088 15.4621H26.4561C26.918 15.4664 27.3663 15.306 27.7207 15.0095C28.0713 14.7161 28.307 14.3087 28.3867 13.859L29.9605 6.18212L29.9645 6.1613C30.0162 5.87909 30.0053 5.58899 29.9326 5.31145C29.86 5.03391 29.7273 4.77569 29.544 4.55498C29.3607 4.33428 29.1313 4.15647 28.8718 4.03409C28.6123 3.91171 28.3291 3.84774 28.0422 3.84669L28.0386 3.84668ZM27.9877 5.84668L26.4265 13.4621H8.55068L7.0276 5.84668H27.9877Z"
                                              fill="#F08718"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M4.02692 2H0.999924C0.447639 2 -7.58171e-05 1.55228 -7.58171e-05 1C-7.58171e-05 0.447715 0.447639 9.85383e-09 0.999924 9.85383e-09L4.05741 6.94585e-08C4.05748 6.94585e-08 4.05755 9.85383e-09 4.05762 9.85383e-09C4.50974 -4.52897e-05 4.948 0.156097 5.29824 0.442011C5.64013 0.7211 5.87765 1.10711 5.97294 1.53739L6.77485 4.59226C6.91507 5.12644 6.5957 5.67316 6.06151 5.81338C5.52733 5.95361 4.98061 5.63424 4.84039 5.10005L4.03269 2.02313C4.03068 2.01544 4.02875 2.00773 4.02692 2Z"
                                              fill="#F08718"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M7.53473 13.4815C6.99317 13.5898 6.64195 14.1167 6.75026 14.6582L7.55796 18.6967L7.55874 18.7006C7.64918 19.1436 7.88992 19.5418 8.24022 19.8278C8.59047 20.1137 9.02872 20.2698 9.48084 20.2698H24.1924C24.7447 20.2698 25.1924 19.8221 25.1924 19.2698C25.1924 18.7175 24.7447 18.2698 24.1924 18.2698H9.51219L8.71143 14.266C8.60311 13.7244 8.07629 13.3732 7.53473 13.4815Z"
                                              fill="#F08718"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M22.2308 25.0771C22.2096 25.0771 22.1924 25.0599 22.1924 25.0387C22.1924 25.0174 22.2096 25.0002 22.2308 25.0002C22.2521 25.0002 22.2693 25.0174 22.2693 25.0387C22.2693 25.0599 22.2521 25.0771 22.2308 25.0771ZM24.1924 25.0387C24.1924 23.9554 23.3142 23.0771 22.2308 23.0771C21.1475 23.0771 20.2693 23.9554 20.2693 25.0387C20.2693 26.122 21.1475 27.0002 22.2308 27.0002C23.3142 27.0002 24.1924 26.122 24.1924 25.0387Z"
                                              fill="#F08718"/>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                              d="M10.6154 25.0771C10.5941 25.0771 10.5769 25.0599 10.5769 25.0387C10.5769 25.0174 10.5941 25.0002 10.6154 25.0002C10.6366 25.0002 10.6538 25.0174 10.6538 25.0387C10.6538 25.0599 10.6366 25.0771 10.6154 25.0771ZM12.5769 25.0387C12.5769 23.9554 11.6987 23.0771 10.6154 23.0771C9.53204 23.0771 8.65383 23.9554 8.65383 25.0387C8.65383 26.122 9.53204 27.0002 10.6154 27.0002C11.6987 27.0002 12.5769 26.122 12.5769 25.0387Z"
                                              fill="#F08718"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    {!! $products->links() !!}
@endsection
