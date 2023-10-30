<?php

namespace App\Imports;

use App\Models\Admin\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cache;
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
        $category = Category::with('translations')->findOrNew($row['id']);

        // Создаём или обновляем перевод для текущего языка
        $locale = App::getLocale();
        $category->translateOrNew($locale)->title = $row['title'];
        $category->translateOrNew($locale)->seo_title = $row['seo_title'] ?? '';
        $category->translateOrNew($locale)->description = $row['description'] ?? '';
        $category->translateOrNew($locale)->seo_description = $row['seo_description'] ?? '';
        $category->translateOrNew($locale)->meta_keywords = $row['seo_description'] ?? '';

        // Опционально, если у вас есть другие поля, которые не зависят от языка
        $category->parent_id = $row['parent_id'];
        $category->lvl = $row['lvl'];

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
        return 1000;
    }
}
