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

        {
            $user = User::query()->first();
            $userDetail = new UserDetail();
            $userDetail->user_id = $user->id;
            $userDetail->bio = 'Hello i\'m hasan';
            $userDetail->title = "UI UX";
            $userDetail->image_url = "https://public-files.gumroad.com/gxr1na726v9zu7l4cy4b7xvdzvty";
            $userDetail->save();
        }

        {
            $userDetail = new UserDetail();
            $userDetail->user_id = User::query()->where('name', 'ali')->first()->id;
            $userDetail->bio = 'Hello i\'m ali';
            $userDetail->title = "UI UX";
            $userDetail->image_url = "https://public-files.gumroad.com/a8l7najlm4ubmfpz7llvq3h65zg5 ";
            $userDetail->save();
        }

    }
}
