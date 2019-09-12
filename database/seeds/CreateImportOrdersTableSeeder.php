<?php

use App\Commodity;
use App\ImportOrder;
use App\ImportOrderDetail;
use App\Supplier;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CreateImportOrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $supplier = Supplier::first();
        if ($supplier) {
            $code = Str::random(5);
            $importOrder = new ImportOrder([
                //'unit' => 'box',
                //'quantity' => mt_rand(100000, 999999999),
                'code' => $code,
                'supplier_code' => $supplier->code,
                //'commodity_code' => $commodity->code,
            ]);
            $importOrder->save();
            $importOrder = ImportOrder::whereCode($code)->first();

            $commodities = Commodity::all();
            $rand = mt_rand(0, 99);
            for ($i = $rand; $i < $rand + 5; $i++) {
                $detail = new ImportOrderDetail([
                    'order_code' => $importOrder->code,
                    'commodity_code' => $commodities[$i]->code,
                    'unit' => $commodities[$i]->unit,
                    'quantity' => mt_rand(0, 99),
                    'price' => mt_rand(10000, 900000),
                ]);
                $detail->save();
                $importOrder->details()->save($detail);
            }
        }
    }
}
