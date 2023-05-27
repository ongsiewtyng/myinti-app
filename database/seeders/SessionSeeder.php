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
    public function run()
    {
        // Define start and end times
        $start_time = strtotime('9:00 AM');
        $end_time = strtotime('6:00 PM');

        // Define time slot duration and interval between slots
        $duration = 60 * 60; // 1 hour
        $interval = 15 * 60; // 15 minutes

        // Define custom time slot duration for facilities 6 and 7
        $custom_duration = 2 * 60 * 60; // 2 hours

        // Loop through facilities and generate INSERT statement
        $insert_data = [];
        for ($i = 1; $i <= 7; $i++) {
            $current_time = $start_time;
            while ($current_time + $duration <= $end_time) {
                $time_slot = date('g:i A', $current_time) . ' - ' . date('g:i A', $current_time + $duration);
                $insert_data[] = [
                    'f_id' => $i,
                    'time' => $time_slot,
                    'booked' => 0,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
                $current_time += $duration + $interval;
            }
            // Add room dropdown for facilities 6 and 7
            if ($i === 6 || $i === 7) {
                // Fetch available rooms for selected facility
                $available_rooms = DB::table('sessions')
                    ->select('rooms')
                    ->where('f_id', $i)
                    ->groupBy('rooms')
                    ->get();
                
                $rooms = '<select name="room_id">';
                foreach ($available_rooms as $room) {
                    $rooms .= '<option value="' . $room->rooms . '">' . $room->rooms . '</option>';
                }
                $rooms .= '</select>';
            }
        }

        DB::table('sessions')->insert($insert_data);
    }
}
