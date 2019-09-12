<?php

namespace App\Http\Controllers\Api;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * @param Request $request
     * @param $code
     */
    public function get(Request $request, $code) {
        if ($request->method('get')) {

            $code = $code ?? 'notfound';
            return Customer::whereCode($code)->first();
        }
        else {
            return abort(403);
        }
    }
}
