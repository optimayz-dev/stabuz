<?php

namespace App\Imports;

use App\Models\Admin\Product;
use App\Models\Admin\ProductGallery;
use Illuminate\Http\File;
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
        $product->translateOrNew($locale)->title = $row['title'];
        $product->translateOrNew($locale)->seo_title = $row['seo_title'];
        $product->translateOrNew($locale)->description = $row['description'];
        $product->translateOrNew($locale)->seo_description = $row['seo_description'];
        $product->translateOrNew($locale)->meta_keywords = $row['meta_keywords'];
        $product->translateOrNew($locale)->characteristics = $row['characteristics'];
        $product->article = $row['article'];
        $product->modification = $row['modification'];
        $product->brand_id = $row['brand_id'];
        $product->price = $row['price'];
        $product->old_price = $row['old_price'];
        $product->popular = $row['popular'];
        $product->new = $row['new'];
        $product->actual = $row['actual'];
        $product->recommend = $row['recommend'];
        $product->credit = $row['credit'];
        $categoryId = explode(';', trim($row['category_id']));
//        $tagId = explode(';', trim($row['tag_id']));

        if (!empty($row['image'])) {

            $urls = explode(';', trim($row['image']));

//            if (count($urls) <= 1) {
//                $contents = false;
//                $contents = $this->file_get_contents_curl($urls[0]);
//                $name = substr($urls[0], strrpos($urls[0], '/') + 1);
//                    Storage::put('images/' . $name, $contents);
//                $product->file_url = 'images/' . $name;
//            }

//            if (count($urls) > 1 && is_array($urls)){
                foreach ($urls as $url) {
                    $contents = false;
                    $contents = $this->file_get_contents_curl($url);
                    $name = substr($url, strrpos($url, '/') + 1);
                    Storage::put('images/products' . $name, $contents);

                    if (file_exists(public_path('images/products'.$name)))
                        break;

                    ProductGallery::query()->create([
                        'image' => 'images/products' . $name,
                        'product_id' => $product->id
                    ]);
                }
//            }

        }

        $product->save();


        // Связываем с категориями
        if (!empty($row['category_id']))
            $product->categories()->sync($categoryId);
    }


    function file_get_contents_curl($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); //Set curl to return the data instead of printing it to the browser.
        curl_setopt($ch, CURLOPT_URL, $url);
        $data = curl_exec($ch);
        curl_close($ch);
        return $data;
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
        return 100000;
    }
}
