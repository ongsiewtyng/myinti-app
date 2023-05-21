<?php

namespace App\Models;

use App\Models\Food;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'cart';

    protected $fillable = [
        'name',
        'pic',
        'quantity',
        'total',
        'payment',
        'order_type',
        'food_id',
        'user_id',
        'order_id',
    ];

    public function foodItem(): BelongsTo
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function orders(){
        return $this->belongsToMany(Order::class)->withPivot('quantity', 'price');
    }

    public function food(){
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function order(){
        return $this->belongsTo(Order::class);
    }



}
