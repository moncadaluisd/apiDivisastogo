<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $category = Category::create([
          'name' => 'Compra',
        ]);


        $category = Category::create([
          'name' => 'Anuncios',
        ]);
    }
}
