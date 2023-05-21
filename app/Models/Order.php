<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'order';

    protected $fillable = [
        'user_id',
        'total',
        'payment',
        'order_type',
        'status',
        'food_id',  

        // Add other fillable fields here
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity', 'price');
    }

    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    

}
