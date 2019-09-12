<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\ImportOrder;
use App\ImportOrderDetail;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = ImportOrder::orderBy('created_at', 'desc')->withCount('details')->paginate();
        // dd($orders->first());
        $version = '1.2';
        $currentPage = 'Nhập Hàng';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('import.index', compact('orders', 'version', 'currentPage', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $suppliers = Supplier::withCount('commodities')->get();
        // $commodities = Commodity::all();

        $version = '1.2';
        $currentPage = 'Đơn Nhập Hàng';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')],
            ['name' => 'Nhập Hàng', 'link' => route('import.index')]
        ];
        return view('import.create', compact('suppliers', 'version', 'currentPage', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:import_orders|max:25',
            'supplier_code' => 'required|exists:suppliers,code|max:25',
            'commodity_code' => 'required|exists:commodities,code|max:25',
            'quantity' => 'required',
            'price' => 'required'
        ]);

        $newImportOrder = new ImportOrder([
            'code' => $validatedData['code'],
            'supplier_code' => $validatedData['supplier_code']
        ]);
        $newImportOrder->save();
        $importOrder = ImportOrder::whereCode($validatedData['code'])->first();

        foreach ($validatedData['commodity_code'] as $key => $value) {
            //echo "$key - $value\n";
            $commodity = Commodity::whereCode($value)->first();
            if ($commodity) {
                $detail = new ImportOrderDetail([
                    'commodity_code' => $commodity->code,
                    'unit' => $commodity->unit,
                    'quantity' => $validatedData['quantity'][$key],
                    'price' => $validatedData['price'][$key],
                ]);
                $importOrder->details()->save($detail);
            }
            $commodityUpdate = Commodity::where('code', $value)->update([
                /*'code' => $commodity->code,*/
                'warehouse' => $commodity->warehouse + $validatedData['quantity'][$key]
            ]);

        }

        return redirect(route('import.index'))->with('status', 'Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param string $code
     * @return Response
     */
    public function show($code)
    {
        $import = ImportOrder::whereCode($code)->firstOrFail();

        $version = '1.2';
        $currentPage = "Chi Tiết Đơn Nhập Hàng Đơn Hàng " . $code;
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')],
            ['name' => 'Nhập Hàng', 'link' => route('import.index')]
        ];

        return view('import.show', compact('import', 'version', 'currentPage', 'pages'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param string $code
     * @return Response
     */
    public function destroy($code)
    {
        $import = ImportOrder::whereCode($code)->firstOrFail();

        if ($import->trashed() == false) {
            $import->delete();
            return redirect(route('import.index'))->with('status', 'Xóa Thành Công');

        }
        return redirect(route('import.index'))->with('error', 'Xóa Thất Bại');
    }
}
