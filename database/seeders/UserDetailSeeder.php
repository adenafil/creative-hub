<?php

namespace Database\Seeders;

use App\Models\Image;
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
        $user = User::where('username', 'hasanhusain')->first();
        $image = Image::query()->first();
        $user_details = new UserDetail();
        $user_details->user_id = $user->id;
        $user_details->image_id = $image->id;
        $user_details->save();

    }
}
