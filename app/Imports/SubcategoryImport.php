<?php

namespace App\Imports;

use App\Models\Admin\Subcategory;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class SubcategoryImport implements ToModel, WithHeadingRow, WithCustomCsvSettings, WithBatchInserts
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Subcategory([
            'category_id' => $row['category_id'],
            'title' => $row['title'],
            'descr' => $row['descr'],
        ]);
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
