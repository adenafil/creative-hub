<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = "hasanhusain";
        $user->username = 'hasanhusain';
        $user->email = 'hasanhusain@gmail.com';
        $user->password = 'hasanhusain';
        $user->save();

        $user = new User();
        $user->name = "ali";
        $user->username = 'alimaula123';
        $user->email = 'alimaula123@gmail.com';
        $user->password = 'alimaula123';
        $user->save();

    }
}
