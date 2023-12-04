@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')

    <section class="order container">
        <div class="title-box d-flex  gap-1 align-items-end">
            <h6 class="title">Оформление заказа</h6>
        </div>
        <form action="{{ route('order.create') }}" method="post">
            @csrf
            <input type="hidden" name="order_type" value="individual">
            <div class="order-form d-flex flex-lg-row flex-column justify-content-between">
                <div class="order-left">
                    <div id="paymentMethod">
                        <div class="order-point active" id="paymentMethodPoint">
                            <span>1</span>
                            <p>Способ оплаты </p>
                        </div>
                        <div class="d-flex">
                            <div class="order-line" id="paymentMethodLine"></div>
                            <div class="order-inpts">
                                <div class="order-radio">
                                    <input class="order-payment_method" type="radio" value="online_pay"
                                           id="onlinePayment" name="payment_type">
                                    <label for="onlinePayment">
                                        <h6>Онлайн-оплата</h6>
                                        <p>Доступна оплата банковскими картами UzCard, Humo</p>
                                    </label>
                                </div>
                                <div class="order-radio">
                                    <input class="order-payment_method" type="radio" value="installmentPlan"
                                           id="installmentPlan" name="payment_type">
                                    <label for="installmentPlan">
                                        <h6>Рассрочка</h6>
                                        <div class="installment-plan_banks">
                                            <div class="installment-plan_bank">
                                                <input class="installment-bank" type="radio" value="credit_anorbank"
                                                       id="anorbank" name="payment_type">
                                                <label for="anorbank">
                                                    <img src="image/banks/image 85.png" alt="">
                                                </label>
                                            </div>
                                            <div class="installment-plan_bank">
                                                <input class="installment-bank" type="radio" value="credit_alifbank"
                                                       id="alifbank" name="payment_type">
                                                <label for="alifbank">
                                                    <img src="image/banks/image 85 (1).png" alt="">
                                                </label>
                                            </div>
                                            <div class="installment-plan_bank">
                                                <input class="installment-bank" type="radio" value="credit_intendbank"
                                                       id="intendbank" name="payment_type">
                                                <label for="intendbank">
                                                    <img src="image/banks/image 85 (2).png" alt="">
                                                </label>
                                            </div>
                                        </div>
                                    </label>
                                </div>
                                <div class="order-radio">
                                    <input class="order-payment_method" type="radio" value="after_delivery"
                                           id="uponКeceipt" name="payment_type">
                                    <label for="uponКeceipt">
                                        <h6>При получении заказа</h6>
                                        <p>Возможна оплата наличными и банковскими картами</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="deliveryMethod">
                        <div class="order-point" id="deliveryMethodPoint">
                            <span>2</span>
                            <p>Способ доставки</p>
                        </div>
                        <div class="d-flex">
                            <div class="order-line" id="deliveryMethodLine"></div>
                            <div class="order-inpts">
                                <div class="order-radio">
                                    <input class="order-delivery_inpt" type="radio" value="courier_delivery"
                                           id="courierDelivery" name="delivery_type">
                                    <label for="courierDelivery">
                                        <h6>Доставка курьером</h6>
                                        <span>30 000 сум</span>
                                        <p>При заказе с выше 500 000 сум — бесплатно. Доставка осуществляется в течение
                                            1–3 дней в зависимости от загруженности курьерской службы</p>
                                    </label>
                                </div>
                                <div class="order-radio">
                                    <input class="order-delivery_inpt" type="radio" value="express_delivery"
                                           id="expressDelivery" name="delivery_type">
                                    <label for="expressDelivery">
                                        <h6>Срочная доставка </h6>
                                        <span>50 000 сум</span>
                                        <p>Доставка осуществляется в течение 10 часов при условии полной оплаты
                                            заказа</p>
                                    </label>
                                </div>
                                <div class="order-radio">
                                    <input class="order-delivery_inpt" type="radio" value="oversized_delivery"
                                           id="oversizedDelivery" name="delivery_type">
                                    <label for="oversizedDelivery">
                                        <h6>Доставка крупногабаритного груза</h6>
                                        <p>Стоимость доставки обговаривается индивидуально после оформления и полной
                                            оплаты заказа</p>
                                    </label>
                                </div>
                                <div class="order-radio">
                                    <input class="order-delivery_inpt" type="radio" value="pickup" id="pickup"
                                           name="delivery_type">
                                    <label for="pickup">
                                        <h6>Самовывоз</h6>
                                        <p>Время работы пунктов самовывоза с 10.00 до 20.00 без выходных и перерыва</p>
                                        <i>Выберите пункт откуда будет забираться заказ</i>
                                        <div class="order-pickups">
                                            @foreach($pick_up_points as $item)
                                                <div class="order-pickup">
                                                    <label for="pickupTashkent" class="pickup-point">
                                                        <div class="d-flex gap-2">
                                                            <input class="order-pickup_inpt" type="radio" value="{{ $item->id }}" id="pickupTashkent" name="pick_up_point_id">
                                                            <h6>{{ $item->city }}</h6>
                                                        </div>
                                                        <p>{{ $item->address }}</p>
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="orderRecipient">
                        <div class="order-point" id="orderRecipientPoint">
                            <span>3</span>
                            <p>Получатель заказа</p>
                        </div>
                        <div class="d-flex">
                            <div class="order-line" id="orderRecipientLine"></div>
                            <div class="order-recipient">
                                <p class="order-sign-in"><a href="{{ route('login.page') }}">Авторизуйтесь</a>, если совершали
                                    покупки на Stab.uz</p>

                                <div class="order-recipient_inpts">
                                    <div class="order-recipient_inpt">
                                        <p>Имя *</p>
                                        <input type="text" id="orderRecipientName" value="{{ old('name', auth()->user()->name ?? '') }}" @if(!auth()->user()) name="guest[name]" @endif required>
                                    </div>
                                    <div class="order-recipient_inpt">
                                        <p>Фамилия *</p>
                                        <input type="text" id="orderRecipientSurname" value="{{ old('family_name', auth()->user()->email ?? '') }}" @if(!auth()->user()) name="guest[last_name]" @endif required>
                                    </div>
                                    <div class="order-recipient_inpt">
                                        <p>Номер телефона *</p>
                                        <input type="text" id="orderRecipientPhone" data-phone-pattern="" value="{{ old('phone') }}" @if(!auth()->user()) name="guest[phone]" @endif required>
                                    </div>
                                    <div class="order-recipient_inpt">
                                        <p>Мы пришлем уведомление о заказе на указанный вами телефон</p>
                                    </div>
                                    <div class="order-recipient_inpt">
                                        <p>Примечание</p>
                                        <textarea name="description" maxlength="600" oninput="autoExpand(this)"></textarea>
                                    </div>
                                </div>
                                <div class="order-radio mt-4">
                                    <input type="checkbox" value="subscribeNews" id="subscribeNews"
                                           name="subscribeNews">
                                    <label for="subscribeNews">
                                        <p>Подпишитесь на новости и акции нашей компании. Вы сможете одними из первых
                                            узнавать о новых товарах, скидках, акциях. Будьте всегда в курсе!</p>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="order-point" id="checkout">
                        <span>4</span>
                        <p>Оформите заказ</p>
                    </div>
                </div>
                <div class="order-right">
                    <div class="basket-order order-checkout">
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <h6>Ваш заказ</h6>
                            <a href="{{ route('basket') }}" class="d-flex align-items-center gap-2 in-basketbtn"><img
                                    src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt="">В корзину</a>
                        </div>
                        <div class="basket-order_p d-flex justify-content-between">
                            <p>Товары / {{ $products->sum('count') }}<i class="total-order_quantity"></i> шт</p>
                            <span><i class="total-order_price"></i> сум</span>
                        </div>
                        <div class="basket-order_p d-flex justify-content-between mb-lg-4 mb-2">
                            <p>Доставка</p>
                            <span>в течение 3 дней</span>
                        </div>
                        <div class="basket-all_price d-lg-flex d-none justify-content-between mb-4">
                            <h5>Всего: {{ $overall_price }}</h5>
                            <input type="hidden" value="{{ $overall_price }}" name="order_price">
                            <div>
                                <h6 class="text-end"><i class="total-order_price" id="checkoutTotalPrice"></i> сум</h6>
                            </div>
                        </div>
                        <div class="basket-order_fixed">
                            <button type="submit" class="order_button" data-bs-toggle="modal"
                                    data-bs-target="#orderCuccesful">Оформить заказ
                            </button>
                        </div>
                    </div>
                    <div class="basket-register">
                        <p>Оформляя заказ, вы соглашаетесь на обработку персональных данных в соответствии с <a
                                href="/">Соглашением о конфиденциальности и Пользовательским соглашением</a> Stab.uz</p>
                    </div>
                </div>
            </div>
            <div class="goods-in-order">
                <div class="goods-in-order-accordion active">
                    <div class="goods-in-order-accordion-header">
                        <h5>Товары в заказе</h5>
                        <div class="goods-in-order-accordion-arrow">
                            <svg width="41" height="32" viewBox="0 0 41 32" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                      d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                                <path
                                    d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="goods-in-order-accordion-content">
                        <div class="goods-in-order_products">
                            <!-- ШАБЛОН -->
{{--                            <input type="hidden" value="{{ $products }}" name="product">--}}
                            @foreach($products as $product)
                                <div class="goods-in-order_product">
                                    <div class="basket-product d-flex justify-content-between">
                                        <div class="basket-product_img"><img src="{{ asset($product['image'] ?? '') }}"
                                                                             alt=""></div>
                                        <div>
                                            <p class="basket-product_name">{{ $product['title'] ?? '' }}</p>
                                            <input type="hidden" value="{{ $product['id'] }}" name="products[]">
                                            <input value="{{ $product['count'] ?? '' }}" type="text" class="item_count" name="count[]">шт</input>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>

    @include('front.includes.recently-viewed-products')
@endsection
