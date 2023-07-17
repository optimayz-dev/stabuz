<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function catalog()
    {
        return $this->belongsTo(Catalog::class);
    }
    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
