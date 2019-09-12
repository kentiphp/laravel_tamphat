<?php

use App\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CreateSupplierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    for ($i=0; $i<10 ; $i++) {
     $item = new Supplier([
         'code' => Str::random(10),
         'name' => "Công Ty " . Str::random(5),
         'phone_number' => Str::random(11),
         'note' => Str::random(5),
     ]);
        $item->save();

    }
}
}
