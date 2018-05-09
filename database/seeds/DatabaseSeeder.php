<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->truncateTables([
            'users',
            'addresses',
            'clients',
            'product_categories',
            'products',
            'products_stock'
        ]);
  
        $this->call([
            ClientsTableSeeder::class,
            ProductCategoriesTableSeeder::class,
            ProductsStockTableSeeder::class,
        ]);
    }

    private function truncateTables(array $tables){

    	DB::statement('SET FOREIGN_KEY_CHECKS = 0;');

        foreach ($tables as $table) {
            DB::table($table)->truncate();
            $this->command->info("{$table} table truncated!");
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
