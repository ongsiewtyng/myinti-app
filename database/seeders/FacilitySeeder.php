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
            ['f_name' =>'Snooker Table'],
            ['f_name' =>'Pool Table'],
            ['f_name' =>'Ping Pong'],
            ['f_name' =>'Music Room'],
            ['f_name' =>'Basketball Court'],
            ['f_name' =>'Tennis Court'],
            ['f_name' =>'Discussion Room'],
            ['f_name' =>'Class Room']
    
        ];

        $currentTimestamp = Carbon::now();

        foreach ($facilities as $facility) {
            $facility['created_at'] = $currentTimestamp;
            $facility['updated_at'] = $currentTimestamp;
            Facility::create($facility);
        }
    }
    
}
