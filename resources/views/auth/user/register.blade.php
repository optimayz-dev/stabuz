@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <section class="container d-flex justify-content-center">
        <form action="{{ route('register.user') }}" class="sign-up login" method="POST">
            @csrf
            <h6>Регистрация</h6>
            <div class="sign-up_inpts d-flex flex-wrap justify-content-between">
                <div class="login_inpts">
                    <p>Имя и фамилия *</p>
                    <input type="text" required name="name">
                </div>
                <div class="login_inpts">
                    <p>E-mail / Телефон *</p>
                    <input type="text" required name="login">
                </div>
                <div class="login_inpts">
                    <p>Пароль *</p>
                    <input type="password" class="password-input mb-2" required id="password-input" name="password">
                    <img src="image/icons/eye-close.png" alt="" class="password-eye">
                </div>
                <div class="login_inpts">
                    <p>Подтвердите пароль *</p>
                    <input type="password" class="password-input mb-2" required id="confirm-password" name="password_confirmation">
                    <img src="image/icons/eye-close.png" alt="" class="password-eye">
                </div>
                <div id="password-error"></div>
            </div>
            <div class="d-flex justify-content-between mt-lg-5 mt-4 flex-wrap">
                <div class="sign-up_footer mailing-form_check d-flex gap-3 mb-lg-0 mb-3">
                    <input type="checkbox" required>
                    <p>Подтверждаю, что ознакомлен(а) с условиями <a href="/">Пользовательского соглашения</a></p>
                </div>
                <div class="sign-up_footer">
                    <button type="submit" class="disabled">Зарегистрироваться<svg width="44" height="44" viewBox="0 0 67 67" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10.519 56.481C15.0642 61.0262 20.8552 64.1215 27.1596 65.3755C33.4639 66.6295 39.9986 65.9859 45.9372 63.5261C51.8758 61.0662 56.9516 56.9006 60.5228 51.556C64.0939 46.2114 66 39.9279 66 33.5C66 27.0721 64.0939 20.7886 60.5228 15.444C56.9516 10.0994 51.8758 5.93377 45.9372 3.47392C39.9986 1.01407 33.464 0.370459 27.1596 1.62448C20.8552 2.8785 15.0642 5.97382 10.519 10.519"  stroke-width="2" stroke-linecap="round"/>
                            <path d="M28.3333 17L42 33.5M42 33.5L28.3333 50M42 33.5H0.999999"  stroke-width="2" stroke-linecap="round"/>
                        </svg></button>
                    <div class="d-flex justify-content-center gap-2">
                        <p>Уже есть аккаунт?</p>
                        <a href="{{ route('login.page') }}">Войти</a>
                    </div>
                </div>
            </div>
        </form>
    </section>
@endsection
