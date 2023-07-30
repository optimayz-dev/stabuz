<?php

namespace App\Models\Admin;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Laravel\Scout\Searchable;

class Product extends Model implements TranslatableContract
{
    use HasFactory;
    use Translatable;
    use Searchable;
    public $translatedAttributes = ['title', 'descr'];


    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function toSearchableArray()
    {
        return [
            'descr' => $this->descr,
            'translations' => $this->translations->map(function ($translation) {
                return ['title' => $translation->title];
            }),
        ];
    }

}
