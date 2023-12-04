@extends('front.__layouts.layout')
@section('content')
    @include('front.__layouts.header')
    <section class="category container d-flex justify-content-between gap-4" id="category">
        <div class="category-main w-100">
            <div class="d-flex flex-sm-row flex-column align-items-md-center align-items-start justify-content-between mb-4 gap-3">
                <div class="favorites-stock d-flex align-items-center gap-3">
                    <input type="checkbox" id="favoritesStock" value="favorites-stock">
                    <label for="favoritesStock">Снова в наличии</label>
                </div>
                <div class="category-main_bar d-flex align-items-lg-center align-items-start align-self-start flex-lg-row flex-column justify-content-end gap-lg-5 gap-1 mb-0">
                    <div class="category-counts d-flex gap-3">
                        <div class="category-count_goods d-flex gap-2">
                            <img src="image/icons/countGoods.svg" alt="">
                            <p name="favoritesCountGoods">23 230 шт</p>
                        </div>
                        <div class="category-count_views d-flex gap-2">
                            <img src="image/icons/eye.svg" alt="">
                            <p name="favoritesCountViews">15 025</p>
                        </div>
                    </div>
                    <form action="" class="category-main_filter d-flex align-items-center">
                        <p>Сортировать по:</p>
                        <select name="" id="" class="custom-select" placeholder="дате добавления">
                            <option value="date">дате добавления</option>
                            <option value="price-asc" class="icon-arrD">цене</option>
                            <option value="price-desc" class="icon-arrT">цене</option>
                            <option value="have-goods">есть в наличии</option>
                            <option value="dontHave-goods">нет в наличии</option>
                        </select>
                    </form>
                </div>
            </div>
            <div class="favorites-goods">

            </div>
            <div class="" id="favoritesCount"></div>
        </div>
    </section>
    @include('front.includes.recommend-products')
    @include('front.includes.recently-viewed-products')
    @include('front.includes.mailing')
@endsection
