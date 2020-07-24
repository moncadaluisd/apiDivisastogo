<?php

use Illuminate\Database\Seeder;
use App\User;
use App\UserWallet;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
          'id_level' => 1,
         'username' => 'moncadaluisd',
         'email' => 'luisdavidmoncad@gmail.com',
         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', //password,
         'phone' => '+584244452741',

         'email_verify' => 1,
         'phone_verify' => 1,
         'token_verify' => 1,
         'verified' => 1,

         'phone_token' => 542452,
         'email_token' => Str::random(40),
       ]);
       $userWallet = UserWallet::create([
       'id_user' => 1,
       'wallet' => 0
       ]);
        //$users = factory(App\User::class, 50)->create();
    }
}
