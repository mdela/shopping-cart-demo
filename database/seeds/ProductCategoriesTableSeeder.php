<?php

use Illuminate\Database\Seeder;
use App\Models\ProductCategory;


class ProductCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ProductCategory::class)->create([
            'name' => 'tv'
        ]);

        factory(ProductCategory::class)->create([
            'name' => 'cell_phones'
        ]);

        factory(ProductCategory::class)->create([
            'name' => 'tablets'
        ]);
    }
}
