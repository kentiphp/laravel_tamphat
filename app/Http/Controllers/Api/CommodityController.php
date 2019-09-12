<?php

namespace App\Http\Controllers\Api;

use App\Commodity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommodityController extends Controller
{
    public function getAll(Request $request) {
        if ($request->method('get')) {
            return Commodity::all();
        }
        else {
            return abort(403);
        }
    }

    public function get(Request $request, $code) {
        if ($request->method('get')) {
            $code = $code ?? 'notfound';
            return Commodity::whereCode($code)->first();
        }
        else {
            return abort(403);
        }
    }
}
