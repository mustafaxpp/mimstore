<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = "Super Kampa";
        $user->email = "kampa@mim.com";
        $user->mobile = "01203706439";
        $user->role = "admin";
        $user->password = Hash::make("123456");
        $user->save();

        $user = new User();
        $user->name = "atef";
        $user->email = "atef@mim.com";
        $user->mobile = "01284139337";
        $user->role = "emplpyee";
        $user->password = Hash::make("123456");
        $user->save();

        $user = new User();
        $user->name = "ayman";
        $user->email = "ayman@mim.com";
        $user->mobile = "01226090530";
        $user->role = "emplpyee";
        $user->password = Hash::make("123456");
        $user->save();
    }
}
