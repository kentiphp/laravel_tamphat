<?php

namespace App\Http\Controllers;

use App\Commodity;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommodityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $commodities = Commodity::orderBy('code', 'asc')->paginate();

        $version = '1.2';
        $currentPage = 'Hàng Hóa';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('commodities.index', compact('commodities', 'version', 'currentPage', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $version = '1.2';
        $currentPage = 'THÊM HÀNG HÓA';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];

        // get all suppliers
        $suppliers = Supplier::all();

        return view('commodities.create', compact('commodities', 'suppliers', 'version', 'currentPage', 'pages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:commodities',
            'name' => 'required',
            'specifications' => 'required',
            'unit' => 'required',
            'entry_price' => 'required',
            'price_out' => 'required',
            'product_carton' => 'required',
            'note' => 'nullable',
            'supplier_code' => 'required'
        ]);

        $supplier = Supplier::whereCode($validatedData['supplier_code'])->first();
        if ($supplier) {
            $newCommodities = new Commodity($validatedData);
            $newCommodities->save();
            return redirect(route('commodities.index'))->with('status', 'Thêm Thành Công');
        } else {
            return redirect(route('commodities.index'))->withErrors('supplier_code', 'Cái lòn này yêu cầu phải tồn tại');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Commodity $commodity)
    {
        $version = '1.2';
        $currentPage = 'Chình sửa hàng hóa';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('commodities.edit', compact('commodity', 'version', 'currentPage', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Commodity $commodity)
    {
        $validatedData = $request->validate([
            'code' => 'required|unique:commodities',
            'name' => 'required',
            'specifications' => 'required',
            'unit' => 'required',
            'entry_price' => 'required',
            'price_out' => 'required',
            'product_carton' => 'required',
            'note' => 'nullable',
        ]);
        $commodity->update($validatedData);
        $commodity->save();

        return redirect(route('commodities.index'))->with('status', 'Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy(Commodity $commodity)
    {
        if ($commodity->trashed() == false) {
            $commodity->delete();
        }

        return redirect(route('commodities.index'))->with('status', "Deleted successful");
    }
}
