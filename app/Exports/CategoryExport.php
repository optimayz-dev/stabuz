<?php

namespace App\Exports;

use App\Models\Admin\Category;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $locale = App::getLocale();
        return Category::join('category_translations', 'categories.id', '=', 'category_translations.category_id')
            ->where('category_translations.locale', $locale)
            ->select('categories.id', 'categories.catalog_id', 'category_translations.title', 'category_translations.descr')
            ->orderBy('id')
            ->get();
    }

    public function headings(): array
    {
        return ["id", "catalog_id", "title", "descr"];
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'output_encoding' => 'UTF-8',
        ];
    }
}
