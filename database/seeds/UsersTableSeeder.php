<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate();
        User::unguard();   //暫時關閉安全保護
        factory(App\User::class, 2)->create();
        User::reguard();   //打開安全保護
    }
}
