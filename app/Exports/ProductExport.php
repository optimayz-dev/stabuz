<?php

namespace App\Exports;

use App\Models\Admin\Product;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductExport implements FromCollection, WithHeadings, WithCustomCsvSettings
{
    protected $categoryId;

    public function __construct($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $locale = App::getLocale();
        return Product::join('product_translations', 'products.id', '=', 'product_translations.product_id')
            ->join('category_product', 'products.id', '=', 'category_product.product_id')
            ->join('categories', 'category_product.category_id', '=', 'categories.id')
            ->where('product_translations.locale', $locale)
            ->where('categories.id', $this->categoryId)
            ->select('products.id', 'categories.id as category_id', 'product_translations.title', 'product_translations.seo_title', 'product_translations.description', 'product_translations.seo_description', 'product_translations.meta_keywords', 'product_translations.attribute_title', 'product_translations.attribute_value', 'products.file_url')
            ->orderBy('products.id')
            ->get();
    }

    public function headings(): array
    {
        return ["id", "category_id", "title", "seo_title", "description", "seo_description", "meta_keywords", "attribute_title", "attribute_value", "file_url"];
    }

    public function getCsvSettings(): array
    {
        return [
            'input_encoding' => 'UTF-8',
            'output_encoding' => 'UTF-8',
        ];
    }
}
