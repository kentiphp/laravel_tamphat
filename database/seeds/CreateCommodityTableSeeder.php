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
        $supplier = Supplier::first();
        $entry_price = mt_rand(1000000,9999999);
        $price_out = $entry_price * 1.2;

        for ($i=0; $i<100 ; $i++) {
            $item = new Commodity([
                'code' => Str::random(10),
                'name' => "Bánh " . Str::random(5),
                'specifications' => Str::random(3),
                'unit' => 'box',
                'entry_price' => $entry_price,
                'price_out' => $price_out,
                'product_carton' => mt_rand(10, 150),
                'warehouse' => mt_rand(10, 30),
                'note' => Str::random(12),
                'supplier_code' => $supplier->code
            ]);
            $item->save();

        }
    }
}
