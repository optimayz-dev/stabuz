<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatalogTranslation extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'descr',
    ];
}
