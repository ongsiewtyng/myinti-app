<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Contact;

use Carbon\Carbon;

class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contacts = [
            [
                'club_name' => 'Japanese ACG Society',
                'ig_link' => 'https://instagram.com/japaneseacgsociety',
                'fb_link' => null,
                'email' => 'p21013516@student.newinti.edu.my',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'Nerf Club',
                'ig_link' => 'https://instagram.com/iicp.nerf',
                'fb_link' => null,
                'email' => 'p22013937@student.newinti.edu.my',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => '24 Festive Drums',
                'ig_link' => 'https://instagram.com/iicp24festivedrums',
                'fb_link' => null,
                'email' => 'p19011578@student.newinti.edu.my',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'Dance Club',
                'ig_link' => 'https://www.instagram.com/iicpdanceclubs',
                'fb_link' => null,
                'email' => 'p20012884@student.newinti.edu.my',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'Lions Club',
                'ig_link' => 'https://instagram.com/boardgamesclub',
                'fb_link' => null,
                'email' => 'whatever@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'BYIC Society',
                'ig_link' => 'https://www.instagram.com/byic.iicp',
                'fb_link' => null,
                'email' => 'whatever@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'Debate Club',
                'ig_link' => 'https://www.instagram.com/iicp_debateclub',
                'fb_link' => null,
                'email' => 'p20012723@student.newinti.edu.my',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'Chess Club',
                'ig_link' => 'https://www.instagram.com/iicp_chess_club',
                'fb_link' => null,
                'email' => 'whatever@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'IT Club',
                'ig_link' => 'https://www.instagram.com/itclub.iicp',
                'fb_link' => null,
                'email' => 'whatever@example.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'INTIMA',
                'ig_link' => 'https://www.instagram.com/intima.iicp/',
                'fb_link' => 'https://www.facebook.com/IICP.INTIMA',
                'email' => 'iicp.intima@newinti.edu.my',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'Badminton Club',
                'ig_link' => 'https://www.instagram.com/iicpbadminton',
                'fb_link' => null,
                'email' => 'p20012101@student.newinti.edu.my',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'club_name' => 'Basketball Club',
                'ig_link' => 'https://www.instagram.com/iicpbasketball',
                'fb_link' => null,
                'email' => 'p21013272@student.newinti.edu.my',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],



            // Add more data entries as needed
        ];

        Contact::insert($contacts);
    }
}
