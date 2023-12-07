@extends('admin.__layouts.layout')
@section('content')

    {{--            @dd($review)--}}
    <div class="right_col" role="main" style="min-height: 717px;">
        <form action="{{ route('admin.review.update', $review->id) }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-3 mb-3">
                    <label for="validationCustom01">Имя</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Имя"
                           value="{{ $review->name ?? ''}}">

                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustom02">Email / Телефон</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Фамилия"
                           value="{{ $review->email ?? '' }}">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustomUsername">Оценка </label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="телефон"
                               aria-describedby="inputGroupPrepend" value="{{ $review->grade ?? '' }}">
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="validationCustomUsername">Статус</label>
                    <select name="status" id="e6" style="width: 100%">
                        <option value="not_accept" @if($review->status == 'not_accept') selected @endif>Не
                            опубликовано
                        </option>
                        <option value="accepted" @if($review->status == 'accepted') selected @endif>Опубликовано
                        </option>
                    </select>
                </div>
                <div class="form-group w-100">
                    <label for="exampleFormControlTextarea1">Отзыв</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3">{{ $review->description }}</textarea>
                </div>
            </div>
                <h6 class="text-center"> Картинки отзыва </h6>
            <table class="table table-striped">
                <thead>
                    <tr>
                        @foreach($review->images as $image)
                            <th scope="col"></th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($review->images as $image)
                            <th scope="row"><img src="{{ asset($image->image ?? '') }}" alt="" style="width: 75px;"></th>
                        @endforeach
                    </tr>
                </tbody>
            </table>
            <h6 class="text-center"> Продукт отзыва </h6>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Картинка</th>
                    <th scope="col">Название продукта</th>
                </tr>
                </thead>
                <tbody>
                <tr>

                    <th scope="row"><img src="{{ asset($review->product->images->first()->image ?? '') }}" alt="" style="width: 75px;"></th>
                    <th scope="row">{{ $review->product->title ?? '' }}</th>

                </tr>
                </tbody>
            </table>
            <div class="btn-wrapper">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>
@endsection
