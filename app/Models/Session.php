<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $fillable = [
        'facility_name',
        'time',
        'booked_by',
    ];

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'booked_by');
    }
    
}
