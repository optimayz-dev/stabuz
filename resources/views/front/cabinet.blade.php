@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <section class="cabinet container">
        <div class="cabinet-tabs d-lg-block d-none">
            <h5>Мои заказы</h5>
            <h6 class="cabinet-tab active" data-tab="cabinetTab1">Все заказы</h6>
            <h6 class="cabinet-tab" data-tab="cabinetTab2">Активные</h6>
            <h5 class="cabinet-tab" data-tab="cabinetTab3">Уведомления</h5>
            <h5 class="cabinet-tab" data-tab="cabinetTab4">Мои карты</h5>
            <h5 class="cabinet-tab" data-tab="cabinetTab5">Мои отзывы</h5>
            <h5 class="cabinet-tab" data-tab="cabinetTab6">Мой профиль</h5>
        </div>
        <div class="cabinet-tabs d-lg-none d-flex flex-column">
            <div class="cabinet-order_mobile">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="d-block">заказ № <span name="orderNumber" style="font-weight: 600;">000000</span></h5>
                    <div class="cabinet-main_statuses--delivery yellow w-100">
                        <img src="images/bank_card/alert-circle.svg" alt="">
                        <p>Заказ в пути</p>
                    </div>
                </div>
                <div class="cabinet-order_mobile--img d-flex align-items-center gap-2">
                    <a href="/"><img src="image/cards/Rectangle 605.png" alt=""></a>
                    <a href="/"><img src="image/cards/Rectangle 605.png" alt=""></a>
                </div>
            </div>
            <h5 class="cabinet-tab" data-bs-toggle="offcanvas" data-bs-target="#cabinetTab1" aria-controls="cabinetTab1">Все заказы <img src="image/icons/chevroneRight.svg" alt=""></h5>
            <h5 class="cabinet-tab" data-bs-toggle="offcanvas" data-bs-target="#cabinetTab2" aria-controls="cabinetTab2">Активные заказы <img src="image/icons/chevroneRight.svg" alt=""></h5>
            <h5 class="cabinet-tab" data-bs-toggle="offcanvas" data-bs-target="#cabinetTab3" aria-controls="cabinetTab3">Уведомления <img src="image/icons/chevroneRight.svg" alt=""></h5>
            <h5 class="cabinet-tab" data-bs-toggle="offcanvas" data-bs-target="#cabinetTab4" aria-controls="cabinetTab4">Мои карты <img src="image/icons/chevroneRight.svg" alt=""></h5>
            <h5 class="cabinet-tab" data-bs-toggle="offcanvas" data-bs-target="#cabinetTab5" aria-controls="cabinetTab5">Мои отзывы <img src="image/icons/chevroneRight.svg" alt=""></h5>
            <h5 class="cabinet-tab" data-bs-toggle="offcanvas" data-bs-target="#cabinetTab6" aria-controls="cabinetTab6">Мой профиль <img src="image/icons/chevroneRight.svg" alt=""></h5>
            <button type="button" class="exitUser" name="exitUser">Выйти из профиля</button>
        </div>
        <div class="cabinet-main w-100">
            <div class="cabinet-main_tab cmt" id="cabinetTab1" tabindex="-1" aria-labelledby="offcanvasExampleLabel">
                <div class="cabinet-main_back--btn">
                    <button type="button" data-bs-dismiss="offcanvas"><img src="image/icons/greenArrLeft.png" alt=""></button>
                    <h3>Мои заказы</h3>
                </div>
                <div class="cabinet-main-accordion">
                    <div class="cabinet-main-accordion-header">
                        <div>
                            <h5>заказ № <span name="orderNumber">000000</span></h5>
                            <div class="cabinet-main-accordion-arrow">
                                <p>Детали заказа</p>
                                <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                                    <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="cabinet-main_statuses d-flex gap-3">
                            <div class="d-flex">
                                <div class="cabinet-main_statuses--paid">
                                    <img src="{{ asset('assets/front/images/bank_card/check-circle.svg') }}" alt="">
                                    <p>Оплачен</p>
                                </div>
                                <div class="cabinet-main_statuses--paid notpaid d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/alert-circle_red.svg') }}" alt="">
                                    <p>Не оплачен</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="cabinet-main_statuses--delivery yellow d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/check-circle-yelloc.svg') }}" alt="">
                                    <p>Заказ оформлен</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery yellow d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/alert-circle.svg') }}" alt="">
                                    <p>Заказ собирается</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery yellow">
                                    <img src="{{ asset('assets/front/images/bank_card/alert-circle.svg') }}" alt="">
                                    <p>Заказ в пути</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/check-circle.svg') }}" alt="">
                                    <p>Заказ доставлен</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/check-circle.svg') }}" alt="">
                                    <p>Заказ получен</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cabinet-main-accordion-content">
                        <div class="cabinet-main-accordion-table">
                            <table>
                                <tbody>
                                <tr>
                                    <td>Статус заказа</td>
                                    <td name="orderStatus">Обновлен 24 июля 2023 в 12.30</td>
                                </tr>
                                <tr>
                                    <td>Дата и время заказа</td>
                                    <td name="dateOrder">Суббота, 24 июля 2023 в 12.30</td>
                                </tr>
                                <tr>
                                    <td>Способ доставки</td>
                                    <td name="methodDelivery">Самовывоз</td>
                                </tr>
                                <tr>
                                    <td>Пункт выдачи</td>
                                    <td name="pointIssue">г. Ташкент, Алмазарский район, ул. Уста Ширин, 134, магазин № 12</td>
                                </tr>
                                <tr>
                                    <td>Время работы пункта</td>
                                    <td name="timePoint">Понедельник — пятница, 10.00 — 19.00</td>
                                </tr>
                                <tr>
                                    <td>Сумма заказа</td>
                                    <td name="priceOrder">5 000 000 сум</td>
                                </tr>
                                <tr>
                                    <td>Товаров в заказе</td>
                                    <td name="goodsInOrder">1 шт</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cabinet-main_goods-in-order-accordion">
                            <div class="cabinet-main_goods-in-order-accordion-header d-flex gap-2">
                                <h6>Список товаров</h6>
                                <div class="cabinet-main-accordion-arrow">
                                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                                        <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="cabinet-main_goods-in-order-accordion-content">
                                <div class="cabinet-main_goods-in-order-products ">
                                    <!-- ШАБЛОН -->
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cabinet-main-accordion">
                    <div class="cabinet-main-accordion-header">
                        <div>
                            <h5>заказ № <span name="orderNumber">000000</span></h5>
                            <div class="cabinet-main-accordion-arrow">
                                <p>Детали заказа</p>
                                <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                                    <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="cabinet-main_statuses d-flex gap-3">
                            <div class="d-flex">
                                <div class="cabinet-main_statuses--paid d-none">
                                    <img src="images/bank_card/check-circle.svg" alt="">
                                    <p>Оплачен</p>
                                </div>
                                <div class="cabinet-main_statuses--paid notpaid">
                                    <img src="images/bank_card/alert-circle_red.svg" alt="">
                                    <p>Не оплачен</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="cabinet-main_statuses--delivery yellow d-none">
                                    <img src="images/bank_card/check-circle-yelloc.svg" alt="">
                                    <p>Заказ оформлен</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery yellow d-none">
                                    <img src="images/bank_card/alert-circle.svg" alt="">
                                    <p>Заказ собирается</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery yellow d-none">
                                    <img src="images/bank_card/alert-circle.svg" alt="">
                                    <p>Заказ в пути</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery">
                                    <img src="images/bank_card/check-circle.svg" alt="">
                                    <p>Заказ доставлен</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery d-none">
                                    <img src="images/bank_card/check-circle.svg" alt="">
                                    <p>Заказ получен</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cabinet-main-accordion-content">
                        <div class="cabinet-main-accordion-table">
                            <table>
                                <tbody>
                                <tr>
                                    <td>Статус заказа</td>
                                    <td name="orderStatus">Обновлен 24 июля 2023 в 12.30</td>
                                </tr>
                                <tr>
                                    <td>Дата и время заказа</td>
                                    <td name="dateOrder">Суббота, 24 июля 2023 в 12.30</td>
                                </tr>
                                <tr>
                                    <td>Способ доставки</td>
                                    <td name="methodDelivery">Самовывоз</td>
                                </tr>
                                <tr>
                                    <td>Пункт выдачи</td>
                                    <td name="pointIssue">г. Ташкент, Алмазарский район, ул. Уста Ширин, 134, магазин № 12</td>
                                </tr>
                                <tr>
                                    <td>Время работы пункта</td>
                                    <td name="timePoint">Понедельник — пятница, 10.00 — 19.00</td>
                                </tr>
                                <tr>
                                    <td>Сумма заказа</td>
                                    <td name="priceOrder">5 000 000 сум</td>
                                </tr>
                                <tr>
                                    <td>Товаров в заказе</td>
                                    <td name="goodsInOrder">1 шт</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cabinet-main_goods-in-order-accordion">
                            <div class="cabinet-main_goods-in-order-accordion-header d-flex gap-2">
                                <h6>Список товаров</h6>
                                <div class="cabinet-main-accordion-arrow">
                                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                                        <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="cabinet-main_goods-in-order-accordion-content">
                                <div class="cabinet-main_goods-in-order-products ">
                                    <!-- ШАБЛОН -->
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="cabinet-main-accordion">
                    <div class="cabinet-main-accordion-header">
                        <div>
                            <h5>заказ № <span name="orderNumber">000000</span></h5>
                            <div class="cabinet-main-accordion-arrow">
                                <p>Детали заказа</p>
                                <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                                    <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                                </svg>
                            </div>
                        </div>
                        <div class="cabinet-main_statuses d-flex gap-3">
                            <div class="d-flex">
                                <div class="cabinet-main_statuses--paid">
                                    <img src="{{ asset('assets/front/images/bank_card/check-circle.svg') }}" alt="">
                                    <p>Оплачен</p>
                                </div>
                                <div class="cabinet-main_statuses--paid notpaid d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/alert-circle_red.svg') }}" alt="">
                                    <p>Не оплачен</p>
                                </div>
                            </div>
                            <div class="d-flex">
                                <div class="cabinet-main_statuses--delivery yellow d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/check-circle-yelloc.svg') }}" alt="">
                                    <p>Заказ оформлен</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery yellow">
                                    <img src="{{ asset('assets/front/images/bank_card/alert-circle.svg') }}" alt="">
                                    <p>Заказ собирается</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery yellow d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/alert-circle.svg') }}" alt="">
                                    <p>Заказ в пути</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/check-circle.svg') }}" alt="">
                                    <p>Заказ доставлен</p>
                                </div>
                                <div class="cabinet-main_statuses--delivery d-none">
                                    <img src="{{ asset('assets/front/images/bank_card/check-circle.svg') }}" alt="">
                                    <p>Заказ получен</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="cabinet-main-accordion-content">
                        <div class="cabinet-main-accordion-table">
                            <table>
                                <tbody>
                                <tr>
                                    <td>Статус заказа</td>
                                    <td name="orderStatus">Обновлен 24 июля 2023 в 12.30</td>
                                </tr>
                                <tr>
                                    <td>Дата и время заказа</td>
                                    <td name="dateOrder">Суббота, 24 июля 2023 в 12.30</td>
                                </tr>
                                <tr>
                                    <td>Способ доставки</td>
                                    <td name="methodDelivery">Самовывоз</td>
                                </tr>
                                <tr>
                                    <td>Пункт выдачи</td>
                                    <td name="pointIssue">г. Ташкент, Алмазарский район, ул. Уста Ширин, 134, магазин № 12</td>
                                </tr>
                                <tr>
                                    <td>Время работы пункта</td>
                                    <td name="timePoint">Понедельник — пятница, 10.00 — 19.00</td>
                                </tr>
                                <tr>
                                    <td>Сумма заказа</td>
                                    <td name="priceOrder">5 000 000 сум</td>
                                </tr>
                                <tr>
                                    <td>Товаров в заказе</td>
                                    <td name="goodsInOrder">1 шт</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cabinet-main_goods-in-order-accordion">
                            <div class="cabinet-main_goods-in-order-accordion-header d-flex gap-2">
                                <h6>Список товаров</h6>
                                <div class="cabinet-main-accordion-arrow">
                                    <svg width="41" height="32" viewBox="0 0 41 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M21.9922 2.26949C24.7543 1.7283 27.6171 2.00617 30.2181 3.06742C32.819 4.12862 35.0399 5.92485 36.6015 8.22698C38.163 10.529 38.9956 13.234 38.9956 16C38.9956 18.766 38.163 21.471 36.6015 23.773C35.0399 26.0751 32.819 27.8714 30.2181 28.9326C27.6171 29.9938 24.7543 30.2717 21.9922 29.7305C19.2302 29.1893 16.6949 27.8539 14.7062 25.8949C14.3123 25.5069 13.6778 25.511 13.289 25.9041C12.9001 26.2971 12.9042 26.9303 13.2981 27.3182C15.5688 29.5549 18.4602 31.0766 21.606 31.693C24.7518 32.3094 28.0126 31.9932 30.9767 30.7838C33.9409 29.5744 36.4765 27.5254 38.2614 24.8941C40.0464 22.2626 41 19.1674 41 16C41 12.8326 40.0464 9.73742 38.2614 7.10592C36.4765 4.47458 33.9409 2.42563 30.9767 1.21621C28.0126 0.00682724 24.7518 -0.309406 21.606 0.306966C18.4602 0.92335 15.5688 2.4451 13.2981 4.68175C12.9042 5.06974 12.9001 5.7029 13.289 6.09593C13.6778 6.48897 14.3123 6.49305 14.7062 6.10505C16.6949 4.14613 19.2302 2.81066 21.9922 2.26949Z"/>
                                        <path d="M23.2 8.60007C22.8686 8.15824 22.9582 7.53144 23.4 7.20007C23.8418 6.8687 24.4686 6.95824 24.8 7.40007L30.8 15.4001C31.0667 15.7556 31.0667 16.2445 30.8 16.6001L24.8 24.6001C24.4686 25.0419 23.8418 25.1314 23.4 24.8001C22.9582 24.4687 22.8686 23.8419 23.2 23.4001L28 17H0.988025C0.442355 17 0 16.5523 0 16C0 15.4477 0.442355 15 0.988025 15H28L23.2 8.60007Z"/>
                                    </svg>
                                </div>
                            </div>
                            <div class="cabinet-main_goods-in-order-accordion-content">
                                <div class="cabinet-main_goods-in-order-products ">
                                    <!-- ШАБЛОН -->
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="goods-in-order_product w-48">
                                        <div class="basket-product d-flex justify-content-between align-items-center">
                                            <div class="basket-product_img"><img src="image/product/Rectangle 1161.png" alt=""></div>
                                            <div class="cabinet-main_goods-in-order-info">
                                                <p name="cabinetMainGoodsInOrderInfo">Бензогенератор инверторный TSS SGG 4000</p>
                                                <div class="d-flex flex-wrap justify-content-between align-items-center">
                                                    <div><input value="1" type="text" class="item_count" disabled>шт</div>
                                                    <p>5 630 040 сум</p>
                                                    <a href="productCard.html">Написать отзыв</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cabinet-main_tab cmt" id="cabinetTab2" tabindex="-1" aria-labelledby="offcanvasExampleLabel">
                <div class="cabinet-main_back--btn">
                    <button type="button" data-bs-dismiss="offcanvas"><img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt=""></button>
                    <h3>Мои заказы</h3>
                </div>
                <div class="d-flex justify-content-center">
                    <div class="cabinet-main_active--orders">
                        <h4>У вас нет активных заказов</h4>
                        <p>Оформите заказ в корзине или воспользуйтесь поиском, чтобы найти всё что нужно</p>
                        <div class="cabinet-main_active--orders--btns">
                            <a href="basket.html">Перейти в корзину</a>
                            <a href="/">Начать покупки</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cabinet-main_tab cmt" id="cabinetTab3" tabindex="-1" aria-labelledby="offcanvasExampleLabel">
                <div class="cabinet-main_back--btn">
                    <button type="button" data-bs-dismiss="offcanvas"><img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt=""></button>
                    <h3>Мои уведомления</h3>
                </div>
                <div class="cabinet-main_notifications d-flex flex-column gap-5 w-100">
                    <div class="cabinet-main_notification">
                        <span>2 июня 2023</span>
                        <h5>Ваш заказ доставлен на пункт выдачи</h5>
                        <p>Высокая производительность при снижении вибрации на 20%. Снижение вибрации по сравнению с другими перфораторами этого класса повышает удобство работы благодаря системе Bosch Vibration Control.</p>
                    </div>
                    <div class="cabinet-main_notification">
                        <span>2 июня 2023</span>
                        <h5>Ваш заказ оформлен</h5>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio, nesciunt!</p>
                    </div>
                    <div class="cabinet-main_notification">
                        <span>2 июня 2023</span>
                        <h5>Ваш заказ доставлен на пункт выдачи</h5>
                        <p>Высокая производительность при снижении вибрации на 20%. Снижение вибрации по сравнению с другими перфораторами этого класса повышает удобство работы благодаря системе Bosch Vibration Control.</p>
                    </div>
                </div>
                <button type="button" class="cabinet-main_notifications--clear">Очистить</button>
            </div>
            <div class="cabinet-main_tab cmt" id="cabinetTab4" tabindex="-1" aria-labelledby="offcanvasExampleLabel">
                <style>
                    .modal-backdrop{
                        display: none;
                    }
                </style>
                <div class="cabinet-main_back--btn">
                    <button type="button" data-bs-dismiss="offcanvas"><img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt=""></button>
                    <h3>Мои карты</h3>
                </div>
                <div class="cabinet-main_cards d-flex flex-wrap justify-content-start gap-3">
                    <div class="cabinet-main_card main">
                        <button type="button"><img src="{{ asset('assets/front/images/bank_card/check-circle.svg') }}" alt=""> Основная карта</button>
                        <div class="cabinet-main_card--info">
                            <p class="cabinet-main_card--number">8600000000000000</p>
                            <p class="cabinet-main_card--cvv">01/30</p>
                            <img src="{{ asset('assets/front/images/bank_card/Rectangle 1270.png') }}" alt="">
                        </div>
                    </div>
                    <div class="cabinet-main_card">
                        <button type="button"><img src="{{ asset('images/bank_card/alert-circle.svg') }}" alt=""> Сделать основной</button>
                        <div class="cabinet-main_card--info">
                            <p class="cabinet-main_card--number">8600000000000000</p>
                            <p class="cabinet-main_card--cvv">01/30</p>
                            <img src="{{ asset('assets/front/images/bank_card/Rectangle 1270 (1).png') }}" alt="">
                        </div>
                    </div>
                    <button type="button" class="cabinet-main_card--add" data-bs-toggle="modal" data-bs-target="#addCard">
                        <img src="{{ asset('assets/front/images/bank_card/credit-card.svg') }}" alt="">
                        <p>Добавить карту</p>
                    </button>
                </div>
                <div class="modal fade" id="addCard" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content addCard-modal">
                            <div class="addCard-header d-flex justify-content-between">
                                <h3>Добавить карту</h3>
                                <button type="button" data-bs-dismiss="modal"><img src="{{ asset('assets/front/images/icons/close-btn.png') }}" alt=""></button>
                            </div>
                            <form action="URL" class="addCardForm">
                                <div class="addCardForm-payments">
                                    <img src="{{ asset('assets/front/images/bank_card/Rectangle 1270.png') }}" alt="">
                                    <img src="{{ asset('assets/front/images/bank_card/Rectangle 1270 (1).png') }}" alt="">
                                </div>
                                <div class="cabinet-main_inpts">
                                    <div class="cabinet-main_inpt w-100">
                                        <p>Номер карты</p>
                                        <input type="text" required name="cabinetCardNumber" data-phone-pattern="____ ____ ____ ____">
                                    </div>
                                    <div class="cabinet-main_inpt w-48">
                                        <p>Срок действия</p>
                                        <input type="text" name="cabinetCardDate" placeholder="мм/гг" data-phone-pattern="__/__">
                                    </div>
                                    <div class="cabinet-main_inpt w-48">
                                        <p>CVV/CVC</p>
                                        <input type="text" required name="cabinetCardCvv" data-phone-pattern="___">
                                    </div>
                                </div>
                                <button type="submit" class="addCardBtn">Добавить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="cabinet-main_tab cmt" id="cabinetTab5" tabindex="-1" aria-labelledby="offcanvasExampleLabel">
                <div class="cabinet-main_back--btn">
                    <button type="button" data-bs-dismiss="offcanvas"><img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt=""></button>
                    <h3>Мои отзывы</h3>
                </div>
                @foreach($user->reviews as $review)
                <div class="cabinet-main_reviews d-flex flex-column gap-5">
                    <div class="product-review">
                        <div class="d-flex gap-3 align-items-center">
                            <img src="{{ asset($review->product->images->first()->image ?? '') }}" alt="" class="cabinet-main_reviews--img" name="cabinetMainReviewsImg">
                            <div>
                                <h6 class="product-review_name" name="productReviewName">{{ $review->product->title ?? '' }}</h6>
                                <div class="mt-1 mb-2 d-flex align-items-center gap-3">
                                    <div class="goods_rewies d-flex align-items-center gap-1">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $review->grade)
                                                <span class="icon-star active"></span>
                                            @else
                                                <span class="icon-star"></span>
                                            @endif
                                        @endfor
                                    </div>
                                    <p class="product-review_date" name="productReviewDate">{{ $review->created_at }}</p>
                                </div>
                            </div>
                        </div>
                        <p class="product-review_text mb-3" name="productReviewText">{{ $review->description ?? '' }}</p>
                        <div class="product-review_imgs d-flex gap-sm-3 gap-2" name="productReviewImgs">
                            @foreach($review->images as $image)
                                <img src="{{ asset($image->image ?? '') }}" alt="" class="product-review_img" style="width: 75px; height: 75px">
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach

            </div>
            <div class="cabinet-main_tab cmt" id="cabinetTab6" tabindex="-1" aria-labelledby="offcanvasExampleLabel">
                <div class="cabinet-main_back--btn">
                    <button type="button" data-bs-dismiss="offcanvas"><img src="{{ asset('assets/front/images/icons/greenArrLeft.png') }}" alt=""></button>
                    <h3>Мой профиль</h3>
                </div>
                <form action="url" class="cabinet-main_profile--form">
                    <div class="cabinet-main_inpts">
                        <div class="cabinet-main_inpt">
                            <p>Имя и фамилия *</p>
                            <input type="text" required name="name" value="{{ $user->name }}">
                        </div>
                        <div class="cabinet-main_inpt">
                            <p>Отчество</p>
                            <input type="text" name="cabinetProfileSurname">
                        </div>
                        <div class="cabinet-main_inpt">
                            <p>Телефон *</p>
                            <input type="text" required data-phone-pattern="" name="phone">
                        </div>
                        <div class="cabinet-main_inpt">
                            <p>E-mail *</p>
                            <input type="email" required name="login" value="{{ $user->login }}">
                        </div>
                        <div class="cabinet-main_inpt">
                            <p>Пол</p>
                            <input type="text" name="cabinetProfileGender">
                        </div>
                        <div class="cabinet-main_inpt">
                            <p>Дата рождения</p>
                            <input type="date" name="cabinetProfileDate">
                        </div>
                    </div>
                    <div class="cabinet-main_submit">
                        <p>* Все поля, отмеченные звездочкой, обязательны для заполнения</p>
                        <button type="submit" name="cabinetProfileBtn" id="cabinetProfileBtn">Отправить</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
