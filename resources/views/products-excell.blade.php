<table>
    <thead>
    <tr>
        <th>id</th>
        <th>title</th>
        <th>category_id</th>
        <th>tag_id</th>
        <th>brand_id</th>
        <th>image</th>
        <th>supplier</th>
        <th>article</th>
        <th>active</th>
        <th>price</th>
        <th>old_price</th>
        <th>credit</th>
        <th>modification</th>
        <th>description</th>
        <th>characteristics</th>
        <th>amount</th>
        <th>seo_title</th>
        <th>seo_description</th>
        <th>meta_keywords</th>
    </tr>
    </thead>
    <tbody>
    @foreach($products as $item)
        <tr>
            <td>{{ $item['id'] }}</td>
            <td>{{ $item['title'] }}</td>
            <td>
                @foreach($item->categories as $key => $category)
                    @if($key != 0)
                        {{';'}}
                    @endif
                    {{ $category->id }}
                @endforeach

            </td>
            <td>
                @foreach($item->tags as $key => $tag)
                    @if($key != 0)
                        {{';'}}
                    @endif
                    {{$tag->id}}
                @endforeach
            </td>
            <td>{{ $item['brand_id'] }}</td>
            <td>{{ $item['file_url'] }}</td>
            <td>{{ $item['supplier'] }}</td>
            <td>{{ $item['article'] }}</td>
            <td>{{ $item['active'] }}</td>
            <td>{{ $item['price'] }}</td>
            <td>{{ $item['old_price'] }}</td>
            <td>{{ $item['credit'] }}</td>
            <td>{{ $item['modification'] }}</td>
            <td>{{ $item['description'] }}</td>
            <td>{{ $item['characteristics'] ?? '' }}</td>
            <td>{{ $item['amount'] ?? ''}}</td>
            <td>{{ $item['seo_title'] ?? '' }}</td>
            <td>{{ $item['seo_description'] ?? '' }}</td>
            <td>{{ $item['meta_keywords'] ?? ''}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
