@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <!-- breadcrumb -->
    <nav class="container d-md-block d-none" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Главная</a></li>
            <li class="breadcrumb-item active" aria-current="page">Бренды</li>
        </ol>
    </nav>
    <h6 class="title mb-sm-5 mb-3 mt-3 container" name="category-name">ВСЕ Бренды</h6>
    <!-- brands -->
    <div class="brands container" name="brands">

        @if($brands)
            @foreach($brands as $brand)

                <a href="{{ route('brand.detail', $brand->slug) }}" class="brand">
                    <img src="{{ asset($brand->brand_logo) }}" alt="">
                </a>
            @endforeach
        @endif
    </div>
@endsection
