@if($discount_products)
    <section class="goods-discount container">
        <div class="title-box d-flex flex-sm-row flex-column gap-sm-5 gap-1 align-items-sm-end align-items-start">
            <h6 class="title">Товары со скидкой</h6>
            <a href="/" class="title-link">Все скидки
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
            <a href="/" class="goods-advertising_banner" name="discountAdvertisingBanner">Реклама</a>
            <div class="goods-discount_slider owl-carousel">
                @foreach($discount_products as $product)
                    <div class="goods_item">
                        <div class="goods_header goods-img">
                            <div class="goods_header--menu d-flex align-items-center">
                                @if($product->new == 1)
                                    <span class="goods-itemNew" name="goodsItemNew">New</span>
                                @endif
                                <button type="button">
                                    <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5 6.42857C5 5.61167 5.64333 5 6.375 5C7.10667 5 7.75 5.61167 7.75 6.42857C7.75 7.24548 7.10667 7.85714 6.375 7.85714C5.64333 7.85714 5 7.24548 5 6.42857ZM6.375 1C3.37588 1 1 3.46129 1 6.42857C1 9.39585 3.37588 11.8571 6.375 11.8571C8.66277 11.8571 10.5884 10.4236 11.3725 8.42857L21 8.42857C22.1046 8.42857 23 7.53314 23 6.42857C23 5.324 22.1046 4.42857 21 4.42857L11.3725 4.42857C10.5884 2.43359 8.66277 1 6.375 1ZM16.25 17.5714C16.25 16.7545 16.8933 16.1429 17.625 16.1429C18.3567 16.1429 19 16.7545 19 17.5714C19 18.3883 18.3567 19 17.625 19C16.8933 19 16.25 18.3883 16.25 17.5714ZM17.625 12.1429C15.3372 12.1429 13.4116 13.5764 12.6275 15.5714L3 15.5714C1.89543 15.5714 1 16.4669 1 17.5714C1 18.676 1.89543 19.5714 3 19.5714L12.6275 19.5714C13.4116 21.5664 15.3372 23 17.625 23C20.6241 23 23 20.5387 23 17.5714C23 14.6042 20.6241 12.1429 17.625 12.1429Z"
                                            stroke="white" stroke-width="2"/>
                                    </svg>
                                </button>
                                <button type="button" class="icon-heart addToFavoritesBtn">
                                </button>
                            </div>
                            <img src="{{ asset('/assets/front/images/circle.svg') }}" alt="">
                            <img src="{{ asset($product->images->first()->image ?? '') }}" alt="">
                            <div class="goods_header--installment d-flex align-items-center">
                                @if($product->old_price)
                                    @php
                                        $old_price = $product->old_price;
                                        $price = $product->price;
                                    @endphp
                                    <span class="goods_proccent" name="actualGoodsProccent">-{{ number_format(($old_price - $price) / $price * 100)   }}%</span>
                                @endif
                                @if($product->credit == 1)
                                    <p>Рассрочка</p>
                                @endif
                            </div>
                        </div>
                        <div style="padding: 15px;">
                            {{--                                @foreach($product->prices as $price)--}}
                            <p class="goods_currentPrice" name="actualGoodsCurrentPrice">{{ $product->price ?? ''}}
                                usd</p>
                            {{--                                @endforeach--}}
                            @if ($product->old_price)
                                <p class="goods_oldPrice" name="actualGoodsOldPrice">{{ $product->old_price }} usd</p>
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
                                <a href="{{ route('brand.detail', $product->brand->slug ) }}" class="goods_companyName"
                                   name="actualGoodsCompanyName">{{ $product->brand->title  }}</a>
                            @endif
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
@endif
