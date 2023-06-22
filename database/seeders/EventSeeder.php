<?php

namespace Database\Seeders;

use App\Models\Approval;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDateTime = Carbon::now();

        $events = [
            [
                'user_id' => 1,
                'contact_id' => 1,
                'club_name' => 'Japanese ACG Society',
                'event_title' => 'Anime Watch',
                'start_date' => '2023-07-06',
                'end_date' => '2023-07-06',
                'start_time' => '12:00',
                'end_time' => '2:00',
                'urgency' => 'High',
                'document' => 'document.pdf',
                'status' => 'approved',
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],

            [
                'user_id' => 2,
                'contact_id' => 2,
                'club_name' => 'Nerf Club',
                'event_title' => 'Target Training',
                'start_date' => '2023-05-06',
                'end_date' => '2023-05-06',
                'start_time' => '12:00',
                'end_time' => '3:00',
                'urgency' => 'High',
                'document' => 'document.pdf',
                'status' => 'approved',
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],

            [
                'user_id' => 1,
                'contact_id' => 3,
                'club_name' => '24 Festive Drums',
                'event_title' => 'Drum Patterns',
                'start_date' => '2023-08-09',
                'end_date' => '2023-08-10',
                'start_time' => '1:00',
                'end_time' => '4:00',
                'urgency' => 'High',
                'document' => 'document.pdf',
                'status' => 'approved',
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],

            [
                'user_id' => 3,
                'contact_id' => 4,
                'club_name' => 'Dance Club',
                'event_title' => 'Dance Practice',
                'start_date' => '2023-06-12',
                'end_date' => '2023-06-14',
                'start_time' => '12:00',
                'end_time' => '6:00',
                'urgency' => 'High',
                'document' => 'document.pdf',
                'status' => 'approved',
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],

            [
                'user_id' => 1,
                'contact_id' => 5,
                'club_name' => 'Lions Club',
                'event_title' => 'Lions Dancing Practice',
                'start_date' => '2023-05-13',
                'end_date' => '2023-05-15',
                'start_time' => '2:00',
                'end_time' => '6:00',
                'urgency' => 'High',
                'document' => 'document.pdf',
                'status' => 'approved',
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],

            [
                'user_id' => 2,
                'contact_id' => 6,
                'club_name' => 'BYIC Society',
                'event_title' => 'Learn How to Invest',
                'start_date' => '2023-05-20',
                'end_date' => '2023-05-21',
                'start_time' => '11:00',
                'end_time' => '5:00',
                'urgency' => 'High',
                'document' => 'document.pdf',
                'status' => 'approved',
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],
        ];

        Approval::query()->insert($events);
    }
}
