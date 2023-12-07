<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $guarded = ['id'];


    public function images()
    {
        return $this->hasMany(ReviewImage::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
