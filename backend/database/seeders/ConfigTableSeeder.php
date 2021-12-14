<?php

namespace Database\Seeders;

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Config::truncate();
        Config::create(['term'=>'last_scanned','value'=>'0']);
        Config::create(['term'=>'enable','value'=>'true']);
    }
}
