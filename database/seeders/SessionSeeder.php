<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        // Define start and end times
        $start_time = strtotime('9:00 AM');
        $end_time = strtotime('6:00 PM');

        // Define time slot duration and interval between slots
        $duration = 60 * 60; // 1 hour
        $interval = 15 * 60; // 15 minutes

        // Fetch available rooms for facility 6
        $available_rooms = DB::table('sessions')
            ->select('f_id', 'rooms')
            ->where('f_id', 6)
            ->groupBy('f_id', 'rooms')
            ->get();

        // Initialize insert data array
        $insert_data = [];

        // Loop through facility 6 and generate time slots
        for ($i = 1; $i <= 6; $i++) {
            $current_time = $start_time;
            $facility_insert_data = [];

            while ($current_time + $duration <= $end_time) {
                $time_slot_start = date('g:i A', $current_time);
                $time_slot_end = date('g:i A', $current_time + $duration);

                if ($i === 6) {
                    $rooms = ['Discussion Room 1', 'Discussion Room 2', 'Discussion Room 3', 'Discussion Room 4', 'Discussion Room 5'];

                    foreach ($rooms as $room) {
                        $facility_insert_data[] = [
                            'f_id' => $i,
                            'time' => $time_slot_start . ' - ' . $time_slot_end,
                            'booked' => 0,
                            'rooms' => $room,
                            'created_at' => Carbon::now(),
                            'updated_at' => Carbon::now(),
                        ];
                    }
                } else {
                    $room_options = $available_rooms->pluck('rooms')->toArray();
                    $room_options_str = implode(',', $room_options);

                    $facility_insert_data[] = [
                        'f_id' => $i,
                        'time' => $time_slot_start . ' - ' . $time_slot_end,
                        'booked' => 0,
                        'rooms' => $room_options_str,
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }

                $current_time += $duration + $interval;
            }

            $insert_data = array_merge($insert_data, $facility_insert_data);
        }

        DB::table('sessions')->insert($insert_data);
    }

}
