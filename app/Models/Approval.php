<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table = 'approval';

    protected $fillable = [
        'club_name', 
        'event_title', 
        'start_date', 
        'end_date', 
        'start_time', 
        'end_time', 
        'urgency',
        'document',
        'status'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function contact(){
        return $this->belongsTo(Contact::class);
    }

}
