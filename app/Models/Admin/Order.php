<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = ['guest' => 'array'];

    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }

    public function pickUpPoint()
    {
        return $this->hasOne(PickUpPoint::class, 'id', 'pick_up_point_id');
    }

    public function user()
    {

    }
}
