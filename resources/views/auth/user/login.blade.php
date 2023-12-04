@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <section class="container d-flex justify-content-center">
        <form action="{{ route('login.user') }}" method="post" class="login">
            @csrf
            <h6>Авторизация</h6>
            <div class="login_inpts">
                <p>E-mail / Телефон *</p>
                <input type="text" required name="login">
            </div>
            <div class="login_inpts">
                <p>Пароль *</p>
                <input type="password" class="password-input mb-2" required id="password-input" name="password">
                <img src="image/icons/eye-close.png" alt="" class="password-eye">
            </div>
            <a href="/">Забыли пароль?</a>
            <button type="submit" class="disabled mt-3">Войти<svg width="44" height="44" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M10.519 56.481C15.0642 61.0262 20.8552 64.1215 27.1596 65.3755C33.4639 66.6295 39.9986 65.9859 45.9372 63.5261C51.8758 61.0662 56.9516 56.9006 60.5228 51.556C64.0939 46.2114 66 39.9279 66 33.5C66 27.0721 64.0939 20.7886 60.5228 15.444C56.9516 10.0994 51.8758 5.93377 45.9372 3.47392C39.9986 1.01407 33.464 0.370459 27.1596 1.62448C20.8552 2.8785 15.0642 5.97382 10.519 10.519"  stroke-width="2" stroke-linecap="round"/>
                    <path d="M28.3333 17L42 33.5M42 33.5L28.3333 50M42 33.5H0.999999"  stroke-width="2" stroke-linecap="round"/>
                </svg></button>
            <div class="d-flex justify-content-center gap-2">
                <p>Нет аккаунта?</p>
                <a href="{{ route('register.page') }}">Зарегистрироваться</a>
            </div>
        </form>
    </section>
@endsection
