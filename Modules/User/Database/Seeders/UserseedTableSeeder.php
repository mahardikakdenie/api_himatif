<?php

namespace Modules\User\Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserseedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $user = new User();
        $user->name = "SuperAdministrator";
        $user->nim = "Admin";
        $user->email = "admin@admin.com";
        $user->password = Hash::make("password");
        $user->generation_id = "1";
        $user->role_id = "1";
        $user->save();

        // $this->call("OthersTableSeeder");
    }
}
