<?php

namespace App\Models\Admin;

use App\Models\Translation;
use Astrotomic\Translatable\Traits\Relationship;
use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    use Translatable;
    protected $fillable = [];
    public $translatedAttributes = ['title', 'descr'];

    public function getTranslationModelName(): string
    {
        return Translation::class;
    }
}
