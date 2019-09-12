<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Http\Response;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $suppliers = Supplier::withCount('commodities')->withCount('importOrders')->paginate();
        //dd($suppliers->first());

        $version = '1.2';
        $currentPage = 'Nhà Cung Cấp';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('suppliers.index', compact('suppliers', 'version', 'currentPage', 'pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $version = '1.2';
        $currentPage = 'Thêm Nhà Cung Cấp';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('suppliers.create', compact('suppliers', 'version', 'currentPage', 'pages'));
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
            'code' => 'required|unique:suppliers|max:25',
            'name' => 'required',
            'phone_number' => 'required',
            'note' => 'nullable',
        ]);
        $newSupplier = new Supplier($validatedData);
        $newSupplier->save();
        return redirect(route('suppliers.index'))->with('status','Thêm Thành Công');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit(Supplier $supplier)
    {
        $version = '1.2';
        $currentPage = 'Chình sửa Nhà Cung Cấp';
        $pages = [
            ['name' => 'Trang chủ', 'link' => route('home')]
        ];
        return view('suppliers.edit', compact('supplier', 'version', 'currentPage', 'pages'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, Supplier $supplier) {
        $validatedData = $request->validate([
            'code' => 'required|unique:suppliers|max:25',
            'name' => 'required',
            'phone_number' => 'required',
            'note' => 'nullable',
        ]);
        $supplier->update($validatedData);
        $supplier->save();

        return redirect(route('suppliers.index'))->with('status','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Supplier $supplier
     * @return Response
     * @throws Exception
     */
    public function destroy(Supplier $supplier)
    {
        if ($supplier->trashed() == false) {
            $supplier->delete();
        }

        return redirect(route('suppliers.index'))->with('status', "Deleted successful");
    }
}
