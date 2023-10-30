<?php

namespace App\Imports;

use App\Models\Admin\Brand;
use Illuminate\Support\Facades\App;
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
        $brand->brand_logo = $row['image'];

       // Сохраняем в базу
        $brand->save();
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
