<?php

namespace Database\Seeders;

use App\Models\Admin;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        Admin::create([
            'email' => 'admin@test.com',
            'password' => Hash::make('admintest123'),
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
