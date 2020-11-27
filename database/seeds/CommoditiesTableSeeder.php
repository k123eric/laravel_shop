<?php

use App\Commodity;
use Illuminate\Database\Seeder;

class CommoditiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('commodities')->truncate();
        Commodity::unguard();   //暫時關閉安全保護
        factory(App\Commodity::class, 50)->create();
        Commodity::reguard();   //打開安全保護
    }
}
