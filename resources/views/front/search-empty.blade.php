@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <section class="container">
        <div class="empty-basket gap-3">
            <div class="col-sm-6 col-11 d-sm-block d-flex flex-column align-items-center">
                <h6>Мы не нашли то, что вы искали</h6>
                <p>Возможно, в названии товара допущена ошибка или у нас на данный момент нет такого товара.<br><br>
                    Вы можете вернуться к поиску или связаться с нами, отправив нам заявку или позвонив по телефону</p>
                <div class="d-flex flex-sm-row flex-column gap-3">
                    <a href="/">На главную</a>
                    <a href="#" data-bs-toggle="modal" data-bs-target="#exampleModal">Отправить заявку</a>
                </div>
            </div>
            <div class="col-sm-6 col-11">
                <img src="/image/shopping cart 2.png" alt="">
            </div>
        </div>
    </section>
    @include('front.includes.recommend-products')
    @include('front.includes.recently-viewed-products')
    @include('front.includes.mailing')
@endsection
