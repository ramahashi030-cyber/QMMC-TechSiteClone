<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;

class UserAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insert a sample account if it doesn't already exist
        $email = 'alice@example.com';

        $exists = DB::table('accounts')->where('email', $email)->exists();
        if ($exists) {
            return;
        }

        DB::table('accounts')->insert([
            'username' => 'alice',
            'email' => $email,
            'password' => Hash::make('Password123!'),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
