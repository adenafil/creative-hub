<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::query()->first();

        $userDetail = new UserDetail();
        $userDetail->user_id = $user->id;
        $userDetail->bio = 'Hello i\'m hasan';
        $userDetail->title = "UI UX";
        $userDetail->image_url = "www.google.com/hasanhusain";
        $userDetail->save();
    }
}
