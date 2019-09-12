<?php

use App\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CreaeteCustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //'code','name','namecustomer' ,'kind','phone_number','address' ,'note'
        for ($i=0; $i<100 ; $i++) {
            $item = new Customer([
                'code' => Str::random(10),
                'name' => "Quán " . Str::random(5),
                'namecustomer' => Str::random(5),
                'kind' => Str::random(5),
                'phone_number' => Str::random(11),
                'address' => Str::random(11),
                'note' => Str::random(5),
            ]);
            $item->save();

        }

    }
}
