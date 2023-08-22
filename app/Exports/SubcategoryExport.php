<?php

namespace App\Exports;

use App\Models\Admin\Category;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class SubcategoryExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Category::select('category_id', 'title', 'description')->get();
    }

    /**
     * Write code on Method
     *
     * @return ()
     */
    public function headings(): array
    {
        return ["category_id", "title", "description"];
    }
}
