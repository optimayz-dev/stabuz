<?php

namespace App\Exports;

use App\Models\Admin\Product;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    protected $subcategoryId;

    public function __construct($subcategoryId)
    {
        $this->subcategoryId = $subcategoryId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $locale = App::getLocale();
        return Product::join('product_translations', 'products.id', '=', 'product_translations.product_id')
            ->where('product_translations.locale', $locale)
            ->where('products.subcategory_id', $this->subcategoryId) // Фильтруем по подкатегории
            ->select('products.id', 'products.subcategory_id', 'product_translations.title', 'product_translations.descr', 'products.file_url')
            ->orderBy('id')
            ->get();
    }

    public function headings(): array
    {
        return ["id", "subcategory_id", "title", "descr", "file_url"];
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'output_encoding' => 'UTF-8',
        ];
    }
}
