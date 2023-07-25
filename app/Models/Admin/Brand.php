<?php

namespace App\Models\Admin;


use Astrotomic\Translatable\Traits\Relationship;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model implements TranslatableContract
{
    use HasFactory;
    use HasFactory, Translatable;
    protected $fillable = ['file_url'];
    public $translatedAttributes = ['title', 'descr'];
}
