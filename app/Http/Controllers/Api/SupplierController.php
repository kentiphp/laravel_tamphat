<?php

namespace App\Http\Controllers\Api;

use App\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SupplierController extends Controller
{
    public function get(Request $request, $code) {
        if ($request->method('get')) {

            $code = $code ?? 'notfound';
            return Supplier::whereCode($code)->first();
        }
        else {
            return abort(403);
        }
    }

    public function getCommodities(Request $request, $code) {
        if ($request->method('get')) {
            $code = $code ?? 'notfound';
            $supplier =  Supplier::whereCode($code)->first();
            return $supplier->commodities;
        }
        else {
            return abort(403);
        }
    }

}
