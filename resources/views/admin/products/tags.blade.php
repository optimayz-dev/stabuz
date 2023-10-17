<div class="col-md-2">
    <div class="input-wrapper">
        <div class="form-check">
            <label class="form-check-label" for="">
                <input class="form-check-input" type="checkbox" name="popular" value="1" @if(isset($product->popular) && $product->popular) checked @endif>
                Популярное
            </label>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="input-wrapper">
        <div class="form-check">
            <label class="form-check-label" for="">
                <input class="form-check-input" type="checkbox" name="new" value="1" @if(isset($product->new) && $product->new) checked @endif>
                Новинки
            </label>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="input-wrapper">
        <div class="form-check">
            <label class="form-check-label" for="">
                <input class="form-check-input" type="checkbox" name="recommend" value="1" @if(isset($product->recommend) && $product->recommend) checked @endif>
                Рекомендуем
            </label>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="input-wrapper">
        <div class="form-check">
            <label class="form-check-label" for="">
                <input class="form-check-input" type="checkbox" name="actual" value="1" @if(isset($product->actual) && $product->actual) checked @endif>
                Актуальное
            </label>
        </div>
    </div>
</div>
<div class="col-md-2">
    <div class="input-wrapper">
        <div class="form-check">
            <label class="form-check-label" for="">
                <input class="form-check-input" type="checkbox" name="credit" value="1" @if(isset($product->credit) && $product->credit) checked @endif>
                Рассрочка
            </label>
        </div>
    </div>
</div>
