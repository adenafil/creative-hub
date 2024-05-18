<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'hasanhusain';
        $user->username = 'hasanhusain';
        $user->email = 'hasanhusain@gmail.com';
        $user->password = 'hasanhusain';
        $user->save();
    }
}
