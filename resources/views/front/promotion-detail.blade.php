@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <!-- breadcrumb -->
    <nav class="container d-md-block d-none" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/">Акции</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ $promotion->title }}</li>
        </ol>
    </nav>
    <!-- news -->
    <section class="container single-news">

        <h6 class="title mb-3 mt-2">{{ $promotion->title }}</h6>
        <div class="news-info">
            <p>{{ $promotion->created_at }}</p>
            <div class="goods_views d-flex align-items-center gap-1">
                <span class="icon-eye"></span>
                <i class="news_viewsCount">123</i>
            </div>
        </div>
        <div class="useful-tab news-item flex-sm-row flex-column">
            <img style="max-width: 405px" src="{{ asset($promotion->image) }}" alt="">
            <div class="useful-teb_text news-text">
                <p>{{ $promotion->description }}</p>
            </div>
        </div>
        <a href="{{ route('promotions') }}" class="title-link mt-4 d-block">
            <svg width="20" height="17" viewBox="0 0 20 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.8033 13.8033C12.7544 14.8522 11.418 15.5665 9.96318 15.8559C8.50832 16.1453 7.00032 15.9968 5.62987 15.4291C4.25943 14.8614 3.08809 13.9001 2.26398 12.6668C1.43987 11.4334 1 9.98336 1 8.5C1 7.01664 1.43987 5.56659 2.26398 4.33322C3.08809 3.09986 4.25943 2.13856 5.62987 1.5709C7.00032 1.00325 8.50832 0.854721 9.96318 1.14411C11.418 1.4335 12.7544 2.1478 13.8033 3.1967" fill="#fff" stroke="#2D8D00" stroke-linecap="round"/>
                <path d="M8.78571 5L6 8.5M6 8.5L8.78571 12M6 8.5H19" stroke="#2D8D00" stroke-linecap="round"/>
            </svg> Все новости
        </a>

    </section>
    @include('front.includes.recently-viewed-products')
    @include('front.includes.mailing')
@endsection
