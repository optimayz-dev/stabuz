<?php

namespace App\Exports;

use App\Models\Admin\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CategoryExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    /**
    * @return Collection
    */
    public function collection(): Collection
    {
        $locale = App::getLocale();
        return Category::join('category_translations', 'categories.id', '=', 'category_translations.category_id')
            ->where('category_translations.locale', $locale)
            ->select('categories.id', 'parent_id', 'categories.lvl', 'category_translations.title', 'category_translations.seo_title', 'category_translations.description', 'category_translations.seo_description', 'meta_keywords')
            ->orderBy('id')
            ->get();
    }

    public function headings(): array
    {
        return ["id", "parent_id", "lvl", "title", "seo_title", "description", "seo_description", "meta_keywords"];
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'output_encoding' => 'UTF-8',
        ];
    }
}
