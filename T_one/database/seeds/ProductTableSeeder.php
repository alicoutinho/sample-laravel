<?php

use App\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{

    public function run()
    {
        Product::truncate();
        factory(Product::class,150)->create();
    }
}
