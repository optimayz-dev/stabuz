<?php

namespace App\Imports;

use App\Models\Admin\Brand;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithUpsertColumns;
use Maatwebsite\Excel\Concerns\WithUpserts;

class BrandImport implements ToModel, WithBatchInserts, WithHeadingRow, WithCustomCsvSettings
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Находим существующий Brand или создаём новый по (id)
        $brand = Brand::findOrNew($row['id']);

        // Создаём или обновляем перевод для текущего языка
        $locale = App::getLocale();
        $brand->translateOrNew($locale)->title = $row['title'];
        $brand->translateOrNew($locale)->description = $row['description'];

        // Опционально, если у вас есть другие поля, которые не зависят от языка

        if (!empty($row['image'])){
            $url = $row['image'];

            $contents = false;
            $contents = $this->file_get_contents_curl($url);
            $name = substr($url, strrpos($url, '/') + 1);
            Storage::put('images/brands' . $name, $contents);
            $brand->brand_logo = 'images/brands' . $name;
        }


       // Сохраняем в базу
        $brand->save();
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

    public function batchSize(): int
    {
        return 500;
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
}
