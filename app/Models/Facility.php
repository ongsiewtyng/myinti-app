<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        // Add any other fields you need here
    ];

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }

    // Add any other methods you need here
}
