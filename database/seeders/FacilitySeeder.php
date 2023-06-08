<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Facility;
use Illuminate\Support\Carbon;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        $facilities = [
            ['f_name' => 'Snooker Table', 'img' => 'snooker.png','cost'=> 5],
            ['f_name' => 'Ping Pong', 'img' => 'ping-pong.png','cost'=> 0],
            ['f_name' => 'Music Room', 'img' => 'music.png','cost'=> 0],
            ['f_name' => 'Basketball Court', 'img' => 'basketball.png','cost'=> 0],
            ['f_name' => 'Tennis Court', 'img' => 'tennis.png','cost'=> 0],
            ['f_name' => 'Discussion Room', 'img' => 'room.png','cost'=> 0],
            // ['f_name' => 'Class Room', 'img' => 'class.png']
        ];
        
        

        $currentTimestamp = Carbon::now();

        foreach ($facilities as $facility) {
            $facility['created_at'] = $currentTimestamp;
            $facility['updated_at'] = $currentTimestamp;
            Facility::create($facility);
        }
    }
    
}
