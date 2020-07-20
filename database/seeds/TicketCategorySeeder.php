<?php

use Illuminate\Database\Seeder;
use App\TicketCategory as Category;

class TicketCategorySeeder extends Seeder
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
          'name' => 'Reportar Transaccion',
        ]);

        $category = Category::create([
          'name' => 'Reportar de problema en la pagina',
        ]);

        $category = Category::create([
          'name' => 'Reportar problema con los pagos',
        ]);

        $category = Category::create([
          'name' => 'Sugerencia',
        ]);
    }
}
