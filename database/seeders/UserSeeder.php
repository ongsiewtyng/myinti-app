<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDateTime = Carbon::now();

        $users = [
            [
                'studentid' => 'p21013377',
                'name' => 'Venus',
                'email' => 'p21013377@student.newinti.edu.my',
                'password' => Hash::make('123456'),
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],
            [
                'studentid' => 'p21013509',
                'name' => 'Yi Guan',
                'email' => 'p21013509@student.newinti.edu.my',
                'password' => Hash::make('123456'),
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],
            [
                'studentid' => 'p21013625',
                'name' => 'Prejesh',
                'email' => 'p21013625@student.newinti.edu.my',
                'password' => Hash::make('123456'),
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ],
        ];

        User::query()->insert($users);
    }
}
