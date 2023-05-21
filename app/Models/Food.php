<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $fillable = ['category', 'name', 'pic','description','price','available','order_id'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }


    public function category()
    {
        return $this->belongsTo(Category::class, 'category');
    }

    public function cart(): HasMany
    {
        return $this->hasMany(Cart::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    


}
