<?php

use Illuminate\Database\Seeder;
use App\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //


Currency::create( [
'iso'=>'ARS',
'name'=>'PESO ARGENTINO'
] );




Currency::create( [
'iso'=>'BOB',
'name'=>'BOLIVIANO'
] );

Currency::create( [
'iso'=>'BRL',
'name'=>'REAL BRASILENO'
] );




Currency::create( [
'iso'=>'CAD',
'name'=>'DOLAR CANADIENSE'
] );




Currency::create( [
'iso'=>'CLP',
'name'=>'PESO CHILENO'
] );



Currency::create( [
'iso'=>'COP',
'name'=>'PESO COLOMBIANO'
] );


Currency::create( [
'iso'=>'EUR',
'name'=>'EURO'
] );



Currency::create( [
'iso'=>'MXN',
'name'=>'PESO MEXICANO'
] );



Currency::create( [
'iso'=>'OMR',
'name'=>'RIAL OMANI'
] );

Currency::create( [
'iso'=>'PAB',
'name'=>'BALBOA PANAMENA'
] );

Currency::create( [
'iso'=>'PEN',
'name'=>'SOL PERUANO'
] );





Currency::create( [
'iso'=>'PYG',
'name'=>'GUARANI PARAGUAYO'
] );




Currency::create( [
'iso'=>'USD',
'name'=>'DOLAR ESTADOUNIDENSE'
] );



Currency::create( [
'iso'=>'UYU',
'name'=>'PESO URUGUAYO'
] );


Currency::create( [
'iso'=>'VES',
'name'=>'BOLIVAR SOBERANO VENEZOLANO'
] );

Currency::create( [
'iso'=>'PPL',
'name'=>'DOLAR PAYPAL'
] );

Currency::create( [
'iso'=>'ZLL',
'name'=>'DOLAR ZELLE'
] );

Currency::create( [
'iso'=>'SKR',
'name'=>'DOLAR SKRILL'
] );

Currency::create( [
'iso'=>'PYN',
'name'=>'DOLAR PAYONEER'
] );

Currency::create( [
'iso'=>'BTC',
'name'=>'BITCOIN'
] );

Currency::create( [
'iso'=>'UPH',
'name'=>'UPHOLD'
] );

Currency::create( [
'iso'=>'GTA',
'name'=>'GIFTCARD DE AMAZON'
] );




    }
}
