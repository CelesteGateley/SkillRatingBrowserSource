<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Root Admin',
            'email' => 'root@localhost',
            'email_verified_at' => now(),
            'api_key' => 'rootApiKey',
            'password' => Hash::make('root'),
            'tank_sr' => 2500,
            'damage_sr' => 1500,
            'support_sr' => 3500,
            'shown' => 1
        ]);
        $user->save();
    }
}
