<?php

use App\Commodity;
use App\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CreateCommodityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier=Supplier::select('code')->first();

        for ($i=0; $i<10 ; $i++) {
            $item = new Commodity([
                'code' => Str::random(10),
                'name' => "Bánh " . Str::random(5),
                'specifications' => Str::random(3),
                'unit' => 'box',
                'entry_price' => 10000,
                'price_out' => mt_rand(100000, 999999999),
                'product_carton' => mt_rand(10, 150),
                'warehouse' => 1,
                'note' => Str::random(12),
                'supplier_code' => $supplier->code,
            ]);
            $item->save();

        }
    }
}