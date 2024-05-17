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
        $user = User::where('username', 'ali')->first();
        $image = Image::query()->first();


        $user_details = new UserDetail();
        $user_details->user_id = $user->id;
        $user_details->email = 'ali@gmail.com';
        $user_details->password = encrypt('aliali123');
        $user_details->name = 'ali';
        $user_details->image_id = $image->id;
        $user_details->save();

    }
}
