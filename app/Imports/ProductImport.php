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
use Illuminate\Support\Facades\Storage;

class ProductImport implements ToModel, WithHeadingRow, WithCustomCsvSettings, WithBatchInserts
{
    /**
    * @param Collection $collection
    */
//    public function __construct(&$errors)
//    {
//        $this->errors = &$errors;
//    }

    public function model(array $row)
    {


            $product = Product::with('translations')->findOrNew($row['id']);
            // Создаём или обновляем перевод для текущего языка
            $locale = App::getLocale();
            $product->translateOrNew($locale)->title = $row['title'] ?? 'test' ;
            $product->translateOrNew($locale)->seo_title = $row['seo_title'];
            $product->translateOrNew($locale)->description = $row['description'] ?? 'desc';
            $product->translateOrNew($locale)->seo_description = $row['seo_description'];
            $product->translateOrNew($locale)->meta_keywords = $row['meta_keywords'] ;
            $product->brand_id = $row['brand_id'] ?? 1;
            $categoryId = explode(';', $row['category']);

//            dd($categoryId);

            $url = $row['image'];
            $contents = false;
            if (isset($url))
                $contents = file_get_contents($url);

            $name = substr($url, strrpos($url, '/') + 1);
            Storage::put('images/'. $name, $contents);


            $product->file_url = 'images/'. $name;

            $product->save();
//            $product->categories()->attach($categoryId);

//            $categoryId[] = $row['category'];

            foreach ($categoryId as $category)
            {
                $product->categories()->sync($category,false);
            }

//            foreach ($categoryId as $category){
//                $product->categories()->detach((integer)$category);
//            }

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
        return 1000;
    }
}
