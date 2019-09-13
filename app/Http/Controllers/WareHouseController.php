<?php

namespace App\Http\Controllers;

use App\Commodity;
use Illuminate\Http\Response;

class WarehouseController extends Controller
{
    public function index()
    {
        $warehouses = Commodity::orderBy('code', 'asc')->paginate();
        $sumPriceWarehouse = 0;
        foreach ($warehouses as $warehouse) {
            $sumPriceWarehouse = $sumPriceWarehouse + ($warehouse->warehouse * $warehouse->entry_price);
        };
        $version = '1.2';
        $currentPage = 'Tồn kho';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('warehouse.index', compact('warehouses','sumPriceWarehouse', 'version', 'currentPage', 'pages'));
    }
}
