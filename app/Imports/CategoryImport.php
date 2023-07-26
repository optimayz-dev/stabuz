<?php

namespace App\Imports;

use App\Models\Admin\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CategoryImport implements ToModel, WithHeadingRow, WithCustomCsvSettings, WithBatchInserts
{
    /**
    * @param Collection $collection
    */


    public function model(array $row)
    {
        // Находим существующий Brand или создаём новый по (id)
        $category = Category::findOrNew($row['id']);

        // Создаём или обновляем перевод для текущего языка
        $locale = App::getLocale();
        $category->translateOrNew($locale)->title = $row['title'];
        $category->translateOrNew($locale)->descr = $row['descr'];

        // Опционально, если у вас есть другие поля, которые не зависят от языка
        $category->catalog_id = $row['catalog_id'];


        // Сохраняем в базу
        $category->save();
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
