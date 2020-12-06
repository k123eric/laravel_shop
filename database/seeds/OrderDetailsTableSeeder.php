<?php

use App\OrderDetail;
use Illuminate\Database\Seeder;

class OrderDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_details')->truncate();
        OrderDetail::unguard();   //暫時關閉安全保護
        factory(App\OrderDetail::class, 3)->create();
        OrderDetail::reguard();   //打開安全保護
    }
}
