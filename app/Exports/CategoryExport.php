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

        $category = Category::query()->with('translations')->get();

        $selectRows = $category->map(function ($user) {
            return collect($user->toArray())
                ->only(["id", "parent_id", "lvl", "title", "seo_title", "description", "seo_description", "meta_keywords", "parent_title"])
                ->all();
        });

        return $selectRows;

//        return Category::join('category_translations', 'categories.id', '=', 'category_translations.category_id')
//            ->leftJoin('categories as parent_categories', 'categories.parent_id', '=', 'parent_categories.id')
//            ->leftJoin('category_translations as parent_translations', function ($join) use ($locale) {
//                $join->on('parent_categories.id', '=', 'parent_translations.category_id')
//                    ->where('parent_translations.locale', $locale);
//            })
//            ->select(
//                'categories.id',
//                'categories.parent_id',
//                'categories.lvl',
//                'category_translations.title',
//                'category_translations.seo_title',
//                'category_translations.description',
//                'category_translations.seo_description',
//                'category_translations.meta_keywords',
//                'parent_translations.title as parent_title'
//            )
//            ->orderBy('categories.id')
//            ->get();
    }


    public function headings(): array
    {
        return ["id", "parent_id", "lvl", "title", "seo_title", "description", "seo_description", "meta_keywords", "parent_title"];
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'output_encoding' => 'UTF-8',
        ];
    }
}
