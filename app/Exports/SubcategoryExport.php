<?php

namespace App\Exports;

use App\Models\Admin\Subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubcategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subcategory::select('category_id', 'title', 'descr')->get();
    }

    /**
     * Write code on Method
     *
     * @return ()
     */
    public function headings(): array
    {
        return ["category_id", "title", "descr"];
    }
}
