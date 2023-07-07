<?php

namespace Database\Seeders;

use App\Models\User;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentDateTime = Carbon::now();
        $faker = Faker::create();

        $users = [];

        // Generate 100 users using Faker
        for ($i = 0; $i < 100; $i++) {
            $studentId = 'p' . str_pad($faker->unique()->randomNumber(8), 8, '0', STR_PAD_LEFT);
            $email = $studentId . '@student.newinti.edu.my';

            $createdAt = Carbon::createFromTimestamp($faker->dateTimeBetween('2022-01-01', '2023-12-31')->getTimestamp());
            $updatedAt = $faker->optional(0.5, $createdAt)->dateTimeBetween($createdAt, '2023-12-31');

            $users[] = [
                'studentid' => $studentId,
                'name' => $faker->name,
                'email' => $email,
                'password' => Hash::make('123456'),
                'created_at' => $createdAt,
                'updated_at' => $updatedAt,
            ];
        }

        // Add the predefined users
        $users = array_merge($users, [
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
        ]);

        User::query()->insert($users);
    }
}
