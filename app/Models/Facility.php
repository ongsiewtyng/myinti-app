<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'cost',
        'availability',
    ];

    public function booking()
    {
        return $this->hasMany(Booking::class, 'f_id');
    }

    public function sessions()
    {
        return $this->hasMany(Session::class, 'f_id');
    }

    public function getRoomsAttribute(){
        return $this->sessions->pluck('rooms')->unique();
    }


    // Add any other methods you need here
}
