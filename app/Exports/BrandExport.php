<?php

namespace App\Exports;

use App\Models\Admin\Subcategory;
use Maatwebsite\Excel\Concerns\FromCollection;

class BrandExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Subcategory::select('category_id', 'title', 'descr')->get();
    }
}
