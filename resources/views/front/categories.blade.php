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
    <section class="actual-goods container">
        <h6 class="title mb-sm-5 bm-3">Рекомендуем</h6>
        <div class="actual-goods_slider owl-carousel" name="reccomendSlider">
            <div class="goods_item">
                <div class="goods_header">
                    <div class="goods_header--menu d-flex align-items-center">
                        <span class="goods-itemNew" name="goodsItemNew">New</span>
                        <button type="button">
                            <svg width="24" height="24" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"  stroke="white" stroke-width="2"/>
                            </svg>
                        </button>
                        <button type="button" class="icon-heart">
                        </button>
                    </div>
                    <img src="image/cards/Group 511.svg" alt="">
                    <img src="image/cards/Rectangle 604 (1).png" alt="">
                    <div class="goods_header--installment d-flex align-items-center">
                        <span class="goods_proccent" name="actualGoodsProccent">-25%</span>
                        <p>Рассрочка</p>
                    </div>
                </div>
                <div style="padding: 15px;">
                    <p class="goods_currentPrice" name="actualGoodsCurrentPrice">12 477 500 сум</p>
                    <p class="goods_oldPrice" name="actualGoodsOldPrice">17 020 000 сум</p>
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
                    <a href="/" class="goods_name" name="actualGoodsName">Швейная машина Comfortstitch 11 машина Швейная Швейная</a>
                    <a href="/" class="goods_companyName" name="actualGoodsCompanyName">CHAYKA</a>
                    <div class="goods-addProduct ">
                        <div class="goods-addProduct_btns">
                            <button class="goods-addProduct-minus disabled" type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248" stroke="#999999" stroke-linecap="round"/>
                                    <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                                </svg>
                            </button>
                            <p class="goods-itemCount">1</p>
                            <button class="goods-addProduct-plus"  type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248" stroke="#999999" stroke-linecap="round"/>
                                    <path d="M5 11V10H14V11H5Z" fill="#999999"/>
                                    <path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/>
                                </svg>
                            </button>
                        </div>
                        <button type="button" class="goods-item_addToBasket">
                            <svg width="30" height="27" viewBox="0 0 30 27" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0386 3.84668H5.8078C5.50821 3.84668 5.2244 3.981 5.03446 4.21269C4.84452 4.44438 4.76846 4.74902 4.82722 5.0428L6.7503 14.6582C6.84378 15.1256 7.25419 15.4621 7.73088 15.4621H26.4561C26.918 15.4664 27.3663 15.306 27.7207 15.0095C28.0713 14.7161 28.307 14.3087 28.3867 13.859L29.9605 6.18212L29.9645 6.1613C30.0162 5.87909 30.0053 5.58899 29.9326 5.31145C29.86 5.03391 29.7273 4.77569 29.544 4.55498C29.3607 4.33428 29.1313 4.15647 28.8718 4.03409C28.6123 3.91171 28.3291 3.84774 28.0422 3.84669L28.0386 3.84668ZM27.9877 5.84668L26.4265 13.4621H8.55068L7.0276 5.84668H27.9877Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.02692 2H0.999924C0.447639 2 -7.58171e-05 1.55228 -7.58171e-05 1C-7.58171e-05 0.447715 0.447639 9.85383e-09 0.999924 9.85383e-09L4.05741 6.94585e-08C4.05748 6.94585e-08 4.05755 9.85383e-09 4.05762 9.85383e-09C4.50974 -4.52897e-05 4.948 0.156097 5.29824 0.442011C5.64013 0.7211 5.87765 1.10711 5.97294 1.53739L6.77485 4.59226C6.91507 5.12644 6.5957 5.67316 6.06151 5.81338C5.52733 5.95361 4.98061 5.63424 4.84039 5.10005L4.03269 2.02313C4.03068 2.01544 4.02875 2.00773 4.02692 2Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.53473 13.4815C6.99317 13.5898 6.64195 14.1167 6.75026 14.6582L7.55796 18.6967L7.55874 18.7006C7.64918 19.1436 7.88992 19.5418 8.24022 19.8278C8.59047 20.1137 9.02872 20.2698 9.48084 20.2698H24.1924C24.7447 20.2698 25.1924 19.8221 25.1924 19.2698C25.1924 18.7175 24.7447 18.2698 24.1924 18.2698H9.51219L8.71143 14.266C8.60311 13.7244 8.07629 13.3732 7.53473 13.4815Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.2308 25.0771C22.2096 25.0771 22.1924 25.0599 22.1924 25.0387C22.1924 25.0174 22.2096 25.0002 22.2308 25.0002C22.2521 25.0002 22.2693 25.0174 22.2693 25.0387C22.2693 25.0599 22.2521 25.0771 22.2308 25.0771ZM24.1924 25.0387C24.1924 23.9554 23.3142 23.0771 22.2308 23.0771C21.1475 23.0771 20.2693 23.9554 20.2693 25.0387C20.2693 26.122 21.1475 27.0002 22.2308 27.0002C23.3142 27.0002 24.1924 26.122 24.1924 25.0387Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6154 25.0771C10.5941 25.0771 10.5769 25.0599 10.5769 25.0387C10.5769 25.0174 10.5941 25.0002 10.6154 25.0002C10.6366 25.0002 10.6538 25.0174 10.6538 25.0387C10.6538 25.0599 10.6366 25.0771 10.6154 25.0771ZM12.5769 25.0387C12.5769 23.9554 11.6987 23.0771 10.6154 23.0771C9.53204 23.0771 8.65383 23.9554 8.65383 25.0387C8.65383 26.122 9.53204 27.0002 10.6154 27.0002C11.6987 27.0002 12.5769 26.122 12.5769 25.0387Z" fill="#F08718"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="goods_item">
                <div class="goods_header">
                    <div class="goods_header--menu d-flex align-items-center">
                        <button type="button" class="active">
                            <svg width="24" height="24" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"  stroke="white" stroke-width="2"/>
                            </svg>
                        </button>
                        <button type="button" class="icon-heart active">
                        </button>
                    </div>
                    <img src="image/cards/Group 511.svg" alt="">
                    <img src="image/cards/Rectangle 604 (1).png" alt="">
                    <div class="goods_header--installment d-flex align-items-center">
                        <p>Рассрочка</p>
                    </div>
                </div>
                <div style="padding: 15px;">
                    <p class="goods_currentPrice" name="actualGoodsCurrentPrice">1 477 500 сум</p>
                    <p class="goods_oldPrice" name="actualGoodsOldPrice">1 020 000 сум</p>
                    <div class="mt-1 mb-1 d-flex align-items-center gap-3">
                        <div class="goods_rewies d-flex align-items-center gap-1">
                            <span class="icon-star active"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <p class="goods_reviewCount" name="actualGoodsReviewCount">12</p>
                        </div>
                        <div class="goods_views d-flex gap-1">
                            <span class="icon-eye"></span>
                            <p class="goods_viewsCount" name="actualGoodsViewsCount">13</p>
                        </div>
                    </div>
                    <a href="/" class="goods_name" name="actualGoodsName">Швейная машина Comfortstitch 11 машина Швейная Швейная</a>
                    <a href="/" class="goods_companyName" name="actualGoodsCompanyName">GARDENA</a>
                    <div class="goods-addProduct ">
                        <div class="goods-addProduct_btns">
                            <button class="goods-addProduct-minus disabled" type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248" stroke="#999999" stroke-linecap="round"/>
                                    <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                                </svg>
                            </button>
                            <p class="goods-itemCount">1</p>
                            <button class="goods-addProduct-plus"  type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248" stroke="#999999" stroke-linecap="round"/>
                                    <path d="M5 11V10H14V11H5Z" fill="#999999"/>
                                    <path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/>
                                </svg>
                            </button>
                        </div>
                        <button type="button" class="goods-item_addToBasket">
                            <svg width="30" height="27" viewBox="0 0 30 27" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0386 3.84668H5.8078C5.50821 3.84668 5.2244 3.981 5.03446 4.21269C4.84452 4.44438 4.76846 4.74902 4.82722 5.0428L6.7503 14.6582C6.84378 15.1256 7.25419 15.4621 7.73088 15.4621H26.4561C26.918 15.4664 27.3663 15.306 27.7207 15.0095C28.0713 14.7161 28.307 14.3087 28.3867 13.859L29.9605 6.18212L29.9645 6.1613C30.0162 5.87909 30.0053 5.58899 29.9326 5.31145C29.86 5.03391 29.7273 4.77569 29.544 4.55498C29.3607 4.33428 29.1313 4.15647 28.8718 4.03409C28.6123 3.91171 28.3291 3.84774 28.0422 3.84669L28.0386 3.84668ZM27.9877 5.84668L26.4265 13.4621H8.55068L7.0276 5.84668H27.9877Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.02692 2H0.999924C0.447639 2 -7.58171e-05 1.55228 -7.58171e-05 1C-7.58171e-05 0.447715 0.447639 9.85383e-09 0.999924 9.85383e-09L4.05741 6.94585e-08C4.05748 6.94585e-08 4.05755 9.85383e-09 4.05762 9.85383e-09C4.50974 -4.52897e-05 4.948 0.156097 5.29824 0.442011C5.64013 0.7211 5.87765 1.10711 5.97294 1.53739L6.77485 4.59226C6.91507 5.12644 6.5957 5.67316 6.06151 5.81338C5.52733 5.95361 4.98061 5.63424 4.84039 5.10005L4.03269 2.02313C4.03068 2.01544 4.02875 2.00773 4.02692 2Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.53473 13.4815C6.99317 13.5898 6.64195 14.1167 6.75026 14.6582L7.55796 18.6967L7.55874 18.7006C7.64918 19.1436 7.88992 19.5418 8.24022 19.8278C8.59047 20.1137 9.02872 20.2698 9.48084 20.2698H24.1924C24.7447 20.2698 25.1924 19.8221 25.1924 19.2698C25.1924 18.7175 24.7447 18.2698 24.1924 18.2698H9.51219L8.71143 14.266C8.60311 13.7244 8.07629 13.3732 7.53473 13.4815Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.2308 25.0771C22.2096 25.0771 22.1924 25.0599 22.1924 25.0387C22.1924 25.0174 22.2096 25.0002 22.2308 25.0002C22.2521 25.0002 22.2693 25.0174 22.2693 25.0387C22.2693 25.0599 22.2521 25.0771 22.2308 25.0771ZM24.1924 25.0387C24.1924 23.9554 23.3142 23.0771 22.2308 23.0771C21.1475 23.0771 20.2693 23.9554 20.2693 25.0387C20.2693 26.122 21.1475 27.0002 22.2308 27.0002C23.3142 27.0002 24.1924 26.122 24.1924 25.0387Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6154 25.0771C10.5941 25.0771 10.5769 25.0599 10.5769 25.0387C10.5769 25.0174 10.5941 25.0002 10.6154 25.0002C10.6366 25.0002 10.6538 25.0174 10.6538 25.0387C10.6538 25.0599 10.6366 25.0771 10.6154 25.0771ZM12.5769 25.0387C12.5769 23.9554 11.6987 23.0771 10.6154 23.0771C9.53204 23.0771 8.65383 23.9554 8.65383 25.0387C8.65383 26.122 9.53204 27.0002 10.6154 27.0002C11.6987 27.0002 12.5769 26.122 12.5769 25.0387Z" fill="#F08718"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- recently viewed -->
    <section class="actual-goods container">
        <h6 class="title mb-sm-5 bm-3">Недавно просмотренные товары</h6>
        <div class="actual-goods_slider owl-carousel" name="recentlyViewedSlider">
            <div class="goods_item">
                <div class="goods_header">
                    <div class="goods_header--menu d-flex align-items-center">
                        <span class="goods-itemNew" name="goodsItemNew">New</span>
                        <button type="button">
                            <svg width="24" height="24" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"  stroke="white" stroke-width="2"/>
                            </svg>
                        </button>
                        <button type="button" class="icon-heart">
                        </button>
                    </div>
                    <img src="image/cards/Group 511.svg" alt="">
                    <img src="image/cards/Rectangle 604 (1).png" alt="">
                    <div class="goods_header--installment d-flex align-items-center">
                        <span class="goods_proccent" name="actualGoodsProccent">-25%</span>
                        <p>Рассрочка</p>
                    </div>
                </div>
                <div style="padding: 15px;">
                    <p class="goods_currentPrice" name="actualGoodsCurrentPrice">12 477 500 сум</p>
                    <p class="goods_oldPrice" name="actualGoodsOldPrice">17 020 000 сум</p>
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
                    <a href="/" class="goods_name" name="actualGoodsName">Швейная машина Comfortstitch 11 машина Швейная Швейная</a>
                    <a href="/" class="goods_companyName" name="actualGoodsCompanyName">CHAYKA</a>
                    <div class="goods-addProduct ">
                        <div class="goods-addProduct_btns">
                            <button class="goods-addProduct-minus disabled" type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248" stroke="#999999" stroke-linecap="round"/>
                                    <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                                </svg>
                            </button>
                            <p class="goods-itemCount">1</p>
                            <button class="goods-addProduct-plus"  type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248" stroke="#999999" stroke-linecap="round"/>
                                    <path d="M5 11V10H14V11H5Z" fill="#999999"/>
                                    <path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/>
                                </svg>
                            </button>
                        </div>
                        <button type="button" class="goods-item_addToBasket">
                            <svg width="30" height="27" viewBox="0 0 30 27" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0386 3.84668H5.8078C5.50821 3.84668 5.2244 3.981 5.03446 4.21269C4.84452 4.44438 4.76846 4.74902 4.82722 5.0428L6.7503 14.6582C6.84378 15.1256 7.25419 15.4621 7.73088 15.4621H26.4561C26.918 15.4664 27.3663 15.306 27.7207 15.0095C28.0713 14.7161 28.307 14.3087 28.3867 13.859L29.9605 6.18212L29.9645 6.1613C30.0162 5.87909 30.0053 5.58899 29.9326 5.31145C29.86 5.03391 29.7273 4.77569 29.544 4.55498C29.3607 4.33428 29.1313 4.15647 28.8718 4.03409C28.6123 3.91171 28.3291 3.84774 28.0422 3.84669L28.0386 3.84668ZM27.9877 5.84668L26.4265 13.4621H8.55068L7.0276 5.84668H27.9877Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.02692 2H0.999924C0.447639 2 -7.58171e-05 1.55228 -7.58171e-05 1C-7.58171e-05 0.447715 0.447639 9.85383e-09 0.999924 9.85383e-09L4.05741 6.94585e-08C4.05748 6.94585e-08 4.05755 9.85383e-09 4.05762 9.85383e-09C4.50974 -4.52897e-05 4.948 0.156097 5.29824 0.442011C5.64013 0.7211 5.87765 1.10711 5.97294 1.53739L6.77485 4.59226C6.91507 5.12644 6.5957 5.67316 6.06151 5.81338C5.52733 5.95361 4.98061 5.63424 4.84039 5.10005L4.03269 2.02313C4.03068 2.01544 4.02875 2.00773 4.02692 2Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.53473 13.4815C6.99317 13.5898 6.64195 14.1167 6.75026 14.6582L7.55796 18.6967L7.55874 18.7006C7.64918 19.1436 7.88992 19.5418 8.24022 19.8278C8.59047 20.1137 9.02872 20.2698 9.48084 20.2698H24.1924C24.7447 20.2698 25.1924 19.8221 25.1924 19.2698C25.1924 18.7175 24.7447 18.2698 24.1924 18.2698H9.51219L8.71143 14.266C8.60311 13.7244 8.07629 13.3732 7.53473 13.4815Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.2308 25.0771C22.2096 25.0771 22.1924 25.0599 22.1924 25.0387C22.1924 25.0174 22.2096 25.0002 22.2308 25.0002C22.2521 25.0002 22.2693 25.0174 22.2693 25.0387C22.2693 25.0599 22.2521 25.0771 22.2308 25.0771ZM24.1924 25.0387C24.1924 23.9554 23.3142 23.0771 22.2308 23.0771C21.1475 23.0771 20.2693 23.9554 20.2693 25.0387C20.2693 26.122 21.1475 27.0002 22.2308 27.0002C23.3142 27.0002 24.1924 26.122 24.1924 25.0387Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6154 25.0771C10.5941 25.0771 10.5769 25.0599 10.5769 25.0387C10.5769 25.0174 10.5941 25.0002 10.6154 25.0002C10.6366 25.0002 10.6538 25.0174 10.6538 25.0387C10.6538 25.0599 10.6366 25.0771 10.6154 25.0771ZM12.5769 25.0387C12.5769 23.9554 11.6987 23.0771 10.6154 23.0771C9.53204 23.0771 8.65383 23.9554 8.65383 25.0387C8.65383 26.122 9.53204 27.0002 10.6154 27.0002C11.6987 27.0002 12.5769 26.122 12.5769 25.0387Z" fill="#F08718"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="goods_item">
                <div class="goods_header">
                    <div class="goods_header--menu d-flex align-items-center">
                        <button type="button" class="active">
                            <svg width="24" height="24" viewBox="0 0 24 24"  xmlns="http://www.w3.org/2000/svg">
                                <path d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"  stroke="white" stroke-width="2"/>
                            </svg>
                        </button>
                        <button type="button" class="icon-heart active">
                        </button>
                    </div>
                    <img src="image/cards/Group 511.svg" alt="">
                    <img src="image/cards/Rectangle 604 (1).png" alt="">
                    <div class="goods_header--installment d-flex align-items-center">
                        <p>Рассрочка</p>
                    </div>
                </div>
                <div style="padding: 15px;">
                    <p class="goods_currentPrice" name="actualGoodsCurrentPrice">1 477 500 сум</p>
                    <p class="goods_oldPrice" name="actualGoodsOldPrice">1 020 000 сум</p>
                    <div class="mt-1 mb-1 d-flex align-items-center gap-3">
                        <div class="goods_rewies d-flex align-items-center gap-1">
                            <span class="icon-star active"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <span class="icon-star"></span>
                            <p class="goods_reviewCount" name="actualGoodsReviewCount">12</p>
                        </div>
                        <div class="goods_views d-flex gap-1">
                            <span class="icon-eye"></span>
                            <p class="goods_viewsCount" name="actualGoodsViewsCount">13</p>
                        </div>
                    </div>
                    <a href="/" class="goods_name" name="actualGoodsName">Швейная машина Comfortstitch 11 машина Швейная Швейная</a>
                    <a href="/" class="goods_companyName" name="actualGoodsCompanyName">GARDENA</a>
                    <div class="goods-addProduct ">
                        <div class="goods-addProduct_btns">
                            <button class="goods-addProduct-minus disabled" type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248" stroke="#999999" stroke-linecap="round"/>
                                    <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                                </svg>
                            </button>
                            <p class="goods-itemCount">1</p>
                            <button class="goods-addProduct-plus"  type="button"><svg width="20" height="21" viewBox="0 0 20 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248" stroke="#999999" stroke-linecap="round"/>
                                    <path d="M5 11V10H14V11H5Z" fill="#999999"/>
                                    <path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/>
                                </svg>
                            </button>
                        </div>
                        <button type="button" class="goods-item_addToBasket">
                            <svg width="30" height="27" viewBox="0 0 30 27" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M28.0386 3.84668H5.8078C5.50821 3.84668 5.2244 3.981 5.03446 4.21269C4.84452 4.44438 4.76846 4.74902 4.82722 5.0428L6.7503 14.6582C6.84378 15.1256 7.25419 15.4621 7.73088 15.4621H26.4561C26.918 15.4664 27.3663 15.306 27.7207 15.0095C28.0713 14.7161 28.307 14.3087 28.3867 13.859L29.9605 6.18212L29.9645 6.1613C30.0162 5.87909 30.0053 5.58899 29.9326 5.31145C29.86 5.03391 29.7273 4.77569 29.544 4.55498C29.3607 4.33428 29.1313 4.15647 28.8718 4.03409C28.6123 3.91171 28.3291 3.84774 28.0422 3.84669L28.0386 3.84668ZM27.9877 5.84668L26.4265 13.4621H8.55068L7.0276 5.84668H27.9877Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.02692 2H0.999924C0.447639 2 -7.58171e-05 1.55228 -7.58171e-05 1C-7.58171e-05 0.447715 0.447639 9.85383e-09 0.999924 9.85383e-09L4.05741 6.94585e-08C4.05748 6.94585e-08 4.05755 9.85383e-09 4.05762 9.85383e-09C4.50974 -4.52897e-05 4.948 0.156097 5.29824 0.442011C5.64013 0.7211 5.87765 1.10711 5.97294 1.53739L6.77485 4.59226C6.91507 5.12644 6.5957 5.67316 6.06151 5.81338C5.52733 5.95361 4.98061 5.63424 4.84039 5.10005L4.03269 2.02313C4.03068 2.01544 4.02875 2.00773 4.02692 2Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M7.53473 13.4815C6.99317 13.5898 6.64195 14.1167 6.75026 14.6582L7.55796 18.6967L7.55874 18.7006C7.64918 19.1436 7.88992 19.5418 8.24022 19.8278C8.59047 20.1137 9.02872 20.2698 9.48084 20.2698H24.1924C24.7447 20.2698 25.1924 19.8221 25.1924 19.2698C25.1924 18.7175 24.7447 18.2698 24.1924 18.2698H9.51219L8.71143 14.266C8.60311 13.7244 8.07629 13.3732 7.53473 13.4815Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M22.2308 25.0771C22.2096 25.0771 22.1924 25.0599 22.1924 25.0387C22.1924 25.0174 22.2096 25.0002 22.2308 25.0002C22.2521 25.0002 22.2693 25.0174 22.2693 25.0387C22.2693 25.0599 22.2521 25.0771 22.2308 25.0771ZM24.1924 25.0387C24.1924 23.9554 23.3142 23.0771 22.2308 23.0771C21.1475 23.0771 20.2693 23.9554 20.2693 25.0387C20.2693 26.122 21.1475 27.0002 22.2308 27.0002C23.3142 27.0002 24.1924 26.122 24.1924 25.0387Z" fill="#F08718"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.6154 25.0771C10.5941 25.0771 10.5769 25.0599 10.5769 25.0387C10.5769 25.0174 10.5941 25.0002 10.6154 25.0002C10.6366 25.0002 10.6538 25.0174 10.6538 25.0387C10.6538 25.0599 10.6366 25.0771 10.6154 25.0771ZM12.5769 25.0387C12.5769 23.9554 11.6987 23.0771 10.6154 23.0771C9.53204 23.0771 8.65383 23.9554 8.65383 25.0387C8.65383 26.122 9.53204 27.0002 10.6154 27.0002C11.6987 27.0002 12.5769 26.122 12.5769 25.0387Z" fill="#F08718"/>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                            <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
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
                            <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
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
                            <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
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
                            <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
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
                            <path d="M6.1967 13.8033C7.24559 14.8522 8.58197 15.5665 10.0368 15.8559C11.4917 16.1453 12.9997 15.9968 14.3701 15.4291C15.7406 14.8614 16.9119 13.9001 17.736 12.6668C18.5601 11.4334 19 9.98336 19 8.5C19 7.01664 18.5601 5.56659 17.736 4.33322C16.9119 3.09986 15.7406 2.13856 14.3701 1.5709C12.9997 1.00325 11.4917 0.854721 10.0368 1.14411C8.58197 1.4335 7.24559 2.1478 6.1967 3.1967" stroke="#2D8D00" stroke-linecap="round"/>
                            <path d="M11.2143 5L14 8.5M14 8.5L11.2143 12M14 8.5H1" stroke="#2D8D00" stroke-linecap="round"/>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="pickup-points_map col-xl-5 col-lg-6 col-12">
                <div style="position:relative;overflow:hidden;"><a href="https://yandex.uz/maps/org/stab_uz/187208734623/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:0px;">Stab. uz</a><a href="https://yandex.uz/maps/10335/tashkent/category/electrical_products/184107066/?utm_medium=mapframe&utm_source=maps" style="color:#eee;font-size:12px;position:absolute;top:14px;">Электротехническая продукция в Ташкенте</a><iframe src="https://yandex.uz/map-widget/v1/?ll=69.250263%2C41.355994&mode=search&oid=187208734623&ol=biz&z=16.69" width="100%"  frameborder="1" allowfullscreen="true" style="position:relative;"></iframe></div>
            </div>
        </div>
    </section>
    <!-- stab -->
    <div class="stab container">
        <h6 class="title mb-sm-4 mb-2">Stab.Uz — Интернет-магазин электротехнического оборудования</h6>
        <p class="stab-text">Онлайн-мегамаркет Stab.Uz — уникальный проект, представляющий десятки тысяч товаров непродовольственной группы от более сотни брендов. В каталоге представлены позиции по всем востребованным на современном рынке категориям. К нам обращаются те, кто ищет в Узбекистане <a href="/">Интернет-магазин</a>Онлайн-мегамаркет Stab.Uz — уникальный проект, представляющий десятки тысяч товаров непродовольственной группы от более сотни брендов. Онлайн-мегамаркет Stab.Uz — уникальный проект, представляющий десятки тысяч товаров непродовольственной группы от более сотни брендов.</p>
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
                    <p>Ознакомлен(а) с <a href="/">правилами</a> предоставления услуг и согласен(на) на обработку своих персональных данных</p>
                </div>
                <div class="d-flex gap-4 flex-nowrap flex-md-row flex-column">
                    <input type="email" class="mailing-email" placeholder="Ваш e-mail" required>
                    <button disabled type="submit">Подписаться <svg width="67" height="67" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.519 56.481C15.0642 61.0262 20.8552 64.1215 27.1596 65.3755C33.4639 66.6295 39.9986 65.9859 45.9372 63.5261C51.8758 61.0662 56.9516 56.9006 60.5228 51.556C64.0939 46.2114 66 39.9279 66 33.5C66 27.0721 64.0939 20.7886 60.5228 15.444C56.9516 10.0994 51.8758 5.93377 45.9372 3.47392C39.9986 1.01407 33.464 0.370459 27.1596 1.62448C20.8552 2.8785 15.0642 5.97382 10.519 10.519"  stroke-width="2" stroke-linecap="round"/>
                            <path d="M28.3333 17L42 33.5M42 33.5L28.3333 50M42 33.5H0.999999"  stroke-width="2" stroke-linecap="round"/>
                        </svg></button>
                </div>
            </form>
        </div>
    </section>
@endsection
