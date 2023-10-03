@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <!-- breadcrumb -->
    <nav class="container d-md-block d-none" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item"><a href="/">Видеообзоры</a></li>
        </ol>
    </nav>
    <!-- videos -->
    <section class="container">
        <h6 class="title mb-3">Видеообзоры</h6>
        <div class="videos">
            @foreach($video_reviews as $item)
            <div class="video">
                <iframe
                        src="{{ $item->link }}" allowfullscreen>
                </iframe>
                <h6>{{ $item->title }}</h6>
                <p>{{ $item->created_at }}</p>
            </div>
            @endforeach
        </div>
    </section>

    @include('front.includes.recently-viewed-products')
    @include('front.includes.mailing')
@endsection
