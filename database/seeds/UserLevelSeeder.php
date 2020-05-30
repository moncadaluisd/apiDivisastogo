<?php

use Illuminate\Database\Seeder;
use App\UserLevel;

class UserLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Userlevel::create( [
'id'=>1,
'name'=>'Administrador'
] );



Userlevel::create( [
'id'=>2,
'name'=>'Soporte'
] );



Userlevel::create( [
'id'=>3,
'name'=>'Cajero'
] );



Userlevel::create( [
'id'=>4,
'name'=>'Usuario'
] );


    }
}
