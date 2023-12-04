@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <section class="container">
        <div class="empty-basket gap-3">
            <div class="col-sm-6 col-11 d-sm-block d-flex flex-column align-items-center">
                <h6>Ой, что-то пошло не так...</h6>
                <p>Загадочная страница 404 — место, где товары исчезают. Возвращайтесь на главную страницу!)</p>
                <div class="d-flex gap-3">
                    <a href="/">На главную</a>
                    <a href="/">Вернуться</a>
                </div>
            </div>
            <div class="col-sm-6 col-11">
                <img src="/image/404 - 2 1.png" alt="">
            </div>
        </div>
    </section>
    @include('front.includes.mailing')
@endsection
