<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';
    protected $fillable =[
        'f_id',
        'session_id',
        'user_id',
        'name',
        'studentid',
        'room',
        'time'
    ];

    public function facility()
    {
        return $this->belongsTo(Facility::class, 'f_id');
    }

    public function session(){
        return $this->belongsTo(Session::class);
    }

}
