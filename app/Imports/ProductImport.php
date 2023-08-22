<?php

namespace App\Imports;

use App\Models\Admin\Product;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow, WithCustomCsvSettings, WithBatchInserts
{
    /**
    * @param Collection $collection
    */


    public function model(array $row)
    {
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

    public function getCsvSettings(): array
    {
        return [
            'delimiter' => ',',
            'enclosure' => '"',
            'input_encoding' => 'UTF-8', // Указывает кодировку CSV-файла
            'output_encoding' => 'UTF-8', // Указывает желаемую кодировку для данных
        ];
    }

    public function batchSize(): int
    {
        return 500;
    }
}
