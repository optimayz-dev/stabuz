<?php

namespace App\Exports;

use App\Models\Admin\Product;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\App;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;

class ProductsViewExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        $locale = App::getLocale();

        $products = Product::query()->with(['translations', 'categories', 'categories.translations', 'tags', 'tags.translations'])
            ->whereHas('translations', function ($query) use ($locale) {
                $query->where('locale', $locale);
            })->orderBy('id')->get();


//        $selectRows = $products->map(function ($item) {
//            return collect($item->toArray())
//                ->only([
//                    "id", "brand_id", "file_url", "price", "title",
//                    "supplier",  "article", "active",
//                    "old_price", "credit",
//                    "modification", "description", "characteristics",
//                    "amount", "seo_title", "seo_description",
//                    "meta_keywords",
//                ])
//                ->all();
//
//        });


        return view('products-excell', [
            'products' => $products,
        ]);
    }
}
