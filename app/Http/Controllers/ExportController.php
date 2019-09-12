<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\ExportOrder;
use App\Customer;
use App\ExportOrderDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ExportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = ExportOrder::orderBy('created_at', 'desc')->withCount('details')->paginate();
        // dd($orders->first());
        $version = '1.2';
        $currentPage = 'Xuất Hàng';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('export.index', compact('orders', 'version', 'currentPage', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $customers = Customer::withCount('orders')->get();
        $version = '1.2';
        $currentPage = 'Đơn Nhập Hàng';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')],
            ['name' => 'Xuất Hàng', 'link' => route('export.index')]
        ];
        return view('export.create', compact('customers', 'version', 'currentPage', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request) {
        $validatedData = $request->validate([
            'code' => 'required|unique:export_orders|max:25',
            'customer_code' => 'required|exists:customers,code|max:25',
            'commodity_code' => 'required|exists:commodities,code|max:25',
            'quantity' => 'required',
            'price' => 'required'
        ]);


        $exportOrder = ExportOrder::whereCode($validatedData['code'])->first();

        foreach ($validatedData['commodity_code'] as $key => $value) {
            //echo "$key - $value\n";
            $commodity = Commodity::whereCode($value)->first();
            if ($commodity->warehouse - $validatedData['quantity'][$key] >= 0){
            if ($commodity) {
                $detail = new ExportOrderDetail([
                    'commodity_code' => $commodity->code,
                    'unit' => $commodity->unit,
                    'quantity' => $validatedData['quantity'][$key],
                    'price' => $validatedData['price'][$key],
                ]);
                $exportOrder->details()->save($detail);
            }

            $commodityUpdate = Commodity::where('code', $value)->update([
                /*'code' => $commodity->code,*/
                'warehouse' => $commodity->warehouse - $validatedData['quantity'][$key]
            ]);
            } else{
                return redirect(route('export.index'))->with('error','Thêm thất bại : Không đủ hàng để xuất bill');
            }
        }
        $newExportOrder = new ExportOrder([
            'code' => $validatedData['code'],
            'customer_code' => $validatedData['customer_code']
        ]);
        $newExportOrder->save();

        return redirect(route('export.index'))->with('status','Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $code
     * @return Response
     */
    public function show($code)
    {
        $export = ExportOrder::whereCode($code)->firstOrFail();

        $version = '1.2';
        $currentPage = "Chi Tiết Đơn Xuất Hàng " . $code;
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')],
            ['name' => 'Xuất Hàng', 'link' => route('export.index')]
        ];

        return view('export.show', compact('export', 'version', 'currentPage', 'pages'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $code
     * @return Response
     */
    public function destroy($code) {
        $export = ExportOrder::whereCode($code)->firstOrFail();

        if ($export->trashed() == false) {
            $export->delete();
            return redirect(route('export.index'))->with('status','Xóa Thành Công');

        }
        return redirect(route('export.index'))->with('error','Xóa Thất Bại');
    }
}
