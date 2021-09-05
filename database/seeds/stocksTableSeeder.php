<?php

use Illuminate\Database\Seeder;
use App\Stock;

class stocksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Stock::create([
            'item' => 'laravel勉強会', 'number' => 2,'money' => 700,
        ]);
    }
}
