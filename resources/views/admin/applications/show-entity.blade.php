@extends('admin.__layouts.layout')
@section('content')

    {{--        @dd($order)--}}
    <div class="right_col" role="main" style="min-height: 717px;">
        <form action="{{ route('admin.order.update', $order->id) }}" method="post">
            @csrf
            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Имя</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Имя"
                           value="{{ $order->guest['name'] ?? '' }}">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Инн</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Инн"
                           value="{{ $order->guest['inn'] ?? '' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustomUsername">Телефон</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="телефон"
                               aria-describedby="inputGroupPrepend" value="{{ $order->guest['phone'] ?? '' }}">
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-3">
                    <label for="validationCustom01">Рассчетный счет</label>
                    <input type="text" class="form-control" id="validationCustom01" placeholder="Рассчетный счет"
                           value="{{ $order->guest['checking_account'] ?? '' }}">

                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustom02">Наименование банка</label>
                    <input type="text" class="form-control" id="validationCustom02" placeholder="Наименование банка"
                           value="{{ $order->guest['bank'] ?? '' }}">
                </div>
                <div class="col-md-4 mb-3">
                    <label for="validationCustomUsername">МФО банка</label>
                    <div class="input-group">
                        <input type="text" class="form-control" id="validationCustomUsername" placeholder="МФО банка"
                               aria-describedby="inputGroupPrepend" value="{{ $order->guest['mfo'] ?? '' }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <label for="validationCustom03">Тип оплаты</label><br>
                    <select name="payment_type" id="e3" style="width: 100%">
                        <option value="online_pay" @if($order->pay_type == 'online_pay') selected @endif>Онлайн
                            Оплата
                        </option>
                        <option value="transfer" @if($order->pay_type == 'transfer') selected @endif>
                            Перечисление
                        </option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="validationCustom04">Статус заказа</label><br>
                    <select name="order_status" id="e4" style="width: 100%">
                        <option value="new" @if($order->order_status == 'new') selected @endif>Новый</option>
                        <option value="processed" @if($order->order_status == 'processed') selected @endif>Заказ
                            оформлен
                        </option>
                        <option value="on_way" @if($order->order_status == 'on_way') selected @endif>Заказ отправлен (в
                            пути)
                        </option>
                        <option value="delivered" @if($order->order_status == 'delivered') selected @endif>Заказ
                            получен
                        </option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label for="validationCustom05" >Статус оплаты</label><br>
                    <select name="order_pay_status" id="e5" style="width: 100%">
                        <option value="payed" @if($order->order_pay_status == 'payed') selected @endif>Оплачен</option>
                        <option value="not_payed" @if($order->order_pay_status == 'not_payed') selected @endif>Не
                            оплачен
                        </option>
                    </select>
                </div>
            </div>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Картинка</th>
                    <th scope="col">Название</th>
                    <th scope="col">Количество</th>
                </tr>
                </thead>
                <tbody>

                {{--                @dd($order->products)--}}
                @foreach($order->products as $product)
                    {{--                    @dd($product)--}}
                    <tr>
                        <th scope="row"><img src="{{ asset($product->product->images->first()->image ?? '') }}" alt=""
                                             style="width: 50px;"></th>
                        <td>{{ $product->product->title }}</td>
                        <td>{{ $product->count }}</td>
                    </tr>
                @endforeach

                </tbody>
            </table>
            <div class="btn-wrapper">
                <button type="submit" class="btn btn-success">Сохранить</button>
            </div>
        </form>
    </div>

@endsection
@push('script')
    {{--    <script>--}}
    {{--        // Example starter JavaScript for disabling form submissions if there are invalid fields--}}
    {{--        (function() {--}}
    {{--            'use strict';--}}
    {{--            window.addEventListener('load', function() {--}}
    {{--                // Fetch all the forms we want to apply custom Bootstrap validation styles to--}}
    {{--                var forms = document.getElementsByClassName('needs-validation');--}}
    {{--                // Loop over them and prevent submission--}}
    {{--                var validation = Array.prototype.filter.call(forms, function(form) {--}}
    {{--                    form.addEventListener('submit', function(event) {--}}
    {{--                        if (form.checkValidity() === false) {--}}
    {{--                            event.preventDefault();--}}
    {{--                            event.stopPropagation();--}}
    {{--                        }--}}
    {{--                        form.classList.add('was-validated');--}}
    {{--                    }, false);--}}
    {{--                });--}}
    {{--            }, false);--}}
    {{--        })();--}}
    {{--    </script>--}}
@endpush
