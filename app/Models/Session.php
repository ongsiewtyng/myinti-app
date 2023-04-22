<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    use HasFactory;

    protected $table = 'sessions'; // set the correct table name
    protected $primaryKey = 'id'; // set the correct primary key column name
    public $timestamps = false; // if the table doesn't have timestamp columns, set this to false

    protected $fillable = [
        'studentid',
        'f_id',
        'rooms',
        'time',
        'booked',
    ];

    // Define a relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class, 'booked_by');
    }

    
}
