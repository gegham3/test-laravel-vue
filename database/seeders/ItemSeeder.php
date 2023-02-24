<?php

namespace Database\Seeders;

use App\Models\Item;
use Database\Factories\ItemFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::factory()->count(20)->create();
    }
}
