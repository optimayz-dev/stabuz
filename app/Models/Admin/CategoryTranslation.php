<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslation extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'title',
        'descr',
    ];
}
