@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    @if(!empty($products))
    <section class="basket container">
        <div class="title-box d-flex  gap-1 align-items-end">
            <h6 class="title">Корзина</h6>
            <p class="total_quantity"></p>
            <p>товара</p>
        </div>
        <!-- ACTION МЕНЯЕТСЯ В ЗАВИСИМОСТИ ОТ ТОГО ЭТО ЮР.ЛИЦО ИЛИ ФИЗ.ЛИЦО, МЕНЯЕТСЯ ЭТО В JS НА 1154 СТРОКЕ -->
        <form action="{{ route('order.checkout') }}" class="basket-form d-flex justify-content-between gap-4" method="post">
            @csrf
            <div class="w-100">
                <div class="mb-5 d-flex justify-content-between flex-sm-row flex-column gap-sm-0 gap-3">
                    <div class="basket-products_selectAll d-flex align-items-center gap-2">
                        <input type="checkbox" id="selectAll" class="basket-product_checkbox">
                        <label for="selectAll">Выбрать все</label>
                    </div>
                    <p class="basket-product_deliveryP">Доставка осуществляется в течение 3 дней</p>
                </div>
                <div id="basket-products1">
                    <!-- СНИЗУ ШАБЛОН, НЕ УДАЛЯЙ -->
                    @foreach($products as $product)
                        <div class="basket-product d-flex justify-content-between">
                            <input type="checkbox" class="basket-product_checkbox d-flex justify-content-between" name="product_id[]" value="{{ $product['id'] }}">
                            <div class="d-flex">
                                <div class="basket-product_img"><img src="{{ asset($product['image'] ?? '') }}" alt="">
                                </div>
                                <p class="basket-product_name">{{ $product['title'] ?? '' }}</p>
                            </div>
                            <div class="basket-product_functs d-flex justify-content-between align-items-start gap-4">
                                <div class="basket-product_btns">
                                    <a href="{{ route('cart.product-minus', $product['id']) }}" class="minus-product basket-product_minus">
                                        <button class="basket-product_minus" type="button">
                                            <svg width="30" height="30" viewBox="0 0 20 21" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.2175 17.2175C15.8889 18.5461 14.1962 19.4509 12.3534 19.8175C10.5105 20.184 8.60041 19.9959 6.86451 19.2769C5.12861 18.5578 3.64491 17.3402 2.60104 15.7779C1.55717 14.2157 1 12.3789 1 10.5C1 8.62108 1.55716 6.78435 2.60104 5.22208C3.64491 3.65982 5.12861 2.44218 6.86451 1.72314C8.6004 1.00411 10.5105 0.81598 12.3534 1.18254C14.1962 1.5491 15.8889 2.45389 17.2175 3.78248"
                                                    stroke="#999999" stroke-linecap="round"/>
                                                <path d="M6 11V10H15V11H6Z" fill="#999999"/>
                                            </svg>
                                        </button>
                                    </a>
                                    <input value="{{ $product['count'] ?? ''}}" type="text" class="item_count" disabled>
                                    <a href="{{ route('cart.product-plus', $product['id']) }}" class="plus-product basket-product_plus">
                                        <button class="basket-product_plus" type="button">
                                            <svg width="30" height="30" viewBox="0 0 20 21" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2.78249 17.2175C4.11108 18.5461 5.80382 19.4509 7.64664 19.8175C9.48946 20.184 11.3996 19.9959 13.1355 19.2769C14.8714 18.5578 16.3551 17.3402 17.399 15.7779C18.4428 14.2157 19 12.3789 19 10.5C19 8.62108 18.4428 6.78435 17.399 5.22208C16.3551 3.65982 14.8714 2.44218 13.1355 1.72314C11.3996 1.00411 9.48946 0.81598 7.64664 1.18254C5.80382 1.5491 4.11109 2.45389 2.78249 3.78248"
                                                    stroke="#999999" stroke-linecap="round"/>
                                                <path d="M5 11V10H14V11H5Z" fill="#999999"/>
                                                <path d="M10 15H9L9 6L10 6L10 15Z" fill="#999999"/>
                                            </svg>
                                        </button>
                                    </a>
                                </div>
                                <div>
                                    <h6 class="basket-product_currentPrice">{{ $product['price'] ?? ''}}</h6>
                                    @if(!empty($product['old_price']))
                                        <p class="goods_oldPrice basket-product_oldPrice"
                                           name="actualGoodsOldPrice">{{ $product['old_price'] }}</p>
                                    @endif
                                    <div class="basket-product_folltrash d-flex justify-content-end gap-3">
                                        <button type="button" class="icon-heart">
                                        </button>
                                        <a href="{{ route('cart.product-delete', $product['id']) }}" class="delete-product remove_from_basket">
                                            <button type="button" class="remove_from_basket">
                                                <svg width="22" height="25" viewBox="0 0 22 25" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                          d="M8.40802 3.70312C8.78572 2.62457 9.80418 1.8519 11.0013 1.8519C12.1984 1.8519 13.2169 2.62457 13.5946 3.70312H8.40802ZM6.50979 3.70312C6.93471 1.59022 8.78416 0 11.0013 0C13.2184 0 15.0679 1.59022 15.4928 3.70312H19.25C20.7688 3.70312 22 4.94681 22 6.48097C22 8.01514 20.7688 9.25882 19.25 9.25882H2.75C1.23122 9.25882 0 8.01514 0 6.48097C0 4.94681 1.23122 3.70312 2.75 3.70312H6.50979ZM2.75 5.55502C2.24374 5.55502 1.83333 5.96959 1.83333 6.48097C1.83333 6.99236 2.24374 7.40692 2.75 7.40692H19.25C19.7563 7.40692 20.1667 6.99236 20.1667 6.48097C20.1667 5.96958 19.7563 5.55502 19.25 5.55502H2.75ZM3.66667 10.1855C4.17293 10.1855 4.58333 10.6001 4.58333 11.1115V22.2229C4.58333 22.7343 4.99374 23.1488 5.5 23.1488H16.5C17.0063 23.1488 17.4167 22.7343 17.4167 22.2229V11.1115C17.4167 10.6001 17.8271 10.1855 18.3333 10.1855C18.8396 10.1855 19.25 10.6001 19.25 11.1115V22.2229C19.25 23.757 18.0188 25.0007 16.5 25.0007H5.5C3.98122 25.0007 2.75 23.757 2.75 22.2229V11.1115C2.75 10.6001 3.16041 10.1855 3.66667 10.1855ZM9.85547 13.6582C10.2352 13.6582 10.543 13.9126 10.543 14.2264V21.4235C10.543 21.7374 10.2352 21.9917 9.85547 21.9917C9.47577 21.9917 9.16797 21.7374 9.16797 21.4235V14.2264C9.16797 13.9126 9.47577 13.6582 9.85547 13.6582ZM15.125 12.5011C15.125 12.1176 14.8172 11.8066 14.4375 11.8066C14.0578 11.8066 13.75 12.1176 13.75 12.5011V21.2976C13.75 21.6812 14.0578 21.9921 14.4375 21.9921C14.8172 21.9921 15.125 21.6812 15.125 21.2976V12.5011Z"/>
                                                </svg>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div>
                <div class="basket-order">
                    <h6>Ваш заказ</h6>
                    <div class="basket-order_delivery--text mb-4" id="basketOrderDeliveryTextFalse">
                        <img src="{{ asset('assets/front/images/icons/Ellipse 347.png') }}" alt="">
                        <p>Бесплатная доставка при заказе свыше <i id="deliverySumm">500 000</i> сум после полной оплаты
                            товара<br>Осталось <i id="leftDelivery"></i> сум</p>
                    </div>
                    <div class="basket-order_delivery--text mb-4" id="basketOrderDeliveryTextTrue">
                        <img src="{{ asset('assets/front/images/icons/cheked.png') }}" alt="">
                        <p>Вам доступна бесплатная доставка</p>
                    </div>
                    <div class="basket-order_p d-flex justify-content-between">
                        <p>Товары / <i class="total_quantity"></i> шт</p>
                        <span><i class="total_price"></i> сум</span>
                    </div>
                    <div class="basket-order_p d-flex justify-content-between mb-lg-4 mb-2">
                        <p>Доставка</p>
                        <span>в течение 3 дней</span>
                    </div>
                    <div class="basket-all_price d-lg-none d-flex justify-content-between">
                        <span>Экономия</span>
                        <p><i class="total_savings"></i> сум</p>
                    </div>
                    <div class="basket-all_price d-lg-flex d-none justify-content-between mb-4">
                        <h5>Итого:</h5>
                        <div>
                            <h6 class="text-end"><i class="total_price"></i> сум</h6>
                            <p><span>Экономия</span><i class="total_savings"></i> сум</p>
                        </div>
                    </div>
                    <div class="basket-order_fixed">
                        <div class="basket-order_fixed--price d-lg-none d-md-block d-none">
                            <div class="d-flex gap-2">
                                <p class="total_quantity"></p>
                                <p>товара</p>
                            </div>
                            <h6 class=""><i class="total_price"></i> сум</h6>
                        </div>
                        <div class="basket-order_select--legalFace d-flex align-items-center gap-2">
                            <input type="checkbox" id="legalFace" class="basket-order_legalFace--checkbox">
                            <label for="legalFace">Оформить заказ как юридическое лицо</label>
                        </div>
                        <button type="submit" class="basket-order_button">Перейти к оформлению</button>
                    </div>
                </div>
                @if(empty(auth()->user()))
                    <div class="basket-register">
                        <p><a href="{{ route('login.page') }}">Авторизуйтесь</a>,
                            если совершали покупки на Stab.uz</p>
                        <p><a href="{{ route('register.page') }}">Зарегистрируйтесь</a>,
                            если совершаете покупку на Stab.uz в первый раз</p>
                        <p>Вы также можете продолжить оформление заказа без регистрации</p>
                        <p>Перед покупкой уточните у оператора о наличии товара +998 71 207 88 85 </p>
                    </div>
                @endif
            </div>
        </form>
        <a href="/" class="d-flex gap-2 mt-lg-5 mt-3 basket-back_btn">
            <img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt="">
            Продолжить покупки
        </a>
    </section>

    <!-- empty basket -->
    @else
    <section class="empty-basket_cont container">
        <div class="title-box d-flex  gap-1 align-items-end">
            <h6 class="title">Корзина</h6>
        </div>
        <div class="empty-basket">
            <div class="col-sm-6 col-11 d-sm-block d-flex flex-column align-items-center">
                <h6>в корзине ПУСТО? Не расстраивайтесь! </h6>
                <p>Начните подбор товаров на главной странице или используйте поиск</p>
                <a href="/">На главную</a>
            </div>
            <div class="col-sm-6 col-11">
                <img src="{{ asset('assets/front/images/shopping cart 2 1.png') }}" alt="">
            </div>
        </div>
    </section>
    @endif
@include('front.includes.recently-viewed-products')
@endsection
