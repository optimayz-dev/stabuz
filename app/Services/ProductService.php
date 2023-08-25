<?php
namespace App\Services;


use App\Models\Admin\Product;
use Illuminate\Support\Facades\App;

class ProductService
{
    public function importFromArray(array $data){

        foreach ($data as $row) {
            $product = Product::findOrNew($row['id']);
            // Создаём или обновляем перевод для текущего языка
            $locale = App::getLocale();
            $product->translateOrNew($locale)->title = $row['title'];
            $product->translateOrNew($locale)->seo_title = $row['seo_title'];
            $product->translateOrNew($locale)->description = $row['description'];
            $product->translateOrNew($locale)->seo_description = $row['seo_description'];
            $product->translateOrNew($locale)->meta_keywords = $row['meta_keywords'];
            // Опционально, если у вас есть другие поля, которые не зависят от языка
            $categoryId = $row['category_id'];
            $product->file_url = $row['file_url'];
            $product->save();
            $product->categories()->attach($categoryId);
            // Сохраняем в базу
        }
    }
}
