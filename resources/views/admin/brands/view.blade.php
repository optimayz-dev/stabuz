{{ $brand->title }}
@foreach($brand->products as $product)
    <p style="margin-left: 200px;">{{ $product->title }}</p>
@endforeach
