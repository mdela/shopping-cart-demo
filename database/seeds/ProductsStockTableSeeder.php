<?php

use Illuminate\Database\Seeder;
use App\Models\ProductStock;

class ProductsStockTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductStock::class, 20)->create();
    }
}
