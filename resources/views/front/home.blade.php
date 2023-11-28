@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <!-- main-slider -->
    <div class="main-slider owl-carousel" style="border-radius: 20px;">
        @foreach($main_banners['1330x400px'] as $banner)
            <a href="/" class="main-slider_item">
                <img src="{{ asset($banner->image) }}" alt="">
            </a>
        @endforeach
    </div>
    <!-- healthy info -->
    <!-- healthy info -->
    <div class="healthy-info container d-md-flex d-none justify-content-between gap-3">
        @foreach($promotion_banners as $banner)
            <div class="healthy-info_card">
                <div class="healthy-info_card--img">
                    <img src="{{ asset($banner->image)  }}" alt="">
                </div>
                <p>{{ $banner->title }}</p>
            </div>
        @endforeach
    </div>
    <!-- actual products  -->
    <!-- ШАБЛОН КАРТОЧКИ БРАТЬ ТОЛЬКО ИЗ ЭТОГО СЛАЙДЕРА! -->
    @include('front.includes.home.actual-products')
    <!-- popular categories -->
    <section class="popular-categories container">
        <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
            <h6 class="title">Популярные категории</h6>
            <a href="{{ route('categories.view') }}" class="title-link">Все категории
                <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"
                          fill=""/>
                    <path
                        d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"
                        fill=""/>
                </svg>
            </a>
        </div>
        <div class="popular-categories_slider owl-carousel" name="popularCategoriesSlider">

            @foreach($catalogs as $catalog)
                <a href="{{ route('category.view', $catalog->slug) }}" class="popular-categories_item">
                    <div class="popular-categories_item--img">
                        <img src="{{ asset('assets/front/images/circle.svg') }}" alt="" name="popularCategoriesImg">
                        <img src="{{ asset( $catalog->category_img ?? '') }}" alt="">
                    </div>
                    <p name="popularCategoriesName">{{ $catalog->title }}</p>
                </a>
            @endforeach
        </div>
    </section>

    <!-- advertising banners -->
    <div class="advertising-banners container row gap-3 flex-nowrap justify-content-between">
        <a href="/" class="advertising-banner col-sm-4 col-11" name="advertisingBanner1"
           style="background: linear-gradient(90deg, #84FAB0 0%, #8FD3F4 100%); display: block !important;">
            @foreach($main_banners['410x450px'] as $key => $banner)
                @if($loop->iteration == 1)
                    <img src="{{ asset($banner->image) }}" alt="">
                @endif
            @endforeach
        </a>
        <a href="/" class="advertising-banner long col-sm-8 col-11" name="advertisingBanner2"
           style="background: linear-gradient(90deg, #A1C4FD 0%, #C2E9FB 100%); display: block !important;">
            @foreach($main_banners['840x450px'] as $key => $banner)
                @if($loop->iteration == 1)
                    <img src="{{ asset($banner->image) }}" alt="">
                @endif
            @endforeach
        </a>
    </div>
    <!-- novelties -->
    @include('front.includes.home.new-products')
    <!-- goods-discount -->
    @include('front.includes.home.discount-products')
    <!-- healthy info -->
    <div class="healthy-info container d-flex flex-md-row flex-column justify-content-between align-items-center gap-3">
        <a href="/" class="healthy-info_card card-bank d-flex gap-2 flex-xl-row flex-md-column flex-row"
           style="background: linear-gradient(90deg, #F5576C 0%, #8B143A 100%);">
            <img src="{{ asset('/assets/front/images/anorbank (1).png') }}" alt="">
            <img src="{{ asset('/assets/front/images/anorbank (2).png') }}" alt="">
        </a>
        <a href="/" class="healthy-info_card card-bank d-flex gap-2 flex-xl-row flex-md-column flex-row"
           style="background: linear-gradient(180deg, #FFCE00 0%, #FD6700 100%);">
            <img src="{{ asset('/assets/front/images/alif (2).png') }}" alt="">
            <img src="{{ asset('/assets/front/images/alif (1).png') }}" alt="">
        </a>
        <a href="/" class="healthy-info_card card-bank intend-img d-flex gap-2 flex-xl-row flex-md-column flex-row"
           style="background: linear-gradient(90deg, #88CEC6 0%, #FFF 100%);">
            <img src="{{ asset('/assets/front/images/intend (2).png') }}" alt="">
            <img src="{{ asset('/assets/front/images/intend (1).png') }}" alt="">
        </a>
    </div>

    <!-- reccomend -->
    @include('front.includes.home.recommend-products')
    <!-- popular -->
    @include('front.includes.home.popular-products')
    <!-- advertising banners -->
    <div class="advertising-banners container row flex-row-reverse gap-3 flex-nowrap justify-content-between">
        <a href="/" class="advertising-banner col-sm-4 col-11" name="advertisingBanner1"
           style="background: linear-gradient(90deg, #84FAB0 0%, #8FD3F4 100%); display: block !important;">
            @foreach($main_banners['410x450px'] as $key => $banner)
                @if($loop->iteration == 2)
                    <img src="{{ asset($banner->image) }}" alt="">
                @endif
            @endforeach
        </a>
        <a href="/" class="advertising-banner long col-sm-8 col-11" name="advertisingBanner2"
           style="background: linear-gradient(90deg, #A1C4FD 0%, #C2E9FB 100%); display: block !important;">
            @foreach($main_banners['840x450px'] as $key => $banner)
                @if($loop->iteration == 2)
                    <img src="{{ asset($banner->image) }}" alt="">
                @endif
            @endforeach
        </a>
    </div>
    <!-- Lawn mowers -->
    <section class="novelties container">
        <div class="title-box d-flex flex-md-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
            <h6 class="title">Газонокосилки</h6>
            <a href="/" class="title-link">Все газонокосилки
                <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"
                          fill=""/>
                    <path
                        d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"
                        fill=""/>
                </svg>
            </a>
        </div>
        <div class="d-flex justify-content-between flex-md-row flex-column-reverse">
            <div class="laptop-slider owl-carousel">
                @foreach($tags as $tag)
                    @if($tag->title == 'actual')
                        @foreach($tag->products as $product)
                            <div class="goods_item">
                                <div class="goods_header goods-img">
                                    <div class="goods_header--menu d-flex align-items-center">
                                        @if($tag->title == 'actual')
                                            <span class="goods-itemNew" name="goodsItemNew">New</span>
                                        @endif
                                        <button type="button">
                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"
                                                    stroke="white" stroke-width="2"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="icon-heart addToFavoritesBtn">
                                        </button>
                                    </div>
                                    <img src="{{ asset('/assets/front/images/circle.svg') }}" alt="">
                                    <img src="{{ asset($product->file_url) }}" alt="">

                                    <div class="goods_header--installment d-flex align-items-center">
                                        @if($tag->title == 'sale')
                                            <span class="goods_proccent" name="actualGoodsProccent">-25%</span>
                                            <p>Рассрочка</p>
                                        @endif
                                    </div>
                                </div>
                                <div style="padding: 15px;">
                                    @foreach($product->prices as $price)
                                        <p class="goods_currentPrice"
                                           name="actualGoodsCurrentPrice">{{ $price->value }} {{ $price->currency->currency_code }}</p>
                                    @endforeach
                                    <!-- <p class="goods_oldPrice" name="actualGoodsOldPrice">17 020 000 сум</p> -->
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
                                    <a href="productCard.html" class="goods_name"
                                       name="actualGoodsName">{{ $product->title }}</a>
                                    <a href="/" class="goods_companyName"
                                       name="actualGoodsCompanyName">{{ $product->brand->title }}</a>
                                    <div class="goods-addProduct ">
                                        <div class="goods-addProduct_btns">
                                            <button class="goods-addProduct-minus" type="button">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248"
                                                        stroke="#999999" stroke-linecap="round"/>
                                                    <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                                                </svg>
                                            </button>
                                            <input value="1" type="text" class="goods-itemCount"></input>
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
                                            <svg width="30" height="27" viewBox="0 0 30 27"
                                                 xmlns="http://www.w3.org/2000/svg">
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
                    @endif
                @endforeach
            </div>
            <a href="/" class="goods-advertising_banner laptop-banner" name="lawnMowersAdvertisingBanner">
                @if(isset($main_banners['496x420px']) )
                @foreach($main_banners['496x420px'] as $key => $banner)
                    @if($loop->iteration == 1)
                        <img src="{{ asset($banner->image) }}" alt="">
                    @endif
                @endforeach
                @endif
            </a>
        </div>
    </section>
    <!-- laptop -->
    <section class="goods-discount container">
        <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
            <h6 class="title">Ноутбуки с официальной гарантией</h6>
            <a href="/" class="title-link">Все ноутбуки
                <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"
                          fill=""/>
                    <path
                        d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"
                        fill=""/>
                </svg>
            </a>
        </div>
        <div class="d-flex justify-content-between flex-md-row flex-column">
            <a href="/" class="goods-advertising_banner laptop-banner" name="laptopAdvertisingBanner">
                @if(isset($main_banners['496x420px']) )
                @foreach($main_banners['496x420px'] as $key => $banner)
                    @if($loop->iteration == 2)
                        <img src="{{ asset($banner->image) }}" alt="">
                    @endif
                @endforeach
                @endif
            </a>
            <div class="laptop-slider owl-carousel">
                @foreach($tags as $tag)
                    @if($tag->title == 'actual')
                        @foreach($tag->products as $product)
                            <div class="goods_item">
                                <div class="goods_header goods-img">
                                    <div class="goods_header--menu d-flex align-items-center">
                                        @if($tag->title == 'actual')
                                            <span class="goods-itemNew" name="goodsItemNew">New</span>
                                        @endif
                                        <button type="button">
                                            <svg width="24" height="24" viewBox="0 0 24 24"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"
                                                    stroke="white" stroke-width="2"/>
                                            </svg>
                                        </button>
                                        <button type="button" class="icon-heart addToFavoritesBtn">
                                        </button>
                                    </div>
                                    <img src="{{ asset('/assets/front/images/circle.svg') }}" alt="">
                                    <img src="{{ asset($product->file_url) }}" alt="">

                                    <div class="goods_header--installment d-flex align-items-center">
                                        @if($tag->title == 'sale')
                                            <span class="goods_proccent" name="actualGoodsProccent">-25%</span>
                                            <p>Рассрочка</p>
                                        @endif
                                    </div>
                                </div>
                                <div style="padding: 15px;">
                                    @foreach($product->prices as $price)
                                        <p class="goods_currentPrice"
                                           name="actualGoodsCurrentPrice">{{ $price->value }} {{ $price->currency->currency_code }}</p>
                                    @endforeach
                                    <!-- <p class="goods_oldPrice" name="actualGoodsOldPrice">17 020 000 сум</p> -->
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
                                    <a href="productCard.html" class="goods_name"
                                       name="actualGoodsName">{{ $product->title }}</a>
                                    <a href="/" class="goods_companyName"
                                       name="actualGoodsCompanyName">{{ $product->brand->title }}</a>
                                    <div class="goods-addProduct ">
                                        <div class="goods-addProduct_btns">
                                            <button class="goods-addProduct-minus" type="button">
                                                <svg width="20" height="21" viewBox="0 0 20 21" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248"
                                                        stroke="#999999" stroke-linecap="round"/>
                                                    <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                                                </svg>
                                            </button>
                                            <input value="1" type="text" class="goods-itemCount"></input>
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
                                            <svg width="30" height="27" viewBox="0 0 30 27"
                                                 xmlns="http://www.w3.org/2000/svg">
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
                    @endif
                @endforeach
            </div>
        </div>
    </section>
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
    <!-- useful -->
    <section class="useful container">
        <div class="nav useful-tab_links">
            <a href="#tabNews" data-bs-toggle="tab" class="tabs-links active">Новости</a>
            <a href="#tabStock" data-bs-toggle="tab" class="tabs-links">Акции</a>
            <a href="#tabVideo" data-bs-toggle="tab" class="tabs-links">Видеообзоры</a>
        </div>
        <div class="tab-content useful-tab_content">
            <div class="tab-pane show fade active" id="tabNews">
                <div class="useful-body">
                    @foreach($news as $item)
                        <a href="{{ route('news.detail', $item->slug) }}" class="useful-tab">
                            <img style="max-width: 200px" src="{{ asset($item->image) }}" alt="">
                            <div class="useful-teb_text">
                                <h6>{{ $item->title }}</h6>
                                <p>{{ \Illuminate\Support\Str::limit($item->description, 100, '...') }}</p>
                                <div class="useful-tab_link">
                                    <p>{{ $item->created_at }}</p>
                                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934"
                                            stroke-width="2" stroke-linecap="round"/>
                                        <path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2"
                                              stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <a href="{{ route('news.list') }}" class="title-link mt-4 d-block">Все новости
                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"
                              fill=""/>
                        <path
                            d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"
                            fill=""/>
                    </svg>
                </a>
            </div>

            <div class="tab-pane show fade" id="tabStock">
                <div class="useful-body">
                    @foreach($promotions as $promotion)
                        <a href="{{ route('promotion.detail', $promotion->slug) }}" class="useful-tab">
                            <img src="{{ asset($promotion->image) }}" alt="">
                            <div class="useful-teb_text">
                                <h6>{{ $promotion->title }}</h6>
                                <p>{{ \Illuminate\Support\Str::limit($item->description, 100, '...') }}</p>
                                <div class="useful-tab_link">
                                    <p>{{ $promotion->created_at }}</p>
                                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934"
                                            stroke-width="2" stroke-linecap="round"/>
                                        <path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2"
                                              stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <a href="{{ route('promotions') }}" class="title-link mt-4 d-block">Все акции
                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"
                              fill=""/>
                        <path
                            d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"
                            fill=""/>
                    </svg>
                </a>
            </div>
            <div class="tab-pane show fade" id="tabVideo">
                <div class="useful-body">
                    @foreach($video_reviews as $item)
                        <a href="/" class="useful-tab">
                            <img src="/image/useful/cashBack.png" alt="">
                            <div class="useful-teb_text">
                                <h6>{{ $item->title }}</h6>
                                <p>{{ \Illuminate\Support\Str::limit($item->description, 100, '...') }}</p>
                                <div class="useful-tab_link">
                                    <p>{{ $item->created_at }}</p>
                                    <svg width="31" height="32" viewBox="0 0 31 32" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.3934 26.6066C6.49119 28.7044 9.16393 30.133 12.0736 30.7118C14.9834 31.2906 17.9994 30.9935 20.7403 29.8582C23.4811 28.7229 25.8238 26.8003 27.472 24.3336C29.1203 21.8668 30 18.9667 30 16C30 13.0333 29.1203 10.1332 27.472 7.66645C25.8238 5.19971 23.4811 3.27712 20.7403 2.14181C17.9994 1.00649 14.9834 0.709443 12.0736 1.28822C9.16393 1.867 6.49119 3.29561 4.3934 5.3934"
                                            stroke-width="2" stroke-linecap="round"/>
                                        <path d="M13.5 8.5L19.5 16M19.5 16L13.5 23.5M19.5 16H1.5" stroke-width="2"
                                              stroke-linecap="round"/>
                                    </svg>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
                <a href="{{ route('video-reviews') }}" class="title-link mt-4 d-block">Все видеообзоры
                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd"
                              d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"
                              fill=""/>
                        <path
                            d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"
                            fill=""/>
                    </svg>
                </a>
            </div>
        </div>
    </section>
    <!-- popular brands -->
    <section class="popular-brands container">
        <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
            <h6 class="title">Популярные бренды</h6>
            <a href="{{ route('brands') }}" class="title-link">Все бренды
                <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                          d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"
                          fill=""/>
                    <path
                        d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"
                        fill=""/>
                </svg>
            </a>
        </div>
        <div class="popular-categories_slider owl-carousel" name="popularBrandsSlider">
            @foreach($brands as $brand)
                <a href="{{ route('brand.detail', $brand->slug) }}" class="popular-brand_item">
                    <img src="{{ $brand->brand_logo }}" alt="">
                </a>
            @endforeach
        </div>
    </section>
    <!-- recently viewed -->
    @include('front.includes.recently-viewed-products')
    <!-- pickup points -->
    <section class="pickup-points container">
        <h6 class="title mb-sm-5 bm-3">Пункты самовывоза</h6>
        <div class="pickup-points_main d-flex justify-content-between flex-lg-row flex-column gap-lg-0 gap-4">
            <div class="pickup-points_points row justify-content-between col-xl-7 col-lg-6 col-12">

                @foreach($pick_up_points as $item)
                    <div class="pickup-points_point col-xl-6 col-lg-12 col-md-6 col-12">
                        <div>
                            <h6>{{ $item->city }}</h6>
                            <p>{{ $item->address }}</p>
                        </div>
                        <a href="{{ $item->link }}" class="d-flex gap-2 align-items-center" target="_blank">
                            <span>На карте</span>
                            <svg width="20" height="17" viewBox="0 0 20 17" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967"
                                    stroke="#2D8D00" stroke-linecap="round"/>
                                <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00"
                                      stroke-linecap="round"/>
                            </svg>
                        </a>
                    </div>

                @endforeach

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
    <!-- faq -->
    <section class="faq container">
        <h6 class="title mb-sm-4 mb-2">FAQ: популярные вопросы покупателей на Stab.Uz</h6>
        <div class="faq-accordion">
            @foreach($faqs as $faq)
                <div class="faq-accordion-item">
                    <div class="faq-accordion-header">
                        <div class="faq-accordion-arrow">
                            <svg width="41" height="32" viewBox="0 0 41 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                                <path
                                    d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                            </svg>
                        </div>
                        <h5>{{ $faq->question }}</h5>
                    </div>
                    <div class="faq-accordion-content">
                        <p>{{ $faq->answer }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- mailing  -->
    <section class="mailing-container container">
        <div class="mailing">
            <div class="healthy-info d-md-none d-flex flex-wrap justify-content-between gap-3">
                <div class="healthy-info_card flex-row">
                    <div class="healthy-info_card--img">
                        <img src="image/healthy-info/Group 534812679.png" alt="">
                    </div>
                    <p>Бесплатная курьерская доставка</p>
                </div>
                <div class="healthy-info_card">
                    <div class="healthy-info_card--img">
                        <img src="image/healthy-info/Group 534812680.png" alt="">
                    </div>
                    <p>Акции и скидки </p>
                </div>
                <div class="healthy-info_card">
                    <div class="healthy-info_card--img">
                        <img src="image/healthy-info/Group 534812681.png" alt="">
                    </div>
                    <p>Широкий ассортимент</p>
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center flex-lg-row flex-column gap-3">
                <div class="mailing-lext d-flex flex-column align-items-lg-start align-items-center">
                    <img src="image/whiteLogo.png" alt="">
                    <p>Будьте всегда в курсе!</p>
                </div>
                <form action="URL" class="mailing-form">
                    <div class="mailing-form_check d-flex gap-3">
                        <input type="checkbox" required>
                        <p>Ознакомлен(а) с <a href="/">правилами</a> предоставления услуг и согласен(на) на обработку
                            своих персональных данных</p>
                    </div>
                    <div class="d-flex gap-4 flex-nowrap flex-md-row flex-column">
                        <input type="email" class="mailing-email" placeholder="Ваш e-mail" required>
                        <button disabled type="submit">Подписаться
                            <svg width="67" height="67" viewBox="0 0 67 67" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
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
        </div>
    </section>
@endsection
