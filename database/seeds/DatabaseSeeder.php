<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call(CurrencySeeder::class);
         $this->call(UserLevelSeeder::class);
         $this->call(CategorySeeder::class);
         $this->call(UserSeeder::class);
         $this->call(TicketCategorySeeder::class);
          $this->call(PostSeeder::class);
    }
}
